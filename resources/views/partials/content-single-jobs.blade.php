<div class="container">
  <div class="row">
    <div class="col pt-5 pb-5">

    <header class="mb-2">
      <h1 class="entry-title">
        {!! $pageContent->post_title !!}
      </h1>
      @include('partials.entry-meta') - @foreach($pageContent->location as $loc) {{ $loc->post_title }} @endforeach
    </header>
     
      <div class="entry-content">
      {!! $pageContent->post_content !!}
    </div>

    </div>
  </div>
</div>