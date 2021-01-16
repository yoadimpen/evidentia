@extends('layouts.app')

@section('title', 'Gestionar planificaciones')

@section('title-icon', 'far fa-calendar-alt')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/{{$instance}}">Home</a></li>
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
                            <th>Reunión</th>
                            <th>Lugar</th>
                            <th class="d-none d-sm-none d-md-table-cell d-lg-table-cell">Comité</th>
                            <th class="d-none d-sm-none d-md-table-cell d-lg-table-cell">Nº de asistentes</th>
                            <th class="d-none d-sm-none d-md-table-cell d-lg-table-cell">Realizada</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($meetingplannings as $meetingplanning)
                            <tr>
                                <td>{{$meetingplanning->title}}</td>
                                <td>{{$meetingplanning->place}}</td>
                                <td class="d-none d-sm-none d-md-table-cell d-lg-table-cell">
                                    <x-meetingplanningcomittee :meetingplanning="$meetingplanning"/>
                                </td>
                                <td class="d-none d-sm-none d-md-table-cell d-lg-table-cell">{{$meetingplanning->users->count()}}</td>
                                <td class="d-none d-sm-none d-md-table-cell d-lg-table-cell">{{ \Carbon\Carbon::parse($meetingplanning->datetime)->diffForHumans() }}</td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>

                </div>

            </div>

        </div>
    </div>

@endsection
