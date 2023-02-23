<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class CapabilitiesPage extends Composer
{

    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'pages/page-capabilities',
    ];


    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
           'services' => $this->services(),
           'industries' => $this->industries()
        ];
    }


    public function services() 
    {
        $args = [
            'posts_per_page' => -1,
            'post_type' => 'services',
            'meta_key' => 'service_name',
            'orderby' => 'meta_value',
            'order' => 'ASC',
            'post_parent' => 0,
        ];

         $services = get_posts( $args ); 

         foreach ( $services as $serv ) {

            $args = array(
                'posts_per_page' => -1,
                'post_type' => 'services',
                'meta_key' => 'service_name',
                'orderby' => 'meta_value',
                'order' => 'ASC',
                'post_parent' => $serv->ID,
            );

            $sub_services = get_posts( $args ); 

            $serv->subServices = $sub_services;
            $serv->name = get_field('service_name', $serv->ID);
            $serv->summary = get_field('service_summary', $serv->ID);

            $image = get_field('service_hero', $serv->ID);
            $serv->image = ( $image ) ? $image['url'] : null;
         }

         return $services;
    }


    public function industries() 
    {
        $args = [
            'posts_per_page' => -1,
            'post_type' => 'industries',
            'meta_key' => 'industry_name',
            'orderby' => 'meta_value',
            'order' => 'ASC',
            'post_parent' => 0,
        ];

         $industries = get_posts( $args ); 

         foreach ( $industries as $industry ) :
            $industry->name = get_field('industry_name', $industry->ID);
            $industry->summary = get_field('industry_summary', $industry->ID);

            $image = get_field('industry_hero', $industry->ID);
            $industry->image = ( $image ) ? $image['url'] : null;
         endforeach;

         return $industries;
    }

}
