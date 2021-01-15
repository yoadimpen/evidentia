@extends('layouts.app')

@isset($edit)
    @section('title', 'Editar valoración: '.$valoration->title)
@else
    @section('title', 'Crear valoración')
@endisset

@section('title-icon', 'far fa-clipboard')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/{{\Instantiation::instance()}}">Home</a></li>
    <li class="breadcrumb-item active">@yield('title')</li>
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-12">

            <x-status/>

            <div class="card">

                <div class="card-body">

                    @isset($edit)

                        <form method="POST" action="{{route('valoration.save',['instance' => \Instantiation::instance()])}}">

                    @else

                        <form method="POST" action="{{route('valoration.new',['instance' => \Instantiation::instance()])}}">

                    @endisset

                        @csrf

                        <x-id :id="$valoration->id ?? ''" :edit="$edit ?? ''"/>

                        <div class="form-row">

                            <x-input col="6" attr="title" :value="$valoration->title ?? ''"
                                        label="Título"
                                        description="Escribe un título para la valoración"
                            />

                        </div>

                        <div class="form-row">

                            <x-textarea col="6" attr="equipo" :value="$valoration->equipo ?? ''"
                                        label="Equipo"
                                        description="Escribe tu equipo para la valoración."
                            />

                        </div>

                        <div class="form-group col-md-3">
                                <label for="comittee">Comité asociado</label>
                                <select id="comittee" class="selectpicker form-control @error('comittee') is-invalid @enderror" name="comittee" value="{{ old('comittee') }}" required autofocus>
                                    @foreach($comittees as $comittee)
                                        @isset($evidence)
                                            <option {{$comittee->id == old('comittee') || $valoration->comittee->id == $comittee->id ? 'selected' : ''}} value="{{$comittee->id}}">
                                        @else
                                            <option {{$comittee->id == old('comittee') ? 'selected' : ''}} value="{{$comittee->id}}">
                                        @endisset
                                            {!! $comittee->name !!}
                                        </option>
                                    @endforeach
                                </select>

                                <small class="form-text text-muted">Elige un comité al que perteneces.</small>

                                @error('comite')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>


                        <div class="form-row">

                            <x-textarea col="6" attr="description" :value="$valoration->description ?? ''"
                                        label="Descripción de la valoración"
                                        description="Escribe una descripción concisa de la valoración."
                            />

                        </div>

                        <div class="form-row">

                            <x-input col="6" attr="date" :value="$valoration->date ?? ''"
                                        label="Fecha de la valoración"
                                        description="Escribe la fecha de la valoración."
                            />

                        </div>
                        <div class="form-row">

                        <x-input col="6" attr="qualification" :value="$valoration->qualification ?? ''" type="number" step="0.01" label="Calificación" description="Números enteros o decimales."/>
                            


                        </div>

                        <div class="row">
                            <div class="col-lg-3 mt-1">
                                <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-pencil-ruler"></i> &nbsp;Guardar valoración</button>
                            </div>
                        </div>

                    </form>
                </div>

            </div>

        </div>
    </div>

@endsection
