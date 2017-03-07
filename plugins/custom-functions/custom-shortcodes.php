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


	/*___________________________ MANAGE CANDIDATE VIEW ___________________________*/
	/**
	 * Manage Candidate Page
	 *
	 * @return     [manage-candidates-view]  ( return shortcode )
	 */

	function manage_candidate_func($atts) {
		$myatts = shortcode_atts(
			array(
				'type' => ''
			), $atts, '' );

		ob_start();
	?>

		<div class="listinglayout1">

			<!-- header title -->
			<div class="btsp-container-fluid gray--header_bg gh--floats">
				<div class="row">
					<div class="col-xs-12">
						<h1 class="gray--header_title pull-left">INVITATIONS</h1>

						<div class="listinglayout1__top-dropdown pull-right">
							<label class="select--variant_1">
							    <select>
							        <option>Shortlisted</option>
							        <option>Applied</option>
							        <option>Invited</option>
							    </select>
							</label>
						</div>
					</div>
				</div>
			</div>

			<div class="btsp-container-fluid white-bg-views listinglayout1__main">

				<!-- SHORTLISTED -->
				<div class="listinglayout1__whole-set">
					<div class="title--variant-1">SHORTLISTED</div>
					
					<div class="row">
						<div class="col-sm-3">
							<div class="listinglayout1__image-up" style="background-image: url('<?= wp_get_attachment_url(978) ?>');"></div>
							<div class="listinglayout1__btn-set">
								<a href="#" class="listinglayout1__invite-btn">Invite</a>
								<a href="#" class="listinglayout1__reject-btn">Reject</a> 
							</div>
						</div>
						<div class="col-sm-9">
							<div class="row">
								<div class="col-sm-9">
									<p class="listinglayout1__info-set"><span>Name:</span> <a href="#" class="seeker_name">Janelle Chan</a></p>
									<p class="listinglayout1__info-set"><span>Age:</span> <span class="seeker_age">30</span></p>
									<p class="listinglayout1__info-set"><span>Gender:</span> <span class="seeker_gender">Female</span></p>
									<p class="listinglayout1__info-set"><span>Open Position:</span> <span class="seeker_position">Marketing Manager</span></p>
									<p class="listinglayout1__info-set"><span>Desired Salary:</span> <span  class="seeker_salary">SGD $3,200</span></p>
									<p class="listinglayout1__info-set listinglayout1__text--gray">Why you Should Hire Me:</p>
									<p class="listinglayout1__info-set"><span class="seeker_whyshouldhireme">I am a person that learn quickly and perform better under pressure, am a very good team player that motivate others to achieve the company's common goals.</span></p>
								</div>

								<div class="col-sm-3">
									<div class="listinglayout1__misc-links">
										<a href="#" class="listinglayout1__message-icon"><img src="<?= wp_get_attachment_url(1061); ?>" alt=""></a> <a href="#" data-modal="listinglayout1__modal-note" class="listinglayout1__note-icon"><img src="<?= wp_get_attachment_url(1062); ?>" alt=""></a>
									</div>
								</div>
							</div>
						</div>

						<div class="col-xs-12"><hr class="listinglayout1__set-separator"></div>
					</div>

				</div>

			</div>

		</div>
		
		<!-- NOTE MODAL -->
		<div class="portal--modal listinglayout1__modal-note">
			<div class="portal--modal-details">
				<form class="portal--modal-content">
					<div class="cm--loader"><div class="spin-con"><i class="fa fa-refresh fa-spin fa-3x fa-fw margin-bottom"></i></div></div>
					<h3 class="modal__h3">NEW NOTE</h3>
					<textarea class="modal__textarea" name="" id="" cols="" rows=""></textarea>

					<div class="listinglayout1__modal-note__interactions">
						<input type="submit" class="red-btn-standard-1" value="Save">
						<a href="#" class="darkgray-btn-standard-1">Delete</a>
					</div>

					<!-- save success -->
					<div class="modal--success text-center">
						<h4>NOTE SAVED</h4>
					</div>
				</form>
			</div>
		</div>

		
	<?php
	return ob_get_clean();

	}
	add_shortcode( 'manage-candidates-view', 'manage_candidate_func' );
	// [manage-candidates-view type=""]