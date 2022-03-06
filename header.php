<?php
/**
* The header for displaying header file
* 
* @package bizwheel
*/
?>
<!doctype html>
<html <?php language_attributes();?>>
<head>
<!-- Meta Tag -->
<meta charset="<?php bloginfo( 'charset' ); ?>">
<link rel="profile" href="https://gmpg.org/xfn/11">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name='copyright' content='medicom'>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


<!-- Favicon -->
<link rel="icon" type="image/favicon.png" href="<?php echo get_template_directory_uri();?>/img/favicon.png">

<!-- Web Font -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<!-- Bizwheel Plugins CSS -->
<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/animate.min.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/cubeportfolio.min.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/font-awesome.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/jquery.fancybox.min.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/magnific-popup.min.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/owl-carousel.min.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/slicknav.min.css">

<!-- Bizwheel Stylesheet -->  
<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/reset.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/style.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/responsive.css">

<!-- Bizwheel Colors -->
<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/skins/skin-1.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/skins/skin-2.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/skins/skin-3.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/skins/skin-4.css">

<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<?php wp_head();?>
</head>
<body id="bg">

<!-- Boxed Layout -->
<div id="page" class="site boxed-layout"> 

<!-- Preloader -->
<div class="preeloader">
	<div class="preloader-spinner"></div>
</div>
<!--/ End Preloader -->

<!-- Header -->
<header class="header">
	<!-- Topbar -->
	<?php do_action('do_bizwheel_header_top_bar');?>
	<!--/ End Topbar -->
	<!-- Middle Header -->
	<?php do_action('do_bizwheel_header');?>
	<!--/ End Middle Header -->
	<!-- Sidebar Popup -->
	<?php do_action('do_bizwheel_header_sidebar');?>
	<!--/ Sidebar Popup -->	
</header>
<!--/ End Header -->