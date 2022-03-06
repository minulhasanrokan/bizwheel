<?php
/**
 * The Call to action customizer file for load all  Call to action customoizer functions
 * 
 * @package bizwheel
 */

new bizwheel_callto_action_Customizer(); 

class bizwheel_callto_action_Customizer {
	public function __construct() {
		add_action( 'customize_register', array( $this, 'register_callto_action_customize_sections' ) );
	}

	public function register_callto_action_customize_sections( $wp_customize ) {
        /*
        * Add settings to call to action sections.
        */
        $this->bizwheel_slider_info_section( $wp_customize );
    }
    /* Sanitize call to action display Inputs */
    public function bizwheel_callto_action_sanitize_custom_option($input) {
        return ( $input === "No" ) ? "No" : "Yes";
    }

     /* Sanitize call to action Title */
    public function bizwheel_callto_action_title_sanitize_option($input) {
        return $input;
    }
    /* Sanitize call to action  discription */
    public function bizwheel_callto_action_discription_sanitize_custom_option($input) {
        return $input;
    }

    /* Sanitize call to action  background */
    public function bizwheel_callto_action_backgroundon_sanitize_custom_option($input) {
        return $input;
    }

    /* Sanitize call to action  button title */
    public function bizwheel_callto_action_button_sanitize_custom_option($input) {
        return $input;
    }

    /* Sanitize call to action  url */
    public function bizwheel_callto_action_button_url_sanitize_custom_option($input) {
        return $input;
    }

    /* Sanitize call to action display Inputs */
    public function bizwheel_callto_action_open_sanitize_custom_option($input) {
        return ( $input === "No" ) ? "No" : "Yes";
    }

    /* header top  info section */
    private function bizwheel_slider_info_section( $wp_customize ) {
    	// new pannel for header top info section
    	$wp_customize->add_section('bizwheel-callto-action-info-sections', array(
            'title' => __('Call to Action section'),
            'priority' => 3,
            'description' => __('The Call to Action section section is only displayed on Home page', 'bizwheel'),
        ));
        // setting for Call to Action section
    	$wp_customize->add_setting('bizwheel-callto-section-info-display', array(
            'default' => 'No',
            'sanitize_callback' => array( $this, 'bizwheel_callto_action_sanitize_custom_option' )
        ));
        // control for Call to Action section
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'bizwheel-callto-action-info-control', array(
            'label' => __('Display Call to Action section?'),
            'section' => 'bizwheel-callto-action-info-sections',
            'settings' => 'bizwheel-callto-section-info-display',
            'type' => 'select',
            'choices' => array('No' => 'No', 'Yes' => 'Yes')
        )));
        // setting for Call to Action title section
    	$wp_customize->add_setting('bizwheel-callto-action-title-display', array(
            'default'        => 'Enter Title',
            'sanitize_callback' => array( $this, 'bizwheel_callto_action_title_sanitize_option' )
        ));
        // control for Call to Action title section
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'bizwheel-callto-action-title-control', array(
            'label' => __('Input Call to Action Title:'),
            'section' => 'bizwheel-callto-action-info-sections',
            'settings' => 'bizwheel-callto-action-title-display',
            'type'    => 'text',
        )));

        // setting for Call to Action discription section
        $wp_customize->add_setting('bizwheel-callto-action-discription-display', array(
            'default' => 'Enter discription',
            'sanitize_callback' => array( $this, 'bizwheel_callto_action_discription_sanitize_custom_option' )
        ));
        // control for Call to Action discription section
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'bizwheel-callto-action-discription-control', array(
            'label' => __('How may slider want to section?'),
            'section' => 'bizwheel-callto-action-info-sections',
            'settings' => 'bizwheel-callto-action-discription-display',
            'type' => 'textarea',
        )));
        // setting for Call to Action background section
        $wp_customize->add_setting( 'bizwheel-callto-action-backgroundon-display', array(
        'default' => get_theme_file_uri('assets/image/logo.jpg'), // Add Default Image URL 
        'sanitize_callback' => array( $this, 'bizwheel_callto_action_backgroundon_sanitize_custom_option' )
        ));
        // control for Call to Action background section
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'bizwheel-callto-action-backgroundon-control', array(
            'label' => 'Upload background image',
            'section' => 'bizwheel-callto-action-info-sections',
            'settings' => 'bizwheel-callto-action-backgroundon-display',
            'button_labels' => array(// All These labels are optional
                        'select' => 'Select image',
                        'remove' => 'Remove image',
                        'change' => 'Change image',
                        )
        )));

        // setting for Call to Action Button section
        $wp_customize->add_setting('bizwheel-callto-action-button-display', array(
            'default' => __('Button'),
            'sanitize_callback' => array( $this, 'bizwheel_callto_action_button_sanitize_custom_option' )
        ));
        // control for Call to Action Button section
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'bizwheel-callto-action-button-control', array(
            'label' => __('Enter Button Text'),
            'section' => 'bizwheel-callto-action-info-sections',
            'settings' => 'bizwheel-callto-action-button-display',
            'type' => 'text',
        )));

        // setting for Call to Action Button url section
        $wp_customize->add_setting('bizwheel-callto-action-button-url-display', array(
            'default' => __('#'),
            'sanitize_callback' => array( $this, 'bizwheel_callto_action_button_url_sanitize_custom_option' )
        ));
        // control for Call to Action Button section
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'bizwheel-callto-action-button-url-control', array(
            'label' => __('Enter Button Text'),
            'section' => 'bizwheel-callto-action-info-sections',
            'settings' => 'bizwheel-callto-action-button-url-display',
            'type' => 'text',
        )));

        // setting for Call to Action section
        $wp_customize->add_setting('bizwheel-callto-action-button-open-display', array(
            'default' => 'No',
            'sanitize_callback' => array( $this, 'bizwheel_callto_action_open_sanitize_custom_option' )
        ));
        // control for Call to Action section
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'bizwheel-callto-action-button-open-control', array(
            'label' => __('Do Open link in new tab?'),
            'section' => 'bizwheel-callto-action-info-sections',
            'settings' => 'bizwheel-callto-action-button-open-display',
            'type' => 'select',
            'choices' => array('No' => 'No', 'Yes' => 'Yes')
        )));

    }

}
