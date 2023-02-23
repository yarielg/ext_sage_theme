<div class="component-text-block @isset( $class ){{ $class }}@endisset">
    <h2 class="component-text-block--heading banner-title @isset( $heading_class ){{ $heading_class }}@endisset wow animate__fadeInDown">{!! $heading !!}</h2>

    @isset( $sub_heading )
        <div class="component-text-block--sub-heading banner-sub wow animate__fadeInDown">{!! $sub_heading !!}</div>
    @endisset

    @if ( isset( $content ) && ! empty( $content ) )
        <div class="component-text-block--content banner-text wow animate__fadeInUp">{!! $content !!}</div>
    @endif

    @if ( isset( $link ) && is_array( $link ) )
        <a href="{{ $link['url'] }}" type="button" class="btn btn-lg banner-btn wow animate__fadeIn" data-wow-delay="0.75s">{!! $link['title'] !!}</a>
    @endif
</div>
