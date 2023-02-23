<div class="post post--{!! $post->post_type !!} card p-3" @php(post_class())>
    <a class="post-title" href="{{ get_permalink() }}">
        {!! $title !!}
    </a>

    @include('partials.entry-meta')
    {{-- @php(the_excerpt()) --}}
    <a class="read-more btn-lg btn-link text-secondary px-0" href="{{ get_permalink() }}">Read</a>
</div>
