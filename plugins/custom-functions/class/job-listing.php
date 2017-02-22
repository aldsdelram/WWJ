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
class Job_Listing {
 
   
    /**
     * { to do the initializtion to be used on Job Listing Class }
     */
    public static function init() {
        add_action( 'init', array( __CLASS__, 'register_post_types' ), 5 );
        add_action( 'init', array( __CLASS__, 'register_jobseeker_faq' ), 5 );
        add_action( 'init', array( __CLASS__, 'add_job_region_taxonomy'));
        add_action( 'init', array( __CLASS__, 'add_job_type_taxonomy'));
    }

    /**
     * { Function to register the Custom Post Type "Job Listing" on Admin Dashboard }
     */
    public static function register_post_types() {
        register_post_type( 'job_listings',
            array(
                'labels' => array(
                    'name'                  => 'Job Listings',
                    'singular_name'         => 'Job Listing',
                    'menu_name'             => 'Job Listings',
                    'add_new'               => 'Add New',
                    'add_new_item'          => 'Add New Listing',
                    'edit'                  => 'Edit',
                    'new_item'              => 'New Listing',
                    'view'                  => 'View Listing',
                    'search_item'           => 'Search Listing',
                    'not_found'             => 'No Teams found',
                    'not_found_in_trash'    => 'No Teams found in trash',
                    'parent'                => 'Parent Listing'
                ),

                register_taxonomy( 'job_listings_category', 'job_listings',
                    array(
                        'hierarchical'      => true,
                        'label'             => 'Job Categories',
                        'rewrite'           => array( 'slug' => 'job_listings_category' ),
                        'show_admin_column' => true,
                        'query_var'         => true
                    )
                ),

                'description'           => 'This is where you can add new Job Listing.',
                'public'                => true,
                'show_ui'               => true,
                'capability_type'       => 'page',
                'publicly_queryable'    => true,
                'hierarchical'          => false,
                'rewrite'               => array( 'slug' => 'job-listings' ),
                'query_var'             => true,
                'supports'              => array( 'title', 'thumbnail', 'editor' ),
                'has_archive'           => true,
                'show_in_nav_menus'     => true
            )
        );       
    }


	/**
	 * Adds a job region taxonomy.
	 */
	public static function add_job_region_taxonomy()  {
		$labels = array(
		    'name'                       => 'Job Region',
		    'singular_name'              => 'Job Region',
		    'menu_name'                  => 'Job Regions',
		    'all_items'                  => 'All Job Regions',
		    'parent_item'                => 'Parent Job Region',
		    'parent_item_colon'          => 'Parent Job Region:',
		    'new_item_name'              => 'New Job Region Name',
		    'add_new_item'               => 'Add New Job Region',
		    'edit_item'                  => 'Edit Job Region',
		    'update_item'                => 'Update Job Region',
		    'separate_items_with_commas' => 'Separate Job Region with commas',
		    'search_items'               => 'Search Job Region',
		    'add_or_remove_items'        => 'Add or remove Job Regions',
		    'choose_from_most_used'      => 'Choose from the most used Job Regions',
		);
		$args = array(
		    'labels'                     => $labels,
		    'hierarchical'               => true,
		    'public'                     => true,
		    'show_ui'                    => true,
		    'show_admin_column'          => true,
		    'show_in_nav_menus'          => true,
		    'show_tagcloud'              => true,
		);
		register_taxonomy( 'job-regions', 'job_listings', $args );
		register_taxonomy_for_object_type( 'job-regions', 'job_listings' );
	}

	/**
	 * Adds a job type taxonomy.
	 */
	public static function add_job_type_taxonomy()  {
		$labels = array(
		    'name'                       => 'Job Type',
		    'singular_name'              => 'Job Type',
		    'menu_name'                  => 'Job Types',
		    'all_items'                  => 'All Job Types',
		    'parent_item'                => 'Parent Job Type',
		    'parent_item_colon'          => 'Parent Job Type:',
		    'new_item_name'              => 'New Job Type Name',
		    'add_new_item'               => 'Add New Job Type',
		    'edit_item'                  => 'Edit Job Type',
		    'update_item'                => 'Update Job Type',
		    'separate_items_with_commas' => 'Separate Job Type with commas',
		    'search_items'               => 'Search Job Type',
		    'add_or_remove_items'        => 'Add or remove Job Types',
		    'choose_from_most_used'      => 'Choose from the most used Job Types',
		);
		$args = array(
		    'labels'                     => $labels,
		    'hierarchical'               => true,
		    'public'                     => true,
		    'show_ui'                    => true,
		    'show_admin_column'          => true,
		    'show_in_nav_menus'          => true,
		    'show_tagcloud'              => true,
	        'publicly_queryable' => true,
    	    'query_var' => true,
        	'rewrite' => true,
		);
		register_taxonomy( 'job-types', 'job_listings', $args );
		register_taxonomy_for_object_type( 'job-types', 'job_listings' );
	}


