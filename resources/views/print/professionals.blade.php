<div class="container print-professional-wrapper">
  <div class="row my-5">
    <div class="col-12 text-center">
      <img src="@asset('images/logo-profile-page.jpg')">
    </div>
  </div>
  <div class="row">
    <div class="col-8 professionals-info">
      <h2 class="print-name">{!! $info['fullname'] !!}</h2>
      <h6 class="print-title">{{ $info['fields']['job_title'] }}</h6>
      <p class="print-location mb-0">{{ $info['primary_location'] }}</p>
      <p class="print-phone mb-4">{{ $info['primary_phone'] }}</p>
      <p class="mb-0">{{ $email  }}</p>
      <p>{{ $profile_url  }}</p>
    </div>
    <div class="col-4">
      <img width="200" src="{{ $professional_headshot['url']  }}" alt="">
    </div>
  </div>
  <div class="row">
    <div class="col-8 mt-4">
      @posts
      @content
      @endposts
      @if($memberships)
        <h5>Memberships</h5>
        {!! $memberships  !!}
      @endif
      @if($experiences)
        <h5>Representative Experience</h5>
        <ul class="list-group list-group-flush">
          @if ($featured_experiences)
            @foreach( $featured_experiences as $experience )
              <li class="list-group-item featured px-0 pt-2 pb-1">
                <div class="list-title">
                  <a href="{{ $experience['link'] }}">
                    {!! $experience['title'] !!} @include('components.link-arrow')
                  </a>
                </div>
                <div class="list-meta">
                  Client Type:
                  @foreach( $experience['categories'] as $category )
                    {!! $category->name !!}@if ( ! $loop->last ),@endif
                  @endforeach
                </div>
              </li>
            @endforeach
          @endif

          @if ($experiences || $featured_experiences)
            @foreach( $experiences as $experience )
              <li class="list-group-item px-0 pt-2 pb-1">
                <div class="list-title">
                  <a href="{{ $experience['link'] }}">
                    {!! $experience['title'] !!} @include('components.link-arrow')
                  </a>
                </div>
                <div class="list-meta">
                  Client Type:
                  @foreach( $experience['categories'] as $category )
                    {!! $category->name !!}@if ( ! $loop->last ),@endif
                  @endforeach
                </div>
              </li>
            @endforeach
          @endif
        </ul>
      @endif

      @if($publications)
        @if ($featured_publications)
          <div class="entry mb-4">
            <h5 class="mb-3">Featured Publications</h5>
            <ul class="list-group list-group-flush">
              @foreach( $featured_publications as $publication )
                <li class="list-group-item featured px-0 pt-2 pb-1">
                  <div class="list-title">
                    <a href="{{ get_the_permalink($publication->ID) }}">
                      {!! get_the_title($publication->ID) !!} @include('components.link-arrow')
                    </a>
                  </div>
                  <div class="list-meta">
                    {!! date( 'F j, Y', strtotime( get_field( 'sort_date', $publication->ID ) ) ) !!}
                  </div>
                </li>
              @endforeach
            </ul>
          </div>
        @endif


        {{-- Category: Publications --}}
        @if ($publications)
          <div class="entry mb-4">
            <h5 class="mb-3">Publications</h5>
            <ul class="list-group list-group-flush">
              @foreach( $publications as $publication )
                <li class="list-group-item px-0 pt-2 pb-1">
                  <div class="list-title">
                    <a href="{{ get_the_permalink($publication->ID) }}">
                      {!! get_the_title($publication->ID) !!} @include('components.link-arrow')
                    </a>
                  </div>
                  <div class="list-meta">
                    {!! date( 'F j, Y', strtotime( get_field( 'sort_date', $publication->ID ) ) ) !!}
                  </div>
                </li>
              @endforeach
            </ul>
          </div>
        @endif

        {{-- Categories: Media Mentions & Firm News --}}
        @if ($media_news)
          <div class="entry mb-4">
            <h5 class="mb-3">Media Mentions &amp; Firm News</h5>
            <ul class="list-group list-group-flush">
              @foreach( $media_news as $news )
                <li class="list-group-item px-0 pt-2 pb-1">
                  <div class="list-title">
                    <a href="{{ get_the_permalink($news->ID) }}">
                      {!! get_the_title($news->ID) !!} @include('components.link-arrow')
                    </a>
                  </div>
                  <div class="list-meta">
                    {!! date( 'F j, Y', strtotime( get_field( 'sort_date', $news->ID ) ) ) !!}
                  </div>
                </li>
              @endforeach
            </ul>

          </div>
        @endif
      @endif

      @if($accolades)
        <h5>Accolades</h5>
        {!! $accolades !!}
      @endif
    </div>
    <div class="col-4 mt-4">
      <h5>Related Services</h5>
      <ul class="list-group list-group-flush p-3">
        @foreach($services as $service)
          <li class="list-group-item px-0 pt-2 pb-1">
            <div class="list-title">
              <a href="{{ get_the_permalink($service->ID) }}">
                {{ get_field('service_name', $service->ID) }}
              </a>
            </div>
          </li>
        @endforeach
      </ul>
      <h5>Education</h5>
      <ul class="list-group list-group-flush p-3">
        @foreach($education as $edu)
          <li class="list-group-item px-0 pt-2 pb-1">
            <div class="list-title">
              {!! $edu['school'] !!} - {{ $edu['degree'] }}@if ( $edu['year']), {{ $edu['year'] }}@endif<br>
              {!! $edu['distinction'] !!}
            </div>
          </li>
        @endforeach
      </ul>
      @if ($jurisdictions)
        <h5>Admissions</h5>
        <ul class="list-group list-group-flush p-3 pb-0 mb-0">
          @foreach($jurisdictions as $jurisdiction)
            <li class="list-group-item px-0 pt-2 pb-1">
              <div class="list-title">
                {{ $jurisdiction['name'] }}@if ( $jurisdiction['year']), {{ $jurisdiction['year'] }}@endif
              </div>
            </li>
          @endforeach
        </ul>
      @endif
      {{-- Highlight --}}
      @if ($highlights)
        <div class="col-12 mb-4 mt-4">
          <h5>{!! $highlights['title'] !!}</h5>
          <div class="mb-3">
            {!! $highlights['content'] !!}
          </div>
        </div>
      @endif
    </div>
  </div>
</div>

<style>
  @media print {
    .profile-padding, .professional-content-wrapper, .footer-container, .header-container {
      display: none;
    }

    .print-professional-wrapper{
      display: block; !important;
    }

    h2.print-name{
      padding: 0 !important;
      height: auto;
    }

    .print-professional-wrapper ul{
      padding: 0 !important;
      margin: 0 !important;
    }

    .print-professional-wrapper ul li{
      border-width: inherit !important;
    }

    .print-professional-wrapper ul li a{
      text-decoration: underline !important;
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
