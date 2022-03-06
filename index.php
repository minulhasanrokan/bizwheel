<?php
/**
 * The header for displaying header file
 * 
 * @package bizwheel
 */
?>
<?php get_header();?>
		
		<!-- Hero Slider -->
		<?php do_action('do_bizwheel_slider_display','bizwheel');?>
		<!--/ End Hero Slider -->
		
		<!-- Features Area -->
		<?php do_action('do_bizwheel_feature_display','bizwheel');?>
		<!--/ End Features Area -->
		
		<!-- Call To Action -->
		<?php do_action('do_bizwheel_callto_action_display','bizwheel');?>
		<!--/ End Call to action -->
		
		<!-- Services -->
		<?php do_action('do_bizwheel_service_display','bizwheel');?>
		<!--/ End Services -->
		
		<!-- Portfolio -->
		<?php do_action('do_bizwheel_portfolio_display','bizwheel');?>
		<!--/ End Portfolio -->
		
		<!-- Testimonials -->
		<?php get_template_part('template-part/home/testimonials','bizwheel');?>
		<!--/ End Testimonials -->
		
		<!-- Latest Blog -->
		<?php get_template_part('template-part/home/latest-blog','bizwheel');?>
		<!--/ End Latest Blog -->
		
		<!-- Client Area -->
		<?php get_template_part('template-part/home/clients','bizwheel');?>
		<!--/ End Client Area -->
<?php get_footer();?>