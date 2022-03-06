<?php
/**
 * The Feature for create and  displaying Feature file
 * 
 * @package bizwheel
 */
 /**
 * Register a custom post type called "Feature".
 *
 */
function bizwheel_feature_custom_post() {
    $labels = array(
        'name'                  => _x( 'Feature', 'bizwheel' ),
        'singular_name'         => _x( 'Feature', 'bizwheel' ),
        'menu_name'             => _x( 'Feature', 'bizwheel' ),
        'name_admin_bar'        => _x( 'Feature', 'bizwheel' ),
        'add_new'               => __( 'Add Feature', 'bizwheel' ),
        'add_new_item'          => __( 'Add New Feature', 'bizwheel' ),
        'new_item'              => __( 'New Feature', 'bizwheel' ),
        'edit_item'             => __( 'Edit Feature', 'bizwheel' ),
        'view_item'             => __( 'View Feature', 'bizwheel' ),
        'all_items'             => __( 'All Feature', 'bizwheel' ),
        'search_items'          => __( 'Search Feature', 'bizwheel' ),
        'parent_item_colon'     => __( 'Parent Feature:', 'bizwheel' ),
        'not_found'             => __( 'No Feature found.', 'bizwheel' ),
        'not_found_in_trash'    => __( 'No Feature found in Trash.', 'bizwheel' ),
        'featured_image'        => _x( 'Feature Image', 'bizwheel' ),
        'set_featured_image'    => _x( 'Set Feature image','bizwheel' ),
        'remove_featured_image' => _x( 'Remove Feature image','bizwheel' ),
        'use_featured_image'    => _x( 'Use as Feature image','bizwheel' ),
        'archives'              => _x( 'Feature archives',  'bizwheel' ),
        'insert_into_item'      => _x( 'Insert into Feature','bizwheel' ),
        'filter_items_list'     => _x( 'Filter Feature list', 'bizwheel' ),
        'items_list_navigation' => _x( 'Feature list navigation', 'bizwheel' ),
        'items_list'            => _x( 'Feature list', 'bizwheel' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'feature' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments','custom-fields','page-attributes' ),
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
 
    register_post_type( 'feature', $args );
}
 
add_action( 'init', 'bizwheel_feature_custom_post' );

