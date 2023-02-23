{{-- <pre>{{ var_dump($post) }}</pre> --}}

<div class="post post--job card p-4">
  <a class="post-title" href="{{ $link }}">
    {!! $job_title !!}
  </a>

  @if($location)
  <p>
  @foreach($location as $loc) 
    {{ $loc->post_title }}
  @endforeach
  </p>
  @endif
  <a class="read-more btn-lg btn-link text-secondary px-0" href="{{ $link }}">
    View
  </a>
</div>
