<div class="container-fluid component-grid-blocks py-5 py-md-8" @isset( $background_image )style="background: url( {{ $background_image }} ) center no-repeat; background-size: cover;"@endisset>

    <div class="container pt-4">
        <div class="row">
            <div class="col text-center">
                @include('components.component-text-block', [
                    'heading' => $heading,
                    'content' => $content
                ])
            </div>
        </div>

        @isset( $blocks )
            <div class="row row-cols-1 row-cols-lg-2 g-4 mt-4">
                @foreach ($blocks as $block)
                    <div class="col">
                        <div class="grid-block grid-block--color-scheme-{{ $block['color_scheme'] }}">
                            <h2>{{ $block['content'] }}</h2>
                        </div>
                    </div>
                @endforeach
            </div>
        @endisset

    </div>
</div>
