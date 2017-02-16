<?php
	/*
		Template Name: Dashboard Page
	*/
?>
<?php
	if ( !is_user_logged_in() ) {
		wp_redirect( home_url( 'jobseeker/login' ) );
		exit();
	}

	$pagekids = get_pages( 'child_of=' . $post->ID . '&sort_column=menu_order' );
	if ( $pagekids ) {
		$firstchild = $pagekids[0];
		wp_redirect( get_permalink( $firstchild->ID ) );
	}
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
				<div class="sidebar-logo"></div>
				<div class="sidepar-dp"></div>
				<div class="sidebar-menus">
					<div class="sidebar-menu">
						<a href="" class="has-sub-menu">Profile</a>
						<div class="sub-menu">
							<a href="<?= home_url('/jobseeker/dashboard/profile/view/information/') ?>">Basic Information</a>
							<a href="<?= home_url('/jobseeker/dashboard/profile/view/experience/') ?>">Experience</a>
							<a href="<?= home_url('/jobseeker/dashboard/profile/view/others/') ?>">Other Information</a>
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