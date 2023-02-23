<?php
add_action( 'init', 'FoundationPress_post_type_experience' );

function FoundationPress_post_type_experience() {
    $labels = array(
        'name'                => _x( 'Experiences', 'post type general name', 'FoundationPress' ),
        'singular_name'       => _x( 'Experience', 'post type singular name', 'FoundationPress' ),
        'menu_name'           => _x( 'Experiences', 'admin menu', 'FoundationPress' ),
        'name_admin_bar'      => _x( 'Experience', 'add new on admin bar', 'FoundationPress' ),
        'add_new'             => _x( 'Add New', 'experience', 'FoundationPress' ),
        'add_new_item'        => __( 'Add New Experience', 'FoundationPress' ),
        'new_item'            => __( 'New Experience', 'FoundationPress' ),
        'edit_item'           => __( 'Edit Experience', 'FoundationPress' ),
        'view_item'           => __( 'View Experience', 'FoundationPress' ),
        'all_items'           => __( 'All Experiences', 'FoundationPress' ),
        'search_items'        => __( 'Search Experiences', 'FoundationPress' ),
        'parent_item_colon'   => __( 'Parent Experiences:', 'FoundationPress' ),
        'not_found'           => __( 'No Experiences found.', 'FoundationPress' ),
        'not_found_in_trash'  => __( 'No Experiences found in Trash.', 'FoundationPress' )
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
            'slug'                => 'experience',
            'with_front'          => false,
        ),
        'has_archive'         => false,
        'hierarchical'        => true,
        'menu_position'       => null,
        'supports'            => array( 'title', 'editor', 'revisions', 'page-attributes' ),
        'menu_icon'           => 'dashicons-star-filled',
        'taxonomies'          => array( 'client-types', 'experience-types', 'matters', 'judges' ),
    );
    register_post_type( 'experience', $args );
}
