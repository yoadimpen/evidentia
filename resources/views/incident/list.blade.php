@extends('layouts.app')

@section('title', 'Mis incidencias')

@section('title-icon', 'fas fa-clipboard')

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
                            <th>Solución</th>
                            <th>Opciones</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($incidents as $incident)
                            <tr>
                                <td>{{$incident->id}}</td>
                                <td>{{$incident->title}}</td>
                                <td>{{$incident->description}}</td>
                                <td>{{$incident->date}}</td>
                                <td>{{$incident->solution}}</td>
                                <td>

                                    <a class="btn btn-info btn-sm"
                                       href="{{route('incident.edit',['instance' => \Instantiation::instance(), 'id'=> $incident->id])}}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        <span class="d-none d-sm-none d-md-none d-lg-inline">Editar</span>
                                    </a>

                                    <x-buttonconfirm :id="$incident->id" route="incident.remove" title="¿Seguro?" description="Esto borrará la incidencia por completo" type="REMOVE" />


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
