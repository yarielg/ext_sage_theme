<div class="container-fluid py-5 @isset($class){{$class}}@endisset" style="background: url(@asset('images/elements/search-news-bg.png')) center no-repeat; background-size: 100% auto;">
  <div class="search-inner bg-white">

    @include( 'components.component-text-block', [ 'heading' => 'Search Our News & Insights' ] )

    @include('forms.search-news')

  </div>
</div>
