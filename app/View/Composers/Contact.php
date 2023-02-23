<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Contact extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'pages/page-contact',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'locations'=>$this->locations()
        ];
    }

    public function locations() {

        $args = [
            'post_type' => 'locations'
        ];
        $locations = new \WP_Query($args);
       
        return $locations;
       
    }

    public static function getLocationPhoto($id) {
        $data = get_field('location_photo', $id);
        return $data['url'];
    }

   
}
