<?php
/**
 * The servioce customizer file for load all  servioce customoizer functions
 * 
 * @package bizwheel
 */

new bizwheel_servioce_Customizer();

class bizwheel_servioce_Customizer {
	public function __construct() {
		add_action( 'customize_register', array( $this, 'register_service_customize_sections' ) );
	}

	public function register_service_customize_sections( $wp_customize ) {
        /*
        * Add settings to service sections.
        */
        $this->bizwheel_service_info_section( $wp_customize );
    }
    /* Sanitize service display Inputs */
    public function bizwheel_service_sanitize_custom_option($input) {
        return ( $input === "No" ) ? "No" : "Yes";
    }
     /* Sanitize service title Inputs */
    public function bizwheel_service_title_sanitize_custom_option($input) {
        return $input;
    }

     /* Sanitize service sub title Inputs */
    public function bizwheel_service_sub_title_sanitize_custom_option($input) {
        return $input;
    }

     /* Sanitize service popup Inputs */
    public function bizwheel_service_popup_sanitize_custom_option($input) {
        return $input;
    }

     /* Sanitize service description Inputs */
    public function bizwheel_service_description_sanitize_custom_option($input) {
        return $input;
    }

    /* Sanitize service display Inputs */
    public function bizwheel_service_number_sanitize_custom_option($input) {
        return $input;
    }

    /* service info section */
    private function bizwheel_service_info_section( $wp_customize ) {
    	// new pannel for service section
    	$wp_customize->add_section('bizwheel-service-info-sections', array(
            'title' => __('service section'),
            'priority' => 3,
            'description' => __('The service section section is only displayed on Home page you can control service option and how many service will displayed', 'bizwheel'),
        ));
        // setting for header service section
    	$wp_customize->add_setting('bizwheel-service-info-display', array(
            'default' => 'No',
            'sanitize_callback' => array( $this, 'bizwheel_service_sanitize_custom_option' )
        ));
        // control for service info setting and section
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'bizwheel-service-info-control', array(
            'label' => __('Display service section?'),
            'section' => 'bizwheel-service-info-sections',
            'settings' => 'bizwheel-service-info-display',
            'type' => 'select',
            'choices' => array('No' => 'No', 'Yes' => 'Yes')
        )));

        // setting for service title section
        $wp_customize->add_setting('bizwheel-service-title-display', array(
            'default' => 'Service Title',
            'sanitize_callback' => array( $this, 'bizwheel_service_title_sanitize_custom_option' )
        ));
        // control for service title setting and section
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'bizwheel-service-title-control', array(
            'label' => __('Service Title'),
            'section' => 'bizwheel-service-info-sections',
            'settings' => 'bizwheel-service-title-display',
            'type' => 'text',
        )));

        // setting for service sub title section
        $wp_customize->add_setting('bizwheel-service-sub-title-display', array(
            'default' => 'Service sub Title',
            'sanitize_callback' => array( $this, 'bizwheel_service_sub_title_sanitize_custom_option' )
        ));
        // control for service title setting and section
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'bizwheel-service-sub-title-control', array(
            'label' => __('Service sub Title'),
            'section' => 'bizwheel-service-info-sections',
            'settings' => 'bizwheel-service-sub-title-display',
            'type' => 'text',
        )));

        // setting for service popup section
        $wp_customize->add_setting('bizwheel-service-popup-display', array(
            'default' => 'Service popup text',
            'sanitize_callback' => array( $this, 'bizwheel_service_popup_sanitize_custom_option' )
        ));
        // control for service title setting and section
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'bizwheel-service-popup-control', array(
            'label' => __('Service popup text'),
            'section' => 'bizwheel-service-info-sections',
            'settings' => 'bizwheel-service-popup-display',
            'type' => 'text',
        )));


        // setting for service description section
        $wp_customize->add_setting('bizwheel-service-description-display', array(
            'default' => 'Service description',
            'sanitize_callback' => array( $this, 'bizwheel_service_description_sanitize_custom_option' )
        ));
        // control for service description setting and section
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'bizwheel-service-description-control', array(
            'label' => __('Service Title'),
            'section' => 'bizwheel-service-info-sections',
            'settings' => 'bizwheel-service-description-display',
            'type' => 'textarea',
        )));

        // setting for service count display section
        $wp_customize->add_setting('bizwheel-service-number-display', array(
            'default' => 4,
            'sanitize_callback' => array( $this, 'bizwheel_service_number_sanitize_custom_option' )
        ));
        // control for service setting and section
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'bizwheel-service-number-control', array(
            'label' => __('How may service want to section?'),
            'section' => 'bizwheel-service-info-sections',
            'settings' => 'bizwheel-service-number-display',
            'type' => 'select',
            'choices' => array(1 => 'One',2 => 'Two' ,3=> 'Three', 4=>  'Four',5 => 'Five',6 => 'Six' ,7=> 'Seven', 8=>  'Eight')
        )));

    }

}
