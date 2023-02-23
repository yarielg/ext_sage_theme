@isset ( $featured_blocks )
    <div class="container-fluid section-10 pt-8 pb-5 pb-sm-3" style="background: url( @asset('images/p1/s-2.png') ) center no-repeat; background-size: 100% auto;">

        @include( 'components.section-heading', [ 'heading' => 'TEAM UPDATES', 'classes' => 'text-center' ] )

        <div class="container">
            <div class="row pb-8 gx-4">
                @foreach ($featured_blocks as $block)
                    <div class="col mb-3 mb-lg-0">
                        @include('components.feature-card', [
                            'color'         => $block['color'],
                            'heading'       => $block['heading'],
                            'title'         => $block['title'],
                            'link_text'     => $block['link_text'],
                            'link_url'      => $block['link_url']
                        ])
                    </div>
                @endforeach
            </div>
        </div>

    </div>
@endisset
