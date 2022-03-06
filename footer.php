<?php
/**
 * The footer for displaying footer file
 * 
 * @package bizwheel
 */
?>

<!-- Footer -->
<footer class="footer" style="background-image:url('<?php echo get_template_directory_uri();?>/img/map.png')">
	<!-- Footer Top -->
	<?php get_template_part('template-part/footer/footer-top','bizwheel');?>
	<!--/ End Footer Top -->
	<!-- Copyright -->
	<?php get_template_part('template-part/footer/footer-copyright','bizwheel');?>
	<!--/ End Copyright -->
</footer>

<!-- Jquery JS -->
<script src="<?php echo get_template_directory_uri();?>/js/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri();?>/js/jquery-migrate-3.0.0.js"></script>
<!-- Popper JS -->
<script src="<?php echo get_template_directory_uri();?>/js/popper.min.js"></script>
<!-- Bootstrap JS -->
<script src="<?php echo get_template_directory_uri();?>/js/bootstrap.min.js"></script>
<!-- Modernizr JS -->
<script src="<?php echo get_template_directory_uri();?>/js/modernizr.min.js"></script>
<!-- ScrollUp JS -->
<script src="<?php echo get_template_directory_uri();?>/js/scrollup.js"></script>
<!-- FacnyBox JS -->
<script src="<?php echo get_template_directory_uri();?>/js/jquery-fancybox.min.js"></script>
<!-- Cube Portfolio JS -->
<script src="<?php echo get_template_directory_uri();?>/js/cubeportfolio.min.js"></script>
<!-- Slick Nav JS -->
<script src="<?php echo get_template_directory_uri();?>/js/slicknav.min.js"></script>
<!-- Slick Nav JS -->
<script src="<?php echo get_template_directory_uri();?>/js/slicknav.min.js"></script>
<!-- Slick Slider JS -->
<script src="<?php echo get_template_directory_uri();?>/js/owl-carousel.min.js"></script>
<!-- Easing JS -->
<script src="<?php echo get_template_directory_uri();?>/js/easing.js"></script>
<!-- Magnipic Popup JS -->
<script src="<?php echo get_template_directory_uri();?>/js/magnific-popup.min.js"></script>
<!-- Active JS -->
<script src="<?php echo get_template_directory_uri();?>/js/active.js"></script>
<?php wp_footer();?>
</body>
</html>