<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class ExperienceSearchFilters extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'partials/experience/search-filters-form'
    ];


    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'filter_service_options' => $this->getServicesFilterList(),
            'filter_client_type_options' => $this->getClientTypeFilterList(),
            'filter_professional_options' => $this->getProfessionalsFilterList(),
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


    /**
     * Filter Option: Related Services
     *
     * Gets the related services posts for experience, and then  
     * saves the results in a WP Transient for loading next time.
     *
     * https://developer.wordpress.org/apis/handbook/transients/
     * 
     * @return array
     */
    public function getServicesFilterList() 
    {

        // delete_transient( 'experience_services_query' );

        // Get any existing copy of our transient data
        if ( false === ( $services = get_transient( 'experience_services_query' ) ) ) :
            
            // It wasn't there, so regenerate the data and save the transient
            
        //     // Get ALL Experiences that have a related Service
        //     $experiences = get_posts(
        //         array(
        //             'posts_per_page' => -1,
        //             'post_type' => 'experience',
        //             'meta_query'     => array(
        //                 'relation' => 'AND',
        //                 array(
        //                     'key'     => 'experience_services',
        //                     'compare' => 'EXISTS',
        //                 ),
        //             ),
        //         )
        //     );

        //     // Init array for later
        //     $services = [];

        //     if ( $experiences ) :

        //         // For each Experience, get all the Services
        //         foreach ( $experiences as $exp ) : 
                    
        //             $serv_exps = get_field( 'experience_services', $exp->ID );

        //             if ( $serv_exps ) :
        //                 // For each published service, add them to an array
        //                 foreach( $serv_exps as $service ) :
        //                     if ( get_post_status( $service->ID ) === 'publish' ) : 
        //                         $services[] = $service;
        //                     endif;
        //                 endforeach;
        //             endif;

        //         endforeach;

        //     endif;
            

            // TEMP: QUICK SEARCH
            $services = get_posts(
                array(
                    'posts_per_page' => -1,
                    'post_type' => 'services',
                    'post_parent' => 0,
                )
            );


            if ( ! empty( $services ) ) :

                // De-dupe the array of services objects
                $services = array_unique( $services, SORT_REGULAR );

                // Sort the array of objects by the 'service_name' field
                App::sortArryOfObjectsOnField( $services, 'service_name' );

                // Cache all this madness for 12 hours...
                // https://codex.wordpress.org/Transients_API
                set_transient( 'experience_services_query', $services, 12 * HOUR_IN_SECONDS );

            endif;
        
        endif;

        return $services;
    }


    /**
     * Filter Option: Client Types
     *
     * Gets the terms for the 'client-types' taxonomy.
     * 
     * @return array
     */
    public function getClientTypeFilterList() 
    {
        return get_terms( 
            array(
                'taxonomy' => 'client-types',
                'hide_empty' => false,
            ) 
        );
    }


    /**
     * Filter Option: Related Professionals
     *
     * Gets the related professional posts for experience, and then  
     * saves the results in a WP Transient for loading next time.
     *
     * https://developer.wordpress.org/apis/handbook/transients/
     * 
     * @return array
     */
    public function getProfessionalsFilterList() 
    {

        // delete_transient( 'experience_professionals_query' );

         // Get any existing copy of our transient data
        if ( false === ( $professionals = get_transient( 'experience_professionals_query' ) ) ) :
            
            // It wasn't there, so regenerate the data and save the transient
             
            // Get ALL Experiences that have a related Professional
            // $experience = get_posts(
            //     array(
            //         'posts_per_page' => -1,
            //         'post_type' => 'experience',
            //         'meta_query'     => array(
            //             'relation' => 'AND',
            //             array(
            //                 'key'     => 'experience_professionals',
            //                 'compare' => 'EXISTS',
            //             ),
            //         ),
            //     )
            // );

            // // Init array for later
            // $professionals = [];

            // // For each Experience, get all the Professionals
            // foreach ($experience as $exp) : 
            //     $exp_pros = get_field('experience_professionals', $exp->ID);

            //     if ( $exp_pros ) : 
            //         // For each published professional, add them to an array
            //         foreach($exp_pros as $pro) :
            //             if (get_post_status( $pro->ID ) === 'publish') : 
            //                 $professionals[] = $pro;
            //             endif;
            //         endforeach;
            //     endif;

            // endforeach;
            

            // TEMP: QUICK SEARCH
            $professionals = get_posts(
                array(
                    'posts_per_page' => -1,
                    'post_type' => 'professionals',
                )
            ); 
            

            if ( ! empty( $professionals ) ) :

                // De-dupe the array of professional objects
                $professionals = array_unique($professionals, SORT_REGULAR);

                // Sort the array of objects by the 'last_name' field
                App::sortArryOfObjectsOnField($professionals, 'last_name');

                // Cache all this madness for 12 hours...
                // https://codex.wordpress.org/Transients_API
                set_transient( 'experience_professionals_query', $professionals, 12 * HOUR_IN_SECONDS );

            endif;
        
        endif;

        $data = array();

        foreach ($professionals as $professional) :
            $data[] = [
                'id'    => $professional->ID,
                'name'  => Professionals::getFullname( $professional->ID ),
            ];
        endforeach;

        return $data;
    }

}
