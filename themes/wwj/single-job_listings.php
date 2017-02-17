<?php
	
	// ------------------------------------
	// Template for SINGLE JOB LISTING VIEW
	// ------------------------------------


	if ( !is_user_logged_in() ) {
		wp_redirect( home_url( 'jobseeker/login' ) );
		exit();
	}

	$pagekids = get_pages( 'child_of=' . $post->ID . '&sort_column=menu_order' );
	if ( $pagekids ) {
		$firstchild = $pagekids[0];
		wp_redirect( get_permalink( $firstchild->ID ) );
	}

	// ------------------------------------
	// MISCELLANEOUS
	// ------------------------------------

	$company_details = get_user_meta(get_current_user_id(), 'emp_step1_data', true);
	$job_category = get_the_terms( $post->ID, 'job_listings_category');
	$job_type = get_the_terms( $post->ID, 'job-types');
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>Work Work Jay</title>
	<?php wp_head(); ?>
</head>

<body>

	<main id="main-wrapper" class="company-profile-template">
		<header id="main-header">
			<div class="top-bar">
				<div class="container">
					<div class="rd-row rd-between-xs rd-middle-xs">
						<div class="login-register">
							<ul class="rd-row rd-middle-xs">
								<li>
									<a href="#">Back to Edit Profile</a>
								</li>
							</ul>
						</div><!-- end of .login-register -->
					</div>
				</div>
			</div>

			<div class="logo-container text-xs-center">
				<img src="http://preskubbs.com/wwj2/skubbswp/wp-content/uploads/2016/12/logo-main.png">
			</div>
		</header>

		<section class="job-listing-view--job_info_block">
			<div class="btsp-container">
				<div class="row">
					<div class="col-sm-9">
						<div class="jlv--job_info_flex">
							<div class="jlv--logo" style="background-image: url(<?=wp_get_attachment_url($company_details['logo']) ?>);"></div>
							<div class="jlv--info_main">
								<h1><?php the_title(); ?></h1>
								<h3><?php echo $company_details['company_info']['name']; ?></h3>

								<div class="jlv--info_misc">
									<?php if (get_field('do_not_publish') == 'no') : ?>
										<span class="jlv--misc_address"><i class="fa fa-map-marker" aria-hidden="true"></i> <?php the_field('location'); ?></span>
									<?php endif; ?>
									<span class="jlv--misc_datestart"><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo get_the_date('M d, Y'); ?></span>
									<span class="jlv--misc_category"><i class="fa fa-briefcase" aria-hidden="true"></i> <?php echo $job_category[0]->name; ?></span>
								</div>
							</div>
						</div>
					</div>

					<div class="col-sm-3">
						<div class="jlv--info_stat">
							<div class="jlv--expiry_box">
								<p>EXPIRY<br><strong><?php the_field('expiry_date'); ?></strong></p>
							</div>

							<div class="jlv--applied_box">
								<p>APPLIED<br><strong>----</strong></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>


		<section class="job-listing-view--main">
			<div class="btsp-container">
				<div class="row">
					<div class="col-sm-9">
						<div class="max690">
							<div class="jlv--desc">
								<h2>Job Description</h2>

								<?php the_field('job_description'); ?>
							</div>

							<div class="jlv--skills">
								<h2>Preffered Skills</h2>
								
								<div class="jlv--skills_flex">
									<span>Content marketing</span>
									<span>Customer relationship management</span>
									<span>closing sales</span>
									<span>mobile marketing</span>
									<span>multiplatform</span>
									<span>search engine optimization</span>
								</div>
							</div>

							<div class="jlv--main_navs">
								<a href="#">EDIT</a>
								<a href="#" class="jlv--btn-red">REPOST JOB AD</a>
								<a href="#">CLOSE JOB AD</a>
							</div>
						</div>
					</div>

					<div class="col-sm-3">
						<div class="gray--widget_box">
							<h4>Share this job:</h4>
							<div class="jlv--social_con">
								<a href="#" class="jlv--facebook"><i class="fa fa-facebook-f" aria-hidden="true"></i></a>
								<a href="#" class="jlv--twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
								<a href="#" class="jlv--gplus"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
								<a href="#" class="jlv--linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
							</div>
						</div>

						<div class="gray--widget_box">
							<div class="jlv--sidebar_cats">
								<p><span class="jlv--cat_name">Job Industry:</span><br> <?php echo $job_category[0]->name; ?></p>
								<p><span class="jlv--cat_name">Employment Type:</span><br> <?php echo $job_type[0]->name; ?></p>
								<p><span class="jlv--cat_name">Working Hours:</span><br> [9 AM - 6 PM] </p>
								<p><span class="jlv--cat_name">Shift Pattern:</span><br> [5 Day Work Week]</p>
								<p><span class="jlv--cat_name">Salary:</span><br> <?php the_field('min_salary'); ?> - <?php the_field('max_salary'); ?></p>
								<p><span class="jlv--cat_name">Job Level:</span><br> <?php the_field('employment_level'); ?></p>
								<p><span class="jlv--cat_name">Min. Years of Experience:</span><br> <?php the_field('year_of_experience'); ?></p>
								<p><span class="jlv--cat_name">No. of Vacancies:</span><br> <?php the_field('no_of_vacancies'); ?></p>
							</div>
						</div>

					</div>
				</div>
			</div>
			
		</section>


	</main>

	<?php wp_footer(); ?>
	<?php get_footer(); ?>