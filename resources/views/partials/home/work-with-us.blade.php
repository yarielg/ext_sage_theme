{{-- THIS IS DUPLICATE OF THE NEW TEXT-IMAGE-COLUMNS COMPONENT --}}
<div class="text-image-columns container-fluid">
    <div class="container">
        <div class="row">
            <div class="col col-lg-7">
                <div class="text-image-columns--text">
                    @include( 'components.component-text-block', [ 
                        'heading' => $work_with_us['heading'],
                        'content' => $work_with_us['text'],
                        'link' => array( 
                            'title' => $work_with_us['button'], 
                            'url' => $work_with_us['link']
                        )
                    ])
                </div>
            </div>
        </div>
    </div>
    <div class="text-image-columns--image col col-lg-5" style="background-image: url( {{ $work_with_us['image'] }} );"></div>
</div>
