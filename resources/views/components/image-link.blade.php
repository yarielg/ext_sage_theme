<a href="{!! $link !!}" class="image-link @isset( $description ) image-link--with-description @endisset @isset( $class ){{ $class }}@endisset" @isset( $image )style="background: url( '{!! $image !!}' ) center no-repeat; background-size: cover;"@endisset>
    <div class="image-link--overlay">
        @isset( $text )
            <span class="image-link--text">{!! $text !!}</span>
        @endisset
        
        @isset( $description )
            <div class="image-link--info">
                <h5 class="image-link--title">{!! $text !!}</h5>
                <div class="image-link--description">
                    {!! $description !!}
                </div>
                <div class="btn">Read More</div>
            </div>
        @endisset
    </div>
</a>
