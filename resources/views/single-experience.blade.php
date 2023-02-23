{{--
Template Name: Experience Detail Template
--}}

@extends('layouts.app')

@section('content')

@while(have_posts()) @php(the_post())

    @include('sections.page-header')

    @include( 'print.experience' )

    <div class="container experience-content-wrapper pt-5 py-0">
        <div class="row">

            <div class="col-12 col-lg-8 profile-body pe-lg-6">
                @include( 'partials.content-single-experience' )
            </div>

            <div class="col-12 col-lg-4 profile-sidebar">
              <div class="col-12">
                <a class="utility-print" href="#" title="Print">
                  <i class="fa fa-print"></i>
                </a>
              </div>

              <div class="col-12">
                @include( 'partials.experience.sidebar-accordions' )
              </div>

            </div>
        </div>
    </div>

@endwhile

@endsection
