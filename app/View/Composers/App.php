<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class App extends Composer
{

    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        '*',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'site_name'                 => $this->siteName(),
            'nav_sub_footer'            => $this->subFooterMenu(),
            
            'page_header'               => $this->getPageHeader(),
            'page_description'          => $this->getPageDescription(),
            'page_hero'                 => $this->getPageHero(),
            'page_hero_image_opacity'   => $this->getPageHeroOpacity(),
            'page_color_scheme'         => $this->getPageColorScheme(),
            'page_link'                 => $this->getPageLink(),

            'is_alumni_page'            => $this->isAlumniPage()
        ];
    }


    /**
     * Returns the site name.
     *
     * @return string
     */
    public function siteName()
    {
        return get_bloginfo('name', 'display');
    }


    /**
     * Sort an Array of Objects by a Field
     * 
     * @param  array &$objects The array of objects.
     * @param  string $on      The field name to sort by, in ASC order.
     * 
     * @return array           The sorted array of objects.
     */
    public static function sortArryOfObjectsOnField( &$objects, $on )
    {    
        $comparer = function( $a, $b ) use ( $on ) { 
            return strcasecmp( $a->{$on}, $b->{$on} );
        };

        usort( $objects, $comparer); 
    }


    public static function checkGet($allowed_filters)
    {
        $clean_get = array();

        if ( isset( $_GET ) && ! empty( $_GET ) ) :
            foreach ( $_GET as $key => $value ) :
                if ( in_array( $key, $allowed_filters ) ) :
                    $clean_get[$key] = sanitize_text_field( $_GET[$key] );
                endif;
            endforeach;
        endif;

        return $clean_get;
    }


    public function subFooterMenu() 
    {
        return wp_get_nav_menu_items('sub-footer');
    }


    /**
     * Page Header Field Group helpers
     * 
     */
    public function getPageHeader() 
    {
        $page_header = get_field('page_header');

        if ( isset( $page_header ) && ! empty( $page_header ) ) :
            return $page_header;
        endif;

        return get_the_title();
    }


    public function getPageDescription() 
    {
        return get_field('page_description');
    }


    public function getPageHero() 
    {
        $page_hero_image = get_field('page_image');

        if ( $page_hero_image ) : // ACF Image Field: Returns URL
            return $page_hero_image;
        endif;

        return false;
    }


    public function getPageColorScheme()
    {
        $color_scheme = get_field('page_color_scheme');

        if ( $color_scheme ) : // ACF Select Field
            return $color_scheme;
        endif;

        return 'page-header-dark';
    }


    public function getPageHeroOpacity()
    {
        $page_hero_image_opacity = get_field('page_banner_image_opacity');

        if ( $page_hero_image_opacity ) : // ACF Select Field
            return $page_hero_image_opacity;
        endif;

        return '0.6';
    }


    public function getPageLink() 
    {
        return get_field('page_link');
    }


    public static function professionalFullname($pro) 
    {
        $fullname = get_field('first_name', $pro->ID) . 
                    // (( get_field('nick_name', $pro->ID) ) ? " \"" . get_field('nick_name', $pro->ID) . "\" " : "") . 
                    (( get_field('middle_initial', $pro->ID) ) ?  " " . get_field('middle_initial', $pro->ID) . " " : " ") . 
                    get_field('last_name', $pro->ID) .
                    (( get_field('suffix', $pro->ID) ) ? " " . get_field('suffix', $pro->ID) : "" );

        return $fullname;
    }


    /**
     * Checks if the page is set as "Alumni-Only"
     * 
     * @return null|redirct     If page is alumni-only, and user is logged in w/ permission, do nothing; else, redirect.
     */
    public static function alumniOnlyCheck() 
    {
        $restricted = get_field('alumni_restricted_post'); // boolean
        
        if ( $restricted ) : 
            
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


    /**
     * Checks if the page is a child of the '/alumni' parent page
     * 
     * @return boolean
     */
    public function isAlumniPage()
    {
        $alumni_page = get_page_by_path('alumni', OBJECT, 'page');

        if ( is_page( $alumni_page->ID ) ) :
            return true;
        endif;

        $current_page = get_post( get_queried_object_id() );

        if ( isset( $current_page ) && isset( $current_page->post_parent ) && ( $current_page->post_parent == $alumni_page->ID ) ) :
            return true;
        endif;

        return false;
    }


}
