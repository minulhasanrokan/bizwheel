<?php
/**
 * The Call To Action for Call To Action area
 * 
 * @package bizwheel
 */

 if (!function_exists('bizwheel_callto_action_display')) {
    function bizwheel_callto_action_display(){

//call to action display or not get value from Slider customizer
if (get_theme_mod('bizwheel-callto-section-info-display') == 'Yes') { 
?>
<!-- Call To Action -->
<section class="call-action overlay" style="background-image:url('<?php 
	// call to action background image value
	if (get_theme_mod('bizwheel-callto-action-backgroundon-display')) {
		echo esc_url(get_theme_mod('bizwheel-callto-action-backgroundon-display'));
	}
	else{
		echo esc_url(get_home_url()."/wp-content/themes/bizwheel/img/calltoaction.png");
	}
?>')">
	<div class="container">
		<div class="row">
			<div class="col-lg-9 col-12">
				<div class="call-inner">
					<?php if(get_theme_mod('bizwheel-callto-action-title-display')){
					// call to action title value
					?>
					<h2><?php echo esc_html(get_theme_mod('bizwheel-callto-action-title-display')); ?></h2>
					<?php } ?>

					<?php if(get_theme_mod('bizwheel-callto-action-title-display')){
					// call to action discription value
					?>
					<p><?php echo esc_html(get_theme_mod('bizwheel-callto-action-discription-display')); ?></p>
					<?php } ?>
				</div>
			</div>
			<?php if(get_theme_mod('bizwheel-callto-action-button-display')){
			// call to action button value
			?>
			<div class="col-lg-3 col-12">
				<div class="button">
					<a <?php if (get_theme_mod('bizwheel-callto-action-button-open-display')=='Yes') {
						echo "target='_blank'";
					}?> href="<?php echo esc_url(get_theme_mod('bizwheel-callto-action-button-url-display'));?>" class="bizwheel-btn"><?php echo get_theme_mod('bizwheel-callto-action-button-display');?></a>
				</div>
			</div>
			<?php }?>
		</div>
	</div>
</section>
<!--/ End Call to action -->
<?php
}
}
add_action('do_bizwheel_callto_action_display','bizwheel_callto_action_display');
}