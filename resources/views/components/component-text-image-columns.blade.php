<div class="component-text-image-columns text-image-columns container-fluid">
    <div class="container">
        <div class="row">
            <div class="col col-lg-7">
                <div class="text-image-columns--text">
                    @include( 'components.component-text-block', [ 
                        'heading'   => $component->heading,
                        'content'   => $component->content,
                        'link'      => $component->link
                    ])
                </div>
            </div>
        </div>
    </div>
    <div class="text-image-columns--image col col-lg-5" style="background-image: url( {{ $image }} );"></div>
</div>
