
@include('sections.page-header')

<div class="container-fluid border-bottom border-secondary border-4">
    <div class="container px-3 px-lg-5">
        <div class="row mb-2 mt-5">
            @php($alphas = range('A', 'Z'))
            @foreach ($alphas as $alpha)
                @include('components.letter', [
                    'letter' => $alpha,
                    'url' => '/alumni/directory/?letter='.$alpha
                ])
            @endforeach
        </div>
        <div class="row mb-4">
            @include('forms.search-alumni')
        </div>
    </div>
</div>

{{-- Posts --}}
<div class="container-fluid alumni-directory" style="background: url( @asset('images/p1/s-2.png') ) right repeat; background-size: 80% auto;">

    {{-- Main Container --}}
    <div class="container pt-5 pb-5 pt-lg-8">

        {{-- Posts --}}
        <div class="row">
            {!! $alumni_directory !!}
        </div>

        {{-- Pagination --}}
        {{-- {!! get_the_posts_navigation() !!} --}}
        {{-- @if(!isset($_GET['view_all']))
            @include('forms.pagination', ['total_pages'=>$directoryListing->max_num_pages])
        @endif --}}
    </div>
</div>
