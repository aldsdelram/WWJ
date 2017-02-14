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
		<section id="c-profile--main_banner">
			<a href="#" class="cp--edit_banner"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
			<h1 class="cp--name">Company Profile Name</h1>
		</section>
		
		<!-- 2: ABOUT US -->
		<section id="c-profile--about_us">
			<div class="btsp-container">
				<div class="row">
					<div class="col-sm-4">
						<div class="cp--about_pic" style="background-image: url('http://preskubbs.com/wwj2/skubbswp/wp-content/uploads/2017/02/testprofilebg.jpg'); border-color: #8d9f31;"></div>
					</div>
					<div class="col-sm-8 flex-h-middle">
						<div class="cp--about_texts">
							<h2 style="color: #59392a;" class="oc--section_titles">About Us</h2>
							<p>Rejuvenate your mind, body and spirit at LA Spa, Nail Bar &amp; Massage  your source for five-star skin and nail treatments. Our world class spa services revolve around our commitment to delivering you the very best in the beauty industry. We provide your with perfectly polished nails and sumptuously smooth skin in a stylish and comfortable environment, but it goes well beyond that. In truth, it’s simple; we want you to leave our beauty salon feeling beautiful, pampered and revived!</p>
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

							<div class="cp--flex_set">
								<div class="cp--flex-image" style="background-image: url('http://preskubbs.com/wwj2/skubbswp/wp-content/uploads/2017/02/services-1.jpg');"></div>
								<h3 class="cp--flex-title">Polished Perfection</h3>
								<div class="cp--os-desc">
									Looking for a incredible paint job? Get polish with our talented staff.
								</div>
							</div>

							<div class="cp--flex_set">
								<div class="cp--flex-image" style="background-image: url('http://preskubbs.com/wwj2/skubbswp/wp-content/uploads/2017/02/services-2.jpg');"></div>
								<h3 class="cp--flex-title">Skin Care</h3>
								<div class="cp--os-desc">
									Indulge in our high-end skin and spa treatments.
								</div>
							</div>

							<div class="cp--flex_set">
								<div class="cp--flex-image" style="background-image: url('http://preskubbs.com/wwj2/skubbswp/wp-content/uploads/2017/02/services-3.jpg');"></div>
								<h3 class="cp--flex-title">Hair Salon</h3>
								<div class="cp--os-desc">
									Get healthy hair! Providing a treatment for your hair to make it look like glowing.
								</div>
							</div>

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

							<div class="cp--flex_set">
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
							</div>
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
				<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7977.560671389543!2d103.829165!3d1.306971!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da198cc0aefd57%3A0xca8ff9109e38059!2s400+Orchard+Rd%2C+Singapore+238875!5e0!3m2!1sen!2s!4v1486970306056" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>

			<p><strong>Address:<br>
			80 Bras Basah Rd, Singapore 189560</strong></p>
		</section>
	</main>

	<?php wp_footer(); ?>
	<?php get_footer(); ?>