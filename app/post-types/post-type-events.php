<?php
add_action( 'init', 'FoundationPress_post_type_events' );

function FoundationPress_post_type_events() {
    $labels = array(
        'name'                => _x( 'Events', 'post type general name', 'FoundationPress' ),
        'singular_name'       => _x( 'Event', 'post type singular name', 'FoundationPress' ),
        'menu_name'           => _x( 'Events', 'admin menu', 'FoundationPress' ),
        'name_admin_bar'      => _x( 'Event', 'add new on admin bar', 'FoundationPress' ),
        'add_new'             => _x( 'Add New', 'location', 'FoundationPress' ),
        'add_new_item'        => __( 'Add New Event', 'FoundationPress' ),
        'new_item'            => __( 'New Event', 'FoundationPress' ),
        'edit_item'           => __( 'Edit Event', 'FoundationPress' ),
        'view_item'           => __( 'View Event', 'FoundationPress' ),
        'all_items'           => __( 'All Events', 'FoundationPress' ),
        'search_items'        => __( 'Search Events', 'FoundationPress' ),
        'parent_item_colon'   => __( 'Parent Events:', 'FoundationPress' ),
        'not_found'           => __( 'No Events found.', 'FoundationPress' ),
        'not_found_in_trash'  => __( 'No Events found in Trash.', 'FoundationPress' )
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
            'slug'                => 'events',
            'with_front'          => false,
        ),
        'has_archive'         => false,
        'hierarchical'        => true,
        'menu_position'       => null,
        'supports'            => array( 'title', 'editor', 'revisions', 'page-attributes' ),
        'menu_icon'           => 'dashicons-calendar',
        'taxonomies'          => array( 'event-categories' ),
        
    );
    register_post_type( 'events', $args );
}
