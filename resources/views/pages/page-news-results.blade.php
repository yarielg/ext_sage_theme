@include('sections.page-header')

<div class="container-fluid"  style="background: url( @asset('images/p1/s-2.png') ) right repeat; background-size: 80% auto;">

    <div id="news-results-search" class="container-fluid collapse">
        <div class="row">
            <div class="col bg-white border-bottom border-dark">
                @include('partials.news.search-filters-form')
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-auto ms-auto">
                <a href="#" id="toggleNewsResultsSearch" class="change-search">Change Search <span>+</span></a>
            </div>
        </div>
    </div>

    <div class="container pt-5 pt-lg-8">
        <div class="row-grid-three pb-2">

            {{-- Events --}}
            @if ( isset ( $upcomingEvents ) )
                @foreach ( $upcomingEvents as $event )
                    <div class="post post--event card p-5 @php(post_class())">
                        <h5 class="post-label">
                            <span>{{ $event->post_type }}</span>
                            <img src="@asset('images/icons/calendar.png')" class="img-fluid post-icon">
                        </h5>

                        <a class="post-title" href="{{ get_permalink($event->ID) }}">
                            {!! $event->event_title !!}
                        </a>

                        @include('partials.news.meta', ['post_date' => $event->event_date])

                        <a class="read-more btn-link text-secondary p-0 mt-3" href="{{ get_permalink($event->ID) }}">Read</a>
                    </div>
                @endforeach
            @endif

            {{-- News --}}
            @if ( isset( $news ) && ! empty( $news->posts ) )

                @foreach ( $news->posts as $article )

                    <div class="post post--news card p-5 @php(post_class())">
                        <h5 class="post-label">
                            <span>
                                <?php
                                $cat = '';
                                $terms = wp_get_post_terms( $article->ID, 'news-categories' );

                                foreach ($terms as $term) :
                                    $cat .= ( $term != end($terms) ) ? $term->name . ', ' : $term->name;
                                endforeach;

                                echo $cat;
                                ?>
                            </span>

                        </h5>

                        <a class="post-title" href="{{ get_permalink($article->ID) }}">{!! $article->post_title !!}</a>

                        @include('partials.news.meta', ['post_date' => $article->post_date, 'date_convert'=>TRUE])

                        <a class="read-more btn-link text-secondary p-0 mt-3" href="{{ get_permalink($article->ID) }}">Read</a>
                    </div>

                @endforeach

            @else
                <div class="no-results-message mb-8">
                    <h3>Nothing Found</h3>
                    <p>Sorry, there were no results found. Please check back soon.</p>
                </div>
            @endif

        </div>


        @if ( isset( $news ) && ! empty( $news->posts ) )
            {{-- Pagination --}}
            @include('forms.pagination', [
                'total_pages' => $news->max_num_pages,
                'pagination_id' => 'news-paginator'
            ])
        @endif

    </div>

</div>
