{{-- <div class="container-fluid section-1 py-5 s-1 banner banner--home" style="background: url( @asset('images/p1/s-1.png') ) center no-repeat; background-size: cover;">
    <div class="container text-white">
        @include('components.banner-piece', [
            'bannerTitle'   => $header['page_title'],
            'bannerText'    => $header['page_description']
        ])
    </div>
</div> --}}

@include('sections.page-header', [
  'class' => 'banner--home'
])

@include('partials.home.featured-blocks')

@include('partials.home.our-people-experience')

@include('partials.home.guide')

@include('partials.home.work-with-us')

@include('partials.home.pro-bono')

@include('partials.home.blogs')
