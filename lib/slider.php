<?php
/**
 * The slider for create and  displaying slider file
 * 
 * @package bizwheel
 */
 /**
 * Register a custom post type called "slider".
 *
 */
function bizwheel_slider_custom_post() {
    $labels = array(
        'name'                  => _x( 'Sliders', 'bizwheel' ),
        'singular_name'         => _x( 'Slider', 'bizwheel' ),
        'menu_name'             => _x( 'Sliders', 'bizwheel' ),
        'name_admin_bar'        => _x( 'Slider', 'bizwheel' ),
        'add_new'               => __( 'Add Slider', 'bizwheel' ),
        'add_new_item'          => __( 'Add New Sliders', 'bizwheel' ),
        'new_item'              => __( 'New Slider', 'bizwheel' ),
        'edit_item'             => __( 'Edit Slider', 'bizwheel' ),
        'view_item'             => __( 'View Slider', 'bizwheel' ),
        'all_items'             => __( 'All Sliders', 'bizwheel' ),
        'search_items'          => __( 'Search Slider', 'bizwheel' ),
        'parent_item_colon'     => __( 'Parent Slider:', 'bizwheel' ),
        'not_found'             => __( 'No Sliders found.', 'bizwheel' ),
        'not_found_in_trash'    => __( 'No Sliders found in Trash.', 'bizwheel' ),
        'featured_image'        => _x( 'Slider Image', 'bizwheel' ),
        'set_featured_image'    => _x( 'Set Slider image','bizwheel' ),
        'remove_featured_image' => _x( 'Remove Slider image','bizwheel' ),
        'use_featured_image'    => _x( 'Use as Slider image','bizwheel' ),
        'archives'              => _x( 'Slider archives',  'bizwheel' ),
        'insert_into_item'      => _x( 'Insert into Slider','bizwheel' ),
        'filter_items_list'     => _x( 'Filter Sliders list', 'bizwheel' ),
        'items_list_navigation' => _x( 'Sliders list navigation', 'bizwheel' ),
        'items_list'            => _x( 'Sliders list', 'bizwheel' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'Slider' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments','custom-fields','page-attributes' ),
        'taxonomies'          => array( 'post_tag','genres','slider-category'),
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
 
    register_post_type( 'Slider', $args );
}
 
add_action( 'init', 'bizwheel_slider_custom_post' );

// Add the Custom Meta Box for slider

function bizwheel_slider_add_custom_meta_box() {
    add_meta_box(
        'custom_meta_box', // $id
        'Custom Meta Box', // $title 
        'bizwheel_slider_show_custom_meta_box', // $callback
        'slider', // $page
        'normal', // $context
        'high' // $priority
    ); 
}
add_action('add_meta_boxes', 'bizwheel_slider_add_custom_meta_box');
// Custom slider fields array
$prefix = 'slider_';
$custom_meta_fields = array(
    array(
        'label'=> 'Sub Title',
        'desc'  => 'Enter Sub Title to be displayed',
        'id'    => $prefix.'sub_title',
        'type'  => 'text',
    ),
 array(
  		'label'=> 'Button 01',
        'desc'  => 'Enter Button 01 text',
        'id'    => $prefix.'button_01_text',
        'type'  => 'text'
    ),
  array(
  		'label'=> 'Button 01 Link',
        'desc'  => 'Enter Button 01 link',
        'id'    => $prefix.'button_01_link',
        'type'  => 'text'
    ),
   array(
  		'label'=> 'Button 02',
        'desc'  => 'Enter Button 02 text',
        'id'    => $prefix.'button_02_text',
        'type'  => 'text'
    ),
    array(
  		'label'=> 'Button 02 link',
        'desc'  => 'Enter Button 02 link',
        'id'    => $prefix.'button_02_link',
        'type'  => 'text'
    )
);
 
// The slider callback function
function bizwheel_slider_show_custom_meta_box() {
 
    global $custom_meta_fields, $post;
     
    // Use nonce for verification
    echo '<input type="hidden" name="custom_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';
      
    // Begin the field table and loop
    echo '<table class="form-table">';
     
    foreach ($custom_meta_fields as $field) {
        // get value of this field if it exists for this post
        $meta = get_post_meta($post->ID, $field['id'], true);
        // begin a table row with
        echo '<tr>
                <th><label for="'.$field['id'].'">'.$field['label'].'</label></th>
                <td>';
                switch($field['type']) {
                    // text field
                    case 'text':
                        echo '<input type="text" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" size="30" />
                            <br /><span class="description">'.$field['desc'].'</span>';
                    break;
nbsp;               }
        echo '</td></tr>';
    }
     
    echo '</table>';
     
}
 
// Save the custom meta data
function bizwheel_slider_save_custom_meta($post_id) {
 
    global $custom_meta_fields;
    if (isset($_POST['custom_meta_box_nonce'])) {
        // verify nonce
        if (!wp_verify_nonce($_POST['custom_meta_box_nonce'], basename(__FILE__))){
            return $post_id;
        } 
    }
         
    // check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return $post_id;
         
    // check permissions
    if (isset($_POST['post_type'])) {
        if ('page' == $_POST['post_type']) {
            if (!current_user_can('edit_page', $post_id))
                return $post_id;
            } elseif (!current_user_can('edit_post', $post_id)) {
                return $post_id;
        }
    }
    if (isset($_POST['custom_meta_box_nonce'])) {
        // loop through fields and save the slider meta data
        foreach ($custom_meta_fields as $field) {
            $old = get_post_meta($post_id, $field['id'], true);
            $new = $_POST[$field['id']];
            if ($new && $new != $old) {
                update_post_meta($post_id, $field['id'], $new);
            } elseif ('' == $new && $old) {
                delete_post_meta($post_id, $field['id'], $old);
            }
        }
    }
}
add_action('save_post', 'bizwheel_slider_save_custom_meta');



register_taxonomy("slider-category", array("slider"), array(
    "hierarchical"  =>  true, 
    "label" => "Slider Categories", 
    "singular_label" => 
    "Slider Category",  
    "rewrite" => true,
    'default_term'  => 'Un Category',
));

// this function makes all posts in the default category private
 
function set_private_categories($post_id) {
    // If this is a revision, get real post ID
    if ( $parent_id = wp_is_post_revision( $post_id ) ) 
        $post_id = $parent_id;
 
    // Get default category ID from options
    $defaultcat = get_option( 'slider-category' );
 
    // Check if this post is in default category
    if ( in_category( $defaultcat, $post_id ) ) {
        // unhook this function so it doesn't loop infinitely
        remove_action( 'save_post', 'set_private_categories' );
 
        // update the post, which calls save_post again
        wp_update_post( array( 'ID' => $post_id, 'post_status' => 'private' ) );
 
        // re-hook this function
        add_action( 'save_post', 'set_private_categories' );
    }
}
add_action( 'save_post', 'set_private_categories' );



