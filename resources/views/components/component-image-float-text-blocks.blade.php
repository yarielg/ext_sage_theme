<div class="container-fluid component-image-float-text-blocks section-6 py-7 image-float-text--color-{{ $color_scheme }}" style="background: url( '{{ $background_image }}' ) center no-repeat; background-size: cover;">
    <div class="row justify-content-end">
        <div class="col col-lg-7 p-4 p-lg-6">
            @foreach ( $blocks as $block )
                <div class="image-float-text-block" style="max-width: 640px;">
                    @include( 'components.component-text-block', [ 
                        'heading'   => $block['heading'],
                        'content'   => $block['content'],
                        'link'      => $block['link']
                    ])
                </div>
            @endforeach
        </div>
    </div>
</div>
