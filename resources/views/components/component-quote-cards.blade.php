@isset( $cards )
<div class="container-fluid component-quote-cards">

    @include( 'components.section-heading', [ 'heading' => $heading, 'classes' => 'text-center' ] )

    <div class="container">

        <div class="row pb-4 pb-lg-8 gx-4">
            @foreach($cards as $card)
                
                @include('components.quote-card', [
                    'color_scheme'  => $card['color_scheme'],
                    'image'         => $card['image'],
                    'title'         => $card['small_heading'],
                    'subtitle'      => $card['heading'],
                    'paragraph'     => $card['content'],
                    'link'          => $card['link']
                ])
                
            @endforeach
        </div>
        
    </div>
</div>
@endisset
