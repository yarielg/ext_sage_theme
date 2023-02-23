<div class="container-fluid section-7 py-5 py-md-7" style="background: url( @asset('images/p1/s-7.png') ) center no-repeat; background-size: 100% auto;">

    <div class="container">

        <div class="row">
            <div class="col text-center">
                @include( 'components.component-text-block', [ 
                    'heading' => $blogs['heading'],
                    'content' => $blogs['text']
                ])
            </div>
        </div>

        <div class="row">

            @isset($blogs['blogs'])
                @foreach ($blogs['blogs'] as $blog)
                    <div class="col-12 col-lg blog-category-boxes">
                        @include('components.image-link', [
                            'text' => $blog['name'],
                            'description' => $blog['description'],
                            'image' => $blog['image'],
                            'link' => $blog['url'] ?: null
                        ])
                    </div>
                @endforeach
            @endisset

        </div>

    </div>

</div>