    /**
     * { To get the industries set to Job Listing }
     *
     * @return     <Terms Object>  ( set of industries set on Job Listing )
     */
    public static function Industries(){
		return get_terms( array(
		    'taxonomy' => 'job_listings_category',
		    'hide_empty' => false,
		    'parent' => 0 
		) );
		/*EXAMPLE OF RETURNED OBJECT
			array(4) {
			  [0]=>
			  object(WP_Term)#587 (10) {
			    ["term_id"]=>
			    int(5)
			    ["name"]=>
			    string(20) "Accounting / Finance"
			    ["slug"]=>
			    string(18) "accounting-finance"
			    ["term_group"]=>
			    int(0)
			    ["term_taxonomy_id"]=>
			    int(5)
			    ["taxonomy"]=>
			    string(21) "job_listings_category"
			    ["description"]=>
			    string(0) ""
			    ["parent"]=>
			    int(0)
			    ["count"]=>
			    int(0)
			    ["filter"]=>
			    string(3) "raw"
			  }
			  [1]=>
			  object(WP_Term)#588 (10) {
			    ["term_id"]=>
			    int(6)
			    ["name"]=>
			    string(22) "Admin / Human Resource"
			    ["slug"]=>
			    string(20) "admin-human-resource"
			    ["term_group"]=>
			    int(0)
			    ["term_taxonomy_id"]=>
			    int(6)
			    ["taxonomy"]=>
			    string(21) "job_listings_category"
			    ["description"]=>
			    string(0) ""
			    ["parent"]=>
			    int(0)
			    ["count"]=>
			    int(0)
			    ["filter"]=>
			    string(3) "raw"
			  }
			}  
		*/
	}


	/**
	 * { To get the Regions set to Job Listing }
	 *
	 * @return     <Term Object>  ( set of regions set on Job Listing )
	 */
	public static function Regions(){
		return get_terms( array(
		    'taxonomy' => 'job-regions',
		    'hide_empty' => false,
		    'parent' => 0 
		) );
	}
	

	/**
	 * { To get the Job Types set to Job Listing }
	 *
	 * @return     <Term Object>  ( set of job types set on Job Listing )
	 */
	public static function Types(){
		return get_terms( array(
		    'taxonomy' => 'job-types',
		    'hide_empty' => false,
		    'parent' => 0 
		) );
	}


	/**
	 * Gets the industry by id.
	 *
	 * @param      <int>  $term_id  The term identifier
	 *
	 * @return     <string>  The industry by id.
	 */
	public static function GetIndustryByID($term_id){
		$taxonomy = 'job_listings_category';
		$term = get_term( $term_id, $taxonomy );
		return $term->name;
	}

	/**
	 * Gets the skills.
	 *
	 * @param      <int>  $industry_id  The industry identifier
	 *
	 * @return     <object>  The skills.
	 */
	public static function getSkills($industry_id){
		$skills = get_terms( 'job_listings_category', ['child_of' => $industry_id, 'hide_empty' => 0] );
		return $skills;
	}

	public static function getPostings(){
		$args = array(
		   'post_author' => get_current_user_id(),
		   'post_status' => 'publish', //draft
		   'post_type' => 'job_listings'
		);
		$query = new WP_Query($args);
		$job_posts = [];
		if($query->have_posts()){
			while($query->have_posts()){
				$query->the_post();
				$job_posts[get_the_ID()] = get_the_title();
			}
			wp_reset_postdata(); 
		}
		return $job_posts;
	}

	public static function register_jobseeker_faq() {
        register_post_type( 'jobseeker_faq',
            array(
                'labels' => array(
                    'name'                  => 'Job FAQs',
                    'singular_name'         => 'Job FAQ',
                    'menu_name'             => 'Job FAQs',
                    'add_new'               => 'Add New',
                    'add_new_item'          => 'Add New FAQ',
                    'edit'                  => 'Edit',
                    'new_item'              => 'New FAQ',
                    'view'                  => 'View FAQ',
                    'search_item'           => 'Search FAQ',
                    'not_found'             => 'No Teams found',
                    'not_found_in_trash'    => 'No Teams found in trash',
                    'parent'                => 'Parent FAQ'
                ),

                register_taxonomy( 'jobseeker_faq_category', 'jobseeker_faq',
                    array(
                        'hierarchical'      => true,
                        'label'             => 'Job FAQ Categories',
                        'rewrite'           => array( 'slug' => 'job_FAQs_category' ),
                        'show_admin_column' => true,
                        'query_var'         => true
                    )
                ),

                'description'           => 'This is where you can add new Job FAQ.',
                'public'                => true,
                'show_ui'               => true,
                'capability_type'       => 'page',
                'publicly_queryable'    => true,
                'hierarchical'          => false,
                'rewrite'               => array( 'slug' => 'job-FAQs' ),
                'query_var'             => true,
                'supports'              => array( 'title', 'thumbnail', 'editor' ),
                'has_archive'           => true,
                'show_in_nav_menus'     => true
            )
        );       
    }

}
 
Job_Listing::init();

?>