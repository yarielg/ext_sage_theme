<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class NewsSingle extends Composer
{

    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'partials/content-single-news',
        'single-news'
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
            'alumniAccessible' => $this->alumniAccessible(),
            'newsCategories' => $this->newsCategories(),
            'accordionItems' => $this->accordionItems(),
            'accordionHeading' => $this->accordionHeading(),
            'newsAttachments' => $this->newsAttachments(),
            'relatedOverride' => $this->relatedOverride(),
            'relatedNews' => $this->getRelatedNews(),
            'newsSource' => $this->getNewsSource(),
            'newsSourceUrl' => $this->getNewsSourceUrl(),
            'related_services' => $this->getRelatedServices(),
            'related_professionals' => $this->getRelatedProfessionals(),
            'title' => $this->title()
        ];
    }


    public function alumniAccessible()
    {
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

    public function title()
    {
        return get_the_title();
    }

    public function getNewsSource()
    {
        return get_field('news_source', get_the_ID());
    }


    public function getNewsSourceUrl()
    {
        return get_field('news_source_url', get_the_ID());
    }


    public function newsCategories()
    {
        return wp_get_post_terms( get_the_ID(), 'news-categories' );
    }


    public function accordionHeading()
    {
        return get_field("accordion_heading");
    }


    public function accordionItems()
    {
        return get_field("accordion_items");
    }


    public function newsAttachments()
    {
        return get_field('news_attachment');
    }


    public function relatedOverride()
    {
        return get_field('related_override');
    }


    public function getRelatedNews()
    {
        $news_services = get_field('news_services');

        $meta_query = ['relation' => 'AND'];

        if ($news_services) :

            $meta_query[] = array('relation' => 'OR');

            foreach ($news_services as $service) :

                $meta_query[0][] = array(
                    'key'     => 'news_services',
                    'value'   => $service->ID,
                    'compare' => 'LIKE'
                );

            endforeach;
        endif;

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

        // 4. Query for news...
        $args = array(
            'posts_per_page' => 3,
            'post_type' => 'news',
            'post__not_in' => array(get_the_ID()),
            'meta_key' => 'sort_date',
            'orderby' => 'meta_value',
            'order' => 'DESC',
            'meta_query' => array($meta_query)
        );

        $related_news = get_posts( $args );

        return $related_news;
    }


    public function getRelatedServices()
    {
        return get_field( 'news_services', get_the_ID() );
    }


    public function getRelatedProfessionals()
    {
        $professionals = get_field( 'news_professional', get_the_ID() );

        if ( $professionals ) :
            foreach ( $professionals as $prof ) :
                $prof->fullname = Professionals::getFullname($prof);
            endforeach;
        endif;

        return $professionals;
    }

}
