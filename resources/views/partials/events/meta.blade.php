@if ( $event_date )
    <div class="event-date">
        {{ $event_date }}
    </div>
@endif

@if ( $conference_name )
    <div class="event-conference-name">
        {{ $conference_name }}
    </div>
@endif

@if ( $event_venue )
    <div class="event-venue">
        {{ $event_venue }}
    </div>
@endif

@if ( $event_location )
    <div class="event-location">
        {!!  $event_location !!}
    </div>
@endif
