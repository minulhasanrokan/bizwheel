<?php
/**
 * The Service for create and  displaying Service file
 * 
 * @package bizwheel
 */
 /**
 * Register a custom post type called "Service".
 *
 */

function bizwheel_feature_custom_service_post() {
    $labels = array(
        'name'                  => _x( 'Service', 'bizwheel' ),
        'singular_name'         => _x( 'Service', 'bizwheel' ),
        'menu_name'             => _x( 'Service', 'bizwheel' ),
        'name_admin_bar'        => _x( 'Service', 'bizwheel' ),
        'add_new'               => __( 'Add Service', 'bizwheel' ),
        'add_new_item'          => __( 'Add New Service', 'bizwheel' ),
        'new_item'              => __( 'New Service', 'bizwheel' ),
        'edit_item'             => __( 'Edit Service', 'bizwheel' ),
        'view_item'             => __( 'View Service', 'bizwheel' ),
        'all_items'             => __( 'All Service', 'bizwheel' ),
        'search_items'          => __( 'Search Service', 'bizwheel' ),
        'parent_item_colon'     => __( 'Parent Service:', 'bizwheel' ),
        'not_found'             => __( 'No Service found.', 'bizwheel' ),
        'not_found_in_trash'    => __( 'No Service found in Trash.', 'bizwheel' ),
        'featured_image'        => _x( 'Service Image', 'bizwheel' ),
        'set_featured_image'    => _x( 'Set Service image','bizwheel' ),
        'remove_featured_image' => _x( 'Remove Service image','bizwheel' ),
        'use_featured_image'    => _x( 'Use as Service image','bizwheel' ),
        'archives'              => _x( 'Service archives',  'bizwheel' ),
        'insert_into_item'      => _x( 'Insert into Service','bizwheel' ),
        'filter_items_list'     => _x( 'Filter Service list', 'bizwheel' ),
        'items_list_navigation' => _x( 'Service list navigation', 'bizwheel' ),
        'items_list'            => _x( 'Service list', 'bizwheel' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'service' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments','page-attributes' ),
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
 
    register_post_type( 'service', $args );
}
 
add_action( 'init', 'bizwheel_feature_custom_service_post' );

// Add the Custom Meta Box for service

function bizwheel_service_add_custom_meta_box() {
    add_meta_box(
        'custom_meta_box', // $id
        'Service Icon', // $title 
        'bizwheel_service_show_custom_meta_box', // $callback
        'service', // $page
        'normal', // $context
        'high' // $priority
    ); 
}
add_action('add_meta_boxes', 'bizwheel_service_add_custom_meta_box');
 
// The service callback function
function bizwheel_service_show_custom_meta_box($post){
  $url = get_post_meta($post->ID, 'service-icon', true); ?>
  <input id="my_image_URL" name="my_image_URL" type="text"
         value="<?php echo $url;?>" style="width:400px;" />
  <input id="my_upl_button" type="button" value="Upload Image" /><br/>
  <img src="<?php echo $url;?>" style="width:200px;" id="picsrc" />
  <script>
  jQuery(document).ready( function($) {
    jQuery('#my_upl_button').click(function() {
      window.send_to_editor = function(html) {
        imgurl = jQuery(html).attr('src')
        jQuery('#my_image_URL').val(imgurl);
        jQuery('#picsrc').attr("src", imgurl);
        tb_remove();
      }

      formfield = jQuery('#my_image_URL').attr('name');
      tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true' );
      return false;
    }); // End on click
  });
  </script>
<?php
}

add_action('save_post', function ($post_id) {
  if (isset($_POST['my_image_URL'])){
    update_post_meta($post_id, 'service-icon', $_POST['my_image_URL']);
  }
});