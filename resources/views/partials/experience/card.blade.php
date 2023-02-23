<div class="post post--experience card p-5">
  <a class="post-title" href="{{ $experience->permalink }}">
    {!! $experience->post_title !!}
  </a>

  <?php
    $terms = wp_get_post_terms( $experience->ID, 'client-types' );
    if ($terms) :
  ?>
      <div class="exp-type listing-meta">
      Client Type:
      <span>
        <?php foreach ($terms as $term) :
        echo '<a href="/experience-results/?client-type=' . $term->term_id . '">' . $term->name . '</a>';
        echo ($term != end($terms)) ? ', ' : '';
      endforeach; ?>
         </span>
       </div>
  <?php endif; ?>

  {{-- @include('partials.entry-meta', ['post_date' => $experience->friendly_date]) --}}

  {{-- @php(the_excerpt()) --}}
  <a class="read-more btn-lg btn-link text-secondary px-0" href="{{ $experience->permalink }}">
    Read
  </a>
</div>
