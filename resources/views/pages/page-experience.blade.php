
<style>
    .search-inner {
        border: solid 20px #000;
    }

    .experience-search {
        box-shadow: none !important;
        border-bottom: none !important;
        padding-left: 0;
        padding-right: 0;
        width: 100%;
        margin-right: 0;
        margin-left: 0;
    }

    .experience-search > .container {
        max-width: 100%;
        margin: 0;
        padding: 5px;
    }
</style>

@include('sections.page-header', [
    'class' => 'banner--experience'
])

<div class="container-fluid py-6 search-experience s-search" style="background: url(@asset('images/elements/search-pros-bg.png')) center no-repeat; background-size: cover;">

    <div class="search-inner bg-white">

        @include( 'components.section-heading', [ 'heading' => 'SEARCH OUR EXPERIENCE' ] )

        @include( 'partials.experience.search-filters-form' )

    </div>
</div>

@include('partials.experience.featured-blocks')
