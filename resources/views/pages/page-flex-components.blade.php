
@include('sections.page-header', [
    'class' => 'banner--flex'
])

@if ( $components )
    @foreach ( $components as $component )

        {{-- Text --}}
        @if ( $component->layout == 'flex_text' )
            @include( 'components.component-single-column', [
                'heading'       => $component->heading,
                'sub_heading'   => $component->sub_heading,
                'content'       => $component->content,
                'link'          => $component->link
            ])

        {{-- Text, Multi-columns --}}
        @elseif ( $component->layout == 'flex_text_multi_columns' )
            @include( 'components.component-text-multi-columns', [
                'heading'                   => $component->heading,
                'description'               => $component->description,
                'columns'                   => $component->columns,
                'background_image'          => $component->background_image,
                'background_image_opacity'  => $component->background_image_opacity,
                'background_image_style'    => $component->background_image_style,
            ])

        {{-- Accordions --}}
        @elseif ( $component->layout == 'flex_accordions' )
            @include( 'components.component-accordions', [
                'heading'       => $component->heading,
                'field_index'   => $component->field_index,
                'description'   => $component->description,
                'accordions'    => $component->accordions
            ])

        {{-- Embed Video Player --}}
        @elseif ( $component->layout == 'flex_embed_player' )
            @include( 'components.component-embed-player', [
                'embed' => $component->embed,
            ])

        {{-- Quote Cards --}}
        @elseif ( $component->layout == 'flex_quote_cards' )
            @include( 'components.component-quote-cards', [
                'heading' => $component->heading,
                'cards' => $component->cards
            ])

        {{-- Quote Banner --}}
        @elseif ( $component->layout == 'flex_quote_banner' )
            @include( 'components.component-quote-banner', [
                'content' => $component->content,
                'source' => $component->source,
                'source_attribute' => $component->source_attribute,
                'background_image' => $component->background_image,
                'background_image_opacity' => $component->background_image_opacity
            ])

        {{-- Feature Cards --}}
        @elseif ( $component->layout == 'flex_feature_cards' )
            @include( 'components.component-feature-cards', [
                'heading' => $component->heading,
                'cards' => $component->cards
            ])

        {{-- Image Links --}}
        @elseif ( $component->layout == 'flex_image_links' )
            @include( 'components.component-image-links', [
                'heading' => $component->heading,
                'content' => $component->content,
                'blocks' => $component->blocks
            ])

        {{-- Text, Image Columns --}}
        @elseif ( $component->layout == 'flex_text_image_columns' )
            @include( 'components.component-text-image-columns', [
                'heading'   => $component->heading,
                'content'   => $component->content,
                'link'      => $component->link,
                'image'     => $component->image
            ])

        {{-- Grid Blocks --}}
        @elseif ( $component->layout == 'flex_grid_blocks' )
            @include( 'components.component-grid-blocks', [
                'heading'           => $component->heading,
                'content'           => $component->content,
                'blocks'            => $component->blocks,
                'background_image'  => $component->background_image
            ])

        {{-- CTA Banner --}}
        @elseif ( $component->layout == 'flex_cta_banner' )
            @include( 'components.component-cta-banner', [
                'content'       => $component->content,
                'link'          => $component->link,
                'color_scheme'  => $component->color_scheme
            ])

        {{-- Image, Floating Text Blocks --}}
        @elseif ( $component->layout == 'flex_image_float_text_blocks' )
            @include( 'components.component-image-float-text-blocks', [
                'background_image'  => $component->background_image,
                'blocks'            => $component->blocks,
                'color_scheme'      => $component->color_scheme
            ])

        @endif
    @endforeach
@endif
