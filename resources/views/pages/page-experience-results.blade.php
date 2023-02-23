@include('sections.page-header')

{{-- Posts --}}
<div class="container-fluid archive-staff" style="background: url( @asset('images/p1/s-2.png') ) right repeat; background-size: 80% auto;">

    {{-- No Posts --}}
    @if (! have_posts())
        <x-alert type="warning">
            {!! __('Sorry, no results were found.', 'sage') !!}
        </x-alert>
        {!! get_search_form(false) !!}
    @endif

    {{-- Search button --}}
    <div id="experience-results-search" class="container-fluid collapse">
        <div class="row">
            <div class="col bg-white border-bottom border-dark">
                @include('partials.experience.search-filters-form')
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-auto ms-auto" id="experience-search-toggle">
                <a href="#" id="exp-toggle-search-close" class="close collapse change-search">Close Search <span>—	</span></a>
                <a href="#" id="exp-toggle-search-open" class="open  change-search">Open Search <span>+ </span></a>
            </div>
        </div>
    </div>

    {{-- Main Container --}}
    <div class="container pt-8">

        @if ( isset( $experiences ) && ! empty( $experiences->posts ) )
            {{-- Posts --}}

            @foreach ($experiences->posts as $experience)
                <div class="row">
                    <div class="col mb-4">
                        @include('partials.experience.card', [ 'experience' => $experience ] )
                    </div>
                </div>
            @endforeach

            {{-- Pagination --}}
            @include('forms.pagination', [
                'total_pages' => $experiences->max_num_pages,
                'pagination_id' => 'experiences-paginator'
            ])

        @else
            <div class="no-results-message mb-8">
                <h3>Nothing Found</h3>
                <p>Sorry, there were no results found. Please check back soon.</p>
            </div>
        @endif

    </div>
</div>
