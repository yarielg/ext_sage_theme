<?php
add_action( 'init', 'FoundationPress_post_type_highlight' );

function FoundationPress_post_type_highlight() {
    $labels = array(
        'name'                => _x( 'Highlights', 'post type general name', 'FoundationPress' ),
        'singular_name'       => _x( 'Highlight', 'post type singular name', 'FoundationPress' ),
        'menu_name'           => _x( 'Highlights', 'admin menu', 'FoundationPress' ),
        'name_admin_bar'      => _x( 'Highlight', 'add new on admin bar', 'FoundationPress' ),
        'add_new'             => _x( 'Add New', 'highlight', 'FoundationPress' ),
        'add_new_item'        => __( 'Add New Highlight', 'FoundationPress' ),
        'new_item'            => __( 'New Highlight', 'FoundationPress' ),
        'edit_item'           => __( 'Edit Highlight', 'FoundationPress' ),
        'view_item'           => __( 'View Highlight', 'FoundationPress' ),
        'all_items'           => __( 'All Highlights', 'FoundationPress' ),
        'search_items'        => __( 'Search Highlights', 'FoundationPress' ),
        'parent_item_colon'   => __( 'Parent Highlights:', 'FoundationPress' ),
        'not_found'           => __( 'No Highlights found.', 'FoundationPress' ),
        'not_found_in_trash'  => __( 'No Highlights found in Trash.', 'FoundationPress' )
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
            'slug'                => 'highlight',
            'with_front'          => false,
        ),
        'has_archive'         => false,
        'hierarchical'        => true,
        'menu_position'       => null,
        'supports'            => array( 'title', 'editor', 'revisions', 'page-attributes' ),
        'menu_icon'           => 'dashicons-awards',
    );
    register_post_type( 'highlight', $args );
}
