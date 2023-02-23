<div class="container-fluid cta-banner cta-banner--color-scheme-{{ $color_scheme ?? 'gold' }}">
    @if ( isset( $link ) && is_array( $link ) )
        <a href="{{ $link['url'] }}" class="cta-banner-btn">
    @endif

    {{ $content }} 

    @if ( isset( $link ) && is_array( $link ) )
        <i class="fa-solid fa-chevron-right"></i></a>
    @endif
</div>
