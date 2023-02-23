<div class="container p-0 experience-content">
    <div class="row">
        <div class="co pb-5">
            <article @php(post_class())>
                <header class='mb-5'>
                    @if ( isset( $client_types ) && ! empty( $client_types ) )
                        <span>Client Type: </span> @foreach ($client_types as $type) <a href="/experience-results/?client-type={{$type->term_id }}">{{ $type->name }}</a> @endforeach
                    @endif
                </header>

                <div class="entry-content">
                    {!! the_content() !!}
                </div>

                <footer>
                    {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
                </footer>
            </article>
        </div>
    </div>
</div>
