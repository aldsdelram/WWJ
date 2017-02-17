<?php
	/*
		Template Name: Company Profile
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

	$current_user  = get_currentuserinfo();
	$step1 = get_user_meta(get_current_user_id(), 'emp_step1_data', true);
	$step2 = get_user_meta(get_current_user_id(), 'emp_step2_data', true);
	$step3 = get_user_meta(get_current_user_id(), 'emp_step3_data', true);

	$name = $step1['company_info']['name'];
	$industry = $step1['company_info']['industry'];
	$size = $step1['company_info']["size"];
	$website = $step1['company_info']["website"];
	$socials = $step1['company_info']['social'];
	$tel_no = $step1['company_info']["telno"];
	$fax_no = $step1['company_info']["fax"];
	$about_us = $step1['about_us'];
	$address = $step1['location']['address'];
	$postal_code = $step1['location']['postal_code'];
	$cover_photo = $step1['cover_photo'];
	$logo = $step1["logo"];

	$videos = $step2["videos"];
	$services = $step2["services"];
	$team_members = $step2['team_members'];

	$join_us = $step3["join_us"];
	$referrals = $step3['referrals'];



?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>Work Work Jay</title>
	<?php wp_head(); ?>
</head>

<body class="company-profile-template">

	<main id="main-wrapper" >
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
						<div class="cart">
							<ul class="rd-row rd-middle-xs">
								<li>
									<div>
										<span>I am an Employer</span>
									</div>
								</li>
								<li>
									<a class="icon-cart" href="javascript:void(0)"><i aria-hidden="true" class="fa fa-shopping-cart fa-fw"></i> Cart</a>
								</li>
							</ul>
						</div><!-- end of .cart -->
					</div>
				</div>
			</div>
		</header>
		
		<!-- 1: MAIN BANNER -->
		<?php if($cover_photo): ?>
			<section id="c-profile--main_banner" style="background-image: url('<?= wp_get_attachment_url($cover_photo)?>');">
		<?php else: ?>
			<section id="c-profile--main_banner">
		<?php endif; ?>
			<a href="#" class="cp--edit_banner"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
			<h1 class="cp--name"><?= $name ?></h1>
		</section>
		
		<!-- 2: ABOUT US -->
		<section id="c-profile--about_us">
			<div class="btsp-container">
				<div class="row">
					<div class="col-sm-4">
						<?php if($logo): ?>
							<div class="cp--about_pic" style="background-image: url('<?= wp_get_attachment_url($logo) ?>'); border-color: #8d9f31;"></div>
						<?php else: ?>
							<div class="cp--about_pic" style="background-image: url('http://preskubbs.com/wwj2/skubbswp/wp-content/uploads/2017/02/testprofilebg.jpg'); border-color: #8d9f31;"></div>
						<?php endif; ?>
					</div>
					<div class="col-sm-8 flex-h-middle">
						<div class="cp--about_texts">
							<h2 style="color: #59392a;" class="oc--section_titles">About Us</h2>
							<p><?= $about_us ?></p>
						</div>
					</div>
				</div>
			</div>
		</section>
		
		<!-- 3: OUR SERVICES -->
		<section id="c-profile--our_services" style="background-color: #59392a;">
			<div class="btsp-container">
				<div class="row">
					<div class="col-xs-12">
						<h2 style="color: #fff;" class="oc--section_titles">Our Services</h2>

						<div class="cp--flex-grid">

							<?php foreach($services as $service): ?>
								<?php if($service['name'] != null) :?>
									<div class="cp--flex_set">
									<?php if($service['photo'] == ''): ?>
										<div class="cp--flex-image" style="background-image: url('');"></div>
									<?php else: ?>
											<div class="cp--flex-image" style="background-image: url('<?= wp_get_attachment_url($service['photo'])?>');"></div>
										<?php endif; ?>
										<h3 class="cp--flex-title"><?= $service['name']?></h3>
										<div class="cp--os-desc">
											<?= $service['description'] ?>
										</div>
									</div>	
								<?php endif;?>
							<?php endforeach; ?>
							

						</div>

					</div>
				</div>
			</div>
		</section>
		
		<!-- 4: TEAM MEMBERS -->
		
		<section id="c-profile--team_members">
			<div class="btsp-container">
				<div class="row">
					<div class="col-xs-12">
						<h2 style="color: #59392a;" class="oc--section_titles">Team Members</h2>

						<div class="cp--flex-grid">

							<?php foreach($team_members as $team_member): ?>
								<?php if($team_member['staffname'] != null) :?>
									<div class="cp--flex_set">
									<?php if($team_member['photo'] == ''): ?>
										<div class="cp--flex-image" style="background-image: url(''); border-color: #8d9f31;"></div>
									<?php else: ?>
											<div class="cp--flex-image" style="background-image: url('<?= wp_get_attachment_url($team_member['photo'])?>'); border-color: #8d9f31;"></div>
										<?php endif; ?>
										<h3 class="cp--flex-title"><?= $team_member['staffname']?></h3>
										<div class="cp--os-desc">
											<?= $team_member['position'] ?>
										</div>
									</div>	
								<?php endif;?>
							<?php endforeach; ?>

							<!--div class="cp--flex_set">
								<div class="cp--flex-image" style="background-image: url('http://preskubbs.com/wwj2/skubbswp/wp-content/uploads/2017/02/sam-co.jpg'); border-color: #8d9f31;"></div>
								<h3 class="cp--flex-title">Sam Co</h3>
								<div class="cp--flex-desc">
									Staff Member
								</div>
							</div>

							<div class="cp--flex_set">
								<div class="cp--flex-image" style="background-image: url('http://preskubbs.com/wwj2/skubbswp/wp-content/uploads/2017/02/mika-dadee.jpg'); border-color: #8d9f31;"></div>
								<h3 class="cp--flex-title">Mika Dadee</h3>
								<div class="cp--flex-desc">
									Staff Member
								</div>
							</div>

							<div class="cp--flex_set">
								<div class="cp--flex-image" style="background-image: url('http://preskubbs.com/wwj2/skubbswp/wp-content/uploads/2017/02/nathan-so.jpg'); border-color: #8d9f31;"></div>
								<h3 class="cp--flex-title">Nathan So</h3>
								<div class="cp--flex-desc">
									Staff Member
								</div>
							</div>

							<div class="cp--flex_set">
								<div class="cp--flex-image" style="background-image: url('http://preskubbs.com/wwj2/skubbswp/wp-content/uploads/2017/02/ann-gun.jpg'); border-color: #8d9f31;"></div>
								<h3 class="cp--flex-title">Ann Gun</h3>
								<div class="cp--flex-desc">
									Staff Member
								</div>
							</div-->
						</div>

					</div>
				</div>
			</div>
		</section>

		<section id="c-profile--testimonials">
			<div class="btsp-container">
				<div class="row">
					<div class="col-xs-12">
						<h2 style="color: #59392a; text-align: center;" class="oc--section_titles">Testimonials</h2>
					</div>
				</div>

				<div class="cp--testi_slider">


					<?php foreach($referrals as $referral): ?>
						<?php if($referral['name'] != null) :?>

							<div class="cp--testflexset">
								<div class="cp--testi_set">
									<div class="cp--testi_desc">
										<div class="cp--testi_desc_content">
											<?= $referral['description'] ?>
										</div>
									</div>
									<?php if($referral['photo'] == ''): ?>
										<div class="cp--testi_image" style="background-image: url(''); border-color: #8d9f31;"></div>
									<?php else: ?>
										<div class="cp--testi_image" style="background-image: url('<?= wp_get_attachment_url($referral['photo'])?>'); border-color: #8d9f31;"></div>
									<?php endif; ?>
								</div>
							</div>
						<?php endif;?>
					<?php endforeach; ?>

					<!--div class="cp--testflexset">
						<div class="cp--testi_set">
							<div class="cp--testi_desc">
								<div class="cp--testi_desc_content">
									Wow... I am impressed - after my first visit, I am hooked on LA SPA! I had a treatment with Matt and I could not be happier his professionalism, knowledge and courteousness all made for a great experience. I have already made my next appointment.
								</div>
							</div>
							<div class="cp--testi_image" style="background-image: url('http://preskubbs.com/wwj2/skubbswp/wp-content/uploads/2017/02/testimonial-pic.jpg'); border-color: #8d9f31;"></div>
						</div>
					</div>

					<div class="cp--testflexset">
						<div class="cp--testi_set">
							<div class="cp--testi_desc">
								<div class="cp--testi_desc_content">
									Wow... I am impressed - after my first visit, I am hooked on LA SPA! I had a treatment with Matt and I could not be happier his professionalism, knowledge and courteousness all made for a great experience. I have already made my next appointment.
								</div>
							</div>
							<div class="cp--testi_image" style="background-image: url('http://preskubbs.com/wwj2/skubbswp/wp-content/uploads/2017/02/testimonial-pic.jpg'); border-color: #8d9f31;"></div>
						</div>
					</div>

					<div class="cp--testflexset">
						<div class="cp--testi_set">
							<div class="cp--testi_desc">
								<div class="cp--testi_desc_content">
									Wow... I am impressed - after my first visit, I am hooked on LA SPA! I had a treatment with Matt and I could not be happier his professionalism, knowledge and courteousness all made for a great experience. I have already made my next appointment.
								</div>
							</div>
							<div class="cp--testi_image" style="background-image: url('http://preskubbs.com/wwj2/skubbswp/wp-content/uploads/2017/02/testimonial-pic.jpg'); border-color: #8d9f31;"></div>
						</div>
					</div-->

				</div>
			</div>
		</section>

		<section id="c-profile--partners">
			<div class="btsp-container">
				<div class="row">
					<div class="col-xs-12">
						<img src="http://preskubbs.com/wwj2/skubbswp/wp-content/uploads/2017/02/amarin-spa.png" alt=""><img src="http://preskubbs.com/wwj2/skubbswp/wp-content/uploads/2017/02/dep-spa.png" alt=""><img src="http://preskubbs.com/wwj2/skubbswp/wp-content/uploads/2017/02/luna-blanca.png" alt="">
					</div>
				</div>
			</div>
		</section>

		<section id="c-profile--contact_us">
			<h2 style="color: #59392a;" class="oc--section_titles">Contact Us</h2>
			<div class="gmap_div">

				<iframe width='100%' height='300' frameborder='0' scrolling='no' marginheight='0' marginwidth='0'
		 			src='https://maps.google.com/maps?&amp;q=<?=urlencode($address) ?>&amp;output=embed'></iframe>
			</div>

			<p><strong>Address:<br>
			<?= $address?> <?= $postal_code ?></strong></p>
		</section>
	</main>

	<?php wp_footer(); ?>
	<?php get_footer(); ?>