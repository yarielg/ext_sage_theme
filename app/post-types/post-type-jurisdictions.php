<?php
add_action( 'init', 'FoundationPress_post_type_jurisdiction' );

function FoundationPress_post_type_jurisdiction() {
    $labels = array(
        'name'                => _x( 'Jurisdictions', 'post type general name', 'FoundationPress' ),
        'singular_name'       => _x( 'Jurisdiction', 'post type singular name', 'FoundationPress' ),
        'menu_name'           => _x( 'Jurisdictions', 'admin menu', 'FoundationPress' ),
        'name_admin_bar'      => _x( 'Jurisdiction', 'add new on admin bar', 'FoundationPress' ),
        'add_new'             => _x( 'Add New', 'jurisdiction', 'FoundationPress' ),
        'add_new_item'        => __( 'Add New Jurisdiction', 'FoundationPress' ),
        'new_item'            => __( 'New Jurisdiction', 'FoundationPress' ),
        'edit_item'           => __( 'Edit Jurisdiction', 'FoundationPress' ),
        'view_item'           => __( 'View Jurisdiction', 'FoundationPress' ),
        'all_items'           => __( 'All Jurisdictions', 'FoundationPress' ),
        'search_items'        => __( 'Search Jurisdictions', 'FoundationPress' ),
        'parent_item_colon'   => __( 'Parent Jurisdictions:', 'FoundationPress' ),
        'not_found'           => __( 'No Jurisdictions found.', 'FoundationPress' ),
        'not_found_in_trash'  => __( 'No Jurisdictions found in Trash.', 'FoundationPress' )
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
            'slug'                => 'jurisdiction',
            'with_front'          => false,
        ),
        'has_archive'         => false,
        'hierarchical'        => true,
        'menu_position'       => null,
        'supports'            => array( 'title', 'revisions', 'page-attributes' ),
        'menu_icon'           => 'dashicons-book-alt',
    );
    register_post_type( 'jurisdiction', $args );
}
