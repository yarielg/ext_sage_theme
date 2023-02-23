<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class NewsSearchFilters extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'partials/news/search-filters-form'
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
            'filter_news_type_options' => $this->getNewsTypeFilterList(),
            'filter_professional_options' => $this->getProfessionalsFilterList(),
        ];
    }


    public function getServicesFilterList() {
        // delete_transient( 'news_services_query' );

        // Get any existing copy of our transient data
        if ( false === ( $services = get_transient( 'news_services_query' ) ) ) {
            // It wasn't there, so regenerate the data and save the transient
            
            // // Get ALL News that have a related Service
            // $news = get_posts(
            //     array(
            //         'posts_per_page' => -1,
            //         'post_type' => 'news',
            //         'no_found_rows' => true,
            //         'update_post_meta_cache' => false, 
            //         'update_post_term_cache' => false, 
            //         'fields' => 'ids',
               
            //         'meta_query'     => array(
            //             'relation' => 'AND',
            //             array(
            //                 'key'     => 'news_services',
            //                 'compare' => 'EXISTS',
            //             ),
            //         ),
            //     )
            // );

            // // Init array for later
            // $services = [];

            // // For each News Item (and id), get all the Services
            // foreach ($news as $news_id) : 
            //     $serv_items = get_field('news_services', $news_id);

            //     if ($serv_items) :
            //         // For each published service, add them to an array
            //         foreach($serv_items as $service) :
            //             if (get_post_status( $service->ID ) === 'publish') : 
            //                 $services[] = $service;
            //             endif;
            //         endforeach;
            //     endif;

            // endforeach;
            

            // TEMP: QUICK SEARCH
            $services = get_posts(
                array(
                    'posts_per_page' => -1,
                    'post_type' => 'services',
                    'post_parent' => 0,
                )
            );


            // De-dupe the array of services objects
            $services = array_unique($services, SORT_REGULAR);

            App::sortArryOfObjectsOnField( $services, 'service_name' );

            // Cache all this madness for 12 hours...
            // https://codex.wordpress.org/Transients_API
            set_transient( 'news_services_query', $services, 12 * HOUR_IN_SECONDS );
        }
        
        return $services;
    }


    public function getNewsTypeFilterList() 
    {
        return get_terms( 
            array(
                'taxonomy' => 'news-categories',
                'hide_empty' => false,
            ) 
        );
    }


    public function getProfessionalsFilterList() {
        
        // delete_transient( 'news_professionals_query' );

        // Get any existing copy of our transient data
        if ( false === ( $professionals = get_transient( 'news_professionals_query' ) ) ) {
            // It wasn't there, so regenerate the data and save the transient
            
            // // Init array for later
            // $professionals = [];

            // // 1. NEWS - - -
            // // Get ALL News posts that have a related Professional
            // $news = get_posts(
            //     array(
            //         'posts_per_page' => -1,
            //         'post_type' => 'news',
            //         'meta_query'     => array(
            //             'relation' => 'AND',
            //             array(
            //                 'key'     => 'news_professional',
            //                 'compare' => 'EXISTS',
            //             ),
            //         ),
            //     )
            // );
            // // For each News Item, get all the Professionals
            // foreach ($news as $item) : 
            //     $item_pros = get_field('news_professional', $item->ID);

            //     if ( $item_pros ) :
            //         // For each published professional, add them to an array
            //         foreach($item_pros as $pro) :
            //             if (get_post_status( $pro->ID ) === 'publish') : 
            //                 $professionals[] = $pro;
            //             endif;
            //         endforeach;
            //     endif;

            // endforeach;


            // // 2. EVENTS - - -
            // // Get ALL Event posts that have a related Professional
            // $events = get_posts(
            //     array(
            //         'posts_per_page' => -1,
            //         'post_type' => 'events',
            //         'meta_query'     => array(
            //             'relation' => 'AND',
            //             array(
            //                 'key'     => 'event_speakers',
            //                 'compare' => 'EXISTS',
            //             ),
            //         ),
            //     )
            // );
            // // For each Event Item, get all the Professionals
            // foreach ($events as $item) : 
            //     $item_pros = get_field('event_speakers', $item->ID);

            //     if ( $item_pros ) :
            //         // For each published professional, add them to an array
            //         foreach($item_pros as $pro) :
            //             if (get_post_status( $pro->ID ) === 'publish') : 
            //                 $professionals[] = $pro;
            //             endif;
            //         endforeach;
            //     endif;

            // endforeach;


            // // De-dupe the array of professional objects
            // $professionals = array_unique($professionals, SORT_REGULAR);


            // TEMP: QUICK SEARCH
            $professionals = get_posts(
                array(
                    'posts_per_page' => -1,
                    'post_type' => 'professionals',
                )
            );

            // Sort the array of objects by the 'last_name' field    
            App::sortArryOfObjectsOnField( $professionals, 'last_name' );

            // Cache all this madness for 12 hours...
            // https://codex.wordpress.org/Transients_API
            set_transient( 'news_professionals_query', $professionals, 12 * HOUR_IN_SECONDS );
        }

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
