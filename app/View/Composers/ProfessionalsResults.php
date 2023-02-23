<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use App\View\Composers\Professionals;

class ProfessionalsResults extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'pages/page-professionals-results',
        // 'partials/professionals/search-filters-form'
    ];


    /**
     * The allowed filters taken from the form input names passed to $_GET.
     * 
     * @var array
     */
    protected $allowed_filters = [
        'alpha',
        'kw',
        'practice', 
        'loc', 
        'edu'
    ];


    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'professionals' => $this->getProfessionalsResults(),
            'getvars' => App::checkGet($this->allowed_filters)
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


    public function getProfessionalsResults()
    {
        $get_query_params = App::checkGet($this->allowed_filters);

        // Check vars and build up meta_query array
        $meta_query = ['relation' => 'AND'];

        if ( ! empty( $get_query_params['practice'] ) ) :
            $meta_query[] = array(
                'key'     => 'professional_services',
                'value'   => '"' . $get_query_params['practice'] . '"',
                'compare' => 'LIKE'
            );
        endif;

        if ( ! empty( $get_query_params['loc'] ) ) :
            $meta_query[] = array(
                'relation' => 'OR',
                array(
                    'key'     => 'professional_location_1',
                    'value'   => $get_query_params['loc'],
                    'compare' => '='
                ),
                array(
                    'key'     => 'professional_location_2',
                    'value'   => $get_query_params['loc'],
                    'compare' => '='
                )
            );
        endif;

        if ( ! empty( $get_query_params['edu'] ) ) :
            $meta_query[] = array(
                'relation' => 'OR',
                array(
                    'key'     => 'professional_education_school_1',
                    'value'   => $get_query_params['edu'],
                    'compare' => '='
                ),
                array(
                    'key'     => 'professional_education_school_2',
                    'value'   => $get_query_params['edu'],
                    'compare' => '='
                ),
                array(
                    'key'     => 'professional_education_school_3',
                    'value'   => $get_query_params['edu'],
                    'compare' => '='
                ),
                array(
                    'key'     => 'professional_education_school_4',
                    'value'   => $get_query_params['edu'],
                    'compare' => '='
                )
            );
        endif;

        if ( ! empty( $get_query_params['alpha'] ) ) :
            $meta_query[] = array(
                'relation' => 'OR',
                array(
                    'key'     => 'last_name',
                    'value'   => '^' . $get_query_params['alpha'],
                    'type'    => 'CHAR',
                    'compare' => 'REGEXP'
                ),
                array(
                    'key'     => 'maiden_name',
                    'value'   => '^' . $get_query_params['alpha'],
                    'type'    => 'CHAR',
                    'compare' => 'REGEXP'
                ),
            );
        endif;


        $args = array(
            'posts_per_page' => -1,
            'post_type' => 'professionals',
            'meta_key' => 'last_name',
            'orderby' => 'meta_value',
            'order' => 'ASC',
            'post_status' => 'publish',
            'meta_query' => array($meta_query)
        );

        if ( ! empty( $get_query_params['kw'] ) ) :
            $args['s'] = $get_query_params['kw'];
        endif;

        $professionals = get_posts( $args );

        // For filtered searches by a letter...
        if ( isset( $get_query_params['alpha'] ) ) :
            
            // Temp array for holding the professional's 'oname' (ordering name) key and the Object data.
            $ordered = [];
            
            // Check for a 'maiden_name', if it matches the $_GET 'alpha' param, use that as the 'oname' sorting key...
            foreach ( $professionals as $p ) :
                $maiden = get_field('maiden_name', $p->ID);

                if ( ! empty( $maiden ) && ( strtolower( $maiden[0] ) == strtolower( $get_query_params['alpha']) ) ) :
                    $ordered[] = array('oname'=> get_field('maiden_name', $p->ID), 'object'=> $p);
                else :
                    $ordered[] = array('oname'=> get_field('last_name', $p->ID), 'object'=> $p);
                endif;
            endforeach;

            // Sort array alphabetically by 'oname' keys
            $comparer = function ($a, $b) {
                $a = $a['oname'];
                $b = $b['oname'];

                return strcmp($a, $b);
            };
            usort($ordered, $comparer);

            $filtered_professionals = [];

            // Load up new array with the now "ordered" objects for looping
            foreach($ordered as $o) :
                $filtered_professionals[] = $o['object'];
            endforeach;

        // No params given for filtering, so just get 'em all ordered by 'last_name'...
        else :
            $filtered_professionals = $professionals;
        endif;

        // Append attributes w/ the needed ACF field data and computed values
        foreach ($professionals as $professional) :
            $professional->headshot_url     = get_field( 'professional_headshot', $professional->ID )['url'];
            $professional->fullname         = Professionals::getFullname( $professional->ID );
            $professional->job_title        = get_field( 'job_title', $professional->ID );
            $professional->email            = get_field( 'email', $professional->ID );
            $professional->phone            = Professionals::getPhoneNumber( $professional->ID );
            $professional->vcard            = Professionals::getVcard( $professional->ID );
        endforeach;

        return $professionals;
    }


    // public function checkGet()
    // {
    //     $clean_get = array();

    //     if ( isset( $_GET ) && ! empty( $_GET ) ) :
    //         foreach ( $_GET as $key => $value ) :
    //             if ( in_array( $key, $this->allowed_filters ) ) :
    //                 $clean_get[$key] = sanitize_text_field( $_GET[$key] );
    //             endif;
    //         endforeach;
    //     endif;

    //     return $clean_get;
    // }
    
}
