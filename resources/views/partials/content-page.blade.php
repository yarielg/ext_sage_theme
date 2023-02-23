<div class="container">
    <div class="row">
        <div class="col-lg-8 py-5 entry-content">
			@php( the_content() )
		</div>
		<div class="col-lg-4 py-5">
			@if ( $sub_pages )
			<h3><a href="{{ get_the_permalink( $parent_page->ID ) }}">{!! $parent_page->post_title !!}</a></h3>
			<ul>
				{!! $sub_pages !!}
			</ul>
			@endif
		</div>
	</div>
</div>

{{-- {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!} --}}
