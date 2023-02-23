
@include('sections.page-header')

<div class="container-fluid job-board" style="background: url( @asset('images/p1/s-2.png') ) right repeat; background-size: 80% auto;">

    <div class="container pt-8 pb-8">

        <div class="row-grid-four">
            @foreach( $jobListing->posts as $job ) 
                @include( 'partials.content-job', [
                    'job_title'     => $job->post_title,
                    'location'      => $job->location,
                    'link'          => $job->permalink
                ])
            @endforeach
        </div>

        {{-- Pagination --}}
        {{-- {!! get_the_posts_navigation() !!} --}}
        @if( $jobListing->max_num_pages > 1 ) 
            @include( 'forms.pagination', [ 'total_pages' => $jobListing->max_num_pages ] )
        @endif
    </div>
</div>
