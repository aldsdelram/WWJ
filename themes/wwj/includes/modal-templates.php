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





<div id="candidate-info-modal" class="modal-area">
	<div class="centered">
		<div class="modal-content">
			<header class="modal-header">
				<div class="rd-row rd-between-xs rd-middle-xs">
					<h3>Personal Information</h3>
					<div class="close-modal"><i class="fa fa-times fa-fw" aria-hidden="true"></i></div>
				</div>
			</header> <!-- end of .modal-header -->
			<section class="modal-section">

				<div class="bstp-container-fluid cm--info_main">
					<div class="cm--loader"><div class="spin-con"><i class="fa fa-refresh fa-spin fa-3x fa-fw margin-bottom"></i></div></div>

					<div class="cm--default">
						<div class="row cm--info_part_1">
							<div class="col-sm-5">
								<div class="candidate_photo" style="background-image: url('<?= wp_get_attachment_url(978); ?>');"></div>
							</div>
							<div class="col-sm-7">
								<label class="cm--info_line" for=""><span>Name: </span> <span class="cm--value name">Janelle</span></label>
								<label class="cm--info_line" for=""><span>Age: </span> <span class="cm--value age">30</span></label>
								<label class="cm--info_line" for=""><span>Gender: </span> <span class="cm--value gender">Female</span></label>
								<label class="cm--info_line" for=""><span>Open Position: </span> <span class="cm--value open_position">Marketing Manager</span></label>
								<label class="cm--info_line" for=""><span>Desired Salary: </span> <span class="cm--value desired_salary">SGD$3,200</span></label>
								<label class="cm--info_line" for=""><span>Credit Price: </span> <span class="cm--value credit_price">30</span></label>
							</div>
						</div>

						<div class="row cm--info_part_2">
							<div class="col-xs-12">
								<h4>Why you Should Hire Me</h4>
								<p class="about_me">I am a person that learn quickly and perform better under pressure, am a very good team pleayer that motivate others in other to achieve the company’s common goals.</p>
							</div>
						</div>

						<div class="row cm--info_part_3">
							<div class="col-sm-4"><a href="#" class="cm--red_btn cm--unlock_btn">UNLOCK NOW</a></div>
							<div class="col-sm-4"><a href="#" class="cm--trans_btn">CONTACT</a></div>
							<div class="col-sm-4"><a href="#" class="cm--red_btn cm--invite_btn">INVITE</a></div>
						</div>

						<div class="row cm--unlock_form">
							<div class="col-xs-12"><p><strong>Are you sure you want to unlock?</strong></p></div>
							<div class="col-sm-6"><input type="submit" class="cm--trans_btn" value="YES"></div>
							<div class="col-sm-6"><a href="#" class="cm--red_btn cm--unlock_no">NO</a></div>
						</div>

						<form action="" class="row cm--invite_form">
								<div class="col-sm-9">
									<div style="display:none"><input class="candidate_id" name="candidate_id" type="text" ></div>
									<select name="" id="" class="cm--job_dropdown">
										<option value="">-- Select job to offer --</option>
										<?php $postings = Job_Listing::getPostings(); ?>
										<?php foreach($postings as $key => $posting): ?>
											<option value="<?= $key ?>"><?=$posting ?></option>
										<?php endforeach; ?>
									</select>
								</div>
								<div class="col-sm-3">
									<input type="submit" value="Submit" class="cm--job_invite_submit">
								</div>
							<div class="cm--notice">INVITED SUCESSFULLY</div>
						</form>
					</div>

					<div class="cm--success">
						<div class="row cm--info_part_1">
							<div class="col-xs-12">
								<div class="success--stars"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
								<h2 class="text-center">YOU HAVE SUCCESSFULLY UNLOCKED</h2>
							</div>
							<div class="col-sm-5">
								<div class="candidate_photo" style="background-image: url('<?= wp_get_attachment_url(978); ?>');"></div>
							</div>
							<div class="col-sm-7">
								<label class="cm--info_line" for=""><span>Name: </span> <span class="cm--value name">Janelle</span></label>
								<label class="cm--info_line" for=""><span>Age: </span> <span class="cm--value age">30</span></label>
								<label class="cm--info_line" for=""><span>Gender: </span> <span class="cm--value gender">Female</span></label>
								<label class="cm--info_line" for=""><span>Open Position: </span> <span class="cm--value open_position">Marketing Manager</span></label>
								<label class="cm--info_line" for=""><span>Desired Salary: </span> <span class="cm--value desired_salary">SGD$3,200</span></label>
								<label class="cm--info_line" for=""><span>Credit Price: </span> <span class="cm--value credit_price">30</span></label>
							</div>
						</div>

						<div class="row cm--info_part_3">
							<div class="col-sm-6"><a href="#" class="cm--red_btn">VIEW RESUME</a></div>
							<div class="col-sm-6"><a href="#" class="cm--trans_btn">DOWNLOAD</a></div>
						</div>
					</div>

					<div class="cm--unlocked">
					
						<div class="row cm--info_part_1">
							<div class="col-sm-5">
								<div class="candidate_photo" style="background-image: url('<?= wp_get_attachment_url(978); ?>');"></div>
							</div>
							<div class="col-sm-7">
								<label class="cm--info_line" for=""><span>Name: </span> <span class="cm--value name">Janelle</span></label>
								<label class="cm--info_line" for=""><span>Age: </span> <span class="cm--value age">30</span></label>
								<label class="cm--info_line" for=""><span>Gender: </span> <span class="cm--value gender">Female</span></label>
								<label class="cm--info_line" for=""><span>Open Position: </span> <span class="cm--value open_position">Marketing Manager</span></label>
								<label class="cm--info_line" for=""><span>Desired Salary: </span> <span class="cm--value desired_salary">SGD$3,200</span></label>
								<label class="cm--info_line" for=""><span>Credit Price: </span> <span class="cm--value credit_price">30</span></label>
							</div>
						</div>
						<div class="row cm--info_part_3">
							<div class="col-sm-6"><a href="#" class="cm--red_btn">VIEW RESUME</a></div>
							<div class="col-sm-6"><a href="#" class="cm--trans_btn">DOWNLOAD</a></div>
						</div>
					</div>

				</div>

			</section> <!-- end of .modal-section -->
		</div> <!-- end of .modal-content -->
	</div> <!-- end of .centered -->
</div> <!-- end of #login-modal -->