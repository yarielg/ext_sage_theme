<?php
add_action( 'init', 'FoundationPress_post_type_locations' );

function FoundationPress_post_type_locations() {
    $labels = array(
        'name'                => _x( 'Locations', 'post type general name', 'FoundationPress' ),
        'singular_name'       => _x( 'Location', 'post type singular name', 'FoundationPress' ),
        'menu_name'           => _x( 'Locations', 'admin menu', 'FoundationPress' ),
        'name_admin_bar'      => _x( 'Location', 'add new on admin bar', 'FoundationPress' ),
        'add_new'             => _x( 'Add New', 'location', 'FoundationPress' ),
        'add_new_item'        => __( 'Add New Location', 'FoundationPress' ),
        'new_item'            => __( 'New Location', 'FoundationPress' ),
        'edit_item'           => __( 'Edit Location', 'FoundationPress' ),
        'view_item'           => __( 'View Location', 'FoundationPress' ),
        'all_items'           => __( 'All Locations', 'FoundationPress' ),
        'search_items'        => __( 'Search Locations', 'FoundationPress' ),
        'parent_item_colon'   => __( 'Parent Locations:', 'FoundationPress' ),
        'not_found'           => __( 'No Locations found.', 'FoundationPress' ),
        'not_found_in_trash'  => __( 'No Locations found in Trash.', 'FoundationPress' )
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
            'slug'                => 'locations',
            'with_front'          => false,
        ),
        'has_archive'         => false,
        'hierarchical'        => true,
        'menu_position'       => null,
        'supports'            => array( 'title', 'editor', 'revisions', 'page-attributes' ),
        'menu_icon'           => 'dashicons-location',
        
    );
    register_post_type( 'locations', $args );
}
