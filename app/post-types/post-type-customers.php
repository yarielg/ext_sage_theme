<?php
add_action( 'init', 'FoundationPress_post_type_customers' );

function FoundationPress_post_type_customers() {
    $labels = array(
        'name'                => _x( 'Customers', 'post type general name', 'FoundationPress' ),
        'singular_name'       => _x( 'Customer', 'post type singular name', 'FoundationPress' ),
        'menu_name'           => _x( 'Customers', 'admin menu', 'FoundationPress' ),
        'name_admin_bar'      => _x( 'Customer', 'add new on admin bar', 'FoundationPress' ),
        'add_new'             => _x( 'Add New', 'location', 'FoundationPress' ),
        'add_new_item'        => __( 'Add New Customer', 'FoundationPress' ),
        'new_item'            => __( 'New Customer', 'FoundationPress' ),
        'edit_item'           => __( 'Edit Customer', 'FoundationPress' ),
        'view_item'           => __( 'View Customer', 'FoundationPress' ),
        'all_items'           => __( 'All Customers', 'FoundationPress' ),
        'search_items'        => __( 'Search Customers', 'FoundationPress' ),
        'parent_item_colon'   => __( 'Parent Customers:', 'FoundationPress' ),
        'not_found'           => __( 'No Customers found.', 'FoundationPress' ),
        'not_found_in_trash'  => __( 'No Customers found in Trash.', 'FoundationPress' )
    );
    $args = array(
        'labels'              => $labels,
        'description'         => __( 'Description.', 'FoundationPress' ),
        'public'              => false,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_rest'        => true,
        'rewrite'             => array(
            'slug'                => 'customers',
            'with_front'          => false,
        ),
        'has_archive'         => false,
        'hierarchical'        => true,
        'menu_position'       => null,
        'supports'            => array( 'title', 'editor', 'revisions', 'page-attributes' ),
        'menu_icon'           => 'dashicons-groups',
        
    );
    register_post_type( 'customers', $args );
}
