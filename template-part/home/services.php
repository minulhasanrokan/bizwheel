<?php
/**
 * The Services for displaying all service area
 * 
 * @package bizwheel
 */

 if (!function_exists('bizwheel_service_display')) {
    function bizwheel_service_display(){

//service display or not get value from service customizer
if (get_theme_mod('bizwheel-service-info-display') == 'Yes') { 
	// get service number
	$get_service_number=get_theme_mod('bizwheel-service-number-display');
	// get service css
	if ($get_service_number==1) {
			$service_css = "col-lg-12 col-md-12 col-12";
		}
	else if($get_service_number==2){
		$service_css = "col-lg-6 col-md-6 col-12";
	}
	else if($get_service_number==3){
		$service_css = "col-lg-4 col-md-6 col-12";
	}
	else if($get_service_number==4){
		$service_css = "col-lg-3 col-md-6 col-12";
	}
	else if($get_service_number==5){
		$service_css = "col-lg-3 col-md-6 col-12";
	}
	else if($get_service_number==6){
		$service_css = "col-lg-4 col-md-6 col-12";
	}
	else if($get_service_number==7){
		$service_css = "col-lg-3 col-md-6 col-12";
	}
	else if($get_service_number==8){
		$service_css = "col-lg-3 col-md-6 col-12";
	}
	else{
		$service_css = "col-lg-3 col-md-6 col-12";
	}

?>
<!-- Services -->
<section class="services section-bg section-space">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="section-title style2 text-center">
					<div class="section-top">
						<h1>
							<?php 
							//service popup set vslue from service customizer
							if (get_theme_mod('bizwheel-service-popup-display')) { ?>
							<span><?php echo esc_html(get_theme_mod('bizwheel-service-popup-display'));?></span>
							<?php }?>
							<?php 
							//service title set vslue from service customizer
							if (get_theme_mod('bizwheel-service-title-display')) { ?>
							<b><?php echo esc_html(get_theme_mod('bizwheel-service-title-display'));?></b></h1>
							<?php }?>
							<?php 
							//service sub title set vslue from service customizer
							if (get_theme_mod('bizwheel-service-sub-title-display')) { ?>
							<h4><?php echo esc_html(get_theme_mod('bizwheel-service-sub-title-display'));?></h4>
							<?php }?>
					</div>
					<?php 
					//service description set vslue from service customizer
					if (get_theme_mod('bizwheel-service-description-display')) { ?>
					<div class="section-bottom">
						<div class="text-style-two">
							<?php echo esc_html(get_theme_mod('bizwheel-service-description-display'));?>
						</div>
					</div>
					<?php }?>
				</div>
			</div>
		</div>
		<div class="row">
			<?php
			 // The Query for service
			 $the_service = new WP_Query( array( 
			 	'post_type' => 'service', 
			 	'posts_per_page' => $get_service_number,
			 	'order' => 'DSC',
			    'post_status' => 'publish',
			 ) );
			 // The Loop for service 
			 if ( $the_service->have_posts() ) {
				 while ( $the_service->have_posts() ) {
					 $the_service->the_post();
					  $service_meta = get_post_meta( get_the_ID() );
			?>
			<div class="<?php echo $service_css; ?>">
				<!-- Single Service -->
				<div class="single-service">
					<div class="service-head">
						<img src="<?php if(has_post_thumbnail()){
																echo esc_url(the_post_thumbnail_url());
																}
																else{
																	echo esc_url(get_home_url()."/wp-content/themes/bizwheel/img/service.png");
																}
																?>')">
						<?php if(isset($service_meta['my-image-for-service'][0])){?>
						<div class="icon-bg"><img style="hieght:100%; width: 100%; border-radius: 100%;" src="<?php echo $service_meta['my-image-for-service'][0];?>"></div>
						<?php  }?>
					</div>
					<div class="service-content">
						<h4><a href="<?php esc_url(the_permalink());?>"><?php the_title();?></a></h4>
						<p><?php
						// service content
						if (get_the_content()) {
						echo wp_trim_words( get_the_content(), 20 );
						}
						?></p>
						<a class="btn" href="<?php esc_url(the_permalink());?>"><i class="fa fa-arrow-circle-o-right"></i>View Service</a>
					</div>
				</div>
				<!--/ End Single Service -->
			</div>
			<?php
				}
				 }
				 /* Restore original slider Post Data */
				 wp_reset_postdata(); 
			?>
		</div>
	</div>
</section>
<!--/ End Services -->

<?php
	}
	}
add_action('do_bizwheel_service_display','bizwheel_service_display');
}
//shaherjan.islam