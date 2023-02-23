<div class="featured-block @isset( $color )featured-block--color-scheme-{{ $color }}@endisset">
    @isset( $link_url )<a href="{{ $link_url }}">@endisset
    
    <div class="featured-block--content">
        <div class="featured-block--heading wow animate__fadeInDown">
            @isset( $heading )<h4>{{ $heading }}</h4>@endisset
        </div>

        <div class="featured-block--body wow animate__fadeInUp">
            @isset( $title )<p>{{ $title }}</p>@endisset
            
            @isset( $link_url )
                <div class="btn btn-link wow animate__fadeIn">
                    {{ $link_text }}
                </div>
            @endisset
        </div>
    </div>

    @isset( $link_url )</a>@endisset
</div>
