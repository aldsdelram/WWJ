<?php
	
	show_admin_bar( false );
	add_theme_support( 'post-thumbnails' );

	function wwj_scripts_styles_func() {
		//styles
		wp_enqueue_style( 'slick-styles', '//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css' );
		wp_enqueue_style( 'font-awesome-styles', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
		wp_enqueue_style( 'responsive-dojo-styles', get_template_directory_uri() . '/css/responsive-dojo.css' );
		wp_enqueue_style( 'main-styles', get_template_directory_uri() . '/css/main.css' );
		wp_enqueue_style( 'temp-styles', get_template_directory_uri() . '/css/wwj-jun.css' );

		//scripts
		wp_enqueue_script( 'jquery-ui-js', 'http://code.jquery.com/ui/1.12.1/jquery-ui.min.js' );
		wp_enqueue_script( 'underscore-js', 'https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js' );
		wp_enqueue_script( 'list-js', '//cdnjs.cloudflare.com/ajax/libs/list.js/1.3.0/list.min.js' );
		wp_enqueue_script( 'list-pagination-js', '//cdnjs.cloudflare.com/ajax/libs/list.pagination.js/0.1.1/list.pagination.min.js' );
		wp_enqueue_script( 'slick-js', '//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js' );
		wp_enqueue_script( 'main-js', get_template_directory_uri() . '/js/main.js' );
	}	
	add_action( 'wp_enqueue_scripts', 'wwj_scripts_styles_func' );

	function register_wwj_menu() {
		register_nav_menu( 'employer', __( 'Employer Menu', 'theme-slug' ) );
		register_nav_menu( 'jobseeker', __( 'Jobseeker Menu', 'theme-slug' ) );
	}
	add_action( 'init', 'register_wwj_menu' );

	function register_wwj_widgets() {
		register_sidebar( array(
			'name'			=> __( 'Footer 1', 'theme-slug' ),
			'id'			=> 'footer-1',
			'description'	=> 'Displays company information',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widgettitle">',
			'after_title'   => '</h2>',
		));

		register_sidebar( array(
			'name'			=> __( 'Footer 2', 'theme-slug' ),
			'id'			=> 'footer-2',
			'description'	=> 'Displays company information',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widgettitle">',
			'after_title'   => '</h2>',
		));
	}
	add_action( 'widgets_init', 'register_wwj_widgets' );

	function is_subpage() {
	    global $post;

	    if ( is_page() && $post->post_parent ) {
	        return (int) $post->post_parent;
	    } else {
	        return false;
	    }
	}

	function check_page_func() {
		
	}
	add_action( 'wp', 'check_page_func' );

	function sk_start_session() {
	    if(!session_id()) {
	        session_start();
	    }
	}

	function sk_end_session() {
	    session_destroy ();
	}

	add_action('init', 'sk_start_session', 1);
	add_action('wp_logout', 'sk_end_session');


	function first_login($user_login, $user) {
	    $user_id = $user->ID;
	    $first_login = get_user_meta($user_id, 'wwj_first_login', true);
	    if( $first_login == '1' || $first_login == null) {
			$user_info = get_userdata($user_id);
	    	if(in_array('candidate', $user_info->roles)){
		        update_user_meta($user_id, 'wwj_first_login', '0');
		        wp_redirect( home_url('/jobseeker/dashboard/resume/step01') );
		        exit;
	    	}
	    }
	}
	add_action('wp_login', 'first_login', 10, 2);


	// ____________________________________________________________ =ACF OPTIONS PAGE

	if( function_exists('acf_add_options_page') ) {
		
		acf_add_options_page(array(
			'page_title' 	=> 'Theme Options',
			'menu_title'	=> 'Theme Options',
			'menu_slug' 	=> 'theme-options',
			'capability'	=> 'edit_posts',
		));

		acf_add_options_sub_page(array(
			'page_title' 	=> 'Employer Page',
			'menu_title'	=> 'Employer Page',
			'parent_slug'	=> 'theme-options',
		));

	}