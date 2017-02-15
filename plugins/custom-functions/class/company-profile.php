<?php 
/*
	all functions for Company Profiles will go here.
*/
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

 
/**
 * Class for Company Profile.
 */
class Company_Profile {
 
   
    /**
     * { to do the initializtion to be used on Company Profile Class }
     */
    public static function init() {
        add_action( 'init', array( __CLASS__, 'register_post_types' ), 5 );
    }

    /**
     * { Function to register the Custom Post Type "Company Profile" on Admin Dashboard }
     */
    public static function register_post_types() {
        register_post_type( 'comp_profile',
            array(
                'labels' => array(
                    'name'                  => 'Company Profile',
                    'singular_name'         => 'Company Profile',
                    'menu_name'             => 'Company Profile',
                    'add_new'               => 'Add New',
                    'add_new_item'          => 'Add New Company Profile',
                    'edit'                  => 'Edit',
                    'new_item'              => 'New Company Profile',
                    'view'                  => 'View Company Profile',
                    'search_item'           => 'Search Company Profile',
                    'not_found'             => 'No Teams found',
                    'not_found_in_trash'    => 'No Teams found in trash',
                    'parent'                => 'Parent Company Profile'
                ),

                // register_taxonomy( 'comp_profile_category', 'comp_profile',
                //     array(
                //         'hierarchical'      => true,
                //         'label'             => 'Job Categories',
                //         'rewrite'           => array( 'slug' => 'comp_profile_category' ),
                //         'show_admin_column' => true,
                //         'query_var'         => true
                //     )
                // ),

                'description'           => 'This is where you can add new Company Profile.',
                'public'                => true,
                'show_ui'               => true,
                'capability_type'       => 'page',
                'publicly_queryable'    => true,
                'hierarchical'          => false,
                'rewrite'               => array( 'slug' => 'company-profile' ),
                'query_var'             => true,
                'supports'              => array( 'title', 'thumbnail', 'editor' ),
                'has_archive'           => true,
                'show_in_nav_menus'     => true
            )
        );     
    }


}
 
Company_Profile::init();

?>