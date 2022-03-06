<?php
/**
 * The header customizer file for load all  header customoizer functions
 * 
 * @package bizwheel
 */
new bizwheel_header_Customizer();

class bizwheel_header_Customizer {
	public function __construct() {
		add_action( 'customize_register', array( $this, 'register_header_customize_sections' ) );
	}

	public function register_header_customize_sections( $wp_customize ) {
        /*
        * Add settings to sections.
        */
        $this->header_top_info_section( $wp_customize );
    }
    /* Sanitize display Inputs */
    public function sanitize_custom_option($input) {
        return ( $input === "No" ) ? "No" : "Yes";
    }
    //Sanitize phone number value
    public function sanitize_custom_phone_number_option($input) {
        return filter_var($input, FILTER_SANITIZE_STRING);
    }
    //Sanitize Email id value
    public function sanitize_custom_email_number_option($input) {
        return filter_var($input, FILTER_SANITIZE_EMAIL);
    }
    //Sanitize opening time value
    public function sanitize_custom_opening_time_option($input) {
        return filter_var($input, FILTER_SANITIZE_STRING);
    }
    //Sanitize closing time value
    public function sanitize_custom_closing_time_option($input) {
        return filter_var($input, FILTER_SANITIZE_STRING);
    }
    //Sanitize facebook value
    public function sanitize_custom_facebook_option($input) {
        return filter_var($input, FILTER_SANITIZE_URL);
    }
    //Sanitize twitter value
    public function sanitize_custom_twitter_option($input) {
        return filter_var($input, FILTER_SANITIZE_URL);
    }
    //Sanitize linkedin value
    public function sanitize_custom_linkedin_option($input) {
        return filter_var($input, FILTER_SANITIZE_URL);
    }
    //Sanitize dribble value
    public function sanitize_custom_dribble_option($input) {
        return filter_var($input, FILTER_SANITIZE_URL);
    }

    //Sanitize button text value
    public function sanitize_custom_button_option($input) {
        return filter_var($input, FILTER_SANITIZE_STRING);
    }

