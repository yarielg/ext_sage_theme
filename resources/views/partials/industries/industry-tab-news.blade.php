@if ( $publications )
    <div class="entry mb-6 mb-lg-8 pb-5 pb-lg-0">
        <h5 class="mb-3">Publications</h5>
        <ul class="list-group list-group-flush">
            @foreach ( $publications as $pub )
                <li class="list-group-item featured px-0 pt-3 pb-3">
                    <div class="list-title">
                        <a href="{{ the_permalink($pub->ID) }}">
                            {{ $pub->post_title }} @include('components.link-arrow')
                        </a>
                    </div>
                    <div class="list-meta">
                        {!! date("F j, Y", strtotime(get_field('sort_date', $pub->ID) )) !!}
                    </div>
                </li>
            @endforeach
        </ul>

        @if ( count( $publications ) == 3 )
            <a href="#" class="button view-more view-more-publications">View More</a>
        @endif
    </div>
 @endif


@if ( $news )
    <div class="entry mb-6 mb-lg-8 pb-5 pb-lg-0">
        <h5 class="mb-3">Media Mentions &amp; Firm News</h5>
        <ul class="list-group list-group-flush">
            @foreach ( $news as $post )
                <li class="list-group-item featured px-0 pt-3 pb-3">
                    <div class="list-title">
                        <a href="{{ the_permalink( $post->ID ) }}">
                            {{ $post->post_title }} @include('components.link-arrow')
                        </a>
                    </div>
                    <div class="list-meta">
                        {!! date("F j, Y", strtotime(get_field('sort_date', $post->ID) )) !!}
                    </div>
                </li>
            @endforeach 
        </ul>

        @if ( count( $news ) == 3 )
            <a href="#" class="button view-more view-more-news">View More</a>
        @endif 
    </div>
@endif


@if ( $upcoming_events )
    <div class="entry mb-6 mb-lg-8 pb-5 pb-lg-0">
        <h5 class="mb-3">Upcoming Events</h5>
        <ul class="list-group list-group-flush">
            @foreach( $upcoming_events as $event )
                <li class="list-group-item featured px-0 pt-3 pb-3">
                    <div class="list-title">
                        <a href="{{ the_permalink( $event->ID ) }}">
                            {{ $event->post_title }} @include('components.link-arrow')
                        </a>
                    </div>
                    <div class="list-meta">
                        {!! get_field('event_date', $event->ID) !!} @if ( get_field('event_venue', $event->ID) ) | {{ get_field('event_venue', $event->ID) }} @endif
                        <div class="event-conference">{!! get_field('conference_name', $event->ID) !!}</div>
                    </div>
                </li>
            @endforeach
        </ul>

        @if ( count( $upcoming_events ) == 3 ) 
            <a href="#" class="button view-more view-more-upcoming-events">View More</a>
        @endif
    </div>
@endif


@if ( $past_events )
    <div class="entry mb-6 mb-lg-8 pb-5 pb-lg-0">
        <h5 class="mb-3">Past Events</h5>
        <ul class="list-group list-group-flush">
            @foreach( $past_events as $event )
                <li class="list-group-item featured px-0 pt-3 pb-3">
                    <div class="list-title">
                        <a href="{{ the_permalink($event->ID) }}">
                            {{ $event->post_title }} @include('components.link-arrow')
                        </a>
                    </div>
                    <div class="list-meta">
                        {!! get_field('event_date', $event->ID) !!} @if ( get_field('event_venue', $event->ID) ) | {{ get_field('event_venue', $event->ID) }} @endif
                        <div class="event-conference">{!! get_field('conference_name', $event->ID) !!}</div>
                    </div>
                </li>
            @endforeach
        </ul>

        @if ( count( $past_events ) == 3 ) 
            <a href="#" class="button view-more view-more-upcoming-events">View More</a>
        @endif
    </div>
@endif
