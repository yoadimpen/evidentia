@extends('layouts.app')

@section('title', 'Mis notas')

@section('title-icon', 'fas fa-sticky-note')

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
                    <table id="dataset" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Título</th>
                            <th>Descripción</th>
                            <th>Fecha</th>
                            <th>Opciones</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($notes as $note)
                            <tr>
                                <td>{{$note->id}}</td>
                                <td>{{$note->title}}</td>
                                <td>{{$note->date}}</td>
                                <td>{{$note->description}}</td>
                                <td>

                                    <a class="btn btn-info btn-sm"
                                       href="{{route('note.edit',['instance' => \Instantiation::instance(), 'id'=> $note->id])}}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        <span class="d-none d-sm-none d-md-none d-lg-inline">Editar</span>
                                    </a>

                                    <x-buttonconfirm :id="$note->id" route="note.remove" title="¿Seguro?" description="Esto borrará la nota por completo" type="REMOVE" />


                                </td>

                            </tr>
                        @endforeach

                        </tbody>
                    </table>

                </div>

            </div>

        </div>
    </div>

@endsection
