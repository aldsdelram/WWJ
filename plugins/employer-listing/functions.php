<?php

	/*
		Plugin Name: Employer Listing
		Plugin URI: http://preskubbs.com/wwj2/
		Description: Shortcodes for Employers
		Author: Skubbs
		Version: 1.0.0
		Author URI: http://preskubbs.com/wwj2/
		Network: true
	*/

	include( plugin_dir_path( __FILE__ ) . '/shortcodes.php'); 
	include( plugin_dir_path( __FILE__ ) . '/employer_forms/main.php'); 
	

	
// ENQUEUE SCRIPTS
	function employer_scripts_func() {
		wp_enqueue_script( 'employer-js', plugin_dir_url( __FILE__ ) . '/employer.js' );
	}

	add_action( 'wp_enqueue_scripts', 'employer_scripts_func' );

// ENQUEUE STYLES
	function employer_listing_styles() {
		wp_enqueue_style( 'employer-main-css', plugin_dir_url( __FILE__ ) . '/css/employer.css');
	}
	add_action( 'wp_enqueue_scripts', 'employer_listing_styles' );

?>