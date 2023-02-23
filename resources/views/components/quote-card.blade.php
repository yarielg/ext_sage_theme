<div class="quote-card col">
    <div class="quote-card--container quote-card--color-{{ $color_scheme }}">
        @isset( $image )
            <img src="{{ $image }}" class="quote-card--image">
        @endisset

        <div class="quote-card--content">
            <div class="quote-icon">
                <img src="@asset('images/icons/quote.png')" class="img-fluid">
            </div>
            
            @isset( $title )
                <h4 class="card-title">{{ $title }}</h4>
            @endisset
            
            @isset( $subtitle )
                <h3 class="card-subtitle">{{ $subtitle }}</h3>
            @endisset
            
            <div class="card-body px-0">
                @isset( $paragraph )
                    <p>{{ $paragraph }}</p>
                @endisset

                @if ( isset( $link ) && is_array( $link ) )
                    <a href="{{ $link['url'] }}" class="btn btn-link p-0 fw-bold">{{ $link['title'] }}</a>
                @endif
            </div>
            
        </div>
    </div>
</div>
