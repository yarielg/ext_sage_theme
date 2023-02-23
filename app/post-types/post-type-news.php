<?php
add_action( 'init', 'FoundationPress_post_type_news' );

function FoundationPress_post_type_news() {
    $labels = array(
        'name'                => _x( 'News', 'post type general name', 'FoundationPress' ),
        'singular_name'       => _x( 'News', 'post type singular name', 'FoundationPress' ),
        'menu_name'           => _x( 'News', 'admin menu', 'FoundationPress' ),
        'name_admin_bar'      => _x( 'News', 'add new on admin bar', 'FoundationPress' ),
        'add_new'             => _x( 'Add New', 'location', 'FoundationPress' ),
        'add_new_item'        => __( 'Add New News', 'FoundationPress' ),
        'new_item'            => __( 'New News', 'FoundationPress' ),
        'edit_item'           => __( 'Edit News', 'FoundationPress' ),
        'view_item'           => __( 'View News', 'FoundationPress' ),
        'all_items'           => __( 'All News', 'FoundationPress' ),
        'search_items'        => __( 'Search News', 'FoundationPress' ),
        'parent_item_colon'   => __( 'Parent News:', 'FoundationPress' ),
        'not_found'           => __( 'No News found.', 'FoundationPress' ),
        'not_found_in_trash'  => __( 'No News found in Trash.', 'FoundationPress' )
    );
    $args = array(
        'labels'              => $labels,
        'description'         => __( 'Description.', 'FoundationPress' ),
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_rest'        => true,
        'rewrite'             => array(
            'slug'                => 'news',
            'with_front'          => false,
        ),
        'has_archive'         => false,
        'hierarchical'        => true,
        'menu_position'       => null,
        'supports'            => array( 'title', 'editor', 'revisions', 'page-attributes' ),
        'menu_icon'           => 'dashicons-format-quote',
        'taxonomies'          => array( 'news-categories' ),
        
    );
    register_post_type( 'news', $args );
}
