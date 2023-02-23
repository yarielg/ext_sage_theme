{{-- Get the introduction or the main content --}}
<div class="entry mb-6 mb-lg-8 pb-5 pb-lg-0">
    @if ( $info['fields']['introduction'] )
        <div class="introduction">
            {!! $info['fields']['introduction'] !!}
        </div>
        <a class="read-more btn-lg btn-link text-secondary px-0" href="#">
            Read more <span class="plus-sign"></span>
        </a>
    @endif

    <div class="the-content" @if( ! empty($info['fields']['introduction']))style="display: none;"@endif>
        @posts
            @content
        @endposts
    </div>
</div>


@if ($featured_experiences)
    <div class="entry mb-6 mb-lg-8 pb-5 pb-lg-0">
        <h5 class="mb-3">Featured Experience</h5>
        <ul class="list-group list-group-flush">
            @foreach( $featured_experiences as $experience )
                <li class="list-group-item featured px-0 pt-3 pb-3">
                    <div class="list-title">
                        <a href="{{ $experience['link'] }}">
                            {!! $experience['title'] !!} @include('components.link-arrow')
                        </a>
                    </div>
                    <div class="list-meta">
                        Client Type: 
                        @foreach( $experience['categories'] as $category )
                            {!! $category->name !!}@if ( ! $loop->last ),@endif
                        @endforeach
                    </div>
                </li>
            @endforeach
        </ul>
        <a class="read-more btn-lg btn-link text-secondary px-0" href="#">
            See More Experience
        </a>
    </div>
@endif


@if ($memberships)
    <div class="entry mb-6 mb-lg-8 pb-5 pb-lg-0">
        <h5 class="mb-3">Memberships</h5>
        {!! $memberships !!}
    </div>
@endif
