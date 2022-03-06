<?php
/**
 * The portfolio for displaying all portfolio area
 * 
 * @package bizwheel
 */
 if (!function_exists('bizwheel_portfolio_display')) {
    function bizwheel_portfolio_display(){

//portfolio display or not get value from service customizer
if (get_theme_mod('bizwheel-portfolio-info-display') == 'Yes') { 
?>

<!-- Portfolio -->
<section class="portfolio section-space">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12">
				<div class="section-title default text-center">
					<div class="section-top">
						<h1>
							<?php 
							//portfolio popup set vslue from portfolio customizer
							if (get_theme_mod('bizwheel-portfolio-popup-display')) { ?>
							<span><?php echo esc_html(get_theme_mod('bizwheel-portfolio-popup-display'));?></span>
							<?php }?>
							<?php 
							//portfolio title set vslue from portfolio customizer
							if (get_theme_mod('bizwheel-portfolio-title-display')) { ?>
							<b><?php echo esc_html(get_theme_mod('bizwheel-portfolio-title-display'));?></b>
							<?php }?>
						</h1>
					</div>
					<?php 
					//portfolio description set vslue from portfolio customizer
					if (get_theme_mod('bizwheel-portfolio-description-display')) { ?>
					<div class="section-bottom">
						<div class="text">
							<p><?php echo esc_html(get_theme_mod('bizwheel-portfolio-description-display'));?></p>
						</div>
					</div>
					<?php }?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="portfolio-menu">
					<!-- Portfolio Nav -->
					<ul id="portfolio-nav" class="portfolio-nav tr-list list-inline cbp-l-filters-work">
						<?php
							// get category for portfolio to display
					        $portfolio_categories =get_terms('slider-category');
					        $cats = array();
					        $i = 0;
					        foreach($categories as $category){
					            if($i==0){
					                $default = $category->slug;
					                $i++;
					            }
					            echo '<li data-filter=".{}" class="cbp-filter-item">Animation</li>'.$cats[$category->slug] = $category->name;
					        }
						?>
						<li data-filter="*" class="cbp-filter-item active">All</li>
						<li data-filter=".animation" class="cbp-filter-item">Animation</li>
						<li data-filter=".branding" class="cbp-filter-item">Branding</li>
						<li data-filter=".business" class="cbp-filter-item">Business</li>
						<li data-filter=".consulting" class="cbp-filter-item">Consulting</li>
						<li data-filter=".marketing" class="cbp-filter-item">Marketing</li>
						<li data-filter=".seo" class="cbp-filter-item">SEO</li>
					</ul>
					<!--/ End Portfolio Nav -->
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="portfolio-main">
					<div id="portfolio-item" class="portfolio-item-active">
						<div class="cbp-item business animation">
							<!-- Single Portfolio -->
							<div class="single-portfolio">
								<div class="portfolio-head overlay">
									<img src="https://via.placeholder.com/600x415" alt="#">
									<a class="more" href="portfolio-single.html"><i class="fa fa-long-arrow-right"></i></a>
								</div>
								<div class="portfolio-content">
									<h4><a href="portfolio-single.html">Creative Marketing</a></h4>
									<p>Business, Aniamtion</p>
								</div>
							</div>
							<!--/ End Single Portfolio -->
						</div>
						<div class="cbp-item seo consulting">
							<!-- Single Portfolio -->
							<div class="single-portfolio">
								<div class="portfolio-head overlay">
									<img src="https://via.placeholder.com/600x415" alt="#">
									<a class="more" href="portfolio-single.html"><i class="fa fa-long-arrow-right"></i></a>
								</div>
								<div class="portfolio-content">
									<h4><a href="portfolio-single.html">Creative Marketing</a></h4>
									<p>Seo, Consulting</p>
								</div>
							</div>
							<!--/ End Single Portfolio -->
						</div>
						<div class="cbp-item marketing seo">
							<!-- Single Portfolio -->
							<div class="single-portfolio">
								<div class="portfolio-head overlay">
									<img src="https://via.placeholder.com/600x415" alt="#">
									<a class="more" href="portfolio-single.html"><i class="fa fa-long-arrow-right"></i></a>
								</div>
								<div class="portfolio-content">
									<h4><a href="portfolio-single.html">Creative Marketing</a></h4>
									<p>Marketing, SEO</p>
								</div>
							</div>
							<!--/ End Single Portfolio -->
						</div>
						<div class="cbp-item animation branding">
							<!-- Single Portfolio -->
							<div class="single-portfolio">
								<div class="portfolio-head overlay">
									<img src="https://via.placeholder.com/600x415" alt="#">
									<a class="more" href="portfolio-single.html"><i class="fa fa-long-arrow-right"></i></a>
								</div>
								<div class="portfolio-content">
									<h4><a href="portfolio-single.html">Creative Marketing</a></h4>
									<p>Animation, Branding</p>
								</div>
							</div>
							<!--/ End Single Portfolio -->
						</div>
						<div class="cbp-item branding consulting">
							<!-- Single Portfolio -->
							<div class="single-portfolio">
								<div class="portfolio-head overlay">
									<img src="https://via.placeholder.com/600x415" alt="#">
									<a class="more" href="portfolio-single.html"><i class="fa fa-long-arrow-right"></i></a>
								</div>
								<div class="portfolio-content">
									<h4><a href="portfolio-single.html">Creative Marketing</a></h4>
									<p>Branding, Consulting</p>
								</div>
							</div>
							<!--/ End Single Portfolio -->
						</div>
						<div class="cbp-item business marketing">
							<!-- Single Portfolio -->
							<div class="single-portfolio">
								<div class="portfolio-head overlay">
									<img src="https://via.placeholder.com/600x415" alt="#">
									<a class="more" href="portfolio-single.html"><i class="fa fa-long-arrow-right"></i></a>
								</div>
								<div class="portfolio-content">
									<h4><a href="portfolio-single.html">Creative Marketing</a></h4>
									<p>Business</p>
								</div>
							</div>
							<!--/ End Single Portfolio -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--/ End Portfolio -->
<?php

 }
}
add_action('do_bizwheel_portfolio_display','bizwheel_portfolio_display');
}