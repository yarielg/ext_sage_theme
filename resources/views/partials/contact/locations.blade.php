<div class="container-fluid section-7 section-locations pb-sm-4 py-8" style="background: url( @asset('images/p1/s-7.png') ) center repeat; background-size: 80% auto;">

    <div class="container">
        <div class="row">
            <div class="col text-center">
                @include( 'components.component-text-block', [ 'heading' => 'Locations' ] )
            </div>
        </div>

        <div class="row row-cols-1 row-cols-lg-4">
            @if ( $locations )
                @foreach( $locations->posts as $loc ) 
                    <div class="col mb-3 mb-lg-0">
                        @include( 'partials.contact.locations-card', [ 'location' => $loc ] )
                    </div>
                @endforeach
            @endif
        </div>
    </div>

</div>
