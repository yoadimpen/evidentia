@extends('layouts.app')

@isset($edit)
    @section('title', 'Editar nota: '.$note->title)
@else
    @section('title', 'Crear nota')
@endisset

@section('title-icon', 'far fa-sticky-note')

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

                        <form method="POST" action="{{route('note.save',['instance' => \Instantiation::instance()])}}">

                    @else

                        <form method="POST" action="{{route('note.new',['instance' => \Instantiation::instance()])}}">

                    @endisset

                        @csrf

                        <x-id :id="$note->id ?? ''" :edit="$edit ?? ''"/>

                        <div class="form-row">

                            <x-input col="6" attr="title" :value="$note->title ?? ''" label="Título" description="Escribe un título para la nota"/>

                        </div>

                        <div class="form-row">

                            <x-input col="6" attr="date" :value="$note->date ?? ''"
                                        label="Fecha de la nota"
                                        description="Escribe la fecha de la nota."
                            />

                        </div>

                        <div class="form-row">

                            <x-textarea col="6" attr="description" :value="$note->description ?? ''"
                                        label="Descripción de la nota"
                                        description="Escribe una descripción concisa de la nota."
                            />

                        </div>

                        <div class="row">
                            <div class="col-lg-3 mt-1">
                                <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-pencil-ruler"></i> &nbsp;Guardar nota</button>
                            </div>
                        </div>

                    </form>
                </div>

            </div>

        </div>
    </div>

@endsection
