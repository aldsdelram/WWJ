<?php 
/*
	all functions for Job Listings will go here.
*/
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

 
/**
 * Class for job listing.
 */
class Job_Invitation {
 
   
    /**
     * { to do the initializtion to be used on Job Listing Class }
     */
    public static function init() {
        add_action( 'init', array( __CLASS__, 'register_post_types' ), 5 );
    }

    /**
     * { Function to register the Custom Post Type "Job Listing" on Admin Dashboard }
     */
    public static function register_post_types() {
        register_post_type( 'job_invitation',
            array(
                'labels' => array(
                    'name'                  => 'Job Invitations',
                    'singular_name'         => 'Job Invitation',
                    'menu_name'             => 'Job Invitations',
                    'add_new'               => 'Add New',
                    'add_new_item'          => 'Add New Invitation',
                    'edit'                  => 'Edit',
                    'new_item'              => 'New Invitation',
                    'view'                  => 'View Invitation',
                    'search_item'           => 'Search Invitation',
                    'not_found'             => 'No Teams found',
                    'not_found_in_trash'    => 'No Teams found in trash',
                    'parent'                => 'Parent Listing'
                ),

                // register_taxonomy( 'job_invitation_category', 'job_invitation',
                //     array(
                //         'hierarchical'      => true,
                //         'label'             => 'Job Categories',
                //         'rewrite'           => array( 'slug' => 'job_listings_category' ),
                //         'show_admin_column' => true,
                //         'query_var'         => true
                //     )
                // ),

                'description'           => 'This is where you can add new Job Invitation.',
                'public'                => true,
                'show_ui'               => true,
                'capability_type'       => 'page',
                'publicly_queryable'    => true,
                'hierarchical'          => false,
                'rewrite'               => array( 'slug' => 'job-invitations' ),
                'query_var'             => true,
                'supports'              => array( 'title', 'thumbnail', 'editor' ),
                'has_archive'           => true,
                'show_in_nav_menus'     => true
            )
        );       
    }


	
}
 
Job_Invitation::init();

?>