<?php
/**
 * The Slider for displaying Slider in home page
 * @package bizwheel
 */
// main menu.........
 if (!function_exists('bizwheel_slider_display')) {
    function bizwheel_slider_display(){

//Slider display or not get value from Slider customizer
if (get_theme_mod('bizwheel-slider-info-display') == 'Yes') { 
	// get slider category
	$slider_category=get_theme_mod('bizwheel-slider-category-display');
	// get slider number
	$slider_number=get_theme_mod('bizwheel-slider-number-display');
?>
<!-- Hero Slider -->
<section class="hero-slider style1">
	<div class="home-slider">
		<?php
		 // The Query
		 $the_slider = new WP_Query( array( 
		 	'post_type' => 'slider', 
		 	'order' => 'DSC',
		    'post_status' => 'publish',
		    'posts_per_page' => $slider_number,
		    'tax_query' => array(
                array(
                     'taxonomy' => 'slider-category',
                     'field' => 'slug',
                     'terms' => $slider_category
                )
           )
		 ) );
		 // The Loop for slider 
		 if ( $the_slider->have_posts() ) {
			 while ( $the_slider->have_posts() ) {
				 $the_slider->the_post();
				 $slider_meta = get_post_meta( get_the_ID() );
		;?>
		<!-- Single Slider -->
		<div class="single-slider" style="background-image:url('<?php 
																if(has_post_thumbnail()){
																echo esc_url(the_post_thumbnail_url());
																}
																else{
																	echo esc_url(get_home_url()."/wp-content/themes/bizwheel/img/slider_1700x800.png");
																}
																?>')">
			<div class="container">
				<div class="row">
					<div class="col-lg-7 col-md-8 col-12">
						<div class="welcome-text"> 
							<div class="hero-text"> 
								<?php
								// slider sub title
								if (isset($slider_meta['slider_sub_title'][0])){
								echo "<h4>".$slider_meta['slider_sub_title'][0]."</h4>";
								}
								?>
								<h1>
									<?php
									// slider title
									if (the_title()) {
										the_title();
										}
									?>
								</h1>
								<div class='p-text'>
									<?php
									// slider content
									if (get_the_content()) {
									echo wp_trim_words( get_the_content(), 20 );
									}
									?>
								</div>
								<div class="button">
									<?php
									// slider button 01
									if (isset($slider_meta['slider_button_01_text'][0])) {
									?>
									<a href="<?php echo esc_url($slider_meta['slider_button_01_link'][0]); ?>" class="bizwheel-btn theme-1 effect"><?php echo $slider_meta['slider_button_01_text'][0];?></a>
									<?php }?>
									<?php 
									// slider button 02
									if (isset($slider_meta['slider_button_02_text'][0])){
									?>
									<a href="<?php echo esc_url($slider_meta['slider_button_02_link'][0]); ?>" class="bizwheel-btn theme-2 effect"><?php echo $slider_meta['slider_button_02_text'][0];?></a>
									<?php }?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/ End Single Slider -->
		<?php
					}
		 } else {
			 echo("Broken");
		 }
		 /* Restore original slider Post Data */
		 wp_reset_postdata(); 
		?>
	</div>
</section>
<!--/ End Hero Slider -->
<?php
	}
	}
add_action('do_bizwheel_slider_display','bizwheel_slider_display');
}
//shaherjan.islam