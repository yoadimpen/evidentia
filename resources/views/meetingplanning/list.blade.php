@extends('layouts.app')

@section('title', 'Gestionar reuniones')

@section('title-icon', 'far fa-list-alt')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/{{$instance}}">Home</a></li>
    <li class="breadcrumb-item active">@yield('title')</li>
@endsection

@section('info')
    <x-slimreminder :datetime="\Config::meetings_timestamp()"/>
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-12">

            <x-status/>

            @if(!\Carbon\Carbon::now()->gt(\Config::meetings_timestamp()))
            <div class="row mb-3">
                <div class="col-lg-2 mt-1">
                    <a href="{{route('secretary.meetingplanning.create',['instance' => $instance])}}" class="btn btn-primary btn-block" role="button"><i class="fas fa-plus"></i> &nbsp;Crear nueva planificación</a>
                </div>
            </div>
            @endif

            <div class="card">


                <div class="card-body">
                    <table id="dataset" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Planificación de Reunión</th>
                                <th class="d-none d-sm-none d-md-table-cell d-lg-table-cell">Lugar</th>
                                <th class="d-none d-sm-none d-md-table-cell d-lg-table-cell">Realizada</th>
                                @if(!\Carbon\Carbon::now()->gt(\Config::meetings_timestamp()))
                                <th>Herramientas</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($meetingplannings as $meetingplanning)
                                <tr>
                                    <td>{{$meetingplanning->title}}</td>
                                    <td class="d-none d-sm-none d-md-table-cell d-lg-table-cell">{{$meetingplanning->place}}</td>
                                    <td class="d-none d-sm-none d-md-table-cell d-lg-table-cell">{{ \Carbon\Carbon::parse($meetingplanning->datetime)->diffForHumans() }}</td>
                                    @if(!\Carbon\Carbon::now()->gt(\Config::meetings_timestamp()))
                                    <td>
                                        <a class="btn btn-primary btn-sm"
                                           href="{{route('secretary.meetingplanning.edit',['instance' => $instance, 'id' => $meetingplanning->id])}}"
                                           role="button">
                                            <i class="far fa-edit"></i>
                                            <span class="d-none d-sm-none d-md-none d-lg-inline">Editar planificación</span>
                                        </a>

                                        <x-buttonconfirm :id="$meetingplanning->id" route="secretary.meetingplanning.remove" title="¿Seguro?" description="La planificación de reunión se borrará." type="REMOVE" />

                                    </td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>

                </div>

        </div>


    </div>


@endsection
