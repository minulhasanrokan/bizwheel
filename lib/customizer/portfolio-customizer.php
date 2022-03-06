<?php
/**
 * The portfolio customizer file for load all  portfolio customoizer functions
 * 
 * @package bizwheel
 */

new bizwheel_portfolio_Customizer();

class bizwheel_portfolio_Customizer {
	public function __construct() {
		add_action( 'customize_register', array( $this, 'register_portfolio_customize_sections' ) );
	}

	public function register_portfolio_customize_sections( $wp_customize ) {
        /*
        * Add settings to portfolio sections.
        */
        $this->bizwheel_portfolio_info_section( $wp_customize );
    }
    /* Sanitize portfolio display Inputs */
    public function bizwheel_portfolio_sanitize_custom_option($input) {
        return ( $input === "No" ) ? "No" : "Yes";
    }
     /* Sanitize portfolio title Inputs */
    public function bizwheel_portfolio_title_sanitize_custom_option($input) {
        return $input;
    }

     /* Sanitize portfolio popup Inputs */
    public function bizwheel_portfolio_popup_sanitize_custom_option($input) {
        return $input;
    }

     /* Sanitize portfolio description Inputs */
    public function bizwheel_portfolio_description_sanitize_custom_option($input) {
        return $input;
    }
    /* portfolio info section */
    private function bizwheel_portfolio_info_section( $wp_customize ) {
    	// new pannel for portfolio section
    	$wp_customize->add_section('bizwheel-portfolio-info-sections', array(
            'title' => __('portfolio section'),
            'priority' => 3,
            'description' => __('The portfolio section section is only displayed on Home page you can control portfolio option and how many portfolio will displayed', 'bizwheel'),
        ));
        // setting for header portfolio section
    	$wp_customize->add_setting('bizwheel-portfolio-info-display', array(
            'default' => 'No',
            'sanitize_callback' => array( $this, 'bizwheel_portfolio_sanitize_custom_option' )
        ));
        // control for portfolio info setting and section
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'bizwheel-portfolio-info-control', array(
            'label' => __('Display portfolio section?'),
            'section' => 'bizwheel-portfolio-info-sections',
            'settings' => 'bizwheel-portfolio-info-display',
            'type' => 'select',
            'choices' => array('No' => 'No', 'Yes' => 'Yes')
        )));

        // setting for portfolio title section
        $wp_customize->add_setting('bizwheel-portfolio-title-display', array(
            'default' => 'portfolio Title',
            'sanitize_callback' => array( $this, 'bizwheel_portfolio_title_sanitize_custom_option' )
        ));
        // control for portfolio title setting and section
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'bizwheel-portfolio-title-control', array(
            'label' => __('portfolio Title'),
            'section' => 'bizwheel-portfolio-info-sections',
            'settings' => 'bizwheel-portfolio-title-display',
            'type' => 'text',
        )));

        // setting for portfolio popup section
        $wp_customize->add_setting('bizwheel-portfolio-popup-display', array(
            'default' => 'portfolio popup text',
            'sanitize_callback' => array( $this, 'bizwheel_portfolio_popup_sanitize_custom_option' )
        ));
        // control for portfolio title setting and section
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'bizwheel-portfolio-popup-control', array(
            'label' => __('portfolio popup text'),
            'section' => 'bizwheel-portfolio-info-sections',
            'settings' => 'bizwheel-portfolio-popup-display',
            'type' => 'text',
        )));


        // setting for portfolio description section
        $wp_customize->add_setting('bizwheel-portfolio-description-display', array(
            'default' => 'portfolio description',
            'sanitize_callback' => array( $this, 'bizwheel_portfolio_description_sanitize_custom_option' )
        ));
        // control for portfolio description setting and section
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'bizwheel-portfolio-description-control', array(
            'label' => __('portfolio description'),
            'section' => 'bizwheel-portfolio-info-sections',
            'settings' => 'bizwheel-portfolio-description-display',
            'type' => 'textarea',
        )));

    }

}
