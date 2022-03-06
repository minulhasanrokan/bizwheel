<?php
/**
 * The Portfolio for create and  displaying Portfolio file
 * 
 * @package bizwheel
 */
 /**
 * Register a custom post type called "Portfolio".
 *
 */
function bizwheel_Portfolio_custom_post() {
    $labels = array(
        'name'                  => _x( 'Portfolioes', 'bizwheel' ),
        'singular_name'         => _x( 'Portfolio', 'bizwheel' ),
        'menu_name'             => _x( 'Portfolioes', 'bizwheel' ),
        'name_admin_bar'        => _x( 'Portfolio', 'bizwheel' ),
        'add_new'               => __( 'Add Portfolio', 'bizwheel' ),
        'add_new_item'          => __( 'Add New Portfolioes', 'bizwheel' ),
        'new_item'              => __( 'New Portfolio', 'bizwheel' ),
        'edit_item'             => __( 'Edit Portfolio', 'bizwheel' ),
        'view_item'             => __( 'View Portfolio', 'bizwheel' ),
        'all_items'             => __( 'All Portfolioes', 'bizwheel' ),
        'search_items'          => __( 'Search Portfolio', 'bizwheel' ),
        'parent_item_colon'     => __( 'Parent Portfolio:', 'bizwheel' ),
        'not_found'             => __( 'No Portfolioes found.', 'bizwheel' ),
        'not_found_in_trash'    => __( 'No Portfolioes found in Trash.', 'bizwheel' ),
        'featured_image'        => _x( 'Portfolio Image', 'bizwheel' ),
        'set_featured_image'    => _x( 'Set Portfolio image','bizwheel' ),
        'remove_featured_image' => _x( 'Remove Portfolio image','bizwheel' ),
        'use_featured_image'    => _x( 'Use as Portfolio image','bizwheel' ),
        'archives'              => _x( 'Portfolio archives',  'bizwheel' ),
        'insert_into_item'      => _x( 'Insert into Portfolio','bizwheel' ),
        'filter_items_list'     => _x( 'Filter Portfolioes list', 'bizwheel' ),
        'items_list_navigation' => _x( 'Portfolioes list navigation', 'bizwheel' ),
        'items_list'            => _x( 'Portfolioes list', 'bizwheel' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'Portfolio' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments','custom-fields','page-attributes' ),
        'taxonomies'          => array( 'post_tag','genres','Portfolio-category'),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest' => true,
    );
 
    register_post_type( 'portfolio', $args );
}
 
add_action( 'init', 'bizwheel_Portfolio_custom_post' );


register_taxonomy("Portfolio-category", array("portfolio"), array(
    "hierarchical"  =>  true, 
    "label" => "Portfolio Categories", 
    "singular_label" => 
    "Portfolio Category",  
    "rewrite" => true,
    'default_term'  => 'Un Category',
));
