@include('sections.page-header')

{{-- Posts --}}
<div class="container-fluid alumni-updates" style="background: url( @asset('images/p1/s-2.png') ) right repeat; background-size: 80% auto;">

  <div class="container">
    <div class="row">
      <div class="col pt-5">
         {!! $pageContent !!}
      </div>
    </div>
  </div>

  {{-- No Posts --}}
  @if (! have_posts())
    <x-alert type="warning">
      {!! __('Sorry, no results were found.', 'sage') !!}
    </x-alert>
    {!! get_search_form(false) !!}
  @endif

  {{-- Main Container --}}
  <div class="container pt-8">

    {{-- Posts --}}
    <div class="row-grid-three">
      @foreach($updatePosts->posts as $post)
       @include('partials.content-alumni-update', ['post' => $post])
      @endforeach
    </div>

    {{-- Pagination --}}
    {{-- {!! get_the_posts_navigation() !!} --}}
    @include('forms.pagination', [
      'total_pages'=>$updatePosts->max_num_pages,
      'pagination_id' => 'alumni-news-paginator'
      ])
  </div>
</div>
