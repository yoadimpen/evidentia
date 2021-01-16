@extends('layouts.app')

@section('title', 'Mis reuniones')

@section('title-icon', 'fas fa-user-friends')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/{{$instance}}">Home</a></li>
    <li class="breadcrumb-item active">@yield('title')</li>
@endsection

@section('content')

    <div class="row">

        <div class="col-lg-3">

            <x-infomeetinghours :user="Auth::user()" />

        </div>

        <div class="col-lg-3">

            <x-infomeetingcount :user="Auth::user()" />


        </div>



    </div>

    <div class="row">

        <div class="col-lg-12">

            <div class="card">

                <div class="card-body">
                    <table id="dataset" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Reunión</th>
                                <th class="d-none d-sm-none d-md-table-cell d-lg-table-cell">Lugar</th>
                                <th>Horas</th>
                                <th class="d-none d-sm-none d-md-table-cell d-lg-table-cell">Realizada</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($meetings as $meeting)
                                <tr scope="row">
                                    <td>{{$meeting->title}}</td>
                                    <td class="d-none d-sm-none d-md-table-cell d-lg-table-cell">{{$meeting->place}}</td>
                                    <td>{{$meeting->hours}}</td>
                                    <td class="d-none d-sm-none d-md-table-cell d-lg-table-cell">{{ \Carbon\Carbon::parse($meeting->datetime)->diffForHumans() }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>



                </div>

            </div>


        </div>


    </div>

@endsection
