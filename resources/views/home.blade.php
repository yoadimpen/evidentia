@extends('layouts.app')

@section('title', 'Dashboard')
@section('title-icon', 'fas fa-tachometer-alt')

@section('content')

    <div class="row">

        <div class="col-lg-3 col-sm-12">
            <x-infoevidencetotalhours :user="Auth::user()" />
        </div>

        <div class="col-lg-3 col-sm-12">
            <x-infomeetinghours :user="Auth::user()" />
        </div>

        <div class="col-lg-3 col-sm-12">
            <x-infoattendeeshours :user="Auth::user()" />
        </div>

        <div class="col-lg-3 col-sm-12">
            <x-infobonushours :user="Auth::user()" />
        </div>

    </div>

    <div class="row">

        <div class="col-lg-6 col-sm-12">

            <div class="card">
                <div class="card-header bg-dark">
                    <h3 class="card-title">Resumen de mis evidencias</h3>
                </div>

                <div class="card-body pb-0">

                    <div class="row">
                        <div class="col-lg-6 col-sm-12">
                            <x-infoevidencetotalcount :user="Auth::user()" />
                        </div>

                        <div class="col-lg-6 col-sm-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-light elevation-1"><i class="nav-icon fab fa-angellist"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Evidencias en total</span>
                                    <span class="info-box-number">
                                  {{\App\Evidence::evidences_not_draft()->count()}}
                                </span>
                                </div>

                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-12">
                            <x-infoevidencetotalcountdraft :user="Auth::user()" />
                        </div>

                        <div class="col-lg-6 col-sm-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-light elevation-1"><i class="fas fa-pencil-ruler"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Evidencias en borrador</span>
                                    <span class="info-box-number">
                                  {{\App\Evidence::evidences_draft()->count()}}
                                </span>
                                </div>

                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-12">
                            <x-infoevidencetotalcountpending :user="Auth::user()" />
                        </div>

                        <div class="col-lg-6 col-sm-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-light elevation-1"><i class="fas fa-clock"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Evidencias pendientes</span>
                                    <span class="info-box-number">
                                  {{\App\Evidence::evidences_pending()->count()}}
                                </span>
                                </div>

                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-12">
                            <x-infoevidencetotalcountaccepted :user="Auth::user()" />
                        </div>

                        <div class="col-lg-6 col-sm-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-light elevation-1"><i class="far fa-thumbs-up"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Evidencias aceptadas</span>
                                    <span class="info-box-number">
                                  {{\App\Evidence::evidences_accepted()->count()}}
                                </span>
                                </div>

                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-12">
                            <x-infoevidencetotalcountrejected :user="Auth::user()" />
                        </div>

                        <div class="col-lg-6 col-sm-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-light elevation-1"><i class="far fa-thumbs-down"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Evidencias rechazadas</span>
                                    <span class="info-box-number">
                                 {{\App\Evidence::evidences_rejected()->count()}}
                               </span>
                               </div>

                            </div>
                        </div>

                    </div>

                </div>

            </div>

            <div class="card">
                <div class="card-header bg-dark">
                    <h3 class="card-title">Resumen de mis reuniones y eventos</h3>
                </div>

                <div class="card-body pb-0">

                    <div class="row">

                        <div class="col-lg-6 col-sm-12">
                            <x-infomeetingcount :user="Auth::user()" />
                        </div>

                        <div class="col-lg-6 col-sm-12">
                            <x-infoeventtotalcheckedin :user="Auth::user()" />
                        </div>

                        <div class="col-lg-6 col-sm-12">
                            <x-infoeventtotalattending :user="Auth::user()" />
                        </div>

                    </div>

                </div>
            </div>


        </div>

        {{-- COLUMNA DE RECORDATORIOS --}}
        <div class="col-lg-6 col-sm-12">

            <div class="row">

                <div class="col-lg-6 col-sm-12">

                    <x-reminder title="Subida de evidencias" :datetime="\Config::upload_evidences_timestamp()"/>

                </div>

                <div class="col-lg-6 col-sm-12">

                    <x-reminder title="Validación de evidencias" :datetime="\Config::validate_evidences_timestamp()"/>

                </div>

                <div class="col-lg-6 col-sm-12">

                    <x-reminder title="Registro de reuniones" :datetime="\Config::meetings_timestamp()"/>

                </div>

                <div class="col-lg-6 col-sm-12">

                    <x-reminder title="Registro de bonos" :datetime="\Config::bonus_timestamp()"/>

                </div>

                <div class="col-lg-6 col-sm-12">

                    <x-reminder title="Registro de asistencias" :datetime="\Config::attendee_timestamp()"/>

                </div>

            </div>
        </div>

    </div>

@endsection
