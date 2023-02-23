<?php
add_action( 'init', 'FoundationPress_services_categories', 0 );

function FoundationPress_services_categories() {

    $labels = array(
        'name'                        => _x( 'Areas of Focus', 'taxonomy general name', 'FoundationPress' ),
        'singular_name'               => _x( 'Areas of Focus', 'taxonomy singular name', 'FoundationPress' ),
        'menu_name'                   => __( 'Areas of Focus', 'FoundationPress' ),
        'all_items'                   => __( 'All Areas of Focus', 'FoundationPress' ),
        'edit_item'                   => __( 'Edit Areas of Focus', 'FoundationPress' ),
        'view_item'                   => __( 'View Areas of Focus', 'FoundationPress' ),
        'update_item'                 => __( 'Update Areas of Focus', 'FoundationPress' ),
        'add_new_item'                => __( 'Add New Areas of Focus', 'FoundationPress' ),
        'new_item_name'               => __( 'New Areas of Focus Name', 'FoundationPress' ),
        'parent_item'                 => __( 'Parent Area', 'FoundationPress' ),
        'parent_item_colon'           => __( 'Parent Area:', 'FoundationPress' ),
        'search_items'                => __( 'Search Areas', 'FoundationPress' ),
        'popular_items'               => __( 'Popular Areas', 'FoundationPress' ),
        'separate_items_with_commas'  => __( 'Separate Areas with commas', 'FoundationPress' ),
        'add_or_remove_items'         => __( 'Add or remove Areas', 'FoundationPress' ),
        'choose_from_most_used'       => __( 'Choose from most used Areas', 'FoundationPress' ),
        'not_found'                   => __( 'No Areas of Focus found', 'FoundationPress' ),
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

    register_taxonomy( 'areas-of-focus', array( 'areas-of-focus' ), $args );
}
