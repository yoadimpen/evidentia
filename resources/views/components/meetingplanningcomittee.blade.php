<span class="badge badge-dark">
    {!!$meetingplanning->comittee->icon!!}

    {{$meetingplanning->comittee->name}}

    @if(isset($meetingplanning->comittee->subcomittee))
        / {{$meetingplanning->comittee->subcomittee}}
    @endif
</span>
