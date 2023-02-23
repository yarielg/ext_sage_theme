<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Home extends Composer
{

    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'template-home',
        'pages/page-home'
    ];


    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'featured_blocks'   => $this->getFeaturedBlocks(),
            'blue_banner'       => $this->getBlueBanner(),
            'guide'             => $this->getGuide(),
            'work_with_us'      => $this->getWorkWithUs(),
            'pro_bono'          => $this->getProBono(),
            'blogs'             => $this->getBlogs()
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
        $boxes = array();

        for ( $i = 1; $i < 6; $i++ ) :
            $data = get_field('featured_box_' . $i, get_the_ID());

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


    public function getBlueBanner()
    {
        $data = array();

        $data['title'] = get_field('blue_banner_title');
        $data['text'] = get_field('blue_banner_text');
        $data['button'] = get_field('blue_banner_button_text');
        $data['link'] = get_field('blue_banner_button_link');

        return $data;
    }


    public function getGuide()
    {
        $data = array();

        $data['heading'] = get_field('guide_heading');
        $data['text'] = get_field('guide_text');
        $data['blocks'] = get_field('guide_blocks');

        return $data;
    }


    public function getWorkWithUs()
    {
        $data = array();

        $data['heading'] = get_field('work_with_us_heading');
        $data['text'] = get_field('work_with_us_text');
        $data['button'] = get_field('work_with_us_button_text');
        $data['link'] = get_field('work_with_us_button_url');
        $data['image'] = get_field('work_with_us_image');

        return $data;
    }


    public function getProBono()
    {
        $data = array();

        $data['heading_1'] = get_field('pro_bono_heading_1');
        $data['text_1'] = get_field('pro_bono_text_block_1');
        $data['button_1'] = get_field('pro_bono_button_text_1');
        $data['link_1'] = get_field('pro_bono_button_url_1');

        $data['heading_2'] = get_field('pro_bono_heading_block_2');
        $data['text_2'] = get_field('pro_bono_text_block_2');
        $data['button_2'] = get_field('pro_bono_button_text_2');
        $data['link_2'] = get_field('pro_bono_button_url_2');

        $data['image'] = get_field('pro_bono_image');

        return $data;
    }


    public function getBlogs()
    {
        $data = array();

        $data['heading'] = get_field('blogs_heading');
        $data['text'] = get_field('blogs_description');
        $data['blogs'] = get_field('blogs');

        return $data;
    }

}
