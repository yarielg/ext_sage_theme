<div class="capability col col-md-4">
      <button class="accordion-button service-tile image-accordion @isset( $class ){{ $class }}@endisset" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $id }}" aria-expanded="false" aria-controls="collapse{{ $id }}" style="background: url( @if ( isset( $image ) ) {{ $image }} @else @asset( "images/elements/grid-1.png" ) @endif ) center no-repeat; background-size: cover;">
      <div class="service-tile-overlay"></div>
      @isset( $text )
          <h5 class="image-text fw-bold pe-3">{!! $text !!}</h5>
          <span class="image-icon"></span>
      @endisset
  </button>
</div>
