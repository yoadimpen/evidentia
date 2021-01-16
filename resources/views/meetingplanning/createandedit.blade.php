@extends('layouts.app')

@isset($edit)
    @section('title', 'Editar planificación: '.$meetingplanning->title)
@else
    @section('title', 'Crear nueva planificación')
@endisset

@section('title-icon', 'far fa-handshake')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/{{$instance}}">Home</a></li>
    @isset($edit)
        <li class="breadcrumb-item"><a href="{{route('secretary.meetingplanning.list',['instance' => $instance])}}">Gestionar planificaciones</a></li>
    @endisset
    <li class="breadcrumb-item active">@yield('title')</li>
@endsection

@section('info')
    <x-slimreminder :datetime="\Config::meetings_timestamp()"/>
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-12">

            <x-status/>

            <div class="card">

                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="{{$route}}">
                        @csrf

                        <x-id :id="$meetingplanning->id ?? ''" :edit="$edit ?? ''"/>

                        <div class="form-row">

                            <x-input col="6" attr="title" :value="$meetingplanning->title ?? ''" label="Título" description="Escribe un título para tu reunión."/>


                            <div class="form-group col-md-3">
                                <label for="date">Día</label>
                                <input id="date" type="date"
                                       class="form-control @error('date') is-invalid @enderror" name="date"
                                       @if(old('date'))
                                       value="{{old('date')}}"
                                       @else
                                       @isset($edit)
                                       value="{{\Carbon\Carbon::parse($meetingplanning->datetime)->format('Y-m-d')}}"
                                       @endisset

                                       @endif
                                       required autofocus>
                                <small class="form-text text-muted">Indica el día de la reunión.
                                </small>

                                @error('date')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-3">
                                <label for="time">Hora</label>
                                <input id="time" type="time"
                                       class="form-control @error('time') is-invalid @enderror" name="time"
                                       @if(old('time'))
                                       value="{{old('time')}}"
                                       @else
                                       @isset($edit)
                                       value="{{\Carbon\Carbon::parse($meetingplanning->datetime)->format('H:i')}}"
                                       @endisset

                                       @endif
                                       required autofocus>
                                <small class="form-text text-muted">Indica la hora de la reunión.
                                </small>

                                @error('time')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>

                        </div>

                        <div class="form-row">

                            <x-input col="6" attr="place" :value="$meetingplanning->place ?? ''" label="Lugar" description="Indica el lugar de la reunión."/>

                            <div class="form-group col-md-3">
                                <label for="type">Tipo de reunión</label>
                                <select id="type" class="selectpicker form-control @error('type') is-invalid @enderror" name="type" value="{{ old('type') }}" required autofocus>

                                    @isset($meetingplanning)
                                        <option {{$meetingplanning->type  == old('type') || $meetingplanning->type == '1' ? 'selected' : ''}} value="1">ORDINARIA</option>
                                        <option {{$meetingplanning->type  == old('type') || $meetingplanning->type == '2' ? 'selected' : ''}} value="2">EXTRAORDINARIA</option>
                                    @else
                                        <option value="1">ORDINARIA</option>
                                        <option value="2">EXTRAORDINARIA</option>
                                    @endisset

                                </select>

                                <small class="form-text text-muted">Elige el tipo de reunión.</small>

                                @error('type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                        </div>

                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label for="defaultlist">Elige una lista predeterminada</label>
                                <select id="defaultlist" onchange="getLista(this);" class="selectpicker form-control @error('defaultlist') is-invalid @enderror" value="{{ old('type') }}" required autofocus>

                                    <option value="-1">Selecciona una lista</option>
                                    @foreach($defaultlists as $defaultlist)
                                        <option value="{{trim($defaultlist->id)}}">{{trim($defaultlist->name)}}</option>
                                    @endforeach

                                </select>

                                @error('defaultlist')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-12">
                                <label>Seleccionar alumnos</label>
                                <select id="users" name="users[]" class="duallistbox" multiple="multiple @error('users') is-invalid @enderror">
                                    @foreach($users as $user)
                                        <option

                                            @isset($meetingplanning)
                                            @if($meetingplanning->users->contains($user))
                                            selected
                                            @endif
                                            @endisset

                                            {{$user->id == old('user') ? 'selected' : ''}} value="{{$user->id}}">
                                            {{trim($user->surname)}}, {{trim($user->name)}}
                                        </option>
                                    @endforeach
                                </select>
                                @error('users')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                        </div>

                        <div class="form-row">
                            <div class="col-lg-3 mt-1">
                                <button type="submit"  class="btn btn-primary btn-block">Guardar planificación</button>
                            </div>
                        </div>


                    </form>
                </div>

            </div>


        </div>
    </div>

    @section('scripts')

        <script>

            function getLista(sel){

                if(sel.value != -1) {

                    var demo = $('.duallistbox').bootstrapDualListbox();
                    $("#users").empty();

                    var seleccionados = new Array();

                    $.ajax({
                        url: '/{{$instance}}/secretary/meetingplanning/defaultlist/' + sel.value,
                        success: function (respuesta) {

                            for (var i = 0; i < respuesta.length; i++) {
                                demo.append('<option value="'+respuesta[i].id+'" selected>'+respuesta[i].surname+', '+respuesta[i].name+'</option>')
                                seleccionados.push(respuesta[i].id);
                            }

                            // Volvemos a incluir todos los usuarios
                            $.ajax({
                                url: '/{{$instance}}/gp/users/all/',
                                success: function (respuesta) {

                                    for (var i = 0; i < respuesta.length; i++) {
                                        if(seleccionados.indexOf(respuesta[i].id) == -1){
                                            demo.append('<option value="'+respuesta[i].id+'">'+respuesta[i].surname+', '+respuesta[i].name+'</option>')
                                        }

                                    }

                                    demo.bootstrapDualListbox('refresh');

                                },
                                error: function () {
                                    console.log("No se ha podido obtener la información de todos los usuarios");
                                }
                            });

                        },
                        error: function () {
                            console.log("No se ha podido obtener la información de la lista predeterminada");
                        }
                    });

                }
            }

        </script>

    @endsection

@endsection
