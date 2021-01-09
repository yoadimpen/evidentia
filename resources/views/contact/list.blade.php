@extends('layouts.app')

@section('title', 'Mis contactos')

@section('title-icon', 'fas fa-address-book')

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
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Teléfono</th>
                            <th>Email</th>
                            <th>Empresa</th>
                            <th>Opciones</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($contacts as $contact)
                            <tr>
                                <td>{{$contact->id}}</td>
                                <td>{{$contact->name}}</td>
                                <td>{{$contact->surname}}</td>
                                <td>{{$contact->phone}}</td>
                                <td>{{$contact->email}}</td>
                                <td>{{$contact->company}}</td>
                                <td>

                                    <a class="btn btn-info btn-sm"
                                       href="{{route('contact.edit',['instance' => \Instantiation::instance(), 'id'=> $contact->id])}}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        <span class="d-none d-sm-none d-md-none d-lg-inline">Editar</span>
                                    </a>

                                    <x-buttonconfirm :id="$contact->id" route="contact.remove" title="¿Seguro?" description="Esto borrará el contacto por completo" type="REMOVE" />


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
