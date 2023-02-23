@if ($upcoming_events)
    <div class="entry mb-6 mb-lg-8 pb-5 pb-lg-0">
        <h5 class="mb-3">Upcoming Events</h5>
        <ul class="list-group list-group-flush">
            @foreach( $upcoming_events as $event )
                <li class="list-group-item px-0 pt-3 pb-3">
                    <div class="list-title">
                        <a href="{{ get_the_permalink($event->ID) }}">
                            {!! get_field('event_title', $event->ID) !!} @include('components.link-arrow')
                        </a>
                    </div>
                    <div class="list-meta">
                        {!! get_field('event_date', $event->ID) !!} @if ( get_field('event_venue', $event->ID) ) | {{ get_field('event_venue', $event->ID) }} @endif
                        <div class="event-conference">{!! get_field('conference_name', $event->ID) !!}</div>
                    </div>
                </li>
            @endforeach
        </ul>
        <a class="read-more btn-lg btn-link text-secondary px-0" href="#">
            See More Upcoming Events
        </a>
    </div>
@endif


@if ($past_events)
    <div class="entry mb-6 mb-lg-8 pb-5 pb-lg-0">
        <h5 class="mb-3">Past Events</h5>
        <ul class="list-group list-group-flush">
            @foreach( $past_events as $event )
                <li class="list-group-item px-0 pt-3 pb-3">
                    <div class="list-title">
                        <a href="{{ get_the_permalink($event->ID) }}">
                            {!! get_field('event_title', $event->ID) !!} @include('components.link-arrow')
                        </a>
                    </div>
                    <div class="list-meta">
                        {!! get_field('event_date', $event->ID) !!} @if ( get_field('event_venue', $event->ID) ) | {{ get_field('event_venue', $event->ID) }} @endif
                        <div class="event-conference">{!! get_field('conference_name', $event->ID) !!}</div>
                    </div>
                </li>
            @endforeach
        </ul>
        <a class="read-more btn-lg btn-link text-secondary px-0" href="#">
            See More Past Events
        </a>
    </div>
@endif
