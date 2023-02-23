<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Alumni extends Composer
{

    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'pages.page-alumni-directory',
        'partials.content-alumni-directory',
        'pages.page-alumni-updates'
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
            'alumni_directory'      => $this->directory(),
            'alumni_news'           => $this->getAlumniNews(),
            'alumni_experience'     => $this->getAlumniExperience(),
        ];
    }


    public function directory() 
    {
        // $args = [
        //     'post_type' => 'alumni',
        //     'posts_per_page' => 20,
        //     'orderby' => 'post_title',
        //     'order' => 'ASC'
        // ];

        // $meta_query = [];

        // if(isset($_GET['letter']) && trim($_GET['letter']) != '') {
        //     $meta_query['relation'] = 'AND';
        //     array_push($meta_query, [
        //         'key'=>'alumni_last_name',
        //         'value'=>"^".$_GET['letter'].".*",
        //         'compare'=>'REGEXP'
        //     ]);
        // }

        // /**
        //  * Name Search
        //  */
        // if(isset($_GET['inputName']) && trim($_GET['inputName']) != '') {
        //     $meta_query['relation'] = 'OR';
        //     array_push($meta_query, [
        //         'key'=>'alumni_first_name',
        //         'value'=>$_GET['inputName'],
        //         'compare'=>'LIKE'
        //     ]);
        //     array_push($meta_query, [
        //         'key'=>'alumni_last_name',
        //         'value'=>$_GET['inputName'],
        //         'compare'=>'LIKE'
        //     ]);
        // }

        // /**
        //  * Company
        //  */
        // if(isset($_GET['inputCompany']) && trim($_GET['inputCompany']) != '') {
        //     $meta_query['relation'] = 'OR';
        //     array_push($meta_query, [
        //         'key'=>'alumni_organization',
        //         'value'=>$_GET['inputCompany'],
        //         'compare'=>'LIKE'
        //     ]);
        // }

        // /**
        //  * View All
        //  */

        // if(isset($_GET['view_all'])) {
        //     $args['posts_per_page'] = -1;
        // }

        // if(!empty($meta_query)) {
        //     $args['meta_query'] = $meta_query;
        // }

        // $posts = new \WP_Query($args);
       
        // return $posts;
        
        return do_shortcode('[bbs_alumni_directory]');
    }


    /**
     * Alumni News
     */
    public function getAlumniNews() 
    {
        // Get only the "Alumni" Posts...
        $meta_query[] = array(
            array(
                'key'     => 'alumni_post',
                'value'   => '1',
                'compare' => '='
            )
        );

        // Sorted by their 'sort_date'
        $args = array(
            'posts_per_page' => 10,
            'post_type' => 'news',
            'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1 ),
            'meta_key' => 'sort_date',
            'orderby' => 'meta_value',
            'order' => 'DESC',
            'meta_query' => array($meta_query),
        );

        $query = new \WP_Query( $args );

        return $query;
    }


    /**
     * Alumni Experience
     */
    public function getAlumniExperience() 
    {
        // Get only the "Alumni" Posts...
        $meta_query[] = array(
            array(
                'key'     => 'alumni_post',
                'value'   => '1',
                'compare' => '='
            )
        );

        // Sorted by their 'sort_date'
        $args = array(
            'posts_per_page' => 10,
            'post_type' => 'experience',
            'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1 ),
            'meta_key' => 'sort_date',
            'orderby' => 'meta_value',
            'order' => 'DESC',
            'meta_query' => array($meta_query),
        );

        $query = new \WP_Query( $args );

        return $query;
    }


    public static function formatPhone( $phone ) 
    {
        return preg_replace( '~.*(\d{3})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4}).*~', '($1) $2-$3', $phone );
    }

}
