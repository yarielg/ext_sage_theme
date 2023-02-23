<?php
add_action( 'init', 'FoundationPress_post_type_professionals' );

function FoundationPress_post_type_professionals() {
    $labels = array(
        'name'                => _x( 'Professionals', 'post type general name', 'FoundationPress' ),
        'singular_name'       => _x( 'Professional', 'post type singular name', 'FoundationPress' ),
        'menu_name'           => _x( 'Professionals', 'admin menu', 'FoundationPress' ),
        'name_admin_bar'      => _x( 'Professional', 'add new on admin bar', 'FoundationPress' ),
        'add_new'             => _x( 'Add New', 'professional', 'FoundationPress' ),
        'add_new_item'        => __( 'Add New Professional', 'FoundationPress' ),
        'new_item'            => __( 'New Professional', 'FoundationPress' ),
        'edit_item'           => __( 'Edit Professional', 'FoundationPress' ),
        'view_item'           => __( 'View Professional', 'FoundationPress' ),
        'all_items'           => __( 'All Professionals', 'FoundationPress' ),
        'search_items'        => __( 'Search Professionals', 'FoundationPress' ),
        'parent_item_colon'   => __( 'Parent Professionals:', 'FoundationPress' ),
        'not_found'           => __( 'No Professionals found.', 'FoundationPress' ),
        'not_found_in_trash'  => __( 'No Professionals found in Trash.', 'FoundationPress' )
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
            'slug'                => 'professionals',
            'with_front'          => false,
        ),
        'has_archive'         => false,
        'hierarchical'        => true,
        'menu_position'       => null,
        'supports'            => array( 'title', 'editor', 'revisions', 'page-attributes' ),
        'menu_icon'           => 'dashicons-businessman',
        'taxonomies'          => array( 'levels' ),

    );
    register_post_type( 'professionals', $args );
}
