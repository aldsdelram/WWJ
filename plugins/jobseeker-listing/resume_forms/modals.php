<?php

	function image_capture_modal(){
		ob_start();
		?>
			<div class="portal--modal portal--modal-image-capture">
				<div class="portal--modal-details">
					<div class="portal--modal-content">
						<div>
							<video autoplay="" height="300" id="video" width="300"></video>
						</div>
						<div>
							<button id="snap">Snap Photo</button>
						</div>
						<canvas height="500" id="canvas" style="display:none;" width="500"></canvas>
					</div>
				</div>
			</div>
		<?php
		return ob_get_clean();
	}

	function add_workplace_modal(){
		ob_start();
		?>
			<div class="portal--modal workplace_container">
				<div class="portal--modal-details">
					<div class="portal--modal-content">
						<div class="resume-content">
							<h3 class="form-title">Work Experience</h3>
							<form class="company_form">
								<div class="fields-repeater">
									<div class="form-divider rd-row rd-between-xs">
										<div class="left-form">
											<div class="form-group">
												<h3 class="required">Job Title</h3>
												<input class="input-field" name="job_title[]" type="text">
											</div><!-- end of .form-group -->
											<div class="form-group">
												<h3 class="required">Company</h3>
												<input class="input-field" name="company_name[]" type="text">
											</div><!-- end of .form-group -->
											<div class="form-divider rd-row rd-between-xs form-group">
												<div class="left-form">
													<h3 class="required">From (mm - yyyy)</h3>
													<div class="form-divider rd-row rd-between-xs">
														<div class="left-form">
															<div class="form-group">
																<div class="dropdown-input">
																	<label for="from_month">Month</label>
																	<input class="dropdown-data input-field" name="start_month[]" type="text">
																	<ul class="option_end_year">
																		<?php for( $i = 1; $i <= 12; $i++ ) : ?>
																			<li><?= $i < 10 ? '0'.$i : $i ?></li>
																		<?php endfor; ?>
																	</ul>
																</div><!-- end of .dropdown-input -->
															</div>
														</div>
														<div class="right-form">
															<div class="form-group">
																<label for="form_year">Year</label>
																<div class="dropdown-input">
																	<input class="dropdown-data input-field" name="start_year[]" type="text">
																	<ul class="option_end_year">
																		<?php for( $i = date( 'Y' ); $i >= 1950; $i-- ) : ?>
																			<li><?= $i ?></li>
																		<?php endfor; ?>
																	</ul>
																</div>
																<!--input class="input-field numeric" max="9999" min="1000" name="start_year[]" type="number"-->
															</div>
														</div>
													</div>
												</div><!-- end of .left-form -->
												<div class="right-form">
													<h3 class="required">To (mm - yyyy)</h3>
													<div class="form-divider rd-row rd-between-xs">
														<div class="left-form">
															<div class="form-group">
																<div class="dropdown-input">
																	<label for="end_year">Month</label>
																	<input class="dropdown-data input-field" name="end_month[]" type="text">
																	<ul class="option_end_month">
																		<?php for( $i = 1; $i <= 12; $i++ ) : ?>
																			<li><?= $i < 10 ? '0'.$i : $i ?></li>
																		<?php endfor; ?>
																	</ul>
																</div><!-- end of .dropdown-input -->
															</div>
														</div>
														<div class="right-form">
															<div class="form-group">
																<label for="end_year">Year</label> 

																<div class="dropdown-input">
																	<input class="dropdown-data input-field" name="end_year[]" type="text">
																	<ul class="option_end_year">
																		<li data-value="Present">Present</li>
																		<?php for( $i = date( 'Y' ); $i >= 1950; $i-- ) : ?>
																			<li data-value="<?=$i?>"><?= $i ?></li>
																		<?php endfor; ?>
																	</ul>
																</div>

																<!--input class="input-field numeric" max="9999" min="1000" name="end_year[]" type="number"-->
															</div>
														</div>
													</div>
												</div>
												<label class="company_year_error">The date picked must not be later than the From Date</label>
											</div>
										</div>
										<div class="right-form">
											<div class="form-group">
												<h3 class="required">Key Tasks Performed / Achievements</h3>
												<textarea class="input-field" data-autoresize="" name="key_tasks[]"></textarea>
											</div><!-- end of .form-group -->
										</div>
									</div>




									<div class="btn-panel rd-row rd-middle-xs rd-center-xs">
										<a href="#" class="btnCancel">Cancel</a>
										<a href="#" class="btnAddWorkplace">Add</a>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		<?php
		return ob_get_clean();
	}

	function workplace_verification_modal(){
		ob_start();
		?>
			<div class="portal--modal verification_container">
				<div class="portal--modal-details">
					<div class="portal--modal-content">
						<div class="resume-content">
							<form class="verification_form">
								<div class="fields">
									<h3 class="form-title">Verify Your Work Experience</h3>
									<div class="wv-note">
										<div class="bulb"></div>
										<p>Workers are required to have their previous work experience verified. Workers that do not have their previous work experience verified will NOT be able to apply for jobs and will NOT have their profile displayed when Employers search for their skills.</p>
									</div>
									<h3>Previous Work Experience</h3>
									<div class="row">
										<div class="col-sm-3 col-xs-12">
											Job Title:
										</div>
										<div class="col-sm-9 col-xs-12 wv-data wv-desc">
											saaa
										</div>
									</div>
									<div class="row">
										<div class="col-sm-3 col-xs-12">
											Company Name:
										</div>
										<div class="col-sm-9 col-xs-12 wv-data wv-company">
											asfasdf
										</div>
									</div>
									<div class="fields-repeater">
										<div class="row">
											<div class="col-sm-4 col-xs-12 form-group">
												<h3 class="required">First Name</h3>
												<input class="input-field required verification_name" name="verification_name[0]" type="text" required>
											</div>
											<div class="col-sm-4 col-xs-12 form-group">
												<h3 class="required">Email</h3>
												<input class="input-field required verification_email" name="verification_email[0]" type="email" required>
											</div>
											<div class="col-sm-4 col-xs-12 form-group">
												<h3 class="required">Contact Number</h3>
												<input class="input-field required verification_contact numeric" name="verification_contact[0]" type="number" required>
											</div>
										</div>
									</div>
									<div class="fields-repeated"></div>
									<div class="form-group">
										<button class="add-field add_more_verification"><span><i class="fa fa-plus fa-fw" aria-hidden="true"></i></span> Add More</button>
									</div>

									<div class="btn-panel rd-row rd-middle-xs rd-center-xs">
										<a href="#" class="btnBack">Back</a>
										<a href="#" class="btnAddWorkplace">Add</a>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		<?php
		return ob_get_clean();
	}

	function success_modal(){
		ob_start();
		?>
			<div class="portal--modal success_container" style="display: block;">
				<div class="portal--modal-details">
					<div class="portal--modal-content">
						<h1>YOUR RESUME IS SUCCESFULLY SAVE</h1>
						<h3> Do you wish to view your resume? </h3>
						<div class="btn-panel">
							<a href="<?= home_url('jobseeker/dashboard/resume/pdf')?>" class="yes">YES</a>
							<a href="#" class="no">No</a>
						</div>
					</div>
				</div>
			</div>

			<script>
				jQuery('.portal--modal .success_container').show();
			</script>
		<?php
		return ob_get_clean();
	}

	function help_button_modal() {
		ob_start();
		?>
			<div class="portal--modal help_modal_container">
				<div class="portal--modal-details">
					<div class="portal--modal-content">
						<div class="help_modal_close">x</div>
						
						<div class="simple-fading-divs">
							<h2 class="sfd--title">Help Tips</h2>
							<!-- 1 -->
							<div class="box-to-fade box-no-1">
								<img class="sfd--img" src="<?= plugins_url() . '/jobseeker-listing/img/help-modal--img-1.png' ?>" alt="">		

								<div class="clearfix">
									<h3 class="sfd--slanted">My personal profile <span class="sfd--slanted-border"></span></h3>
								</div>

								<p class="sfd--desc">Fill out the form on the left.<br>You can always come back to edit the data in My Profile.</p>
							</div>

							<!-- 2 -->
							<div class="box-to-fade box-no-2">
								<img class="sfd--img" src="<?= plugins_url() . '/jobseeker-listing/img/help-modal--img-2.png' ?>" alt="">

								<div class="clearfix">
									<h3 class="sfd--slanted">Tailor your answers to the job you are seeking <span class="sfd--slanted-border"></span></h3>
								</div>

								<p class="sfd--desc">You want to focus your education and experience to the job at hand. Give details of skills and accomplishments, and avoid framing your experiences in terms of mere duties and responsibilities. Include experience from all sources, including previous jobs, school and even volunteer work.</p>
							</div>

							<!-- 3 -->
							<div class="box-to-fade box-no-3">
								<img class="sfd--img" src="<?= plugins_url() . '/jobseeker-listing/img/help-modal--img-3.png' ?>" alt="">

								<div class="clearfix">
									<h3 class="sfd--slanted">Provide references <span class="sfd--slanted-border"></span></h3>
								</div>

								<p class="sfd--desc">Employers want to see that there are people who will provide objective information about you to them. Pick your references carefully — and make sure you ask if they are willing to be a reference for you before you list them. Past employers and teachers are good sources.</p>
							</div>

							<!-- 4 -->
							<div class="box-to-fade box-no-4">
								<img class="sfd--img" src="<?= plugins_url() . '/jobseeker-listing/img/help-modal--img-4.png' ?>" alt="">

								<div class="clearfix">
									<h3 class="sfd--slanted">Don't leave any blanks <span class="sfd--slanted-border"></span></h3>
								</div>

								<p class="sfd--desc">Many companies filter candidates by their responses to certain fields within the online application forms. Don't miss out on any chances to be included in the recruiters' filtering processes for the position! Fill out all fields within the application process.</p>
							</div>

							<!-- 5 -->
							<div class="box-to-fade box-no-5">
								<img class="sfd--img" src="<?= plugins_url() . '/jobseeker-listing/img/help-modal--img-5.png' ?>" alt="">

								<div class="clearfix">
									<h3 class="sfd--slanted">Proofread your information before submitting <span class="sfd--slanted-border"></span></h3>
								</div>

								<p class="sfd--desc">Many companies filter candidates by their responses to certain fields within the online application forms. Don't miss out on any chances to be included in the recruiters' filtering processes for the position! Fill out all fields within the application process.</p>
							</div>
						</div>

						<div class="sfd--bullets"></div>

					</div>
				</div>
			</div>
		<?php
		return ob_get_clean();
	}