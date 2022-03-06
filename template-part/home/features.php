<?php
/**
 * The Features Area for displaying Features 
 * 
 * @package bizwheel
 */

 if (!function_exists('bizwheel_feature_display')) {
    function bizwheel_feature_display(){

//Slider display or not get value from Slider customizer
if (get_theme_mod('bizwheel-feature-info-display') == 'Yes') { 
	// get feature number
	$get_feature_number=get_theme_mod('bizwheel-feature-number-display');
	// get feature css
	if ($get_feature_number==1) {
			$feature_css = "col-lg-12 col-md-12 col-12";
		}
	else if($get_feature_number==2){
		$feature_css = "col-lg-6 col-md-6 col-12";
	}
	else if($get_feature_number==3){
		$feature_css = "col-lg-4 col-md-6 col-12";
	}
	else if($get_feature_number==4){
		$feature_css = "col-lg-3 col-md-6 col-12";
	}
	else if($get_feature_number==5){
		$feature_css = "col-lg-3 col-md-6 col-12";
	}
	else if($get_feature_number==6){
		$feature_css = "col-lg-4 col-md-6 col-12";
	}
	else if($get_feature_number==7){
		$feature_css = "col-lg-3 col-md-6 col-12";
	}
	else if($get_feature_number==8){
		$feature_css = "col-lg-3 col-md-6 col-12";
	}
	else{
		$feature_css = "col-lg-3 col-md-6 col-12";
	}

?>
<!-- Features Area -->
<section class="features-area section-bg">
	<div class="container">
		<div class="row">
			<?php
		 // The Query for feature
		 $the_feature = new WP_Query( array( 
		 	'post_type' => 'feature', 
		 	'posts_per_page' => $get_feature_number,
		 	'order' => 'DSC',
		    'post_status' => 'publish',
		 ) );
		 // The Loop for slider 
		 if ( $the_feature->have_posts() ) {
			 while ( $the_feature->have_posts() ) {
				 $the_feature->the_post();
			?>
			<div class="<?php echo $feature_css; ?>">
				<!-- Single Feature -->
				<div class="single-feature">
					<div class="icon-head">
						<a href="<?php esc_url(the_permalink());?>">
						<img style="height: 150px; width: 150px" class="rounded-circle" src="<?php if(has_post_thumbnail()){
																echo esc_url(the_post_thumbnail_url());
																}
																else{
																	echo esc_url(get_home_url()."/wp-content/themes/bizwheel/img/slider_1700x800.png");
																}
																?>')" style="border-radius: 100%;">
						</a>
					</div>
					<h4><a href="<?php esc_url(the_permalink());?>"><?php the_title();?></a></h4>
					<?php
					// feature content
					if (get_the_content()) {
					echo wp_trim_words( get_the_content(), 15 );
					}
					?>
					<div class="button">
						<a href="<?php esc_url(the_permalink());?>" class="bizwheel-btn"><i class="fa fa-arrow-circle-o-right"></i>Learn More</a>
					</div>
				</div>
				<!--/ End Single Feature -->
			</div>
			<?php
			}
			 } else {
				 echo("Broken");
			 }
			 /* Restore original slider Post Data */
			 wp_reset_postdata(); 
			?>
		</div>
	</div>
</section>
<!--/ End Features Area -->

<?php
	}
	}
add_action('do_bizwheel_feature_display','bizwheel_feature_display');
}
//shaherjan.islam