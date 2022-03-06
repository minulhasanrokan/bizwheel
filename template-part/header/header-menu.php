<?php
/**
 * The header menu for displaying logo and menu
 * 
 * @package bizwheel
 */
?>
<?php
if(!function_exists('bizwheel_header')){
function bizwheel_header(){ ?>
<!-- Middle Header -->
<div class="middle-header">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="middle-inner">
					<div class="row">
						<div class="col-lg-2 col-md-3 col-12">
							<!-- Logo -->
							<div class="logo">
								<!-- Image Logo -->
								<div class="img-logo">
									<?php
										// logo and title....................
										$custom_logo_id = get_theme_mod( 'custom_logo' );
										$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
										if ( has_custom_logo() ) {
										        echo '<a href="'.esc_url(get_home_url()).'"><img src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '"></a>';
										} else {
										        echo '<a href="'.esc_url(get_home_url()).'"><h1>'. get_bloginfo( 'name' ) .'</h1></a>';
										} 
									?>
								</div>
							</div>								
							<div class="mobile-nav"></div>
						</div>
						<div class="col-lg-10 col-md-9 col-12">
							<div class="menu-area">
								<!-- Main Menu -->
								<nav class="navbar navbar-expand-lg">
									<div class="navbar-collapse">	
										<div class="nav-inner">	
											<div class="menu-home-menu-container">
												<!-- Naviagiton -->
												<?php do_action('do_bizwheel_main_menu','bizwheel');?>
												<!--/ End Naviagiton -->
											</div>
										</div>
									</div>
								</nav>
								<!--/ End Main Menu -->	
								<!-- Right Bar -->
								<div class="right-bar">
									<!-- Search Bar -->
									<ul class="right-nav">
										<li class="top-search"><a href="#0"><i class="fa fa-search"></i></a></li>
										<?php 
										//header sidebar  display or not get value from header sidebar customizer
										if (get_theme_mod('bizwheel-sidebar-display') == 'Yes') { 
										?>
										<li class="bar"><a class="fa fa-bars"></a></li>
										<?php }?>
									</ul>
									<!--/ End Search Bar -->
									<!-- Search Form -->
									<div class="search-top">
										<form action="#" class="search-form" method="get">
											<input type="text" name="s" value="" placeholder="Search here"/>
											<button type="submit" id="searchsubmit"><i class="fa fa-search"></i></button>
										</form>
									</div>
									<!--/ End Search Form -->
								</div>	
								<!--/ End Right Bar -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--/ End Middle Header -->
<?php }
	add_action('do_bizwheel_header','bizwheel_header');
}