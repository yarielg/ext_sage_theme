@extends('layouts.app')

@section('content')

  @if (! have_posts())
    <x-alert type="warning">
      {!! __('Sorry, no results were found.', 'sage') !!}
    </x-alert>

    {!! get_search_form(false) !!}
  @endif

  {{-- Title --}}
  @include('sections.page-header')
  
  {{-- Main Container --}}
  <div class="container">

    {{-- Posts --}}
    <div class="row row-cols row-cols-lg-4 py-7" style="row-gap:1rem; column-gap: 1rem;">
      @while(have_posts()) @php(the_post())
        @includeFirst(['partials.content-' . get_post_type(), 'partials.content'])
      @endwhile
    </div>
  </div>



  {{-- Pagination --}}
  {{-- {!! get_the_posts_navigation() !!} --}}
  @include('forms.pagination')
@endsection

@section('sidebar')
  @include('sections.sidebar')
@endsection
