<div class="container print-new-wrapper">
  <div class="row my-5 pt-5">
    <div class="col-12 text-center">
      <img src="@asset('images/logo-profile-page.jpg')">
    </div>
  </div>
  <div class="row">

    <div class="col-8 py-5">
      <h1>{!!  $title  !!}</h1>
      <hr>
      <h5 class="mt-2">
        <time class="updated" datetime="{{ get_post_time('c', true) }}">
          @if ( isset( $post_date ) )
            @if ( isset( $date_convert ) && $date_convert == TRUE )
              {{ date("F d, Y", strtotime($post_date)) }}
            @else
              {{ $post_date }}
            @endif
          @else
            {{ get_the_date() }}
          @endif
        </time>
      </h5>
      <div class="news-source">
        @if ( isset( $newsSourceUrl ) )
          <a href="{!! $newsSourceUrl !!}" target="_blank">
            @endif
            @if ( isset( $newsSource ) )
              {!! $newsSource !!}
            @endif
            @if ( isset( $newsSourceUrl ) )
          </a>
        @endif
      </div>
      <hr>
      <div class="entry-content mt-4">
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

      <div class="related-news mt-2">
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
    </div>

    <div class="col-4 pt-5">
      @if ( $related_professionals )
        <h5>Related Professionals</h5>
        @foreach( $related_professionals as $professional )
          <div>
            <a href="{{ get_permalink($professional->ID) }}">{{ $professional->fullname }}</a>
          </div>
        @endforeach
      @endif

      @if ( $related_services )
        <h5 class="mt-3">Related Services</h5>
        @foreach( $related_services as $service )
          <div>
            <a href="{{ get_permalink($service->ID) }}">{{ get_field('service_name', $service->ID) }}</a>
          </div>
        @endforeach
      @endif
    </div>
  </div>

</div>

<style>
  @media print {
    .profile-padding, .new-content-wrapper, .hero, .footer-container, .header-container {
      display: none;
    }

    .print-new-wrapper{
      display: block; !important;
    }

    h2.print-name{
      padding: 0 !important;
      height: auto;
    }

    .print-new-wrapper ul li{
      border-width: inherit !important;
    }

    .print-new-wrapper a{
      text-decoration: underline !important;
      color: black !important;
    }

    .fa-chevron-right{
      display: none !important;
    }

    hr{
      color: gray;
      background: gray;
    }
  }
</style>
