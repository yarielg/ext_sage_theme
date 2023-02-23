<!-- <div class="container-fluid section-6 py-7" @isset($pro_bono['image'])style="background: url( {!! $pro_bono['image'] !!} ) center no-repeat; background-size: cover;"@endisset> -->

<div class="container-fluid section-6 py-7" style="background: url( @asset('images/p1/s-6.png') ) center no-repeat; background-size: cover;">
    <div class="row justify-content-end">
        <div class="col col-lg-7 p-4 p-lg-6">
            <div class="mb-7" style="max-width: 640px;">
                @include( 'components.component-text-block', [ 
                    'heading' => $pro_bono['heading_1'],
                    'content' => $pro_bono['text_1'],
                    'link' => array(
                        'title' => $pro_bono['button_1'],
                        'url' => $pro_bono['link_1']
                    )
                ])
            </div>
            <div style="max-width: 640px;">
                @include( 'components.component-text-block', [ 
                    'heading' => $pro_bono['heading_2'],
                    'content' => $pro_bono['text_2'],
                    'link' => array(
                        'title' => $pro_bono['button_2'],
                        'url' => $pro_bono['link_2']
                    )
                ])
            </div>
        </div>
    </div>
</div>
