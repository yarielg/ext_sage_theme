@extends('layouts.app')

@section('content')

@while(have_posts()) @php(the_post())

    @include('sections.page-header')

    @include( 'print.event' )

    <div class="container event-content-wrapper pt-5 py-0">
        <div class="row">
            <div class="col-12 col-lg-8 profile-body pe-lg-6">
                @include('partials.content-single-events')
            </div>

            <div class="col-12 col-lg-4 profile-sidebar">
                <a class="utility-print" href="#" title="Print">
                  <i class="fa fa-print"></i>
                </a>
                @include('partials.events.sidebar-accordions')
            </div>
        </div>
    </div>

@endwhile

@endsection
