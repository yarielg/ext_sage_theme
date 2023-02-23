<?php
add_action( 'init', 'FoundationPress_post_type_services' );

function FoundationPress_post_type_services() {
    $labels = array(
        'name'                => _x( 'Services', 'post type general name', 'FoundationPress' ),
        'singular_name'       => _x( 'Service', 'post type singular name', 'FoundationPress' ),
        'menu_name'           => _x( 'Services', 'admin menu', 'FoundationPress' ),
        'name_admin_bar'      => _x( 'Service', 'add new on admin bar', 'FoundationPress' ),
        'add_new'             => _x( 'Add New', 'service', 'FoundationPress' ),
        'add_new_item'        => __( 'Add New Service', 'FoundationPress' ),
        'new_item'            => __( 'New Service', 'FoundationPress' ),
        'edit_item'           => __( 'Edit Service', 'FoundationPress' ),
        'view_item'           => __( 'View Service', 'FoundationPress' ),
        'all_items'           => __( 'All Services', 'FoundationPress' ),
        'search_items'        => __( 'Search Services', 'FoundationPress' ),
        'parent_item_colon'   => __( 'Parent Services:', 'FoundationPress' ),
        'not_found'           => __( 'No Services found.', 'FoundationPress' ),
        'not_found_in_trash'  => __( 'No Services found in Trash.', 'FoundationPress' )
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
            'slug'                => 'services',
            'with_front'          => false,
        ),
        'has_archive'         => false,
        'hierarchical'        => true,
        'menu_position'       => null,
        'supports'            => array( 'title', 'editor', 'revisions', 'page-attributes' ),
        'menu_icon'           => 'dashicons-paperclip',
        'taxonomies'          => array( 'areas-of-focus' ),
    );
    register_post_type( 'services', $args );
}
