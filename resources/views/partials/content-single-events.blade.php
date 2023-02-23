<div class="container event-content p-0">
    <div class="row">
        <div class="col pb-5">
            <article id="post-<?php the_ID(); ?>" @php(post_class())>

                <header class='mb-5'>
                    @include( 'partials.events.meta' )
                </header>

                <div class="entry-content">
                    {!! the_content() !!}
                </div>

                @if ( $related_events )
                    <div class="related-news">
                        <h5>In Case You Missed It:</h5>
                        <ul class="listing">
                            @foreach( $related_events as $event )
                                <li>
                                    <div class="listing-title">
                                        <a href="<?php the_permalink($event->ID); ?>">
                                            <?php echo get_the_title($event->ID); ?>
                                        </a>
                                    </div>
                                    <div class="listing-meta">
                                        <?php
                                        $sort_date = get_field('sort_date', $event->ID);
                                        if (isset($sort_date)) {
                                            echo date("F d, Y", strtotime($sort_date));
                                        }
                                        ?>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

            </article>

        </div>
    </div>
</div>
