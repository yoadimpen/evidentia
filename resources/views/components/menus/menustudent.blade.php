@if(\Illuminate\Support\Facades\Auth::user()->hasRole('STUDENT'))

    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-header">MIS COSAS</li>
            @if(!\Carbon\Carbon::now()->gt(\Config::upload_evidences_timestamp()))
            <x-li route="evidence.create" icon='fab fa-angellist' name="Crear evidencia"/>
            @endif
            <x-li route="evidence.list" secondaries="evidence.view,evidence.edit" icon='fas fa-id-badge' name="Mis evidencias"/>
            <x-li route="meeting.list" icon='fas fa-user-friends' name="Mis reuniones"/>
            <x-li route="attendee.list" icon='fas fa-hiking' name="Mis asistencias"/>
            <!-- <x-li route="home" icon='fas fa-folder' name="Gestor de archivos"/> -->

            <x-li route="incident.create" icon='far fa-clipboard' name="Crear incidencia"/>
            <x-li route="incident.list" icon='fas fa-clipboard' name="Mis incidencias"/>

            <x-li route="note.create" icon='far fa-sticky-note' name="Crear nota"/>
            <x-li route="note.list" icon='fas fa-sticky-note' name="Mis notas"/>

            <x-li route="contact.create" icon='far fa-address-book' name="Crear contacto"/>
            <x-li route="contact.list" icon='fas fa-address-book' name="Mis contactos"/>

            <x-li route="valoration.create" icon='far fa-clipboard' name="Crear valoración"/>
            <x-li route="valoration.list" icon='fas fa-clipboard' name="Mis valoraciones"/>

        </ul>
    </nav>
@endif

