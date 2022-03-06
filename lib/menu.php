<?php
/**
 * The menu file for load all  menu functions
 * 
 * @package bizwheel
 */


// main menu.........
 if (!function_exists('bizwheel_main_menu')) {
    function bizwheel_main_menu(){
        wp_nav_menu( array( 
        'theme_location' => 'main-menu',
        'container' => false,
        'mrnu_id' => 'nav',
        'menu_class' => 'nav main-menu menu navbar-nav',
        'depth'                => 0,
        

        ) );
    }
    add_action('do_bizwheel_main_menu','bizwheel_main_menu');
}

// important link  menu.........
 if (!function_exists('bizwheel_important_link_menu')) {
    function bizwheel_important_link_menu(){
        wp_nav_menu( array( 
        'theme_location' => 'important-link',
        'container' => false,
        'mrnu_id' => 'nav',
        'menu_class' => 'links',
        'depth'    => 0,
        

        ) );
    }
    add_action('do_bizwheel_important_link_menu','bizwheel_important_link_menu');
}
