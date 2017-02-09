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


	function learn_more_accord() {
		ob_start();
		?>

		<div class="learn-more--accords_main">
			<div class="row">

				<?php if( have_rows('lm_accordions', 'option') ) : ?>
					<?php while ( have_rows('lm_accordions', 'option') ) : the_row(); ?>
						
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
						
					<?php endwhile; ?>
				<?php endif; ?>

			</div>
		</div>

		<?php
		return ob_get_clean();
	}

	add_shortcode('learn-more-accordions', 'learn_more_accord');
