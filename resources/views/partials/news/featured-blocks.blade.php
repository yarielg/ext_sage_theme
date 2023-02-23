@isset ( $featured_blocks )
    <div class="container-fluid section-10 pt-8 pb-5 pb-sm-3" style="background: url( @asset('images/p1/s-2.png') ) center no-repeat; background-size: 100% auto;">

        @include( 'components.section-heading', [ 'heading' => 'TEAM UPDATES', 'classes' => 'text-center'] )

        <div class="container">
            <div class="row pb-4 gx-4">
                @for ($i = 1; $i < 3; $i++)
                    <div class="col mb-3 mb-lg-0">
                        @include('components.feature-card', [
                            'color'         => $featured_blocks[$i]['color'],
                            'heading'       => $featured_blocks[$i]['heading'],
                            'title'         => $featured_blocks[$i]['title'],
                            'link_text'     => $featured_blocks[$i]['link_text'],
                            'link_url'      => $featured_blocks[$i]['link_url']
                        ])
                    </div>
                @endfor
            </div>

            <div class="row pb-8 gx-4">
                @for ($i = 3; $i < 6; $i++)
                    <div class="col mb-3 mb-lg-0">
                        @include('components.feature-card', [
                            'color'         => $featured_blocks[$i]['color'],
                            'heading'       => $featured_blocks[$i]['heading'],
                            'title'         => $featured_blocks[$i]['title'],
                            'link_text'     => $featured_blocks[$i]['link_text'],
                            'link_url'      => $featured_blocks[$i]['link_url']
                        ])
                    </div>
                @endfor
            </div>
        </div>

    </div>
@endisset
