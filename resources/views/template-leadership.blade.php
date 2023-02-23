{{--
Template Name: Leadership
--}}

@extends('layouts.app')

@section('content')

    @include('sections.page-header')

    <div class="container-fluid archive-staff" style="background: url( @asset('images/p1/s-2.png') ) right repeat; background-size: 80% auto;">

        @if (! have_posts())
            <x-alert type="warning">
                {!! __('Sorry, no results were found.', 'sage') !!}
            </x-alert>

            {!! get_search_form(false) !!}
        @endif

        <div class="container pt-8">
            
            <div class="row staff-group-title">
                <div class="col text-center">
                    @include( 'components.component-text-block', [ 'heading' => 'EXECUTIVE COMMITTEE' ] )
                </div>
            </div>

            <div class="row row-cols-1 row-cols-lg-4">
                @foreach( $leadership['executive'] as $member ) 
                    <div class="col mb-4">
                        @include( 'partials.content-leadership-card', [ 'member' => $member ] )
                    </div>
                @endforeach
            </div>

            {{-- OFFICE MANAGING PARTNERS --}}
            <div class="row staff-group-title">
                <div class="col text-center">
                    @include( 'components.component-text-block', [ 'heading' => 'OFFICE MANAGING PARTNERS' ] )
                </div>
            </div>

            <div class="row row-cols-1 row-cols-lg-4">
                @foreach( $leadership['partners'] as $member ) 
                    <div class="col mb-4">
                        @include( 'partials.content-leadership-card', [ 'member' => $member ] )
                    </div>
                @endforeach
            </div>

            {{-- ADMINISTRATION --}}
            <div class="row staff-group-title">
                <div class="col text-center">
                    @include( 'components.component-text-block', [ 'heading' => 'ADMINISTRATION' ] )
                </div>
            </div>

            <div class="row row-cols-1 row-cols-lg-4">
                @foreach( $leadership['administration'] as $member ) 
                    <div class="col mb-4">
                        @include( 'partials.content-leadership-card', [ 'member'=>$member ] )
                    </div>
                @endforeach
            </div>

        </div>
    </div>

@endsection

@section('sidebar')
    @include('sections.sidebar')
@endsection
