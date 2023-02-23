<div class="container-fluid timeline-piece text-white @isset( $class ){{ $class }}@endisset" id="list-item-{!! $year !!}" style="background: url( @if(! is_null($bgImage)) @asset('images/' . $bgImage) @else @asset('images/p1/s-1.png') @endif ) center no-repeat; background-size: cover;">
    
    <div class="container">
        @isset( $year )
            <h5>{{ $year }}</h5>
        @endisset
        
        @isset( $title )
            <h1>{{ $title }}</h1>
        @endisset
        
        @isset( $subtitle )
            <h3>{{ $subtitle }}</h3>
        @endisset

        @isset( $paragraph )
            <p>{!! $paragraph !!}</p>
        @endisset
        
        @isset( $button )
            <button href="#" class="btn btn-lg timeline-btn">{{ $button }}</button>
        @endisset

        @isset( $arrow )
            <span class="time-arrow">
                <img src="@asset('images/' . $arrow)" class="img-fluid">
            </span>
        @endisset
    </div>

{{-- 
Note: the closing `</div>` tag for `container-fluid timeline-piece` is on `page-timeline.blade.php`...
</div> 
--}}
