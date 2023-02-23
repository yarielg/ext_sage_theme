<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class ProfessionalsPage extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'pages/page-professionals',
        'partials/professionals/featured-blocks'
    ];


    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'featured_blocks' => $this->getFeaturedBlocks()
        ];
    }


    /**
     * Data to be passed to view before rendering, but after merging.
     *
     * @return array
     */
    public function override()
    {
        return [];
    }


    public function getFeaturedBlocks()
    {
        global $post;

        $boxes = array();

        for ( $i = 1; $i < 4; $i++ ) :
            $data = get_field('pro_featured_box_' . $i, $post->ID);

            $boxes[$i]['heading'] = $data['box_heading'];
            $boxes[$i]['color'] = $data['color_scheme'];

            // If Box Type is "Custom," then use the Custom Title...
            if ($data['box_type'] == 'custom') :
                $boxes[$i]['title'] = $data['custom_options']['custom_title'];
                $boxes[$i]['link_text'] = $data['custom_options']['custom_button_text'];
                $boxes[$i]['link_url'] = $data['custom_options']['custom_button_link'];

            else :
                // If a Box Type is "Post," then check if there is a Customized Title...
                if ($data['post_options']['customize_title_option']) :
                    $boxes[$i]['title'] = $data['post_options']['custom_title'];
                    
                // Else, just use the Post's Title...
                else :
                    $boxes[$i]['title'] = $data['post_options']['post_' . $data['box_type']]->post_title;
                endif;

                $boxes[$i]['link_text'] = "Read";
                $boxes[$i]['link_url'] = get_the_permalink( $data['post_options']['post_' . $data['box_type']]->ID );
            endif;

        endfor;

        return $boxes;
    }

}
