<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class ExperienceSingle extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
       'single-experience',
       'partials/content-single-experience'
    ];


    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'related_professionals' => $this->relatedProfessionals(),
            'related_services' => $this->relatedServices(),
            'client_types' => $this->clientTypes(),
            'title' => $this->title()
        ];
    }


    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function override()
    {
        return [];
    }


    public function relatedProfessionals() {

        $professionals = get_field('experience_professionals', get_the_ID());

        if ( isset( $professionals ) && ! empty( $professionals ) ) :
            foreach ( $professionals as $professional ) :
                $professional->name = Professionals::getFullname( $professional->ID );
            endforeach;
        endif;

        return $professionals;
   }


   public function relatedServices()
    {
        $data = array();

        $services = get_field('experience_services');

        if ( isset( $services ) && ! empty( $services ) ) :
            foreach ( $services as $service ) :
                if ( $service->post_status == 'publish' ) :
                    $data[] = $service;
                endif;
            endforeach;
        endif;

        return $data;
    }

    public function title(){
        return get_the_title();
    }


    public function clientTypes()
    {
        return get_the_terms( get_the_ID(), 'client-types' );
    }

}
