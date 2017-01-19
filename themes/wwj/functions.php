<?php
	
	show_admin_bar( false );
	add_theme_support( 'post-thumbnails' );

	function wwj_scripts_styles_func() {
		//styles
		wp_enqueue_style( 'slick-styles', '//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css' );
		wp_enqueue_style( 'font-awesome-styles', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
		wp_enqueue_style( 'responsive-dojo-styles', get_template_directory_uri() . '/css/responsive-dojo.css' );
		wp_enqueue_style( 'main-styles', get_template_directory_uri() . '/css/main.css' );

		//scripts
		wp_enqueue_script( 'jquery-ui-js', get_template_directory_uri(). '/js/jquery-ui.min.js' );
		wp_enqueue_script( 'underscore-js', get_template_directory_uri(). '/js/underscore-min.js' );
		wp_enqueue_script( 'list-js', get_template_directory_uri(). '/js/list.min.js' );
		wp_enqueue_script( 'list-pagination-js', get_template_directory_uri(). '/js/list.pagination.min.js' );
		wp_enqueue_script( 'slick-js', get_template_directory_uri(). '/js/slick.min.js' );
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
?>