    //Sanitize button link value
    public function sanitize_custom_button_link_option($input) {
        return filter_var($input, FILTER_SANITIZE_URL);
    }
    /* header top  info section */
    private function header_top_info_section( $wp_customize ) {
    	// new pannel for header top info section
    	$wp_customize->add_section('bizwheel-header-top-info-sections', array(
            'title' => __('Header Top info section'),
            'priority' => 2,
            'description' => __('The Header Top info section is only displayed phone number, email id, opnening and closing time and social incons in header top bar', 'bizwheel'),
        ));
        // setting for header top info setting
    	$wp_customize->add_setting('bizwheel-header-top-info-display', array(
            'default' => 'No',
            'sanitize_callback' => array( $this, 'sanitize_custom_option' )
        ));
        // control for header top info control
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'bizwheel-header-top-info-control', array(
            'label' => __('Display Hedaer top section?'),
            'section' => 'bizwheel-header-top-info-sections',
            'settings' => 'bizwheel-header-top-info-display',
            'type' => 'select',
            'choices' => array('No' => 'No', 'Yes' => 'Yes')
        )));

        // setting for header top phone number info setting
    	$wp_customize->add_setting('bizwheel-header-top-info-phone-number-display', array(
            'default' => '+8801627197089',
            'sanitize_callback' => array( $this, 'sanitize_custom_phone_number_option' )
        ));
        // control for header top phone number info control
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'bizwheel-header-top-info-phone-number-control', array(
            'label' => __('Input Your Phone Number:'),
            'section' => 'bizwheel-header-top-info-sections',
            'settings' => 'bizwheel-header-top-info-phone-number-display',
            'type' => 'tel',
        )));

        // setting for header top Email number info setting
    	$wp_customize->add_setting('bizwheel-header-top-info-email-number-display', array(
            'default' => 'minulhasanrokan@gmail.com',
            'sanitize_callback' => array( $this, 'sanitize_custom_email_number_option' )
        ));
        // control for header top Email number info control
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'bizwheel-header-top-info-email-number-control', array(
            'label' => __('Input Your Emial Id:'),
            'section' => 'bizwheel-header-top-info-sections',
            'settings' => 'bizwheel-header-top-info-email-number-display',
            'type' => 'email',
        )));

        // setting for header top Opening Time info setting
    	$wp_customize->add_setting('bizwheel-header-top-info-opening-time-display', array(
            'default' => '00:0:00',
            'sanitize_callback' => array( $this, 'sanitize_custom_opening_time_option' )
        ));
        // control for header top Opening Time info control
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'bizwheel-header-top-info-opening-time-control', array(
            'label' => __('Input Opening Time:'),
            'section' => 'bizwheel-header-top-info-sections',
            'settings' => 'bizwheel-header-top-info-opening-time-display',
            'type' => 'text',
        )));

        // setting for header top closing timer info setting
    	$wp_customize->add_setting('bizwheel-header-top-info-closing-time-display', array(
            'default' => '00:0:00',
            'sanitize_callback' => array( $this, 'sanitize_custom_closing_time_option' )
        ));
        // control for header top closing timer info control
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'bizwheel-header-top-info-closing-time-control', array(
            'label' => __('Input Closing time:'),
            'section' => 'bizwheel-header-top-info-sections',
            'settings' => 'bizwheel-header-top-info-closing-time-display',
            'type' => 'text',
        )));

        // setting for header top facebook social info setting
    	$wp_customize->add_setting('bizwheel-header-top-info-facebook-display', array(
            'default' => esc_url('facebook.com/mhrokan.cse'),
            'sanitize_callback' => array( $this, 'sanitize_custom_facebook_option' )
        ));
        // control for header top facebook info control
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'bizwheel-header-top-info-facebook-control', array(
            'label' => __('Input facebook Account Link:'),
            'section' => 'bizwheel-header-top-info-sections',
            'settings' => 'bizwheel-header-top-info-facebook-display',
            'type' => 'url',
        )));
        // setting for header top twitter info setting
    	$wp_customize->add_setting('bizwheel-header-top-info-twitter-display', array(
            'default' => esc_url('twitter.com'),
            'sanitize_callback' => array( $this, 'sanitize_custom_twitter_option' )
        ));
        // control for header top twitter info control
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'bizwheel-header-top-info-twitter-control', array(
            'label' => __('Input Twitter Account Link:'),
            'section' => 'bizwheel-header-top-info-sections',
            'settings' => 'bizwheel-header-top-info-twitter-display',
            'type' => 'url',
        )));
        // setting for header top linkedin info setting
    	$wp_customize->add_setting('bizwheel-header-top-info-linkedin-display', array(
            'default' => esc_url('linkedin.com'),
            'sanitize_callback' => array( $this, 'sanitize_custom_linkedin_option' )
        ));
        // control for header top linkedin info control
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'bizwheel-header-top-info-linkedin-control', array(
            'label' => __('Input Linkedin Account Link:'),
            'section' => 'bizwheel-header-top-info-sections',
            'settings' => 'bizwheel-header-top-info-linkedin-display',
            'type' => 'url',
        )));
        // setting for header top dribble info setting
    	$wp_customize->add_setting('bizwheel-header-top-info-dribble-display', array(
            'default' => esc_url('dribble.com'),
            'sanitize_callback' => array( $this, 'sanitize_custom_dribble_option' )
        ));
        // control for header top dribble info control
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'bizwheel-header-top-info-dribble-control', array(
            'label' => __('Input Dribble Account Link:'),
            'section' => 'bizwheel-header-top-info-sections',
            'settings' => 'bizwheel-header-top-info-dribble-display',
            'type' => 'url',
        )));

        // setting for header top button info setting
    	$wp_customize->add_setting('bizwheel-header-top-info-button-display', array(
            'default' => __('Get a Quote'),
            'sanitize_callback' => array( $this, 'sanitize_custom_button_option' )
        ));
        // control for header top Button info control
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'bizwheel-header-top-info-button-control', array(
            'label' => __('Input speatial button text:'),
            'section' => 'bizwheel-header-top-info-sections',
            'settings' => 'bizwheel-header-top-info-button-display',
            'type' => 'text',
        )));

        // setting for header top button info setting
    	$wp_customize->add_setting('bizwheel-header-top-info-button-link-display', array(
            'default' => esc_url('button.com'),
            'sanitize_callback' => array( $this, 'sanitize_custom_button_link_option' )
        ));
        // control for header top dribble info control
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'bizwheel-header-top-info-button-url-control', array(
            'label' => __('Input button Link:'),
            'section' => 'bizwheel-header-top-info-sections',
            'settings' => 'bizwheel-header-top-info-button-link-display',
            'type' => 'url',
        )));

    }

}
// header side bar about section 
new bizwheel_header_sidebar_Customizer();

class bizwheel_header_sidebar_Customizer {
    public function __construct() {
        add_action( 'customize_register', array( $this, 'register_bizwheel_header_sidebar' ) );
    }

