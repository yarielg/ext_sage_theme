<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class NewsResults extends Composer
{

    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'pages/page-news-results'
    ];


    /**
     * The allowed filters taken from the form input names passed to $_GET.
     * 
     * @var array
     */
    protected $allowed_filters = [
        'kw',
        'practice', 
        'news-type', 
        'pro'
    ];


    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            // 'upcoming_events' => $this->upcomingEvents(),
            'news' => $this->news(),
            'getvars' => App::checkGet($this->allowed_filters)
        ];
    }


    public function news() {

        $get_query_params = App::checkGet($this->allowed_filters);

        // Check vars and build up query arrays
        $meta_query = ['relation' => 'AND'];

        $tax_query = [];

        if ( ! empty( $get_query_params['practice'] ) ) {
            $meta_query[] = array(
                'relation' => 'OR',
                array(
                    'key'     => 'news_services',
                    'value'   => '"' . $get_query_params['practice'] . '"',
                    'compare' => 'LIKE'
                ),
                array(
                    'key'     => 'event_services',
                    'value'   => '"' . $get_query_params['practice'] . '"',
                    'compare' => 'LIKE'
                )
            );
        }

        if ( ! empty( $get_query_params['news-type'] ) ) {
            $tax_query[] = array(
                'taxonomy' => 'news-categories',
                'field' => 'id',
                'terms' => $get_query_params['news-type']
            );
        }

        if ( ! empty( $get_query_params['pro'] ) ) {
            $meta_query[] = array(
                'relation' => 'OR',
                array(
                    'key'     => 'news_professional',
                    'value'   => '"' . $get_query_params['pro'] . '"',
                    'compare' => 'LIKE'
                ),
                array(
                    'key'     => 'event_speakers',
                    'value'   => '"' . $get_query_params['pro'] . '"',
                    'compare' => 'LIKE'
                )
            );
        }

        // DON'T SHOW ALUMNI-ONLY NEWS
        $meta_query[] = array(
            'relation' => 'OR',
            array(
                'key'     => 'alumni_restricted_post',
                'value'   => '1',
                'compare' => '!='
            ),
            array(
                'key'     => 'alumni_restricted_post',
                'value'   => '1',
                'compare' => 'NOT EXISTS'
            )
        );

        
        // If NO keywords, do regular args and query...
        if ( ! isset( $get_query_params['kw'] ) || $get_query_params['kw'] == '' ) :

            $args = array(
                'posts_per_page' => 12,
                'post_type' => 'news',
                'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1 ),
                'meta_key' => 'sort_date',
                'orderby' => 'meta_value',
                'order' => 'DESC',
                'meta_query' => array($meta_query),
            );

        else :

            $args = [
                's' => $get_query_params['kw'],
                'posts_per_page' => 12,
                'post_type' => 'news',
                'orderby' => 'relevance',
                'meta_query' => array($meta_query),
                'relevanssi' => true,
            ];

        endif;

        // Only add tax_query if ! empty, otherwise if user doesn't give a term, it returns null...
        if ( $tax_query ) :
            $args['tax_query'] = array($tax_query);
        endif;

        $query = new \WP_Query($args);

        return $query;
    }


    public function upcomingEvents() {

        $get_query_params = App::checkGet($this->allowed_filters);

        // Check vars and build up query arrays
        $meta_query = ['relation' => 'AND'];
        $tax_query = [];

        if (! empty($get_query_params['practice'])) {
            $meta_query[] = array(
                'relation' => 'OR',
                array(
                    'key'     => 'news_services',
                    'value'   => '"' . $get_query_params['practice'] . '"',
                    'compare' => 'LIKE'
                ),
                array(
                    'key'     => 'event_services',
                    'value'   => '"' . $get_query_params['practice'] . '"',
                    'compare' => 'LIKE'
                )
            );
        }

        if (! empty($get_query_params['pro'])) {
            $meta_query[] = array(
                'relation' => 'OR',
                array(
                    'key'     => 'news_professional',
                    'value'   => '"' . $get_query_params['pro'] . '"',
                    'compare' => 'LIKE'
                ),
                array(
                    'key'     => 'event_speakers',
                    'value'   => '"' . $get_query_params['pro'] . '"',
                    'compare' => 'LIKE'
                )
            );
        }

        /**
         * CATEGORY
         */
        if (! empty($get_query_params['news-type'])) {
            $tax_query[] = array(
                'taxonomy' => 'news-categories',
                'field' => 'id',
                'terms' => $get_query_params['news-type']
            );
        }

        /**
         * GREATER THAN TODAY
         */
        $meta_query[] = array(
            array(
                'key' => 'start_date'
            ),
            array(
                'key' => 'start_date',
                'value' => date('Ymd'),
                'compare' => '>='
            )
        );

        // DON'T SHOW ALUMNI-ONLY NEWS
        $meta_query[] = array(
            'relation' => 'OR',
            array(
                'key'     => 'alumni_restricted_post',
                'value'   => 0,
                'compare' => '='
            ),
            array(
                'key'     => 'alumni_restricted_post',
                'compare' => 'NOT EXISTS'
            )
        );

        // Get all events by their sort_date
        $event_args = array(
            'posts_per_page' => -1,
            'post_type' => 'events',
            'meta_key' => 'sort_date',
            'orderby' => 'meta_value',
            'order' => 'ASC',
            'meta_query' => array($meta_query),
        );

        $all_events = get_posts( $event_args );

        // Init array for getting upcoming events
        $upcoming = [];

        $now = new \DateTime(); 

        // Check each event to see if it is in the future
        foreach ($all_events as $ev) :
            $date = get_field('sort_date', $ev->ID);
            
            // Create date object from string for comparison 
            $date = date_create_from_format('Ymd', $date);
            
            if ($date >= $now) :
                $upcoming[] = $ev;
            endif;

        endforeach;

        // Reduce list of events to just the next 3 upcoming
        $upcoming = array_slice($upcoming, 0, 3);
       
        return $upcoming;
    }

}
