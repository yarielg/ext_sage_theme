<?php
add_action( 'init', 'FoundationPress_experience_types', 0 );

function FoundationPress_experience_types() {

    $labels = array(
        'name'                        => _x( 'Experience Types', 'taxonomy general name', 'FoundationPress' ),
        'singular_name'               => _x( 'Experience Types', 'taxonomy singular name', 'FoundationPress' ),
        'menu_name'                   => __( 'Experience Types', 'FoundationPress' ),
        'all_items'                   => __( 'All Experience Types', 'FoundationPress' ),
        'edit_item'                   => __( 'Edit Experience Types', 'FoundationPress' ),
        'view_item'                   => __( 'View Experience Types', 'FoundationPress' ),
        'update_item'                 => __( 'Update Experience Types', 'FoundationPress' ),
        'add_new_item'                => __( 'Add New Experience Types', 'FoundationPress' ),
        'new_item_name'               => __( 'New Experience Types Name', 'FoundationPress' ),
        'parent_item'                 => __( 'Parent Category', 'FoundationPress' ),
        'parent_item_colon'           => __( 'Parent Category:', 'FoundationPress' ),
        'search_items'                => __( 'Search Categories', 'FoundationPress' ),
        'popular_items'               => __( 'Popular Categories', 'FoundationPress' ),
        'separate_items_with_commas'  => __( 'Separate Categories with commas', 'FoundationPress' ),
        'add_or_remove_items'         => __( 'Add or remove Categories', 'FoundationPress' ),
        'choose_from_most_used'       => __( 'Choose from most used Categories', 'FoundationPress' ),
        'not_found'                   => __( 'No Experience Types found', 'FoundationPress' ),
    );

    $args = array(
        'public'                      => true,
        'publicly_queryable'          => false,
        'show_ui'                     => true,
        'show_in_nav_menus'           => false,
        'show_tagcloud'               => false,
        'show_in_quick_edit'          => true,
        'show_admin_column'           => true,
        'show_in_rest'                => true,
        'description'                 => '',
        'hierarchical'                => true,
        //'query_var'                   => false,
        'rewrite'                     => false,
        //'capabilities'                => '',
        'labels'                      => $labels,
    );

    register_taxonomy( 'experience-types', array( 'experience-types' ), $args );
}
