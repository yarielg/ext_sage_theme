<div class="container new-content p-0">
    <div class="row">
        <div class="col pb-5">
            <article id="post-<?php the_ID(); ?>" @php(post_class())>

                <header class='mb-5'>
                    @include('partials.news.meta', [
                        'newsSource' => $newsSource,
                        'newsSourceUrl' => $newsSourceUrl
                    ])
                </header>

                <div class="entry-content">
                    {!! the_content() !!}
                </div>

                @if ( isset( $accordionItems ) && ! empty( $accordionItems ) )
                    <div class="accordion-wrapper">
                        @if ( isset( $accordionHeading ) )
                            <h3>{{ $accordionHeading }}</h3>
                        @endif

                        <ul class="accordion" data-allow-all-closed="true" data-multi-expand="true" data-accordion>
                            @foreach ($accordionItems as $item)
                                <li class="accordion-item " data-accordion-item>
                                    <a href="#" class="accordion-title">{{ $item['accordion_item_title'] }}</a>
                                    <div class="accordion-content" data-tab-content>
                                        {!! $item['accordion_item_content'] !!}
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <?php // Flexible Content - 4/14/20 JM
                if ( have_rows( 'flexible_content' ) ) :
                    while ( have_rows( 'flexible_content' ) ) : the_row();
                        if ( get_row_layout() == 'flex_one_column' ) :
                            get_template_part( 'template-parts/flexible/flex-one-column' );
                        elseif ( get_row_layout() == 'flex_accordion' ) :
                            get_template_part( 'template-parts/flexible/flex-accordion' );
                        endif;
                    endwhile;
                endif; ?>

                @if (isset($files[0]) && $files[0]['news_file'] )
                    <div class="news-files">
                        <h5>Downloads:</h5>
                        <ul>
                            <?php
                                foreach($newsAttachments as $file) :
                                $file_download = $file['news_file']['url'];
                                $file_title = $file['news_file']['title'];
                                $file_description = $file['news_file']['description'];
                                $file_filename = $file['news_file']['filename'];
                                $file_type = $file['news_file']['mime_type'];

                                $file_tmp = explode('/', $file_type);
                                $file_type = $file_tmp[1];
                            ?>

                            <li class="news-file">
                                <a href="{{ $file_download }}" target="_blank" title="Download: {{ $file_filename }}">
                                    <?php echo ($file_description) ? $file_description : $file_title; ?> (<span class="news-file-type">{{ $file_type }}</span>)
                                </a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                @endif

                <div class="related-news">
                    <h3>In Case You Missed It:</h3>
                    <ul class="listing">
                        @foreach($relatedNews as $news)
                            <li>
                                <div class="listing-title">
                                    <a href="<?php the_permalink($news->ID); ?>">
                                        <?php echo get_the_title($news->ID); ?>
                                    </a>
                                </div>
                                <div class="listing-meta">
                                    <?php
                                    $sort_date = get_field('sort_date', $news->ID);
                                    if (isset($sort_date)) {
                                        echo date("F d, Y", strtotime($sort_date));
                                    }
                                    ?>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>

            </article>

        </div>
    </div>
</div>
