<?php
	include( 'functions.php'); 
	include( 'basic_info.php');
	include( 'view_experience.php');
	include( 'languages.php');
	include( 'skills.php');
	include( 'awards.php');
	include( 'about_me.php');



	/**
	 * SHORTCODE FOR BASIC INFO
	 *
	 * @return     <type>  ( description_of_the_return_value )
	 */
	function view_profile_func(){
		$icon    	 = plugins_url() . '/jobseeker-listing/img/icon--view-profile.png';
		$editIcon    = plugins_url() . '/jobseeker-listing/img/edit-button.png';
		$edit_url    = home_url('/jobseeker/dashboard/profile/edit/profile/');
		$title   	 = 'PROFILE';
		$content 	 = view_profile_content();

		return create_profile_container($icon, $editIcon, $edit_url, $title, $content);
	}
	add_shortcode('view-profile', 'view_profile_func');


	function edit_profile_func(){
		$icon    	 = plugins_url() . '/jobseeker-listing/img/icon--view-profile.png';
		$editIcon    = plugins_url() . '/jobseeker-listing/img/edit-button.png';
		$title   	 = 'PROFILE';
		$content 	 = edit_profile_content();

		return create_profile_container($icon, '', '', $title, $content);
	}
	add_shortcode('edit-profile', 'edit_profile_func');


	// function view_about_func(){
	// 	$icon    	 = plugins_url() . '/jobseeker-listing/img/icon--view-profile.png';
	// 	$editIcon    = plugins_url() . '/jobseeker-listing/img/edit-button.png';
	// 	$title   	 = 'MORE ABOUT ME';
	// 	$content 	 = view_about_content();

	// 	return create_profile_container($icon, $editIcon, $title, $content);
	// }
	// add_shortcode('view-about', 'view_about_func');

	function edit_about_func(){
		$icon    	 = plugins_url() . '/jobseeker-listing/img/icon--view-profile.png';
		$editIcon    = plugins_url() . '/jobseeker-listing/img/edit-button.png';
		$title   	 = 'MORE ABOUT ME';
		$content 	 = edit_about_content();

		return create_profile_container($icon, $editIcon, '', $title, $content);
	}
	add_shortcode('edit-about', 'edit_about_func');


	/**
	 * { function_description }
	 *
	 * @return     <type>  ( description_of_the_return_value )
	 */
	function view_experience_func(){
		$icon    	 = plugins_url() . '/jobseeker-listing/img/icon--view-experience.png';
		$editIcon    = plugins_url() . '/jobseeker-listing/img/edit-button.png';
		$title   	 = 'EXPERIENCE';
		$content 	 = view_experience_content();

		return create_profile_container($icon, '', '', $title, $content);
	}
	add_shortcode('view-experience', 'view_experience_func');

	function view_others_func(){
		$html = '';
		$icon    	 = plugins_url() . '/jobseeker-listing/img/icon--view-experience.png';
		$editIcon    = plugins_url() . '/jobseeker-listing/img/edit-button.png';
		
		$html .= create_profile_container(plugins_url() . '/jobseeker-listing/img/icon--skills.png', $editIcon, home_url('/jobseeker/dashboard/profile/edit/skills/'), 'SKILLS', view_skills_content());
		$html .= create_profile_container($icon, $editIcon, home_url('jobseeker/dashboard/profile/edit/languages/'), 'LANGUAGES', view_languages_content());
		$html .= create_profile_container($icon, $editIcon, home_url('jobseeker/dashboard/profile/edit/awards'), 'AWARDS', view_awards_content());
		$html .= create_profile_container($icon, $editIcon, home_url('jobseeker/dashboard/profile/edit/about-me'), 'MORE ABOUT ME', view_about_content());


		return $html;
	}
	add_shortcode('view-other_info', 'view_others_func');


	function edit_experience_func(){
		$icon    	 = plugins_url() . '/jobseeker-listing/img/icon--view-experience.png';
		$editIcon    = '';
		$title   	 = 'EXPERIENCE';
		$content 	 = edit_experience_content();

		return create_profile_container($icon, $editIcon, '', $title, $content);
	}
	add_shortcode('edit-experience', 'edit_experience_func');


	function edit_skills_func(){
		$icon    	 = plugins_url() . '/jobseeker-listing/img/icon--skills.png';
		$editIcon    = '';
		$title   	 = 'SKILLS';
		$content 	 = edit_skills_content();

		return create_profile_container($icon, $editIcon, '', $title, $content);
	}
	add_shortcode('edit-skills', 'edit_skills_func');


	function edit_awards_func(){
		$icon      = 'http://preskubbs.com/wwj2/skubbswp/wp-content/uploads/2017/01/icon-view-experience.png';
		$editIcon    = '';
		$title     = 'ABOUT ME';
		$content   = edit_awards_content();

		return create_profile_container($icon, $editIcon, '',$title, $content);
	}

	add_shortcode('edit-awards', 'edit_awards_func');


	function edit_languages_func(){
		$icon      = 'http://preskubbs.com/wwj2/skubbswp/wp-content/uploads/2017/01/icon-view-experience.png';
		$editIcon    = '';
		$title     = 'EDIT LANGUAGES';
		$content   = edit_languages_content();

		return create_profile_container($icon, $editIcon, '', $title, $content);
	}

	add_shortcode('edit-languages', 'edit_languages_func');