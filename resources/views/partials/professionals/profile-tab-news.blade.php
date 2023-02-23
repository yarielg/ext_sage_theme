{{-- Featured/Pinned Publications (Relationship Field) --}}
@if ($featured_publications)
    <div class="entry mb-6 mb-lg-8 pb-5 pb-lg-0">
        <h5 class="mb-3">Featured Publications</h5>
        <ul class="list-group list-group-flush">
            @foreach( $featured_publications as $publication )
                <li class="list-group-item featured px-0 pt-3 pb-3">
                    <div class="list-title">
                        <a href="{{ get_the_permalink($publication->ID) }}">
                            {!! get_the_title($publication->ID) !!} @include('components.link-arrow')
                        </a>
                    </div>
                    <div class="list-meta">
                        {!! date( 'F j, Y', strtotime( get_field( 'sort_date', $publication->ID ) ) ) !!}
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endif


{{-- Category: Publications --}}
@if ($publications)
    <div class="entry mb-6 mb-lg-8 pb-5 pb-lg-0">
        <h5 class="mb-3">Publications</h5>
        <ul class="list-group list-group-flush">
            @foreach( $publications as $publication )
                <li class="list-group-item px-0 pt-3 pb-3">
                    <div class="list-title">
                        <a href="{{ get_the_permalink($publication->ID) }}">
                            {!! get_the_title($publication->ID) !!} @include('components.link-arrow')
                        </a>
                    </div>
                    <div class="list-meta">
                        {!! date( 'F j, Y', strtotime( get_field( 'sort_date', $publication->ID ) ) ) !!}
                    </div>
                </li>
            @endforeach
        </ul>
        <a class="read-more btn-lg btn-link text-secondary px-0" href="#">
            See More Publications
        </a>
    </div>
@endif


{{-- Categories: Media Mentions & Firm News --}}
@if ($media_news)
    <div class="entry mb-6 mb-lg-8 pb-5 pb-lg-0">
        <h5 class="mb-3">Media Mentions &amp; Firm News</h5>
        <ul class="list-group list-group-flush">
            @foreach( $media_news as $news )
                <li class="list-group-item px-0 pt-3 pb-3">
                    <div class="list-title">
                        <a href="{{ get_the_permalink($news->ID) }}">
                            {!! get_the_title($news->ID) !!} @include('components.link-arrow')
                        </a>
                    </div>
                    <div class="list-meta">
                        {!! date( 'F j, Y', strtotime( get_field( 'sort_date', $news->ID ) ) ) !!}
                    </div>
                </li>
            @endforeach
        </ul>
        <a class="read-more btn-lg btn-link text-secondary px-0" href="#">
            See More Media Mentions &amp; Firm News
        </a>
    </div>
@endif


{{-- Additional News (WYSIWYG data) --}}
@if ($additional_news)
    <div class="entry mb-6 mb-lg-8 pb-5 pb-lg-0">
        <h5 class="mb-3">Additional News &amp; Insights</h5>
        <div class="additional additional_news">
            {!! $additional_news !!}
        </div>
    </div>
@endif
