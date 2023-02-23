<div 
    class="container-fluid hero banner py-5 @isset( $page_color_scheme ){{ $page_color_scheme }}@endisset @isset( $class ){{ $class }}@endisset" 
     @isset( $page_hero )
        style="background-image: url({!! $page_hero !!});"
     @endisset
>
    <div class="hero-slice"></div>
    <div class="hero-overlay" @isset( $page_hero_image_opacity )style="opacity: {{ $page_hero_image_opacity }}"@endisset></div>

    <div class="container hero-content">

        @include('components.component-text-block', [
            'class' => null,
            'heading' => ( $page_header ?? null ),
            'sub_heading' => ( $page_sub_heading ?? null ),
            'content' => ( $page_description ?? null ),
            'link' => ( $page_link ?? null ),
        ])

    </div>
</div>
