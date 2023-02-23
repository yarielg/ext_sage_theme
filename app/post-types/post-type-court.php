<?php
add_action( 'init', 'FoundationPress_post_type_court' );

function FoundationPress_post_type_court() {
    $labels = array(
        'name'                => _x( 'Courts', 'post type general name', 'FoundationPress' ),
        'singular_name'       => _x( 'Court', 'post type singular name', 'FoundationPress' ),
        'menu_name'           => _x( 'Courts', 'admin menu', 'FoundationPress' ),
        'name_admin_bar'      => _x( 'Court', 'add new on admin bar', 'FoundationPress' ),
        'add_new'             => _x( 'Add New', 'court', 'FoundationPress' ),
        'add_new_item'        => __( 'Add New Court', 'FoundationPress' ),
        'new_item'            => __( 'New Court', 'FoundationPress' ),
        'edit_item'           => __( 'Edit Court', 'FoundationPress' ),
        'view_item'           => __( 'View Court', 'FoundationPress' ),
        'all_items'           => __( 'All Courts', 'FoundationPress' ),
        'search_items'        => __( 'Search Courts', 'FoundationPress' ),
        'parent_item_colon'   => __( 'Parent Courts:', 'FoundationPress' ),
        'not_found'           => __( 'No Courts found.', 'FoundationPress' ),
        'not_found_in_trash'  => __( 'No Courts found in Trash.', 'FoundationPress' )
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
            'slug'                => 'court',
            'with_front'          => false,
        ),
        'has_archive'         => false,
        'hierarchical'        => true,
        'menu_position'       => null,
        'supports'            => array( 'title', 'revisions', 'page-attributes' ),
        'menu_icon'           => 'dashicons-hammer',
    );
    register_post_type( 'court', $args );
}
