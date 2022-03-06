<?php
/**
 * The header top bar for displaying phone number email social link and many more file
 * 
 * @package bizwheel
 */
// 
if(!function_exists('bizwheel_header_top_bar')){

function bizwheel_header_top_bar(){
//header top display or not get value from header customizer
if (get_theme_mod('bizwheel-header-top-info-display') == 'Yes') { ?>
<!-- Topbar -->
<div class="topbar">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-12">
				<!-- Top Contact -->
				<div class="top-contact">
					<?php 
					//header top phone number get value from header customizer
					if (get_theme_mod('bizwheel-header-top-info-phone-number-display')) { ?>
					<div class="single-contact"><a href="tel:<?php echo get_theme_mod('bizwheel-header-top-info-phone-number-display'); ?>"><i class="fa fa-phone"></i>
					Phone: <?php echo get_theme_mod('bizwheel-header-top-info-phone-number-display'); ?>
					</a></div>
					<?php }?>
					<?php 
					//header top Email number get value from header customizer
					if (get_theme_mod('bizwheel-header-top-info-email-number-display')) { ?>
					<div class="single-contact"><a href="mailto:<?php echo get_theme_mod('bizwheel-header-top-info-email-number-display'); ?>"><i class="fa fa-envelope-open"></i>
					Email:<?php echo get_theme_mod('bizwheel-header-top-info-email-number-display'); ?>
					</a></div>
					<?php }?>
					<?php
					//header top opening and closing time get value from header customizer
					if (get_theme_mod('bizwheel-header-top-info-opening-time-display') OR get_theme_mod('bizwheel-header-top-info-closing-time-display') ) { ?>	
					<div class="single-contact"><i class="fa fa-clock-o"></i>
						Opening: <?php echo get_theme_mod('bizwheel-header-top-info-opening-time-display');
						if (get_theme_mod('bizwheel-header-top-info-closing-time-display') ) {
							echo "-".get_theme_mod('bizwheel-header-top-info-closing-time-display');
						}
						?>
					</div> 
				    <?php }?>
				</div>
				<!-- End Top Contact -->
			</div>	
			<div class="col-lg-4 col-12">
				<div class="topbar-right">
					<!-- Social Icons -->
					<ul class="social-icons">
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
					<?php 
					//header top button get value from header customizer
					if (get_theme_mod('bizwheel-header-top-info-button-display')) { ?>
					<div class="button">
						<a href="<?php echo esc_url(get_theme_mod('bizwheel-header-top-info-button-link-display'));?>" class="bizwheel-btn"><?php echo get_theme_mod('bizwheel-header-top-info-button-display');?></a>
					</div>
				    <?php }?>
				</div>
			</div>
		</div>
	</div>
</div>
<!--/ End Topbar -->
<?php
}
}
add_action('do_bizwheel_header_top_bar','bizwheel_header_top_bar');
}