@extends('layouts.app')

@section('title', 'Mis valoraciones')

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
                            
                            
                            
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($valorations as $valoration)
                            <tr>
                                <td>{{$valoration->id}}</td>
                                <td>{{$valoration->title}}</td>
                                <td>{{$valoration->description}}</td>
                                <td>{{$valoration->date}}</td>
                                <td>{{$valoration->qualification}}</td>
                                
                                



                                    <a class="btn btn-info btn-sm"
                                       href="{{route('valoration.edit',['instance' => \Instantiation::instance(), 'id'=> $valoration->id])}}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        <span class="d-none d-sm-none d-md-none d-lg-inline">Editar</span>
                                    </a>

                                    <x-buttonconfirm :id="$valoration->id" route="valoration.remove" title="¿Seguro?" description="Esto borrará la valoración por completo" type="REMOVE" />


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