    public function register_bizwheel_header_sidebar( $wp_customize ) {
        /*
        * Add settings to header side bar about section
        */
        $this->bizwheel_header_sidebar_section( $wp_customize );
    }
    /* Sanitize header sidebar display Inputs */
    public function sanitize_header_sidebar($input) {
        return ( $input === "No" ) ? "No" : "Yes";
    }
    /* Sanitize header sidebar about display Inputs */
    public function sanitize_header_sidebar_about($input) {
        return ( $input === "No" ) ? "No" : "Yes";
    }
    //Sanitize header sidebar about title value
    public function sanitize_header_sidebar_about_title_option($input) {
        return filter_var($input, FILTER_SANITIZE_STRING);
    }
    //Sanitize header sidebar about details value
    public function sanitize_header_sidebar_details_option($input) {
        return filter_var($input, FILTER_SANITIZE_EMAIL);
    }
    /* Sanitize header sidebar important link menu display Inputs */
    public function sanitize_header_sidebar_important_link($input) {
        return ( $input === "No" ) ? "No" : "Yes";
    }
    /* Sanitize header sidebar important link title display Inputs */
    public function sanitize_header_sidebar_important_link_title($input) {
        return filter_var($input, FILTER_SANITIZE_STRING);
    }
    /*  header side bar section */
    private function bizwheel_header_sidebar_section( $wp_customize ) {
        // new pannel for header side bar about section
        $wp_customize->add_section('bizwheel-header-sidebar-sections', array(
            'title' => __('Header Top sidebar section'),
            'priority' => 2,
            'description' => __('The Header Top sidebar about section is only displayed about the website, social link and important link menu', 'bizwheel'),
        ));
        // setting for header side bar
        $wp_customize->add_setting('bizwheel-sidebar-display', array(
            'default' => 'No',
            'sanitize_callback' => array( $this, 'sanitize_header_sidebar' )
        ));
        // control for header sidebar section display or not control
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'bizwheel-header-sidebar-control', array(
            'label' => __('Display Hedaer sidebar section?'),
            'section' => 'bizwheel-header-sidebar-sections',
            'settings' => 'bizwheel-sidebar-display',
            'type' => 'select',
            'choices' => array('No' => 'No', 'Yes' => 'Yes')
        )));

        // setting for header side bar about setting
        $wp_customize->add_setting('bizwheel-sidebar-about-display', array(
            'default' => 'No',
            'sanitize_callback' => array( $this, 'sanitize_header_sidebar_about' )
        ));
        // control for header sidebar about section display or not control
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'bizwheel-header-sidebar-about-control', array(
            'label' => __('Display Hedaer sidebar about section?'),
            'section' => 'bizwheel-header-sidebar-sections',
            'settings' => 'bizwheel-sidebar-about-display',
            'type' => 'select',
            'choices' => array('No' => 'No', 'Yes' => 'Yes')
        )));

        // setting for header sidebar about title setting
        $wp_customize->add_setting('bizwheel-header-sidebar-about-title-display', array(
            'default' => 'About Us',
            'sanitize_callback' => array( $this, 'sanitize_header_sidebar_about_title_option' )
        ));
        // control for header top phone number info control
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'bizwheel-header-sidebar-about-title-control', array(
            'label' => __('Input about Title:'),
            'section' => 'bizwheel-header-sidebar-sections',
            'settings' => 'bizwheel-header-sidebar-about-title-display',
            'type' => 'text',
        )));

        // setting for header sidebar about details setting
        $wp_customize->add_setting('bizwheel-header-about-details-display', array(
            'default' => 'about us',
            'sanitize_callback' => array( $this, 'sanitize_header_sidebar_details_option' )
        ));
        // control for header top Email number info control
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'bizwheel-header-sidebar-about-details-control', array(
            'label' => __('Input Your website details:'),
            'section' => 'bizwheel-header-sidebar-sections',
            'settings' => 'bizwheel-header-about-details-display',
            'type' => 'textarea',
        )));

        // setting for header sidebar important link menu
        $wp_customize->add_setting('bizwheel-header-sidebar-important-link-display', array(
            'default' => 'No',
            'sanitize_callback' => array( $this, 'sanitize_header_sidebar_important_link' )
        ));
        // control for header sidebar important link section display or not control
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'bizwheel-header-sidebar-important-link-control', array(
            'label' => __('Display Hedaer sidebar important menu section?'),
            'section' => 'bizwheel-header-sidebar-sections',
            'settings' => 'bizwheel-header-sidebar-important-link-display',
            'type' => 'select',
            'choices' => array('No' => 'No', 'Yes' => 'Yes')
        )));

        // setting for header sidebar important link title setting
        $wp_customize->add_setting('bizwheel-header-important-link-title-display', array(
            'default' => 'Important link',
            'sanitize_callback' => array( $this, 'sanitize_header_sidebar_important_link_title' )
        ));
        // control for header important link title control
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'bizwheel-header-sidebar-important-link-title-control', array(
            'label' => __('Input Your Important link title:'),
            'section' => 'bizwheel-header-sidebar-sections',
            'settings' => 'bizwheel-header-important-link-title-display',
            'type' => 'text',
        )));
    }

}