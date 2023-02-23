<?php
add_action( 'init', 'FoundationPress_post_type_school' );

function FoundationPress_post_type_school() {
    $labels = array(
        'name'                => _x( 'Schools', 'post type general name', 'FoundationPress' ),
        'singular_name'       => _x( 'School', 'post type singular name', 'FoundationPress' ),
        'menu_name'           => _x( 'Schools', 'admin menu', 'FoundationPress' ),
        'name_admin_bar'      => _x( 'School', 'add new on admin bar', 'FoundationPress' ),
        'add_new'             => _x( 'Add New', 'school', 'FoundationPress' ),
        'add_new_item'        => __( 'Add New School', 'FoundationPress' ),
        'new_item'            => __( 'New School', 'FoundationPress' ),
        'edit_item'           => __( 'Edit School', 'FoundationPress' ),
        'view_item'           => __( 'View School', 'FoundationPress' ),
        'all_items'           => __( 'All Schools', 'FoundationPress' ),
        'search_items'        => __( 'Search Schools', 'FoundationPress' ),
        'parent_item_colon'   => __( 'Parent Schools:', 'FoundationPress' ),
        'not_found'           => __( 'No Schools found.', 'FoundationPress' ),
        'not_found_in_trash'  => __( 'No Schools found in Trash.', 'FoundationPress' )
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
            'slug'                => 'school',
            'with_front'          => false,
        ),
        'has_archive'         => false,
        'hierarchical'        => true,
        'menu_position'       => null,
        'supports'            => array( 'title', 'revisions', 'page-attributes' ),
        'menu_icon'           => 'dashicons-admin-multisite',
    );
    register_post_type( 'school', $args );
}
