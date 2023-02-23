
<style>
    .search-inner {
        border: solid 20px #000;
    }

    .news-search {
        box-shadow: none !important;
        border-bottom: none !important;
        padding-left: 0;
        padding-right: 0;
        width: 100%;
        margin-right: 0;
        margin-left: 0;
    }

    .news-search > .container {
        max-width: 100%;
        margin: 0;
        padding: 5px;
    }
</style>

@include('sections.page-header')

<div class="container-fluid py-5 @isset($class){{$class}}@endisset" style="background: url(@asset('images/elements/search-news-bg.png')) center no-repeat; background-size: 100% auto;">
    <div class="search-inner bg-white">
        
        @include( 'components.component-text-block', [ 'heading' => 'Search Our News and Insights' ] )

        @include('partials.news.search-filters-form')

    </div>
</div>

@include('components.component-cta-banner', [
    'content' => "SUBSCRIBE TO OUR NEWSLETTER",
    'link' => ['url' => '/subscribe']
])

@include('partials.news.featured-blocks')

@include('partials.news.blogs')
