<div class="container-fluid component-feature-cards section-10" @if (isset($background_image) && ! empty($background_image))style="background: url( {{ $background_image }} ) center no-repeat; background-size: cover;"@endif>

    @isset($heading)
        @include( 'components.section-heading', [ 'heading' => $heading, 'classes' => 'text-center' ] )
    @endisset

    <div class="container">
        <div class="row pb-8 gx-4">
            @foreach($cards as $card)
                <div class="col mb-3 mb-lg-0">
                    @include('components.feature-card', [
                        'color'     => $card['color_scheme'],
                        'heading'   => $card['heading'],
                        'title'     => $card['content']
                    ])
                </div>
            @endforeach
        </div>
    </div>

</div>
