@extends('layouts.app')

@isset($edit)
    @section('title', 'Editar incidencia: '.$incident->title)
@else
    @section('title', 'Crear incidencia')
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

                        <form method="POST" action="{{route('incident.save',['instance' => \Instantiation::instance()])}}">

                    @else

                        <form method="POST" action="{{route('incident.new',['instance' => \Instantiation::instance()])}}">

                    @endisset

                        @csrf

                        <x-id :id="$incident->id ?? ''" :edit="$edit ?? ''"/>

                        <div class="form-row">

                            <x-input col="6" attr="title" :value="$incident->title ?? ''"
                                        label="Título"
                                        description="Escribe un título para la incidencia"
                            />

                        </div>

                        <div class="form-row">

                            <x-textarea col="6" attr="description" :value="$note->description ?? ''"
                                        label="Descripción de la incidencia"
                                        description="Escribe una descripción concisa de la incidencia."
                            />

                        </div>

                        <div class="form-row">

                            <x-input col="6" attr="date" :value="$note->date ?? ''"
                                        label="Fecha de la incidencia"
                                        description="Escribe la fecha de la incidencia."
                            />

                        </div>

                        <div class="form-row">

                            <x-textarea col="6" attr="solution" :value="$note->solution ?? ''"
                                        label="Solución a la incidencia"
                                        description="Escribe una solución de la incidencia. Si no hay una solución previa escriba 'No hay solución'."
                            />

                        </div>

                        <div class="row">
                            <div class="col-lg-3 mt-1">
                                <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-pencil-ruler"></i> &nbsp;Guardar incidencia</button>
                            </div>
                        </div>

                    </form>
                </div>

            </div>

        </div>
    </div>

@endsection
