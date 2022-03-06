<?php
/**
 * The slider customizer file for load all  slider customoizer functions
 * 
 * @package bizwheel
 */

new bizwheel_slider_Customizer();

class bizwheel_slider_Customizer {
	public function __construct() {
		add_action( 'customize_register', array( $this, 'register_slider_customize_sections' ) );
	}

	public function register_slider_customize_sections( $wp_customize ) {
        /*
        * Add settings to slider sections.
        */
        $this->bizwheel_slider_info_section( $wp_customize );
    }
    /* Sanitize slider display Inputs */
    public function bizwheel_slider_sanitize_custom_option($input) {
        return ( $input === "No" ) ? "No" : "Yes";
    }

     /* Sanitize slider category display Inputs */
    public function sanitize_bizwheel_slider_category_option($input) {
        return $input;
    }
    /* Sanitize slider display Inputs */
    public function bizwheel_slider_number_sanitize_custom_option($input) {
        return $input;
    }

    /* header top  info section */
    private function bizwheel_slider_info_section( $wp_customize ) {
    	// new pannel for header top info section
    	$wp_customize->add_section('bizwheel-slider-info-sections', array(
            'title' => __('Slider section'),
            'priority' => 3,
            'description' => __('The Slider section section is only displayed on Home page you can control category option and how many slioder will displayed', 'bizwheel'),
        ));
        // setting for header top info section
    	$wp_customize->add_setting('bizwheel-slider-info-display', array(
            'default' => 'No',
            'sanitize_callback' => array( $this, 'bizwheel_slider_sanitize_custom_option' )
        ));
        // control for slider info setting and section
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'bizwheel-slider-info-control', array(
            'label' => __('Display slider section?'),
            'section' => 'bizwheel-slider-info-sections',
            'settings' => 'bizwheel-slider-info-display',
            'type' => 'select',
            'choices' => array('No' => 'No', 'Yes' => 'Yes')
        )));
        /// get category for slider to display
           $categories =get_terms('slider-category');

        $cats = array();
        $i = 0;
        foreach($categories as $category){
            if($i==0){
                $default = $category->slug;
                $i++;
            }
            $cats[$category->slug] = $category->name;
        }
        // setting for slider category option
    	$wp_customize->add_setting('bizwheel-slider-category-display', array(
            'default'        => 'UnCategory',
            'sanitize_callback' => array( $this, 'sanitize_bizwheel_slider_category_option' )
        ));
        // control for header top phone number info control
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'bizwheel-header-top-info-phone-number-control', array(
            'label' => __('Select Slider Category:'),
            'section' => 'bizwheel-slider-info-sections',
            'settings' => 'bizwheel-slider-category-display',
            'type'    => 'select',
            'choices' => $cats
        )));

        // setting for slider count display section
        $wp_customize->add_setting('bizwheel-slider-number-display', array(
            'default' => 5,
            'sanitize_callback' => array( $this, 'bizwheel_slider_number_sanitize_custom_option' )
        ));
        // control for slider info setting and section
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'bizwheel-slider-number-control', array(
            'label' => __('How may slider want to section?'),
            'section' => 'bizwheel-slider-info-sections',
            'settings' => 'bizwheel-slider-number-display',
            'type' => 'select',
            'choices' => array(1 => 'One',2 => 'Two' ,3=> 'Three', 4=>  'Four', 5=> 'Five', 6=> 'Six',)
        )));

    }

}
