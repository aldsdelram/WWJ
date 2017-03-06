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
	include( plugin_dir_path( __FILE__ ) . '/job_posting/main.php'); 	
	include( plugin_dir_path( __FILE__ ) . '/job-posting-list.php');


	
// ENQUEUE SCRIPTS
	function employer_scripts_func() {
		wp_enqueue_script( 'employer-js', plugin_dir_url( __FILE__ ) . 'js/employer.js' );
		wp_enqueue_script( 'filedrop-js', plugin_dir_url( __FILE__ ) . 'js/filedrop-min.js' );
	}

	add_action( 'wp_enqueue_scripts', 'employer_scripts_func' );

// ENQUEUE STYLES
	function employer_listing_styles() {
		wp_enqueue_style( 'employer-main-css', plugin_dir_url( __FILE__ ) . '/css/employer.css');
	}
	add_action( 'wp_enqueue_scripts', 'employer_listing_styles' );


	function add_job_listing(){
		
		$candidate_id = $_POST['candidate_id'];
		$job_id = $_POST['job_id'];


		$post = array(
		   'post_author' => get_current_user_id(),
		   'post_content' => '',
		   'post_status' => 'publish', //draft
		   'post_title' => 'Job Invitation-'.$candidate_id.'-'.$job_id,
		   'post_parent' => '',
		   'post_type' => 'job_invitation'
		);
		$post_id = wp_insert_post($post);

		update_field('job_listing_id', $job_id, $post_id);
		update_field('candidate_id', $candidate_id, $post_id);

		$response['data'] = $_POST;
		echo json_encode($response);
		wp_die();
	}
	add_action('wp_ajax_add_job_listing', 'add_job_listing');
	add_action('wp_ajax_nopriv_add_job_listing', 'add_job_listing');

	


	function add_edit_job_listing_url()
	{
	   	global $wp;
		$wp->add_query_var('job_id');
	    add_rewrite_rule(
	        '^employer/job-posting/edit/([0-9]+)$',
	       	'index.php?page_id=1030&job_id=$matches[1]',
	        'top'
	    );
	    flush_rewrite_rules();
	}
	add_action('init', 'add_edit_job_listing_url', 1);



	function unlock_candidate(){
		$current_user = get_current_user_id();
		$candidate_id = $_POST['candidate_id'];

		$unlocked = get_user_meta($current_user, 'unlocked_candidates', true);
		if($unlocked == null){
			$unlocked = [];
		}
		$unlocked[] = $candidate_id;

		update_user_meta($current_user, 'unlocked_candidates', $unlocked);

		$response['unlocked'] = $unlocked;
		$response['success'] = true;
		$response['id'] = $candidate_id;
		echo json_encode($response);
		wp_die();
	}
	add_action('wp_ajax_unlock_candidate', 'unlock_candidate');
	add_action('wp_ajax_nopriv_unlock_candidate', 'unlock_candidate');


	function add_send_job_invitation_url()
	{
	   	global $wp;
		$wp->add_query_var('candidate_id');
	    add_rewrite_rule(
	        '^employer/dashboard/invitation/send/([0-9]+)$',
	       	'index.php?page_id=1047&candidate_id=$matches[1]',
	        'top'
	    );
	    flush_rewrite_rules();
	}
	add_action('init', 'add_send_job_invitation_url', 1);