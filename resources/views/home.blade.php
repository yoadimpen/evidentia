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

            {{-- EVIDENCIAS POR COMITÉ --}}
            <div class="card">
                <div class="card-header bg-dark">
                    <h3 class="card-title">Evidencias por comité</h3>
                </div>

                <div class="card-body pb-0">

                    <div class="row">

                        <div class="col-lg-6 col-sm-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-light elevation-1"><i class="fas fa-user-tie"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Evidencias Presidencia</span>
                                    <span class="info-box-number">
                                  {{\App\Evidence::evidences_presidencia()->count()}}
                                </span>
                                </div>

                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-light elevation-1"><i class="fas fa-file-signature"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Evidencias Secretaría</span>
                                    <span class="info-box-number">
                                  {{\App\Evidence::evidences_secretaria()->count()}}
                                </span>
                                </div>

                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-light elevation-1"><i class="fas fa-list-ol"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Evidencias Programa</span>
                                    <span class="info-box-number">
                                  {{\App\Evidence::evidences_programa()->count()}}
                                </span>
                                </div>

                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-light elevation-1"><i class="fas fa-people-carry"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Evidencias Igualdad</span>
                                    <span class="info-box-number">
                                  {{\App\Evidence::evidences_igualdad()->count()}}
                                </span>
                                </div>

                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-light elevation-1"><i class="fas fa-piggy-bank"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Evidencias Sostenibilidad</span>
                                    <span class="info-box-number">
                                 {{\App\Evidence::evidences_sostenibilidad()->count()}}
                               </span>
                               </div>

                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-light elevation-1"><i class="fas fa-euro-sign"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Evidencias Finanzas</span>
                                    <span class="info-box-number">
                                 {{\App\Evidence::evidences_finanzas()->count()}}
                               </span>
                               </div>

                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-light elevation-1"><i class="fas fa-user-check"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Evidencias Logística</span>
                                    <span class="info-box-number">
                                 {{\App\Evidence::evidences_logistica()->count()}}
                               </span>
                               </div>

                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-light elevation-1"><i class="fas fa-users"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Evidencias Comunicación</span>
                                    <span class="info-box-number">
                                 {{\App\Evidence::evidences_comunicacion()->count()}}
                               </span>
                               </div>

                            </div>
                        </div>

                    </div>

                <div class="row">
                    <div class="col-lg-6 col-sm-12">
                        <x-infoevidencetotalcount :user="Auth::user()" />
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <x-infoevidencetotalcountdraft :user="Auth::user()" />
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <x-infoevidencetotalcountpending :user="Auth::user()" />
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <x-infoevidencetotalcountaccepted :user="Auth::user()" />
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <x-infoevidencetotalcountrejected :user="Auth::user()" />
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

                <x-reminder title="Subida de evidencias" :datetime="\Config::upload_evidences_timestamp()" />

            </div>

            <div class="col-lg-6 col-sm-12">

                <x-reminder title="Validación de evidencias" :datetime="\Config::validate_evidences_timestamp()" />

            </div>

            <div class="col-lg-6 col-sm-12">

                <x-reminder title="Registro de reuniones" :datetime="\Config::meetings_timestamp()" />

            </div>

            <div class="col-lg-6 col-sm-12">

                <x-reminder title="Registro de bonos" :datetime="\Config::bonus_timestamp()" />

            </div>

            <div class="col-lg-6 col-sm-12">

                <x-reminder title="Registro de asistencias" :datetime="\Config::attendee_timestamp()" />

            </div>

        </div>

        {{-- REUNIONES DE CADA COMITÉ --}}
        <div class="card">
            <div class="card-header bg-dark">
                <h3 class="card-title">Reuniones de cada comité</h3>
            </div>
            <div class="card-body pb-0">
                <div class="row">
                    <div class="col-lg-4 col-sm-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-light elevation-1"><i class="fas fa-user-tie"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Presidencia</span>
                                <span class="info-box-number">
                                    {{\App\Meeting::meetings_presidencia()}}
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-light elevation-1"><i class="fas fa-file-signature"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Secretaría</span>
                                <span class="info-box-number">
                                    {{\App\Meeting::meetings_secretaria()}}
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-light elevation-1"><i class="fas fa-list-ol"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Programa</span>
                                <span class="info-box-number">
                                    {{\App\Meeting::meetings_programa()}}
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-light elevation-1"><i class="fas fa-people-carry"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Igualdad</span>
                                <span class="info-box-number">
                                    {{\App\Meeting::meetings_igualdad()}}
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-light elevation-1"><i class="fas fa-piggy-bank"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Sostenibilidad</span>
                                <span class="info-box-number">
                                    {{\App\Meeting::meetings_sostenibilidad()}}
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-light elevation-1"><i class="fas fa-euro-sign"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Finanzas</span>
                                <span class="info-box-number">
                                    {{\App\Meeting::meetings_finanzas()}}
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-light elevation-1"><i class="fas fa-user-check"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Logística</span>
                                <span class="info-box-number">
                                    {{\App\Meeting::meetings_logistica()}}
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="info-box">
                        <span class="info-box-icon bg-light elevation-1"><i class="fas fa-users"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Comunicación</span>
                                <span class="info-box-number">
                                    {{\App\Meeting::meetings_comunicacion()}}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- SUBCOMITÉS --}}
        <div class="card">
            <div class="card-header bg-dark">
                <h3 class="card-title">Número de subcomités de cada comité</h3>
            </div>
            <div class="card-body pb-0">
                <div class="row">
                    <div class="col-lg-4 col-sm-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-light elevation-1"><i class="fas fa-user-tie"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Presidencia</span>
                                <span class="info-box-number">
                                    {{\App\Subcomittee::subcomitte_presidencia()}}
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-light elevation-1"><i class="fas fa-file-signature"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Secretaría</span>
                                <span class="info-box-number">
                                    {{\App\Subcomittee::subcomitte_secretaria()}}
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-light elevation-1"><i class="fas fa-list-ol"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Programa</span>
                                <span class="info-box-number">
                                    {{\App\Subcomittee::subcomitte_programa()}}
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-light elevation-1"><i class="fas fa-people-carry"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Igualdad</span>
                                <span class="info-box-number">
                                    {{\App\Subcomittee::subcomitte_igualdad()}}
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-light elevation-1"><i class="fas fa-piggy-bank"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Sostenibilidad</span>
                                <span class="info-box-number">
                                    {{\App\Subcomittee::subcomitte_sostenibilidad()}}
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-light elevation-1"><i class="fas fa-euro-sign"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Finanzas</span>
                                <span class="info-box-number">
                                    {{\App\Subcomittee::subcomitte_finanzas()}}
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-light elevation-1"><i class="fas fa-user-check"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Logística</span>
                                <span class="info-box-number">
                                    {{\App\Subcomittee::subcomitte_logistica()}}
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="info-box">
                        <span class="info-box-icon bg-light elevation-1"><i class="fas fa-users"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Comunicación</span>
                                <span class="info-box-number">
                                    {{\App\Subcomittee::subcomitte_comunicacion()}}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

@endsection