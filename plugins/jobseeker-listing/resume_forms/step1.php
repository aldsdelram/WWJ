<?php

	function show_step_1(){
		ob_start();
		?>
			<h3 class="form-title">Personal Information</h3>
			<div class="form-divider rd-row rd-between-xs">
				<div class="left-form">
					<div class="form-group">
						<h3 class="required">Singapore Work Authorization</h3>
						<ul class="radio-group">
							<li>
								<input type="radio" name="work_authorization" id="singapore_citizen" value="Singapore Citizen"/>
								<label for="singapore_citizen">Singapore Citizen</label>
							</li>
							<li>
								<input type="radio" name="work_authorization" id="permanent_resident" value="Permanent Resident"/>
								<label for="permanent_resident">Permanent Resident</label>
							</li>
							<li>
								<input type="radio" name="work_authorization" id="no_work_permit" value="No Work Permit for Singapore"/>
								<label for="no_work_permit">No Work Permit for Singapore</label>
							</li>
						</ul>
					</div> <!-- end of .form-group -->
					<div class="form-group">
						<h3 class="required">Date of Birth</h3>
						<input name="birthday" id="birthday" type="text" class="datepicker input-field" placeholder="dd-mm-yy" readonly/>
					</div> <!-- end of .form-group -->
					<div class="form-group">
						<h3 class="required">Gender</h3>
						<ul class="radio-group">
							<li class="">
								<input type="radio" name="gender" id="male" value="male"/>
								<label for="male">Male</label>
							</li>
							<li class="">
								<input type="radio" name="gender" id="female" value="female"/>
								<label for="female">Female</label>
							</li>
						</ul>
					</div> <!-- end of .form-group -->
					<div class="form-group">
						<h3 class="required">Contact Details</h3>
						<label for="mobile_contact">Mobile</label>
						<input type=number name="mobile_contact" class="input-field numeric" maxlength="8" minlength="8"  pattern="[0-9]{8}"/>
					</div> <!-- end of .form-group -->
					<div class="form-group">
						<label for="email_address">Email</label>
						<input type="email" name="email_address" class="input-field" />
					</div> <!-- end of .form-group -->
					<div class="form-group">
						<h3 class="required">What is your highest educational level?</h3>
						<div class="form-group">
							<label for="tertiary">Educational Level</label>
							<div class="dropdown-input">
								<input type="text" name="tertiary" class="dropdown-data input-field" readonly/>
								<ul class="option_tertiary">
									<li>No Formal Qualification</li>
									<li>PSLE &amp; Belowo Secondary or Equivalent</li>
									<li>GCE 'N' Level / GCE 'O' Level / GCE A'Level</li>
									<li>Professional Certificates</li>
									<li>Diploma</li>
									<li>Degree</li>
									<li>Master</li>
									<li>Doctorate</li>
								</ul>
							</div> <!-- end of .dropdown-input -->
						</div>
					</div> <!-- end of .form-group -->
					<div class="form-group">
						<label for="course">Course</label>
						<input type="text" name="course" class="input-field" />
					</div> <!-- end of .form-group -->
					<div class="form-divider rd-row rd-between-xs">
						<div class="left-form">
							<div class="form-group">
								<label for="start_year">Start Year</label>
								<div class="dropdown-input">
									<input type="text" name="start_year" class="dropdown-data input-field" readonly/>
									<ul class="option_star_year">
										<?php for( $i = date( 'Y' ); $i >= 1950; $i-- ) : ?>
											<li><?= $i ?></li>
										<?php endfor; ?>
									</ul>
								</div> <!-- end of .dropdown-input -->
							</div>
						</div> <!-- end of .left-form -->
						<div class="right-form">
							<div class="form-group">
								<label for="end_year">End Year</label>
								<div class="dropdown-input">
									<input type="text" name="end_year" class="dropdown-data input-field" readonly/>
									<ul class="option_end_year">
										<?php for( $i = date( 'Y' ); $i >= 1950; $i-- ) : ?>
											<li><?= $i ?></li>
										<?php endfor; ?>
									</ul>
								</div>
							</div>
						</div>
					</div> <!-- end of .form-divider -->

					<div class="form-group">
						<h3 class="required">What is your employment status?</h3>
						<div class="dropdown-input">
							<input type="text" name="expertise_years" class="dropdown-data input-field" />
							<ul class="option_expertise_years">
								<li>Actively Seeking for Job Opportunities</li>
								<li>Employed but Open to Attractive Offers</li>
								<li>Satisfied and Not Looking for A Change</li>
							</ul>
						</div> <!-- end of .dropdown-input -->
					</div>
				</div> <!-- end of .left-form -->
				<div class="right-form">
					<div class="form-group">
						<h3 class="required">Career objective(Limited to 150 characters)</h3>
						<textarea class="input-field" name="career_objective" maxlength="150"></textarea>
					</div> <!-- end of .form-group -->
					<div class="form-group">
						<h3>Share your LinkedIn Profile(optional)</h3>
						<input type="url" name="linkedin" class="linkedIn-url input-field" />
					</div> <!-- end of .form-group -->
					<div class="form-group">
						<h3>Profile Photo</h3>
						<div class="upload-photo">
							<div class="img-container" style="background: url( <?= home_url( 'skubbswp/wp-content/uploads/2017/01/user-placeholder.png' ); ?> ) no-repeat bottom center #e4e4e4; background-size: contain;" ></div>
							<p class="text-xs-center">Change Photo</p>
							<input type="text" name="photo_base_64" style="display:none"/>
							<div class="btn-panel rd-row rd-center-xs rd-middle-xs">
								<div class="upload-button" style="cursor: pointer;">
									<input type="file" name="profile_picture" id="inputProfilePicture" accept=".jpg,.png"/>
									<p><span><i class="fa fa-plus fa-fw" aria-hidden="true"></i></span>Browse</p>
								</div> <!-- end of .upload-button -->
								<a href="#" class="take-photo"><i class="fa fa-camera fa-fw" aria-hidden="true"></i> Take Photo</a>
							</div>
							<p class="details">Your profile picture must be an actual picture of you. Logos, animals, clipart or group pictures are not allowed if violated, your profile will be immediately suspended.</p>
						</div> <!-- end of .upload-photo -->
					</div>
				</div> <!-- end of .right-form -->
			</div>
		<?php
		return ob_get_clean();
	}

