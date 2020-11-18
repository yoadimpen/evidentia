@extends('layouts.app')

@isset($edit)
    @section('title', 'Editar contacto: '.$contact->name." ".$contact->surname)
@else
    @section('title', 'Crear contacto')
@endisset

@section('title-icon', 'far fa-address-book')

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

                        <form method="POST" action="{{route('contact.save',['instance' => \Instantiation::instance()])}}">

                    @else

                        <form method="POST" action="{{route('contact.new',['instance' => \Instantiation::instance()])}}">

                    @endisset

                        @csrf

                        <x-id :id="$contact->id ?? ''" :edit="$edit ?? ''"/>

                        <div class="form-row">

                            <x-input col="6" attr="name" :value="$contact->name ?? ''" label="Nombre" description="Escribe el nombre de tu contacto"/>

                        </div>

                        <div class="form-row">

                            <x-input col="6" attr="surname" :value="$contact->surname ?? ''" label="Apellidos" description="Escribe los apellidos de tu contacto"/>

                        </div>

                        <div class="form-row">

                            <x-input col="6" attr="phone" :value="$contact->phone ?? ''" label="Teléfono" description="Escribe el teléfono de tu contacto"/>

                        </div>

                        <div class="form-row">

                            <x-input col="6" attr="company" :value="$contact->company ?? ''" label="Empresa" description="Escribe la empresa de tu contacto"/>

                        </div>

                        <div class="row">
                            <div class="col-lg-3 mt-1">
                                <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-pencil-ruler"></i> &nbsp;Guardar contacto</button>
                            </div>
                        </div>

                    </form>
                </div>

            </div>

        </div>
    </div>

@endsection
