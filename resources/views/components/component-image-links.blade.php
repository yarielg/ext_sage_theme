<div class="container-fluid component-image-links section-4 bg-dark text-white py-6 py-md-8">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg text-center">
                @include( 'components.component-text-block', [ 
                    'heading' => $heading,
                    'content' => $content
                ])
            </div>
        </div>

        <div class="row">

            @isset($blocks)
                @foreach($blocks as $block)
                    <div class="col-12 col-lg">
                        @include('components.image-link', [
                            'text'  => $block['text'],
                            'image' => $block['image'],
                            'link' => $block['link']
                        ])
                    </div>
                @endforeach
            @endisset

        </div>
    </div>
</div>
