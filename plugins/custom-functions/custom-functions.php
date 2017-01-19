<?php
/*
Plugin Name: Skubbs Custom Functions
Plugin URI:
Description: Adds some shortcodes and functions for custom functionality
Author: Skubbs
Version: 1.1
Author URI:
Network: true
*/

// ************************************
// =EXTERNAL LINKS
// ************************************

	include( plugin_dir_path( __FILE__ ) . '/custom-shortcodes.php'); 
	include( plugin_dir_path( __FILE__ ) . '/job-listing.php'); 
	include( plugin_dir_path( __FILE__ ) . '/main_class.php'); 

// ************************************
// =ACTIONS
// ************************************


#	TEST CODE
	/**
	 * { This function to be used on testing some code }
	 */
	function test_code_here(){
		// var_dump(get_user_meta(get_current_user_id(), 'step1_data', true));
		// var_dump(get_user_meta(get_current_user_id(), 'step2_data', true));
		// var_dump(get_user_meta(get_current_user_id(), 'step3_data', true));
	}
	add_action('init', 'test_code_here');

#	ENQUEUE SCRIPTS
	/**
	 * { function for adding jaascripts to the site }
	 */
	function custom_plugin_scripts() {
		wp_enqueue_script( 'numeric', plugin_dir_url( __FILE__ ) . '/js/numeric.js', array() );
		wp_enqueue_script( 'sk-crp', plugin_dir_url( __FILE__ ) . '/js/sk_customize_registration_page.js', array() );
		wp_enqueue_script( 'sk-clp', plugin_dir_url( __FILE__ ) . '/js/sk_customize_login_page.js', array() );
		wp_enqueue_script( 'fix_input_number', plugin_dir_url( __FILE__ ) . '/js/fix_for_number_inputs.js', array() );
		wp_enqueue_script( 'cf-scripts', plugin_dir_url( __FILE__ ) . '/js/main.js', array() );
		wp_enqueue_script( 'validate', plugin_dir_url( __FILE__ ) . '/js/validate.js', array() );
	}
	add_action( 'wp_enqueue_scripts', 'custom_plugin_scripts' );

#	ENQUEUE STYLES
	/**
	 * { function for adding stylesheets to the site }
	 */
	function custom_plugin_styles() {
	 	wp_enqueue_style( 'jquery-ui-cdn-css', 'https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css');
		wp_enqueue_style( 'cf-css', plugin_dir_url( __FILE__ ) . '/css/cf-css.css');
		wp_enqueue_style( 'sk-crp', plugin_dir_url( __FILE__ ) . '/css/sk_customize_registration_page.css');
		wp_enqueue_style( 'sk-clp', plugin_dir_url( __FILE__ ) . '/css/sk_customize_login_page.css');
		wp_enqueue_style( 'bootstrap-gridonly', plugin_dir_url( __FILE__ ) . '/css/bootstrap-gridonly.css' );
	}
	add_action( 'wp_enqueue_scripts', 'custom_plugin_styles' );

#	ENQUEUE LAST
	/**
	 * { function for adding scripts at the bottom of the page }
	 */
	function bottom_scripts(){
		wp_enqueue_script('date', plugin_dir_url( __FILE__ ) . '/js/date.js', array());
		wp_enqueue_script('prev_and_next', plugin_dir_url( __FILE__ ) . '/js/functions_for_list.js', array());
	}
	add_action( 'wp_enqueue_scripts', 'bottom_scripts', PHP_INT_MAX);

#	MAIN VARIABLES TO BE USED BY JAVASCRIPTS
	/**
	 * { to add main variables to be used by javascripts }
	 */
	function main_variables(){
		echo "<script type=\"text/javascript\">".
	        "home_url = '".home_url()."';".
	      "</script>";
	}
	add_action ( 'wp_head', 'main_variables' );




// ************************************
// =FILTERS
// ************************************

	/**
	 * Adds a content on registration.
	 */
	function add_content_on_registration(){
		echo '<span class="login_link_for_registration">Already have an Account? <a href="#">Log In</a></span>';
	}
	add_filter('upme_register_after_fields', 'add_content_on_registration');


	/**
	 * { Change dollar sign to SGD $ for singaporean dollar }
	 *
	 * @param      string  $currency_symbol  The currency symbol
	 * @param      <type>  $currency         The currency
	 *
	 * @return     string  ( the new currency symbol that was changed )
	 */
	function change_dollar_to_sgd( $currency_symbol, $currency ) {
	     switch( $currency ) {
	          case 'SGD': $currency_symbol = 'SGD$'; break;
	     }
	     return $currency_symbol;
	}
	add_filter('woocommerce_currency_symbol', 'change_dollar_to_sgd', 10, 2);