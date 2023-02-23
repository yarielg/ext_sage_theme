<?php
add_action( 'init', 'FoundationPress_post_type_jobs' );

function FoundationPress_post_type_jobs() {
    $labels = array(
        'name'                => _x( 'Jobs', 'post type general name', 'FoundationPress' ),
        'singular_name'       => _x( 'Job', 'post type singular name', 'FoundationPress' ),
        'menu_name'           => _x( 'Jobs', 'admin menu', 'FoundationPress' ),
        'name_admin_bar'      => _x( 'Job', 'add new on admin bar', 'FoundationPress' ),
        'add_new'             => _x( 'Add New', 'job', 'FoundationPress' ),
        'add_new_item'        => __( 'Add New Job', 'FoundationPress' ),
        'new_item'            => __( 'New Job', 'FoundationPress' ),
        'edit_item'           => __( 'Edit Job', 'FoundationPress' ),
        'view_item'           => __( 'View Job', 'FoundationPress' ),
        'all_items'           => __( 'All Jobs', 'FoundationPress' ),
        'search_items'        => __( 'Search Jobs', 'FoundationPress' ),
        'parent_item_colon'   => __( 'Parent Jobs:', 'FoundationPress' ),
        'not_found'           => __( 'No Jobs found.', 'FoundationPress' ),
        'not_found_in_trash'  => __( 'No Jobs found in Trash.', 'FoundationPress' )
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
            'slug'                => 'jobs',
            'with_front'          => false,
        ),
        'has_archive'         => false,
        'hierarchical'        => true,
        'menu_position'       => null,
        'supports'            => array( 'title', 'editor', 'revisions', 'page-attributes' ),
        'menu_icon'           => 'dashicons-paperclip',
        'taxonomies'          => array()
    );
    register_post_type( 'jobs', $args );
}
