<?php
/**
 * The theme support file for load all  theme support functions
 * 
 * @package bizwheel
 */

function bizwheel_setup_theme(){
	// title tag
    add_theme_support('title-tag');
    // custom logo setup..........
	add_theme_support( 'custom-logo', array(
	    'height'      => 84,
	    'width'       => 184,
	    'flex-height' => true,
	    'flex-width'  => true,
	    'header-text' => array( 'site-title', 'site-description' ),
	) );
    // post & page image or video support.....
	add_theme_support( 'post-thumbnails', array( 'post', 'page','slider','feature', 'service','portfolio') );
	// custom background.......
	add_theme_support( 'custom-background' );
	// custom header..........
	add_theme_support( 'custom-header' );
	// html file support.....
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );
	// widhets support........
	add_theme_support( 'customize-selective-refresh-widgets' );
	// add menu
	register_nav_menus(array(
        'main-menu' => __('Primary Menu', 'bizwheel'),
        'important-link' => __('Important link Menu', 'bizwheel'),
        'footer-menu' => __('Footer Menu', 'bizwheel')
    ));
}
add_action('after_setup_theme', 'bizwheel_setup_theme');

// add necessary scripts
add_action('plugins_loaded', function(){
  if($GLOBALS['pagenow']=='post.php'){
    add_action('admin_print_scripts', 'my_admin_scripts');
    add_action('admin_print_styles',  'my_admin_styles');
  }
});

function my_admin_scripts(){
  wp_enqueue_script('jquery');
  wp_enqueue_script('media-upload');
  wp_enqueue_script('thickbox');
}

// Proper way to enqueue
// wp_register_script(
//   'my-upload',
//   WP_PLUGIN_URL.'/my-script.js',
//   array('jquery','media-upload','thickbox') /* dependencies */
// );
//
// wp_enqueue_script('my-upload');

function my_admin_styles(){
  wp_enqueue_style('thickbox');
}
