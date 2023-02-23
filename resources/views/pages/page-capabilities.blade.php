@include('sections.page-header')

<div class="container-fluid border-bottom border-secondary border-4">
    <div class="container capabilities-search-container">
        @include('partials.capabilities.search-form')
    </div>
</div>

<div class="container-fluid grid-capabilities py-5" style="background: url( @asset('images/p1/s-2.png') ) center repeat; background-size: 80% auto;">

    <div class="container">

            <div class="row">
                <div class="col">
                    <div class="capabilities-filter">
                        <style>
                            .capabilities-filter { margin-bottom: 30px; }

                            .capabilities-filter h4 { font-size: 16px; }

                            .capabilities-filter ul { display: block; margin: 0; padding: 0; list-style-type: none; }

                            .capabilities-filter ul li { display: inline-block; margin: 0 16px 0 0; padding: 0; list-style-type: none; }

                            .capabilities-filter ul li a { text-decoration: none; text-transform: uppercase; font-weight: 600; font-size: 16px; line-height: 1; display: block; padding: 14px 20px 10px; border: 2px solid #333; background:  #fff; color: #365e91; }

                            .capabilities-filter ul li a.capability-active { background: #365e91; color: #fff; border:  2px solid #365e91; }

                            .capabilities-filter ul li a:hover { background: #199ad6; color: #fff; border: 2px solid #199ad6; }
                        </style>

                        <h4>Filters</h4>
                        <ul>
                            <li><a class="view-services capability-active" href="#">Services</a></li>
                            <li><a class="view-industries" href="#">Industries</a></li>
                        </ul>
                    </div>
                </div>
            </div>


            <style>
                .services .services-index .services-row .service-block { border-bottom: 4px solid #199ad6; }

                .services .services-index .services-row .service-block.service-block-active { border-bottom-color: transparent; !important; }

                .services .services-index .services-row .service-block .service-icon { top: auto; bottom: 20px !important; font-size: 24px; color: #fff; }

                .services .services-index .services-row .service-block .service-name { padding-right: 60px; }

                .services .services-index .service-info { border-bottom: 4px solid #199ad6; }
            </style>


            {{-- SERVICES --}}
            <div class="services-index service-blocks">

                @php
                // Chunk the services array into blocks of 3.
                // This allows the "info" full-width blocks to sit beneath without breaking the grid...
                $services_chunks = array_chunk( $services, 3, true );
                @endphp

                {{-- // First, create the rows with the 3 blocks --}}
                @foreach ( $services_chunks as $chunk )

                    <div class="services-row row">
                        @foreach ( $chunk as $item )
                            @if ( $item->image )
                                <div class="service-block col-sm-12 col-lg-4" id="service-{{ $item->ID }}" style="background-image: url('{{ $item->image }}');">
                            @else
                                <div class="service-block col-sm-12 col-lg-4" id="service-{{ $item->ID }}">
                            @endif
                                <div class="service-overlay"></div>
                                <div class="service-icon">
                                    {{-- <img src="{{ get_stylesheet_directory_uri() }}/resources/images/sm_logo_icon.svg" alt="bbs-icon-small"> --}}
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                                <div class="service-name">
                                    {{ $item->name }}
                                </div>
                            </div>
                        @endforeach
                    </div><!-- / .service-index -->


                    {{-- // Next, below get the 3 info row (hidden on page load) --}}
                    @foreach ( $chunk as $item )

                        <div class="service-info hide" id="service-{{ $item->ID }}-info">

                            <div class="row">
                                <div class="col-sm-12 col-lg-4">
                                    <h4>{{ $item->name }}</h4>
                                    <div class="service-summary">
                                        {!! $item->summary !!}
                                    </div>
                                    <div class="service-more">
                                        <a href="{{ get_the_permalink( $item->ID ) }}">Service Overview</a>
                                    </div>
                                </div>
                                <div class="service-children col-sm-12 col-lg-8">
                                    <div class="row">
                                        <div class="col-12">
                                          <h5>Related Services</h5>
                                        </div>
                                        @foreach ( $item->subServices as $sub )
                                            <div class="col-sm-12 col-lg-6 p-0">
                                                <div class="service-child-link">
                                                    <a href="{{ get_the_permalink( $sub->ID ) }}">
                                                        {{ get_field('service_name', $sub->ID) }}
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                            </div>

                        </div><!-- / .service-info -->
                    @endforeach

                @endforeach
            </div><!-- / .services-index -->


            {{-- INDUSTRIES --}}
            <div class="services-index industry-blocks" style="display: none;">
                @php
                // Chunk the industries array into blocks of 3.
                // This allows the "info" full-width blocks to sit beneath without breaking the grid...
                $industry_chunks = array_chunk( $industries, 3, true );
                @endphp

                {{-- // First, create the rows with the 3 blocks --}}
                @foreach ( $industry_chunks as $chunk )

                    <div class="services-row row">
                        @foreach ( $chunk as $item )
                            @if ( $item->image )
                                <div class="service-block col-sm-12 col-lg-4" id="service-{{ $item->ID }}" style="background-image: url('{{ $item->image }}');">
                            @else
                                <div class="service-block col-sm-12 col-lg-4" id="service-{{ $item->ID }}">
                            @endif
                                <div class="service-overlay"></div>
                                <div class="service-icon">
                                    {{-- <img src="{{ get_stylesheet_directory_uri() }}/resources/images/sm_logo_icon.svg" alt="bbs-icon-small"> --}}
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                                <div class="service-name">
                                    {{ $item->name }}
                                </div>
                            </div>
                        @endforeach
                    </div><!-- / .service-index -->


                    {{-- // Next, below get the 3 info row (hidden on page load) --}}
                    @foreach ( $chunk as $item )

                        <div class="service-info hide" id="service-{{ $item->ID }}-info">

                            <div class="row">
                                <div class="col-sm-12 col-lg-4">
                                    <h4>{{ $item->name }}</h4>
                                    <div class="service-summary">
                                        {!! $item->summary !!}
                                    </div>
                                    <div class="service-more">
                                        <a href="{{ get_the_permalink( $item->ID ) }}">View more</a>
                                    </div>
                                </div>
                                <div class="service-children col-sm-12 col-lg-8">
                                    <div class="row">
                                        {{-- @foreach ( $item->subServices as $sub )
                                            <div class="col-sm-12 col-lg-6">
                                                <div class="service-child-link">
                                                    <a href="{{ get_the_permalink( $sub->ID ) }}">
                                                        {{ get_field('service_name', $sub->ID) }}
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach --}}
                                    </div>
                                </div>

                            </div>

                        </div><!-- / .service-info -->
                    @endforeach

                @endforeach
            </div>

    </div><!-- / .container -->

</div><!-- / .container-fluid -->
