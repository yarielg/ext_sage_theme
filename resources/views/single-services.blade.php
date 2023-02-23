@extends('layouts.app')

@section('content')

    @include('sections.page-header', [
        'class'             => 'banner--services-detail',
        'page_hero'         => $header_image,
        'page_header'       => $header_title,
        'page_description'  => $header_description,
    ])

    {{-- Content --}}
    <div class="container px-lg-0 mb-8">

        {{-- Tabs --}}
        <div class="row services-tabs">

            <nav class="mb-4 mb-lg-7 px-0">
                <div class="nav nav-tabs flex-lg-wrap" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-1-tab" data-bs-toggle="tab" data-bs-target="#nav-1" type="button" role="tab" aria-controls="nav-1" aria-selected="true">
                        Overview
                    </button>

                    @if ($experiences)
                        <button class="nav-link" id="nav-2-tab" data-bs-toggle="tab" data-bs-target="#nav-2" type="button" role="tab" aria-controls="nav-2" aria-selected="false">
                            Experience
                        </button>
                    @endif

                    @if ($professionals)
                        <button class="nav-link" id="nav-3-tab" data-bs-toggle="tab" data-bs-target="#nav-3" type="button" role="tab" aria-controls="nav-3" aria-selected="false">
                            Professionals
                        </button>
                    @endif

                    <button class="nav-link" id="nav-4-tab" data-bs-toggle="tab" data-bs-target="#nav-4" type="button" role="tab" aria-controls="nav-4" aria-selected="false">
                        News &amp; Insights
                    </button>
                </div>
            </nav>
        </div>

        {{-- Wrapper --}}
        <div class="row services-tabs">

            <div class="col-12 col-lg-8 service-body pe-lg-6">


                {{-- Tab Content --}}
                <div class="tab-content" id="nav-tabContent">
                    
                    <div class="tab-pane fade show active" id="nav-1" role="tabpanel" aria-labelledby="nav-1-tab">
                        @include('partials.services.service-tab-overview')
                    </div>

                    @if ($experiences)
                        <div class="tab-pane fade" id="nav-2" role="tabpanel" aria-labelledby="nav-2-tab">
                            @include('partials.services.service-tab-experiences')
                        </div>
                    @endif

                    @if ($professionals)
                        <div class="tab-pane fade" id="nav-3" role="tabpanel" aria-labelledby="nav-3-tab">
                            @include('partials.services.service-tab-professionals')
                        </div>
                    @endif

                    <div class="tab-pane fade" id="nav-4" role="tabpanel" aria-labelledby="nav-4-tab">
                        @include('partials.services.service-tab-news')
                    </div>

                </div>

            </div>

            @include('partials.services.service-sidebar')

        </div>

    </div>

@endsection
