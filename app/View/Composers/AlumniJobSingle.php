<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class AlumniJobSingle extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'content-single-jobs',
        'partials/content-single-jobs'
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'alumniAccessible' => $this->alumniAccessible(),
            'pageContent' => $this->pageContent()
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


    public function pageContent() {
        $job = get_post();
        $job->permalink = $this->getPermalink($job->ID);
        $location = $this->getLocation($job->ID);
        $job->location = $location;
        $job->post_content = apply_filters('the_content', $job->post_content);
        return $job;
    }

    public static function getLocation($id) {
        return get_field('job_location', $id);
    }

    public function getPermalink($id) {
        return get_permalink($id);
    }

}
