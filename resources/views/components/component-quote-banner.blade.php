<div class="container-fluid component-quote-banner @isset( $class ){{ $class }}@endisset">

@if ( isset( $background_image ) && ! empty( $background_image ) )
    <div class="background-overlay" style="background-image: url('{{ $background_image }}'); opacity: {{ $background_image_opacity }};"></div>
@endif

    <div class="container quote-content py-8">
        @isset( $content )
            <h3 class="quote">{{ $content }}</h3>
        @endisset
        
        @isset( $source )
            <h5 class="quote-author">{!! $source !!}</h5>
        @endisset
        
        @isset( $source_attribute )
            <h5 class="quote-title">{!! $source_attribute !!}</h5>
        @endisset
    </div>
</div>
