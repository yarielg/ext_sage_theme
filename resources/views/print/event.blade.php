<div class="container print-event-wrapper">
  <div class="row my-5 pt-5">
    <div class="col-12 text-center">
      <img src="@asset('images/logo-profile-page.jpg')">
    </div>
  </div>
  <div class="row">

    <div class="col-8 py-5">
      <h1>{!!  $title  !!}</h1>
      @if ( $event_date )
        <div class="event-date">
          <h5>{{ $event_date }}</h5>
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
          {{ $event_location }}
        </div>
      @endif

      <div class="entry-content mt-5">
        {!! the_content() !!}
      </div>

      @if ( $related_events )
        <div class="related-news">
          <h5>In Case You Missed It:</h5>
          <ul class="listing">
            @foreach( $related_events as $event )
              <li>
                <div class="listing-title">
                  <a href="<?php the_permalink($event->ID); ?>">
                      <?php echo get_the_title($event->ID); ?>
                  </a>
                </div>
                <div class="listing-meta">
                    <?php
                    $sort_date = get_field('sort_date', $event->ID);
                    if (isset($sort_date)) {
                      echo date("F d, Y", strtotime($sort_date));
                    }
                    ?>
                </div>
              </li>
            @endforeach
          </ul>
        </div>
      @endif

    </div>

    <div class="col-4 pt-5">

      @if ( $event_speakers )
        <h5>Related Professionals</h5>
        @foreach( $event_speakers as $professional )
          <div>
            <a href="{{ get_permalink($professional->ID) }}">{{ $professional->fullname }}</a>
          </div>
        @endforeach
      @endif

      @if ( $related_services )
        <h5 class="mt-3">Related Services</h5>
        @foreach( $related_services as $service )
          <div>
            <a href="{{ get_permalink($service->ID) }}">{{ get_field('service_name', $service->ID) }}</a>
          </div>
        @endforeach
      @endif
  </div>

  </div>
</div>

<style>
  @media print {
    .profile-padding, .event-content-wrapper, .hero, .footer-container, .header-container {
      display: none;
    }

    .print-event-wrapper{
      display: block; !important;
    }

    h2.print-name{
      padding: 0 !important;
      height: auto;
    }

    .print-event-wrapper ul li{
      border-width: inherit !important;
    }

    .print-event-wrapper a{
      text-decoration: underline !important;
      color: black !important;
    }

    .fa-chevron-right{
      display: none !important;
    }

    hr{
      color: gray;
      background: gray;
    }
  }
</style>
