<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Page extends Composer
{

    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'partials.page',
        'partials.content-page'
    ];

    protected $page_id;

    protected $page_url;


    public function __construct()
    {
        $this->page_id = get_the_ID();
        $this->page_url = get_the_permalink( get_the_ID() );
    }


    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'parent_page'   => $this->getParentPage(),
            'sub_pages'     => $this->getSubPages()
        ];
    }


    /**
     * Data to be passed to view before rendering, but after merging.
     *
     * @return array
     */
    public function override()
    {
        return [
            'title' => $this->title(),
        ];
    }


    /**
     * Returns the post title.
     *
     * @return string
     */
    public function title()
    {
        if ( $this->view->name() !== 'partials.page-header' ) :
            return get_the_title();
        endif;

        if ( is_home() ) :
            if ( $home = get_option('page_for_posts', true) ) :
                return get_the_title($home);
            endif;

            return __('Latest Posts', 'sage');
        endif;

        if ( is_archive() ) :
            return get_the_archive_title();
        endif;

        if ( is_search() ) :
            return sprintf(
                /* translators: %s is replaced with the search query */
                __('Search Results for %s', 'sage'),
                get_search_query()
            );
        endif;

        if ( is_404() ) :
            return __('Not Found', 'sage');
        endif;

        return get_the_title();
    }


    public function getSubPages()
    {
        $parent = $this->getParentPage();

        $children = wp_list_pages( "title_li=&child_of=" . $parent->ID . "&echo=0&sort_column=menu_order&depth=3" );

        return $children;
    }


    public function getParentPage()
    {
        $url = wp_parse_url( $this->page_url );

        $segments = explode( '/', $url['path'] );

        $segment_1 = $segments[1];
        
        $parent = get_page_by_path( $segment_1 );

        return $parent;
    }

}
