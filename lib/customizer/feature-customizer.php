<?php
/**
 * The feature customizer file for load all  feature customoizer functions
 * 
 * @package bizwheel
 */

new bizwheel_feature_Customizer();

class bizwheel_feature_Customizer {
	public function __construct() {
		add_action( 'customize_register', array( $this, 'register_feature_customize_sections' ) );
	}

	public function register_feature_customize_sections( $wp_customize ) {
        /*
        * Add settings to feature sections.
        */
        $this->bizwheel_feature_info_section( $wp_customize );
    }
    /* Sanitize slider display Inputs */
    public function bizwheel_feature_sanitize_custom_option($input) {
        return ( $input === "No" ) ? "No" : "Yes";
    }

    /* Sanitize slider display Inputs */
    public function bizwheel_feature_number_sanitize_custom_option($input) {
        return $input;
    }

    /* feature info section */
    private function bizwheel_feature_info_section( $wp_customize ) {
    	// new pannel for feature section
    	$wp_customize->add_section('bizwheel-feature-info-sections', array(
            'title' => __('Feature section'),
            'priority' => 3,
            'description' => __('The Feature section section is only displayed on Home page you can control feature option and how many feature will displayed', 'bizwheel'),
        ));
        // setting for header feature section
    	$wp_customize->add_setting('bizwheel-feature-info-display', array(
            'default' => 'No',
            'sanitize_callback' => array( $this, 'bizwheel_feature_sanitize_custom_option' )
        ));
        // control for feature info setting and section
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'bizwheel-feature-info-control', array(
            'label' => __('Display feature section?'),
            'section' => 'bizwheel-feature-info-sections',
            'settings' => 'bizwheel-feature-info-display',
            'type' => 'select',
            'choices' => array('No' => 'No', 'Yes' => 'Yes')
        )));

        // setting for feature count display section
        $wp_customize->add_setting('bizwheel-feature-number-display', array(
            'default' => 4,
            'sanitize_callback' => array( $this, 'bizwheel_feature_number_sanitize_custom_option' )
        ));
        // control for feature setting and section
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'bizwheel-feature-number-control', array(
            'label' => __('How may feature want to section?'),
            'section' => 'bizwheel-feature-info-sections',
            'settings' => 'bizwheel-feature-number-display',
            'type' => 'select',
            'choices' => array(1 => 'One',2 => 'Two' ,3=> 'Three', 4=>  'Four',5 => 'Five',6 => 'Six' ,7=> 'Seven', 8=>  'Eight')
        )));

    }

}
