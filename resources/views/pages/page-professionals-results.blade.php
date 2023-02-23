@include('sections.page-header')

@include( 'partials.professionals.search-filters-form' )

{{-- Posts --}}
<div class="container-fluid archive-staff" style="background: url( @asset('images/p1/s-2.png') ) right repeat; background-size: 80% auto;">

    {{-- No Posts --}}
    @if (! have_posts())
        <x-alert type="warning">
            {!! __('Sorry, no results were found.', 'sage') !!}
        </x-alert>

        {!! get_search_form(false) !!}
    @endif

    {{-- Main Container --}}
    <div class="container pt-8">

        {{-- Posts --}}
        <div class="row row-cols-1 row-cols-lg-4">

        @foreach ($professionals as $professional)
            <div class="col mb-4">
                @include('partials.professionals.card', [
                    'professional' => $professional
                ])
            </div>
        @endforeach

        </div>

    </div>
</div>
