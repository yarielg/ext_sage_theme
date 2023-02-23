<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class FlexComponentsPage extends Composer
{
    protected $acf = true;

    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'pages/page-flex-components',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'components' => $this->getComponents()
        ];
    }


    public function getComponents()
    {
        $components = get_field('flex_components');

        $data = [];

        if ( $components ) :
            foreach ( $components as $key => $component ) :
                
                // - - - Text - - -
                if ( $component['acf_fc_layout'] == 'flex_text') :
                    $this_component = (object) [
                        'layout'    => $component['acf_fc_layout'],
                        'heading'       => $component['heading'],
                        'sub_heading'   => $component['sub_heading'],
                        'content'       => $component['content'],
                        'link'          => $component['link']
                    ];
                    array_push( $data, $this_component );

                // - - - Text, Multi-column - - -
                elseif ( $component['acf_fc_layout'] == 'flex_text_multi_columns') :
                    $this_component = (object) [
                        'layout'                    => $component['acf_fc_layout'],
                        'heading'                   => $component['heading'],
                        'description'               => $component['description'],
                        'columns'                   => $component['columns'],
                        'background_image'          => $component['background_image'],
                        'background_image_opacity'  => $component['background_image_opacity'],
                        'background_image_style'    => $component['background_image_style']
                    ];
                    array_push( $data, $this_component );

                // - - - Accordions - - -
                elseif ( $component['acf_fc_layout'] == 'flex_accordions') :
                    $this_component = (object) [
                        'layout'        => $component['acf_fc_layout'],
                        'field_index'   => $key,
                        'heading'       => $component['heading'],
                        'description'   => $component['description'],
                        'accordions'    => $component['accordions'],
                    ];
                    array_push( $data, $this_component );

                // - - - Embed Player - - -
                elseif ( $component['acf_fc_layout'] == 'flex_embed_player') :
                    $this_component = (object) [
                        'layout'  => $component['acf_fc_layout'],
                        'embed'   => $component['embed'],
                    ];
                    array_push( $data, $this_component );

                // - - - Quote Cards - - -
                elseif ( $component['acf_fc_layout'] == 'flex_quote_cards') :
                    $this_component = (object) [
                        'layout'    => $component['acf_fc_layout'],
                        'heading'   => $component['heading'],
                        'cards'     => $component['cards'],
                    ];
                    array_push( $data, $this_component );

                // - - - Quote Banner - - -
                elseif ( $component['acf_fc_layout'] == 'flex_quote_banner') :
                    $this_component = (object) [
                        'layout'                    => $component['acf_fc_layout'],
                        'content'                   => $component['content'],
                        'source'                    => $component['source'],
                        'source_attribute'          => $component['source_attribute'],
                        'background_image'          => $component['background_image'],
                        'background_image_opacity'  => $component['background_image_opacity']
                    ];
                    array_push( $data, $this_component );

                // - - - Feature Cards - - -
                elseif ( $component['acf_fc_layout'] == 'flex_feature_cards') :
                    $this_component = (object) [
                        'layout'    => $component['acf_fc_layout'],
                        'heading'   => $component['heading'],
                        'cards'     => $component['cards'],
                    ];
                    array_push( $data, $this_component );

                // - - - Image Links - - -
                elseif ( $component['acf_fc_layout'] == 'flex_image_links') :
                    $this_component = (object) [
                        'layout'    => $component['acf_fc_layout'],
                        'heading'   => $component['heading'],
                        'content'   => $component['content'],
                        'blocks'    => $component['blocks'],
                    ];
                    array_push( $data, $this_component );

                // - - - Image Text Columns - - -
                elseif ( $component['acf_fc_layout'] == 'flex_text_image_columns') :
                    $this_component = (object) [
                        'layout'    => $component['acf_fc_layout'],
                        'heading'   => $component['heading'],
                        'content'   => $component['content'],
                        'link'      => $component['link'],
                        'image'     => $component['image']
                    ];
                    array_push( $data, $this_component );

                // - - - Grid Blocks - - -
                elseif ( $component['acf_fc_layout'] == 'flex_grid_blocks') :
                    $this_component = (object) [
                        'layout'            => $component['acf_fc_layout'],
                        'heading'           => $component['heading'],
                        'content'           => $component['content'],
                        'blocks'            => $component['blocks'],
                        'background_image'  => $component['background_image']
                    ];
                    array_push( $data, $this_component );

                // - - - CTA Banner - - -
                elseif ( $component['acf_fc_layout'] == 'flex_cta_banner') :
                    $this_component = (object) [
                        'layout'        => $component['acf_fc_layout'],
                        'content'       => $component['content'],
                        'link'          => $component['link'],
                        'color_scheme'  => $component['color_scheme']
                    ];
                    array_push( $data, $this_component );

                // - - - Image, Float Text Blocks - - -
                elseif ( $component['acf_fc_layout'] == 'flex_image_float_text_blocks') :
                    $this_component = (object) [
                        'layout'            => $component['acf_fc_layout'],
                        'background_image'  => $component['background_image'],
                        'color_scheme'      => $component['color_scheme'],
                        'blocks'            => $component['blocks']
                    ];
                    array_push( $data, $this_component );


                endif;

            endforeach;

            $data = (object) $data;

        endif;

        return $data;
    }
   
}
