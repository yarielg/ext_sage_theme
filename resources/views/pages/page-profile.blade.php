<div class="profile-padding">
    @include('partials.professionals.profile-header')
</div>
    @include('print.professionals')
{{-- Content --}}
<div class="container px-lg-0 mb-8 professional-content-wrapper">
    {{-- Tabs --}}
    <div class="row profile-tabs">
        <nav class="mb-7">
            <div class="nav nav-tabs flex-lg-wrap" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-1-tab" data-bs-toggle="tab" data-bs-target="#nav-1" type="button" role="tab" aria-controls="nav-1" aria-selected="true">
                    Overview
                </button>

                @if ( $experiences || $additional_experience )
                <button class="nav-link" id="nav-2-tab" data-bs-toggle="tab" data-bs-target="#nav-2" type="button" role="tab" aria-controls="nav-2" aria-selected="false">
                    Experience
                </button>
                @endif

                @if ( $featured_publications || $publications || $media_news || $additional_news )
                    <button class="nav-link" id="nav-3-tab" data-bs-toggle="tab" data-bs-target="#nav-3" type="button" role="tab" aria-controls="nav-3" aria-selected="false">
                        News & Insights
                    </button>
                @endif

                @if ( $accolades )
                    <button class="nav-link" id="nav-4-tab" data-bs-toggle="tab" data-bs-target="#nav-4" type="button" role="tab" aria-controls="nav-4" aria-selected="false">
                        Accolades
                    </button>
                @endif

                @if ( $past_events || $upcoming_events )
                    <button class="nav-link" id="nav-5-tab" data-bs-toggle="tab" data-bs-target="#nav-5" type="button" role="tab" aria-controls="nav-5" aria-selected="false">
                        Events
                    </button>
                @endif

                @if ( $custom_tab )
                    <button class="nav-link" id="nav-6-tab" data-bs-toggle="tab" data-bs-target="#nav-6" type="button" role="tab" aria-controls="nav-6" aria-selected="false">
                        {!! $custom_tab['name'] !!}
                    </button>
                @endif
            </div>
        </nav>
    </div><!-- / .profile-tabs -->

    {{-- Wrapper --}}
    <div class="row profile-tabs">

        <div class="col-12 col-lg-8 profile-body pe-lg-6">

            {{-- Tabs Content --}}
            <div class="tab-content" id="nav-tabContent">

                <div class="tab-pane entry fade show active" id="nav-1" role="tabpanel" aria-labelledby="nav-1-tab">
                    @include('partials.professionals.profile-tab-overview', [])
                </div>

                @if ( $experiences || $additional_experience )
                    <div class="tab-pane entry fade" id="nav-2" role="tabpanel" aria-labelledby="nav-2-tab">
                        @include('partials.professionals.profile-tab-experience', [])
                    </div>
                @endif

                 @if ( $featured_publications || $publications || $media_news || $additional_news )
                    <div class="tab-pane entry fade" id="nav-3" role="tabpanel" aria-labelledby="nav-3-tab">
                        @include('partials.professionals.profile-tab-news', [])
                    </div>
                @endif

                @if ( $accolades )
                    <div class="tab-pane entry fade" id="nav-4" role="tabpanel" aria-labelledby="nav-4-tab">
                        @include('partials.professionals.profile-tab-accolades', [])
                    </div>
                @endif

                @if ( $past_events || $upcoming_events )
                    <div class="tab-pane entry fade" id="nav-5" role="tabpanel" aria-labelledby="nav-5-tab">
                        @include('partials.professionals.profile-tab-events', [])
                    </div>
                @endif

                @if ( $custom_tab )
                    <div class="tab-pane entry fade" id="nav-6" role="tabpanel" aria-labelledby="nav-6-tab">
                        @include('partials.professionals.profile-tab-custom', [])
                    </div>
                @endif

            </div>
        </div>

        {{-- Sidebar --}}
        @include('partials.professionals.profile-sidebar')

    </div>

</div>
