@if ($featured_experiences || $experiences)
    <div class="entry mb-6 mb-lg-8 pb-5 pb-lg-0">
        <h5 class="mb-3">Representative Experience</h5>
        <ul class="list-group list-group-flush">
            @if ($featured_experiences)
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
            @endif

            @if ($experiences)
                @foreach( $experiences as $experience )
                    <li class="list-group-item px-0 pt-3 pb-3">
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
            @endif
        </ul>
        <a class="read-more btn-lg btn-link text-secondary px-0" href="/experience">
            See More Experience
        </a>
    </div>
@endif


{{-- Additional Experience (WYSIWYG data) --}}
@if ( $additional_experience )
    <div class="entry mb-6 mb-lg-8 pb-5 pb-lg-0">
        <h5 class="mb-3">Additional Experience</h5>
        <div class="additional additional-experience">
            {!! $additional_experience !!}
        </div>
    </div>
@endif
