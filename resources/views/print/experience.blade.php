<div class="container print-experience-wrapper">
  <div class="row my-5 pt-5">
    <div class="col-12 text-center">
      <img src="@asset('images/logo-profile-page.jpg')">
    </div>
  </div>
  <div class="row mt-5">
    <div class="col-8 mt-5">
      <h1>{{ $title  }}</h1>
            <article @php(post_class())>
              <header class='mb-5'>
                @if ( isset( $client_types ) && ! empty( $client_types ) )
                  <span>Client Type: </span> @foreach ($client_types as $type) <a href="/experience-results/?client-type={{$type->term_id }}">{{ $type->name }}</a> @endforeach
                @endif
              </header>

              <div class="entry-content">
                {!! the_content() !!}
              </div>

              <footer>
                {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
              </footer>
            </article>
    </div>
    <div class="col-4 mt-5">
      @if ( isset( $related_professionals ) && ! empty( $related_professionals ) )
        <div id="related-professionals" class="mb-4">

          <h6>Related Professionals</h6>
          @foreach( $related_professionals as $professional )
            <div>
              <a href="{{ get_permalink( $professional->ID ) }}">{{ $professional->name }}</a>
            </div>
          @endforeach
        </div>
      @endif

      @if( isset( $related_services ) && ! empty( $related_services ) )
        <div id="related-services" class="mb-4">
          <h6>Related Services</h6>
          @foreach( $related_services as $service )
            <div>
              <a href="{{ get_permalink($service->ID) }}">{{ $service->service_name }}</a>
            </div>
          @endforeach
        </div>
      @endif
    </div>
  </div>

</div>

<style>
  @media print {
    .profile-padding, .experience-content-wrapper, .hero, .footer-container, .header-container {
      display: none;
    }

    .print-experience-wrapper{
      display: block; !important;
    }

    h2.print-name{
      padding: 0 !important;
      height: auto;
    }



    .print-experince-wrapper ul li{
      border-width: inherit !important;
    }

    .print-experience-wrapper a{
      text-decoration: underline !important;
      color: black !important;
    }

    .fa-chevron-right{
      display: none !important;
    }

    /*@page {
      size: A4;
      margin: 11mm 17mm 17mm 17mm;
    }

    html, body {
      width: 210mm;
      height: 297mm;
    }*/
  }
</style>
