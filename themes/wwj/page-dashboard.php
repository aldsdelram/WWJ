<?php
	/*
		Template Name: Dashboard Page
	*/

	if ( !is_user_logged_in() ) {
		wp_redirect( home_url( 'jobseeker/login' ) );
		exit();
	}

	$pagekids = get_pages( 'child_of=' . $post->ID . '&sort_column=menu_order' );
	if ( $pagekids ) {
		$firstchild = $pagekids[0];
		wp_redirect( get_permalink( $firstchild->ID ) );
	}

	// profile pic
	$jpp = get_user_meta(get_current_user_id(), 'step1_data', true);
	$profile_picture = wp_get_attachment_url($jpp['photo_base_64']);
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
	<main id="main-wrapper" class="dashboard-page">
		<div class="rd-row">

			<aside id="main-sidebar">
				<div class="sidebar--container">
					<!-- logo -->
					<div class="sidebar-logo"><img src="<?= wp_get_attachment_url(844); ?>" alt=""></div>
					
					<!-- profile set -->
					<div class="sb--profile-set" style="background-image: url(<?= wp_get_attachment_url(845); ?>);">
						<div class="sbp--misc_stats clearfix">
							<div class="sbp--rank_stat pull-left"><img src="<?= wp_get_attachment_url(846); ?>" alt="">45/100</div>
							<div class="sbp--credit_stat pull-right"><img src="<?= wp_get_attachment_url(847); ?>" alt="">20</div>
						</div>

						<div class="sbp--profile-pic" style="background-image: url(<?= $profile_picture; ?>);"></div>
						<div class="sbp--profile_name"><?= $current_user->first_name .' '. $current_user->last_name; ?></div>
					</div>

					<div class="sidebar-menus">
						<div class="sidebar-menu">

							<!-- home -->
							<div class="sbp--nav_set">
								<a href="<?= home_url(); ?>">Home</a>
							</div>
							
							<!-- manage career -->
							<div class="sbp--nav_set">
								<a href="" class="has-sub-menu">Manage Career <i class="fa fa-caret-right" aria-hidden="true"></i></a>
								<div class="sub-menu">
									<a href="<?= home_url('/jobseeker/dashboard/dashboard-home/') ?>">Job Invitations</a>
									<a href="<?= home_url('/jobseeker/dashboard/dashboard-home/') ?>">Job Applications</a>
									<a href="<?= home_url('/jobseeker/dashboard/dashboard-home/') ?>">Job Search</a>
									<a href="<?= home_url('/jobseeker/dashboard/dashboard-home/') ?>">Bookmarked</a>
								</div>
							</div>

							<!-- profile -->
							<div class="sbp--nav_set">
								<a href="" class="has-sub-menu">Profile <i class="fa fa-caret-right" aria-hidden="true"></i></a>
								<div class="sub-menu">
									<a href="<?= home_url('/jobseeker/dashboard/profile/view/information/') ?>">Personal Information</a>
									<a href="<?= home_url('/jobseeker/dashboard/profile/view/experience/') ?>">Career</a>
									<a href="<?= home_url('/jobseeker/dashboard/profile/view/others/') ?>">Strengths</a>
								</div>
							</div>

							<!-- reports -->
							<div class="sbp--nav_set">
								<a href="<?= home_url('/jobseeker/dashboard/dashboard-home/') ?>">Reports</a>
							</div>

							<!-- reports -->
							<div class="sbp--nav_set">
								<a href="" class="has-sub-menu">Billing <i class="fa fa-caret-right" aria-hidden="true"></i></a>
								<div class="sub-menu">
									<a href="<?= home_url('/jobseeker/dashboard/dashboard-home/') ?>">Buy Credits</a>
									<a href="<?= home_url('/jobseeker/dashboard/dashboard-home/') ?>">Payment History</a>
								</div>
							</div>

						</div>
					</div>
				</div>
			</aside>

			<section id="main-section">
				<header class="content-header">
					<div class="rd-row rd-between-xs rd-middle-xs">
						<div class="page-title rd-row rd-middle-xs">
							<div class="toggle-sidebar"><i class="fa fa-bars fa-fw fa-lg" aria-hidden="true"></i></div>
							<h3><?= get_the_title(); ?></h3>
						</div> <!-- end of .page-title -->
						<div class="notif-container">
							<div class="rd-row rd-middle-xs">
								<div class="post-job">
									<a href="#">My Calendar</a>
								</div>
								<div class="notifs message">
									<span class="count rd-row rd-middle-xs rd-center-xs">8</span>
									<i class="fa fa-envelope fa-fw fa-lg" aria-hidden="true"></i>
								</div>
								<div class="notifs notif">
									<span class="count rd-row rd-middle-xs rd-center-xs">4</span>
									<i class="fa fa-bell fa-fw fa-lg" aria-hidden="true"></i>
								</div>
								<div class="notifs cart">
									<span class="count rd-row rd-middle-xs rd-center-xs">4</span>
									<i class="fa fa-shopping-cart fa-fw fa-lg" aria-hidden="true"></i>
								</div>
								<div class="user-details">
									<?php $current_user = wp_get_current_user(); ?>
									<div class="user rd-row rd-middle-xs">
										<span>Hello <?= $current_user->user_login ?></span>
										<div class="dropdown-content">
											<ul>
												<li>Lorem</li>
												<li>Lorem</li>
												<li>Lorem</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div> <!-- end of .notif-container -->
					</div>
				</header> <!-- end of .content-header -->
				<div class="content-details">
					<?php
						if ( have_posts() ) {
							while ( have_posts() ) {
								the_post();
								the_content();
							}
						}
					?>
				</div> <!-- end of .content-details -->
			</section>
		</div>
	</main> <!-- end of #main-wrapper -->
	<?php wp_footer(); ?>
</body>
</html>