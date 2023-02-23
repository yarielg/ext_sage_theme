<div class="component-single-column container">
    <div class="row">
        <div class="col px-lg-6">
            <div class="single-column @isset( $class ){{ $class }}@endisset">
                @include( 'components.component-text-block', [
                    'heading'       => $component->heading,
                    'sub_heading'   => $component->sub_heading,
                    'content'       => $component->content,
                    'link'          => $component->link
                ])
            </div>
        </div>
    </div>
</div>
