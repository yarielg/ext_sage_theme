<div class="container-fluid section-9 py-7" style="background: url( @asset('images/p1/s-2.png') ) center; background-size: contain;">

    <div class="container">

        <div class="row">
            <div class="col text-center">
                @include( 'components.component-text-block', [ 'heading' => 'Read Our Blogs' ] )
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg pb-6 pb-lg-0 blog-category-boxes">
                @include('partials.news.blog-highlight-card', [
                    'text' => 'HR Law Talk',
                    'image' => 'p1/s-7-1.png',
                    'button' => 'Visit Blog'
                ])
            </div>

            <div class="col-12 col-lg pb-6 pb-lg-0 blog-category-boxes">
                @include('partials.news.blog-highlight-card', [
                    'text' => 'GOVCON & TRADE',
                    'image' => 'p1/s-7-2.png',
                    'button' => 'Visit Blog'
                ])
            </div>

            <div class="col-12 col-lg pb-6 pb-lg-0 blog-category-boxes">
                @include('partials.news.blog-highlight-card', [
                    'text' => 'Inside The FCA',
                    'image' => 'p1/s-7-3.png',
                    'button' => 'Visit Blog'
                ])
            </div>

            <div class="col-12 col-lg blog-category-boxes">
                @include('partials.news.blog-highlight-card', [
                    'text' => 'SECURITIES LAW EXCHANGE',
                    'image' => 'p1/s-7-4.png',
                    'button' => 'Visit Blog'
                ])
            </div>

        </div>
    </div>

</div>
