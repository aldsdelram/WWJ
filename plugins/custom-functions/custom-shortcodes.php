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