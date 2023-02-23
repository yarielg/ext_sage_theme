<?php
add_action( 'init', 'FoundationPress_news_categories', 0 );

function FoundationPress_news_categories() {

    $labels = array(
        'name'                        => _x( 'News Categories', 'taxonomy general name', 'FoundationPress' ),
        'singular_name'               => _x( 'News Categories', 'taxonomy singular name', 'FoundationPress' ),
        'menu_name'                   => __( 'News Categories', 'FoundationPress' ),
        'all_items'                   => __( 'All News Categories', 'FoundationPress' ),
        'edit_item'                   => __( 'Edit News Categories', 'FoundationPress' ),
        'view_item'                   => __( 'View News Categories', 'FoundationPress' ),
        'update_item'                 => __( 'Update News Categories', 'FoundationPress' ),
        'add_new_item'                => __( 'Add New News Categories', 'FoundationPress' ),
        'new_item_name'               => __( 'New News Categories Name', 'FoundationPress' ),
        'parent_item'                 => __( 'Parent Category', 'FoundationPress' ),
        'parent_item_colon'           => __( 'Parent Category:', 'FoundationPress' ),
        'search_items'                => __( 'Search Categories', 'FoundationPress' ),
        'popular_items'               => __( 'Popular Categories', 'FoundationPress' ),
        'separate_items_with_commas'  => __( 'Separate Categories with commas', 'FoundationPress' ),
        'add_or_remove_items'         => __( 'Add or remove Categories', 'FoundationPress' ),
        'choose_from_most_used'       => __( 'Choose from most used Categories', 'FoundationPress' ),
        'not_found'                   => __( 'No News Categories found', 'FoundationPress' ),
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

    register_taxonomy( 'news-categories', array( 'news-categories' ), $args );
}
