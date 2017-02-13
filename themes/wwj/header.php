<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>Work Work Jay</title>
	<?php wp_head(); ?>
</head>
<body class="<?= is_user_logged_in() ? 'logged-in' : '' ?>">
	<main id="main-wrapper" class="<?= str_replace( ' ', '-', strtolower( get_the_title() ) ) . '-page' ?>">
		<header id="main-header" class="<?= str_replace( ' ', '-', strtolower( get_the_title() ) ) . '-header' ?>">
			<?php if ( !is_page( 'splash' ) ): ?>
				<div class="top-bar">
					<div class="container">
						<div class="rd-row rd-between-xs rd-middle-xs">
							<div class="login-register">
								<ul class="rd-row rd-middle-xs">
									<?php if ( is_subpage() == 127 ): ?>
										<li><a href="javascript:void(0)" class="show-modal" data-modal="#login-emp-modal">Login</a></li>
										<li><a href="javascript:void(0)" class="show-modal" data-modal="#register-emp-modal">Register</a></li>
									<?php else: ?>
										<li>
											<?php
												if ( is_user_logged_in() ) :
													$current_user = wp_get_current_user();
											?>
												<div class="has-dropdown">
													<span>Hello, <?= $current_user->user_login ?></span>
													<div class="dropdown-content">
														<ul>
															<?php
															$user_info = get_userdata(get_current_user_id());
													    	if(in_array('candidate', $user_info->roles)): ?>
																<li><a href="<?= home_url('/jobseeker/dashboard/profile/view/information')?>">Dashboard</a></li>
																<li><a href="<?= home_url('/jobseeker/dashboard/profile/view/information')?>">Profile</a></li>
													    	<?php else: ?>
																<li><a href="#">Dashboard</a></li>
																<li><a href="#">Profile</a></li>
													    	<?php endif; ?>

														</ul>
													</div> <!-- end of .dropdown-content -->
												</div> <!-- end of .has-dropdown -->
											<?php else : ?>
												<a href="javascript:void(0)" class="show-modal" data-modal="#login-cand-modal">Login</a>
											<?php endif ?>
										</li>
										<li>
											<?php if ( is_user_logged_in() ) : ?>
												<a href="<?= wp_logout_url( get_permalink( get_the_ID() ) ); ?>">Logout</a>
											<?php else: ?>
												<a href="javascript:void(0)" class="show-modal" data-modal="#register-cand-modal">Register</a>
											<?php endif ?>
										</li>
									<?php endif ?>
								</ul>
							</div> <!-- end of .login-register -->
							<div class="cart">
								<ul class="rd-row rd-middle-xs">
									<li>
										<?php if ( is_user_logged_in() ) : ?>
											<div>
												<?php
													$user_data = get_userdata( get_current_user_id() );
													if ( in_array( 'candidate', $user_data->roles ) ) :
												?>
													<span>I am a Jobseeker</span>
												<?php else : ?>
													<span>I am an Employer</span>
												<?php endif; ?>
											</div>
										<?php else : ?>
											<select name="" id="select-status">
												<?php
													$arr = array(
														'employer' 		=> 'I am an Employer',
														'jobseeker'		=> 'I am a Jobseeker'
													);
												?>
												<?php foreach ( $arr as $key => $value ): ?>
													<option value="<?= $key; ?>" <?= (is_subpage() == 127 ? ($key == 'employer' ? 'selected' : '') : 'selected') ?> ><?= $value; ?></option>
												<?php endforeach ?>
											</select>
										<?php endif ?>
									</li>
									<li>
										<a href="javascript:void(0)" class="icon-cart"><i class="fa fa-shopping-cart fa-fw" aria-hidden="true"></i> Cart</a>
									</li>
								</ul>
							</div> <!-- end of .cart -->
						</div>
					</div>
				</div> <!-- end of .top-bar -->
				<div class="logo-container text-xs-center">
					<img src="<?= home_url( 'skubbswp/wp-content/uploads/2016/12/logo-main.png' ); ?>" />
				</div> <!-- end of .login-container -->
				<nav id="main-navigation">
					<?php
						if ( is_subpage() == 127 ) {
							wp_nav_menu( array(
								'menu'				=> 'Employer Menu',
								'theme_location'	=>	'employer',
								'menu_class'		=> 'rd-row rd-center-xs rd-middle-xs'
							));
						} else {
							wp_nav_menu( array(
								'menu'				=> 'Jobseeker Menu',
								'theme_location'	=>	'jobseeker',
								'menu_class'		=> 'rd-row rd-center-xs rd-middle-xs'
							));
						}
					?>
				</nav> <!-- end of #main-navigation -->
			<?php endif ?>
		</header> <!-- end of #main-header -->
		<?php
			if ( has_post_thumbnail() ) :
				$img_bg = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
		?>
			<div class="inner-banner rd-row rd-middle-xs rd-center-xs" style="background: url('<?= $img_bg[0] ?>') no-repeat center; background-size: cover;">
				<h1 class="page-title"><?= get_the_title(); ?></h1>
			</div> <!-- end of .inner-banner -->
		<?php endif ?>