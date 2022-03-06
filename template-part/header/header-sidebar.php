<?php
/**
 * The header sidebar for displaying sidebar manu and about website and many more
 * 
 * @package bizwheel
 */
?>
<?php
if(!function_exists('bizwheel_header_sidebar')){

function bizwheel_header_sidebar(){
	//header sidebar  display or not get value from header sidebar customizer
	if (get_theme_mod('bizwheel-sidebar-display') == 'Yes') { 
?>
<!-- Sidebar Popup -->
<div class="sidebar-popup">
	<div class="cross">
		<a class="btn"><i class="fa fa-close"></i></a>
	</div>
	<?php
		//header sidebar about display or not get value from header sidebar customizer
		if (get_theme_mod('bizwheel-sidebar-about-display') == 'Yes') { 
	?>
	<div class="single-content">
		<!--about title-->
		<h4><?php echo esc_html(get_theme_mod('bizwheel-header-sidebar-about-title-display'));?></h4>
		<!--end about title-->
		<!--about details-->
		<?php echo esc_html(get_theme_mod('bizwheel-header-about-details-display'));?>
		<!-- end about details-->
		<!-- Social Icons -->
		<ul class="social">
			<?php 
			//header top facebook link get value from header customizer
			if (get_theme_mod('bizwheel-header-top-info-facebook-display')) { ?>
			<li><a href="<?php echo esc_url(get_theme_mod('bizwheel-header-top-info-facebook-display'));?>"><i class="fa fa-facebook"></i></a></li>
			<?php }?>
			<?php 
			//header top twitter link get value from header customizer
			if (get_theme_mod('bizwheel-header-top-info-twitter-display')) { ?>
			<li><a href="<?php echo esc_url(get_theme_mod('bizwheel-header-top-info-twitter-display'));?>"><i class="fa fa-twitter"></i></a></li>
			<?php }?>
			<?php 
			//header top linkedin link get value from header customizer
			if (get_theme_mod('bizwheel-header-top-info-linkedin-display')) { ?>
			<li><a href="<?php echo esc_url(get_theme_mod('bizwheel-header-top-info-linkedin-display'));?>"><i class="fa fa-linkedin"></i></a></li>
			<?php }?>
			<?php 
			//header top dribble link get value from header customizer
			if (get_theme_mod('bizwheel-header-top-info-dribble-display')) { ?>
			<li><a href="<?php echo esc_url(get_theme_mod('bizwheel-header-top-info-dribble-display'));?>"><i class="fa fa-dribbble"></i></a></li>
			<?php }?>
		</ul>
	</div>
	<?php }?>

	<div class="single-content">
		<!--Important Links title-->
		<h4><?php echo esc_html(get_theme_mod('bizwheel-header-important-link-title-display'));?></h4> 
		<!-- end important link Naviagiton -->
		<?php do_action('do_bizwheel_important_link_menu','bizwheel');?>
		<!--/ End important link Naviagiton -->
	</div>	
</div>
<!--/ Sidebar Popup -->	
<?php }
}
add_action('do_bizwheel_header_sidebar','bizwheel_header_sidebar');
}
