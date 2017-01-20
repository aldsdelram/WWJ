<?php

	/*
		Plugin Name: Jobseeker Listing
		Plugin URI: http://preskubbs.com/wwj2/
		Description: Shortcodes for Jobseeker
		Author: Skubbs
		Version: 1.0.0
		Author URI: http://preskubbs.com/wwj2/
		Network: true
	*/

	include( plugin_dir_path( __FILE__ ) . '/shortcodes.php'); 
	include( plugin_dir_path( __FILE__ ) . '/create_pdf.php'); 
	// include( plugin_dir_path( __FILE__ ) . '/function_for_resume.php'); 
	include( plugin_dir_path( __FILE__ ) . '/job_listing_products.php'); 
	include( plugin_dir_path( __FILE__ ) . '/faq_listing.php'); 
	include( plugin_dir_path( __FILE__ ) . '/resume_forms/main.php'); 
	include( plugin_dir_path( __FILE__ ) . '/profile/main.php'); 

// ENQUEUE SCRIPTS

	function custom_job_seeker_scripts() {
		wp_enqueue_script( 'cand-listings-functions', plugin_dir_url( __FILE__ ) . '/js/candidate_listing.js', array() );
		wp_enqueue_script( 'job-listings-functions', plugin_dir_url( __FILE__ ) . '/js/job_listing.js', array() );
		wp_enqueue_script( 'resume-functions', plugin_dir_url( __FILE__ ) . '/js/resume_functions.js', array() );
	}
	add_action( 'wp_enqueue_scripts', 'custom_job_seeker_scripts' );


// ENQUEUE STYLES
	function jobseeker_listing_styles() {
		wp_enqueue_style( 'jobseeker-main-css', plugin_dir_url( __FILE__ ) . '/css/jobseeker.css');
	}
	add_action( 'wp_enqueue_scripts', 'jobseeker_listing_styles' );