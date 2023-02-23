<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class ProfessionalsSearchFilters extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'partials/professionals/search-filters-form'
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
            'filter_location_options' => $this->getLocationsFilterList(),
            'filter_school_options' => $this->getSchoolsFilterList(),
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
     * Gets the related services posts for professionals, and then  
     * saves the results in a WP Transient for loading next time.
     *
     * https://developer.wordpress.org/apis/handbook/transients/
     * 
     * @return array
     */
    public function getServicesFilterList()
    {
        // Get any existing copy of our transient data
        if ( false === ( $services = get_transient( 'professional_services_query' ) ) ) {
            // It wasn't there, so regenerate the data and save the transient
             
            // Get ALL Professionals that have a related Service
            $professionals = get_posts(
                array(
                    'posts_per_page' => -1,
                    'post_type' => 'professionals',
                    'meta_query'     => array(
                        'relation' => 'AND',
                        array(
                            'key'     => 'professional_services',
                            'compare' => 'EXISTS',
                        ),
                    ),
                )
            );

            // Init array for later
            $services = [];

            // For each Professional, get all the Services
            foreach ($professionals as $pro) : 
                $serv_pros = get_field('professional_services', $pro->ID);

                if ($serv_pros) :
                    // For each published service, add them to an array
                    foreach($serv_pros as $service) :
                        if (get_post_status( $service->ID ) === 'publish') : 
                            $services[] = $service;
                        endif;
                    endforeach;
                endif;

            endforeach;

            // De-dupe the array of professional objects
            $services = array_unique($services, SORT_REGULAR);

            // Sort the array of objects by the 'service_name' field
            App::sortArryOfObjectsOnField($services, 'service_name');

            // Cache all this madness for 12 hours...
            // https://codex.wordpress.org/Transients_API
            set_transient( 'professional_services_query', $services, 12 * HOUR_IN_SECONDS );
        }

        return $services;
    }


    /**
     * Filter Option: Locations
     *
     * Gets the locations posts.
     * 
     * @return array
     */
    public function getLocationsFilterList()
    {
        return get_posts(
            array(
                'posts_per_page' => -1,
                'post_type' => 'locations',
                'orderby' => 'title',
                'order' => 'ASC',
            )
        );
    }


    /**
     * Filter Option: Collects all possible schools for Professionals
     *
     * Gets all the possible schools for all professionals, and then  
     * saves the results in a WP Transient for loading next time.
     *
     * https://developer.wordpress.org/apis/handbook/transients/
     * 
     * @return array
     */
    public function getSchoolsFilterList()
    {
        // delete_transient( 'professional_schools_query' );

        // Get any existing copy of our transient data
        if ( false === ( $schools = get_transient( 'professional_schools_query' ) ) ) {
            // It wasn't there, so regenerate the data and save the transient
             
            // Get ALL Professionals
            $professionals = get_posts(
                array(
                    'posts_per_page' => -1,
                    'post_type' => 'professionals',
                    'post_status' => 'publish'
                )
            );

            // Init array for later
            $schools = [];

            // For each Professional, get all their Schools
            foreach ($professionals as $pro) : 
                if (get_field('professional_education_school_1', $pro->ID)) {
                    $schools[] = get_field('professional_education_school_1', $pro->ID);
                }

                if (get_field('professional_education_school_2', $pro->ID)) {
                    $schools[] = get_field('professional_education_school_2', $pro->ID);
                }

                if (get_field('professional_education_school_3', $pro->ID)) {
                    $schools[] = get_field('professional_education_school_3', $pro->ID);
                }

            endforeach;

            // De-dupe the array of school objects
            $schools = array_unique($schools, SORT_REGULAR);

            // Sort the array of objects by the 'post_title' field
            App::sortArryOfObjectsOnField($schools, 'post_title');

            // Cache all this madness for 12 hours...
            // https://codex.wordpress.org/Transients_API
            set_transient( 'professional_schools_query', $schools, 12 * HOUR_IN_SECONDS );
        }

        return $schools;
    }

}
