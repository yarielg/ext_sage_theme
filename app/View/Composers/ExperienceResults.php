<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class ExperienceResults extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'pages/page-experience-results',
        'partials/experience/card'
    ];


    /**
     * The allowed filters taken from the form input names passed to $_GET.
     * 
     * @var array
     */
    protected $allowed_filters = [
        'kw',
        'practice', 
        'client-type', 
        'pro'
    ];


    public function __construct()
    {
        App::alumniOnlyCheck();
    }


    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'experiences' => $this->experiences(),
            'getvars' => App::checkGet($this->allowed_filters)
        ];
    }


    public function experiences() {

        $get_query_params = App::checkGet($this->allowed_filters);

        // Check vars and build up query arrays
        $meta_query = ['relation' => 'AND'];

        $tax_query = [];


        if ( ! empty( $get_query_params['practice'] ) ) {
            $meta_query[] = array(
                'key'     => 'experience_services',
                'value'   => '"' . $get_query_params['practice'] . '"',
                'compare' => 'LIKE'
            );
        }

        if ( ! empty( $get_query_params['client-type'] ) ) {
            $tax_query[] = array(
                'taxonomy' => 'client-types',
                'field' => 'id',
                'terms' => $get_query_params['client-type']
            );
        }

        if ( ! empty( $get_query_params['pro'] ) ) {
            $meta_query[] = array(
                'key'     => 'experience_professionals',
                'value'   => '"' . $get_query_params['pro'] . '"',
                'compare' => 'LIKE'
            );
        }

        // DON'T SHOW ALUMNI-ONLY EXPERIENCE
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
                'posts_per_page' => 10,
                'post_type' => 'experience',
                'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1 ),
                'meta_key' => 'sort_date',
                'orderby' => 'meta_value',
                'order' => 'DESC',
                'suppress_filters' => true,
                'meta_query' => array($meta_query)
            );

        else :

            $args = [
                's' => $get_query_params['kw'],
                'posts_per_page' => 10,
                'post_type' => 'experience',
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

        foreach( $query->posts as $exp ) :
            $exp->friendly_date = date("F d, Y", strtotime($exp->post_date));
            $exp->permalink = get_permalink($exp->ID);
        endforeach;

        return $query;
    }
   
}
