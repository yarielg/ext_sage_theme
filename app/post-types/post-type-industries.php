<?php
add_action( 'init', 'FoundationPress_post_type_industries' );

function FoundationPress_post_type_industries() {
    $labels = array(
        'name'                => _x( 'Industries', 'post type general name', 'FoundationPress' ),
        'singular_name'       => _x( 'Industry', 'post type singular name', 'FoundationPress' ),
        'menu_name'           => _x( 'Industries', 'admin menu', 'FoundationPress' ),
        'name_admin_bar'      => _x( 'Industry', 'add new on admin bar', 'FoundationPress' ),
        'add_new'             => _x( 'Add New', 'industry', 'FoundationPress' ),
        'add_new_item'        => __( 'Add New Industry', 'FoundationPress' ),
        'new_item'            => __( 'New Industry', 'FoundationPress' ),
        'edit_item'           => __( 'Edit Industry', 'FoundationPress' ),
        'view_item'           => __( 'View Industry', 'FoundationPress' ),
        'all_items'           => __( 'All Industries', 'FoundationPress' ),
        'search_items'        => __( 'Search Industries', 'FoundationPress' ),
        'parent_item_colon'   => __( 'Parent Industries:', 'FoundationPress' ),
        'not_found'           => __( 'No Industries found.', 'FoundationPress' ),
        'not_found_in_trash'  => __( 'No Industries found in Trash.', 'FoundationPress' )
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
            'slug'                => 'industries',
            'with_front'          => false,
        ),
        'has_archive'         => false,
        'hierarchical'        => true,
        'menu_position'       => null,
        'supports'            => array( 'title', 'editor', 'revisions', 'page-attributes' ),
        'menu_icon'           => 'dashicons-bank',
        'taxonomies'          => array(),
    );
    register_post_type( 'industries', $args );
}
