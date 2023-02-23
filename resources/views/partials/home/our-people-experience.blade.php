<div class="container-fluid banner our-people-banner section-3 py-6 py-md-8 bg-secondary text-white" style="position: relative; background: #199ad6;">
    <div class="our-people-banner--background" style="position: absolute; top: 0; right: 0; left: 0; bottom: 0; width: 100%; height: 100%; opacity: 0.3; background: url( @asset('images/p1/s-3.png') ) center repeat; background-size: cover;"></div>
    <div class="container" style="position: relative;">
        <div class="row">
            <div class="col">
                @include( 'components.component-text-block', [ 
                    'heading_class' => 'pt-0',
                    'heading' => $blue_banner['title'],
                    'content' => $blue_banner['text'],
                    'link' => array( 
                        'title' => $blue_banner['button'], 
                        'url' => $blue_banner['link']
                    )
                ])
            </div>
        </div>
    </div>

</div>
