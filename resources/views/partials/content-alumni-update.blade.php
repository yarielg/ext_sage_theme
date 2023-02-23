{{-- <pre>{{ var_dump($post) }}</pre> --}}

@php
// $cat = get_the_category();
$categories = get_the_category($post->ID);

if (isset($categories) && ! empty( $categories ) ) {
  $cat = esc_html( $categories[0]->slug );
} else {
  $cat = '';
}

@endphp

@if($post->post_type == 'news')
<div class="post post--{{$cat}} card p-4 p-md-5" @php(post_class($post->ID))>
  <a class="post-title" href="{{ get_permalink($post->ID) }}">
    {!! $post->post_title !!}
  </a>

  {{-- @include('partials.entry-meta') --}}
  <div class="post-body">
    {!! $post->post_excerpt !!}
  </div>
  <a class="read-more btn-lg btn-link text-secondary pt-2 px-0 py-lg-3" href="{{ get_permalink($post->ID) }}">
    Read More
  </a>
</div>
@else

@endif