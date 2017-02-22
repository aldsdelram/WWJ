<?php

	function hello(){
		$name = '';
		if(isset($_SESSION['rdata'])){
			$user_id = $_SESSION['rdata']['param6'];
			$name = get_user_meta($user_id, 'first_name', true);
			$email = $_SESSION['rdata']['param2'];
		}
		?>

		<div class="ty--main"><h4 class="ty--title">Hello<?=', '.$name?>!</h4>
			<p class="ty--desc">Thank you for registering with us. Click on your email to verify your account with the link provided.</p>
			<img class="ty--icon" src="http://preskubbs.com/wwj/skubbswp/wp-content/themes/Jobera-child/images/icon-mail.png" style="max-width: 140px;">
			<p class="ty--email"><?= $email?></p>
			<p class="ty--link"><a href="#resend_link" id="resend_link">RESEND VERIFICATION</a></p>
			<p class="ty--desc" style="margin-top: 20px"> Trouble signing in? <a href="<?= home_url("jobseeker/contact-us") ?>" style="color: #c7161c">Contact Us</a></p>
		</div>

		<?php
		return ob_get_clean();
	}
	add_shortcode('hello', 'hello');

	
	// learn more accordion
	function learn_more_accord() {
		ob_start();
		?>

		<div class="learn-more--accords_main">

				<?php if( have_rows('lm_accordions', 'option') ) : ?>
    			
    			<?php $count = 0; ?>
				<div class="row">
					<?php while ( have_rows('lm_accordions', 'option') ) : the_row(); ?>
    	  			<?php if( $count == 2 ) : ?>
    			</div>
				<div class="row">
	    		<?php $count = 0; endif; ?>

						<div class="col-sm-6 lm--accord_set">
							<div class="lm--accord_inner">
								<div class="lma--pic">
									<div class="pic--flex_position"><img src="<?php the_sub_field('accordion_icon_image'); ?>" alt=""></div>
								</div>
								<div class="lma--desc">
									<div class="lma--flex_con">
										<div class="lma--title"><?php the_sub_field('accordion_title'); ?></div>
										<div class="lma--toggle"><i class="fa fa-plus" aria-hidden="true"></i></div>
									</div>
								</div>
							</div>
							<div class="lma--toggle_content"><?php the_sub_field('accordion_content'); ?></div>
						</div>
						
					<?php $count++; endwhile; ?>
				<?php endif; ?>

				</div>
		</div>

		<?php
		return ob_get_clean();
	}

	add_shortcode('learn-more-accordions', 'learn_more_accord');


	// testimonial about us
	function testimonial_about_us_func() {
		ob_start();
		?>

		<div class="au--testimonial_main">
			
			<div class="testimonial-fade slick--red_dots">
				<!-- 1 -->
				<div class="x">
					<div class="au--testimonial_bubble">
					In today's context, there is no such thing as a safe and permanent job. This is why I would recommend WorkWork Jay to everyone - be it a fresh grad or someone seeking better career opportunities. It serves as an efficient platform for people in the workforce to have a steady stream of job opportunities in the palm of your hand. Upon signup, I received up to 8 invitations from reputable organizations within a week!
					</div>

					<div class="text-center">
						<div class="aut--pic" style="background-image: url(<?php echo wp_get_attachment_url(971); ?>);"></div>
						<div class="aut--name">Jonathan Doe</div>
						<div class="aut--position">Jobseeker Applicant</div>
					</div>
				</div>

				<!-- 2 -->
				<div class="x">
					<div class="au--testimonial_bubble">
					In today's context, there is no such thing as a safe and permanent job. This is why I would recommend WorkWork Jay to everyone - be it a fresh grad or someone seeking better career opportunities. It serves as an efficient platform for people in the workforce to have a steady stream of job opportunities in the palm of your hand. Upon signup, I received up to 8 invitations from reputable organizations within a week!
					</div>

					<div class="text-center">
						<div class="aut--pic" style="background-image: url(<?php echo wp_get_attachment_url(971); ?>);"></div>
						<div class="aut--name">Jonathan Doe</div>
						<div class="aut--position">Jobseeker Applicant</div>
					</div>
				</div>

				<!-- 3 -->
				<div class="x">
					<div class="au--testimonial_bubble">
					In today's context, there is no such thing as a safe and permanent job. This is why I would recommend WorkWork Jay to everyone - be it a fresh grad or someone seeking better career opportunities. It serves as an efficient platform for people in the workforce to have a steady stream of job opportunities in the palm of your hand. Upon signup, I received up to 8 invitations from reputable organizations within a week!
					</div>

					<div class="text-center">
						<div class="aut--pic" style="background-image: url(<?php echo wp_get_attachment_url(971); ?>);"></div>
						<div class="aut--name">Jonathan Doe</div>
						<div class="aut--position">Jobseeker Applicant</div>
					</div>
				</div>

			</div>

		</div>

		<?php
		return ob_get_clean();
	}

	add_shortcode('testimonial-about-us', 'testimonial_about_us_func');


	// jobseeker calendar
	function jobseeker_calendar_func() {
		ob_start();
		?>

		<div class="btsp-container-fluid gray--header_bg">
			<div class="row">
				<div class="col-xs-12">
					<h1 class="gray--header_title pull-left">CALENDAR</h1>
				</div>
			</div>
		</div>
		<div class="btsp-container-fluid jobseeker--calendar_main">
			<div class="row">
				<div class="col-sm-8">
					<div class="wwj--custom_calendar"></div>
				</div>
				<div class="col-sm-4 cc--sidebar">
					<h2 class="ccs--sidebar_main_title">Interview schedule</h2>

					<div class="ccs--set_main">
						<div class="ccs--schedule_set">
							<p class="ccs--date"><span class="ccs--date_text">JAN 28</span> - 9:00AM - 10:00AM</p>
							<p class="ccs--address">412 orchard singapore</p>
							<p class="ccs--position">Senior marketing manager</p>
							<p class="ccs--company_name">Hanash Inc</p>
						</div>

						<div class="ccs--schedule_set">
							<p class="ccs--date"><span class="ccs--date_text">JAN 28</span> - 9:00AM - 10:00AM</p>
							<p class="ccs--address">412 orchard singapore</p>
							<p class="ccs--position">Senior marketing manager</p>
							<p class="ccs--company_name">Hanash Inc</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<?php
		return ob_get_clean();
	}

	add_shortcode('jobseeker-calendar', 'jobseeker_calendar_func');