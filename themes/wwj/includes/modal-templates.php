<?php if(is_subpage() == 127): ?>
	<div id="login-emp-modal" class="modal-area">
		<div class="centered">
			<div class="modal-content">
				<header class="modal-header">
					<div class="rd-row rd-between-xs rd-middle-xs">
						<h3>Login Form</h3>
						<div class="close-modal"><i class="fa fa-times fa-fw" aria-hidden="true"></i></div>
					</div>
				</header> <!-- end of .modal-header -->
				<section class="modal-section">
					<?php echo do_shortcode("[upme_login register_text='Not Yet a Member? <span>Sign in here</span>' custom_register_url='javascript:void(0)'] "); ?>
				</section> <!-- end of .modal-section -->
			</div> <!-- end of .modal-content -->
		</div> <!-- end of .centered -->
	</div> <!-- end of #login-modal -->
	<div id="register-emp-modal" class="modal-area">
		<div class="centered">
			<div class="modal-content">
				<header class="modal-header">
					<div class="rd-row rd-between-xs rd-middle-xs">
						<h3>Register Form</h3>
						<div class="close-modal"><i class="fa fa-times fa-fw" aria-hidden="true"></i></div>
					</div>
				</header> <!-- end of .modal-header -->
				<section class="modal-section">
					<?php echo do_shortcode("[upme_registration user_role='employer' ]"); ?>
				</section> <!-- end of .modal-section -->
			</div> <!-- end of .modal-content -->
		</div> <!-- end of .centered -->
	</div> <!-- end of #register-modal -->
<?php else: ?>
	<div id="login-cand-modal" class="modal-area">
		<div class="centered">
			<div class="modal-content">
				<header class="modal-header">
					<div class="rd-row rd-between-xs rd-middle-xs">
						<h3>Login Form</h3>
						<div class="close-modal"><i class="fa fa-times fa-fw" aria-hidden="true"></i></div>
					</div>
				</header> <!-- end of .modal-header -->
				<section class="modal-section">
					<?php echo do_shortcode("[upme_login register_text='Not Yet a Member? <span>Sign in here</span>' custom_register_url='javascript:void(0)'] "); ?>
				</section> <!-- end of .modal-section -->
			</div> <!-- end of .modal-content -->
		</div> <!-- end of .centered -->
	</div> <!-- end of #login-modal -->
	<div id="register-cand-modal" class="modal-area">
		<div class="centered">
			<div class="modal-content">
				<header class="modal-header">
					<div class="rd-row rd-between-xs rd-middle-xs">
						<h3>Register Form</h3>
						<div class="close-modal"><i class="fa fa-times fa-fw" aria-hidden="true"></i></div>
					</div>
				</header> <!-- end of .modal-header -->
				<section class="modal-section">
					<?php echo do_shortcode("[upme_registration user_role='candidate' ]"); ?>
				</section> <!-- end of .modal-section -->
			</div> <!-- end of .modal-content -->
		</div> <!-- end of .centered -->
	</div> <!-- end of #register-modal -->
<?php endif; ?>






<div class="portal--modal add_to_cart_modal_container" style="display: hidden;">
	<div class="portal--modal-details">
		<div class="portal--modal-content">
			<p>
				<img src="<?= get_template_directory_uri() . '/img/star.png'?>">
				<img src="<?= get_template_directory_uri() . '/img/star.png'?>">
				<img src="<?= get_template_directory_uri() . '/img/star.png'?>">
			</p>
			<h3> ITEM SUCCESSFULLY ADDED TO YOUR CART </h3>
			<div class="btn-panel">
				<a href="<?= home_url('checkout')?>" class="yes">CHECKOUT</a>
				<a href="#" class="no">BACK</a>
			</div>
		</div>
	</div>
</div>