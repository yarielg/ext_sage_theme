<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class AlumniUpdates extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'template-alumni-updates',
        'pages/page-alumni-updates',
        'partials/content-alumni-update'
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'bannerTitle' => $this->bannerTitle(),
            'bannerDescription' => $this->bannerDescription(),
            'pageContent' => $this->pageContent(),
            'updatePosts' => $this->updatePosts(),
            'alumniAccessible' => $this->alumniAccessible()
        ];
    }

    public function alumniAccessible() {
        // Check Alumni Page Access Level field...
        
        $access = get_field('alumni_access');
        if ( $access == 'restricted' ) : 
            if ( is_user_logged_in() ) :
                $user = wp_get_current_user();
                $valid_roles = [ 'administrator', 'alumni' ];

                $the_roles = array_intersect( $valid_roles, $user->roles );

                // If the current user does not have any of the 'valid' roles, redirect to alumni login...
                if ( empty( $the_roles ) ) :
                    wp_redirect( home_url( '/alumni-login/' ) );
                    exit;
                endif;

            else :
                // User is not logged in, so redirect to alumni login...
                wp_redirect( home_url( '/alumni-login/' ) );
                exit;

            endif;

        endif;
 
    }

    public function bannerTitle() {
        return get_field('page_header');
    }

    public function bannerDescription() {
        return get_field('page_description');
    }
  

    public function pageContent() {
        return get_the_content();
    }

    public function updatePosts() {

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
            'post_type' => array('news', 'experience'),
            'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1 ),
            'meta_key' => 'sort_date',
            'orderby' => 'meta_value',
            'order' => 'DESC',
            'meta_query' => array($meta_query),
        );

        $wp_query = new \WP_Query( $args );

        return $wp_query;

    }

}
