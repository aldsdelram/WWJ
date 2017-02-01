<?php
require_once( dirname(__FILE__).'/../resume_forms/modals.php');

function view_profile_content(){
	include( 'info.inc');
	if(is_user_logged_in()){
		set_info();
	}

	ob_start();
	?>
		<div class="btsp-container-fluid white-bg-views profile-view--main_content">

			<div class="row">
				<div class="col-sm-4">
					<div>
						<img src="<?php echo $profile_picture; ?>" alt="" class="profile-view--picture">

						<p class="profile-view--change_photo"><a href="#">Change Photo</a></p>
					</div>

					<div class="resume-content">
						<div class="btn-panel">

							<div class="row">
								<div class="col-xs-6">
									<div class="upload-button" style="cursor: pointer;">
										<input type="file" name="profile_picture" id="inputProfilePicture" accept=".jpg,.png">
										<p><span><i class="fa fa-plus fa-fw" aria-hidden="true"></i></span>Browse</p>
									</div> <!-- end of .upload-button -->
								</div>

								<div class="col-xs-6">
									<a href="#" class="take-photo"><i class="fa fa-camera fa-fw" aria-hidden="true"></i> Take Photo</a>
								</div>
							</div>

						</div>
					</div>
					
				</div>

				<div class="col-sm-8 profile-view--details">
					<!-- Full Name -->
					<div class="row">
						<div class="col-sm-6"><strong class="textcolor--gray">Full Name:</strong></div>
						<div class="col-sm-6"><strong><?= $firstname . ' ' . $lastname; ?></strong></div>
					</div>

					<!-- Email -->
					<div class="row">
						<div class="col-sm-6"><strong class="textcolor--gray">Email:</strong></div>
						<div class="col-sm-6"><strong><?= $email_address; ?></strong></div>
					</div>

					<!-- Date of Birth -->
					<div class="row">
						<div class="col-sm-6"><strong class="textcolor--gray">Date of Birth:</strong></div>
						<div class="col-sm-6"><strong><?= $bday->format("M-d-Y"); ?></strong></div>
					</div>

					<!-- Gender -->
					<div class="row">
						<div class="col-sm-6"><strong class="textcolor--gray">Gender:</strong></div>
						<div class="col-sm-6"><strong><?= $gender; ?></strong></div>
					</div>

					<!-- Mobile Number -->
					<div class="row">
						<div class="col-sm-6"><strong class="textcolor--gray">Mobile Number:</strong></div>
						<div class="col-sm-6"><strong><?= $contact; ?></strong></div>
					</div>

					<!-- Address -->
					<div class="row">
						<div class="col-sm-6"><strong class="textcolor--gray">Address:</strong></div>
						<div class="col-sm-6"><strong>(pending)</strong></div>
					</div>

					<!-- Singapore Work Authorization -->
					<div class="row">
						<div class="col-sm-6"><strong class="textcolor--gray">Singapore Work Authorization:</strong></div>
						<div class="col-sm-6"><strong><?= $work_authorization; ?></strong></div>
					</div>

					<!-- Career Objective -->
					<div class="row">
						<div class="col-sm-6"><strong class="textcolor--gray">Career Objective:</strong></div>
						<div class="col-sm-6"><strong><?= $career_objective; ?></strong></div>
					</div>

					<!-- Education -->
					<div class="row">
						<div class="col-sm-6"><strong class="textcolor--gray">Education:</strong></div>
						<div class="col-sm-6"><strong><?= $tertiary; ?></strong></div>
					</div>

					<!-- LinkedIn Profile -->
					<div class="row">
						<div class="col-sm-6"><strong class="textcolor--gray">LinkedIn Profile:</strong></div>
						<div class="col-sm-6"><strong><u><a href="<?= $linkedin; ?>" target="_blank"><?= $linkedin; ?></a></u></strong></div>
					</div>

				</div>
			</div>


			<?php #show_basic_info() ?>
			<?php #show_workplaces() ?>
			<?php #show_skill_and_others() ?>
			<?php #show_about() ?>
		</div>
	<?php
	return ob_get_clean();
}

	function show_basic_info(){
		include( 'info.inc');
		ob_start();
		?>
			<div class="row">
				<h1><?= $firstname.' '.$lastname ?></h1>
				<div class="col-xs-12 row">
					<div class="row">
						<div class="col-md-4 col-xs-12">
							<label>Gender</label>
							<?= $gender?>
						</div>
						<div class="col-md-4 col-xs-12">
							<label>Work Authorization</label>
							<?= $work_authorization?>
						</div>
						<div class="col-md-4 col-xs-12">
							<label>Age</label>
							<?= $age?>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4 col-xs-12">
							<label>availability</label>
							<?= $availability?>
						</div>
						<div class="col-md-4 col-xs-12">
							<label>Field of Expertise</label>
							<?= Job_Listing::GetIndustryByID($expertise)?>
						</div>
						<div class="col-md-4 col-xs-12">
							<label>Contact Details</label>
							<div class="row">
								<div class="col-xs-12 col-md-6">
									<?= $contact ?>
								</div>
								<div class="col-xs-12 col-md-6">
									<?= $email_address ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php
		return ob_get_clean();
	}

	function show_workplaces(){
		include( 'info.inc');
		ob_start();
		?>
			<div class="row">
			<?php foreach ($work_experiences as $key => $work_experience):
			?>
                    <div class="row">
	                    <div class="col-sm-2 col-xs-12">
                            <?= getMonthName($work_experience['start_month']).' '.$work_experience['start_year'].
                                        ' - '.
	                            getMonthName($work_experience['end_month']).' '.$work_experience['end_year'];
                            ?>
	                    </div>
	                    <div class="col-sm-9 col-xs-12">
	                        <h1><?=$work_experience['job'] ?> at <?= $work_experience['company_name']?></h1>
	                        <p><?= $work_experience['key_task']?></p>
	                    </div>
                    </div>
			<?php endforeach; ?>
			</div>


		<?php
		return ob_get_clean();
	}

	function show_skill_and_others(){

	}

	function show_about(){
		ob_start();
		?>
		<?= $about_me ?>
		<?php
		return ob_get_clean();
	}

    // function getMonthName($month_number){
    //     $monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"];
    //     return $monthNames[((int)($month_number)-1)];
    // }



function edit_profile_content(){
	include( 'info.inc');
	if(is_user_logged_in()){
		set_info();
	}

	if(isset($_REQUEST['save'])){
		$new_data= $_REQUEST;
		$the_step1_data = $step1;

		if($step1 == null)
			$the_step1_data = [];

		$ignore = [
			'o_tertiary',
			'o_start_year',
			'o_end_year',
			'o_gender',
			'o_nationality',
			'o_work_authorization',
			'o_employment_status',
			'save'
		];


		foreach ($new_data as $k => $value) {
			if(in_array($k, $ignore))
				continue;
			if($k == "photo_base_64"){
				if($value != null){
					$attachment = upload_photo($new_data['photo_base_64']);

					$step1_data_meta = get_user_meta(get_current_user_id(), 'step1_data', true);
					if($step1_data_meta){
						if($step1_data_meta['photo_base_64']){
							wp_delete_attachment( $step1_data_meta['photo_base_64'], true );
						}
					}
					$the_step1_data['photo_base_64'] = $attachment['ID'];
				}
				continue;
			}
			if($k == "firstname"){
				update_user_meta(get_current_user_id(), 'first_name', $value);
				continue;
			}
			if($k == "lastname"){
				update_user_meta(get_current_user_id(), 'last_name', $value);
				continue;
			}



			$the_step1_data[$k] = $value;
		}

		// var_dump($step1);
		// echo "<br/>===========================================================<br/>";
		// var_dump($the_step1_data);

		update_user_meta(get_current_user_id(), 'step1_data', $the_step1_data);
		wp_redirect(home_url('/jobseeker/dashboard/profile/view/information/'));
		exit;
	}


	ob_start();
	?>
	
	<div class="btsp-container-fluid white-bg-views profile--edit">
		<?php if($step1): ?>
			<form action="" method="POST" id="basic_edit" enctype="multipart/form-data">
				<div class="row">
					<div class="col-sm-6">
						<div class="upload-photo">
							<div class="img-container" style="background: url( '<?= $profile_picture ?>' ) no-repeat bottom center #e4e4e4; background-size: contain;" ></div>
							<input name="photo_base_64" style="display:none" type="text">
							<p class="profile-view--change_photo"><a href="#">Change Photo</a></p>
						</div>
						<div class="resume-content">
							<div class="btn-panel">
								<div class="row">
									<div class="col-xs-6">
										<div class="upload-button" style="cursor: pointer;">
											<input type="file" name="profile_picture" id="inputProfilePicture" accept=".jpg,.png">
											<p><span><i class="fa fa-plus fa-fw" aria-hidden="true"></i></span>Browse</p>
										</div> <!-- end of .upload-button -->
									</div>
									<div class="col-xs-6">
										<a href="#" class="take-photo"><i class="fa fa-camera fa-fw" aria-hidden="true"></i> Take Photo</a>
									</div>
								</div>
							</div>
						</div>
						<br>
						<div class="resume-content">
							<div class="form-group">
								<label for="tertiary"><strong>Educational Level</strong></label>
								<div class="dropdown-input">
									<input type="text" name="tertiary" class="dropdown-data input-field required" readonly value="<?= $tertiary ?>" data-value="<?= $tertiary?>"/>
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


							<div class="form-group">
								<label for="course"><strong>Course</strong></label>
								<input type="text" name="course" class="input-field required" value="<?= $course?>">
							</div>

							<div class="form-divider rd-row rd-between-xs">
								<div class="left-form">
									<div class="form-group">
										<label for="start_year"><strong>Start Year</strong></label>
										<div class="dropdown-input" readonly="readonly">
											<input type="text" name="start_year" class="dropdown-data input-field required" readonly="" value="<?= $school_s_year?>" data-value="<?= $school_s_year?>" >
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
										<label for="end_year"><strong>End Year</strong></label>
										<div class="dropdown-input" readonly="readonly">
											<input type="text" name="end_year" class="dropdown-data input-field required" readonly="" value="<?= $school_e_year?>" data-value="<?= $school_e_year?>">
											<ul class="option_end_year">
												<?php for( $i = date( 'Y' ); $i >= 1950; $i-- ) : ?>
													<li><?= $i ?></li>
												<?php endfor; ?>
											</ul>
										</div>
									</div>
								</div>
							</div>

							<div class="form-group">
								<label for="career_objective"><strong>Career objective</strong></label>
								<textarea class="input-field required" name="career_objective" maxlength="150"><?= $career_objective?></textarea>
							</div>

							<div class="form-group">
								<label for="linkedin"><strong>LinkedIn Profile</strong></label>
								<input type="url" name="linkedin" class="linkedIn-url input-field" <?php echo $linkedin == null ? '' : 'value="'.$linkedin.'"' ?> >
							</div>

						</div>

					</div>

					<div class="col-sm-6">
						<div class="resume-content">
							<div class="form-group">
								<label for="fullname"><strong>First Name</strong></label>
								<input type="text" name="firstname" class="input-field required" value="<?=$firstname ?>">
							</div>

							<div class="form-group">
								<label for="fullname"><strong>Last Name</strong></label>
								<input type="text" name="lastname" class="input-field required" value="<?= $lastname?>">
							</div>

							<div class="form-group">
								<label for="email"><strong>Email</strong></label>
								<input type="email" name="email_address" class="input-field required" value="<?= $email_address?>">
							</div>

							<div class="form-group">
								<label class="required" for="birthday"><strong><span class="text-red">*</span> Date of Birth</strong></label>
								<input name="birthday" id="birthday" type="text" class="datepicker input-field required" placeholder="dd-mm-yy" readonly="" value="<?= $bday->format('d-m-Y') ?>">
							</div>

							<div class="form-group">
								<label for="gender"><strong>Gender</strong></label>
								<div class="dropdown-input" readonly="readonly">
									<input type="text" name="gender" class="dropdown-data input-field required" value="<?= $gender?>" data-value="<?= $gender?>" >
									<ul class="option_gender">
										<li>Male</li>
										<li>Female</li>
									</ul>
								</div> <!-- end of .dropdown-input -->
							</div>

							<div class="form-group">
								<label for="contactnumber"><strong>Contact Number</strong></label>
								<input type="number" name="mobile_contact" class="input-field numeric required" maxlength="8" minlength="8" pattern="[0-9]{8}" value="<?= $contact?>">
							</div>

							<div class="form-group">
								<label for="streetaddress"><strong>Street Address</strong></label>
								<input type="text" name="address[street]" class="input-field required" value="<?= $address['street'] ?>">
							</div>

							<div class="form-divider rd-row rd-between-xs">
								<div class="left-form">
									<div class="form-group">
										<label for="unitno"><strong>Unit / Building Number</strong></label>
										<input type="text" name="address[unit]" class="input-field required" value="<?= $address['unit']?>">
									</div>
								</div>

								<div class="right-form">
									<div class="form-group">
										<label for="state"><strong>State</strong></label>
										<input type="text" name="address[state]" class="input-field required" value="<?= $address['state']?>">
									</div>
								</div>
							</div>

							<div class="form-divider rd-row rd-between-xs">
								<div class="left-form">
									<div class="form-group">
										<label for="postalcode"><strong>Postal Code</strong></label>
										<input type="text" name="address[postalcode]" class="input-field required" value="<?= $address['postalcode']?>">
									</div>
								</div>

								<div class="right-form">
									<div class="form-group">
										<label for="city"><strong>City</strong></label>
										<input type="text" name="address[city]" class="input-field required" value="<?= $address['city']?>">
									</div>
								</div>
							</div>


							<div class="form-group">
								<label for="city"><strong>Nationality</strong></label>
								<div class="dropdown-input">
									<?php $nationalities = WWJ::getNationalities(); ?>
									<input type="text" name="nationality" class="dropdown-data input-field required" readonly value="<?= $nationalities[$nationality]?>" data-value="<?=$nationality?>"/>
									<ul class="option_nationality">
									<?php foreach ($nationalities as $key => $value): ?>
										<li data-value="<?= $key ?>"><?= $value ?></li>
									<?php endforeach; ?>
									</ul>
								</div>
							</div> <!-- end of .form-group -->

							<div class="form-group">
								<?php 
									$authorizations = [
										'singapore_citizen' => 'Singapore Citizen',
										'valid_spass' => 'Valid SPASS',
										'permanent_resident' => 'Permanent Resident',
										'valid_epass' => 'Valid EPass',
										'no_work_permit_for_singapore' => 'No Work Permit for Singapore',
										'valid_work_permit' => 'Valid Work Permit',
									];
								?>
								<label for="swa"><strong>Singapore Work Authorization</strong></label>
								<div class="dropdown-input" readonly="readonly">
									<input type="text" name="work_authorization" class="dropdown-data input-field required" value="<?= $work_authorization?>" data-value="<?= $work_authorization?>" >
									<ul class="option_swa">
										<?php foreach ($authorizations as $key => $value):?>
											<li><?= $value ?></li>
										<?php endforeach; ?>
									</ul>
							</div>

							<div class="form-group">
								<label for="swa"><strong>Employment status</strong></label>
								<div class="dropdown-input" readonly="readonly">
									<input name="employment_status" class="dropdown-data input-field" type="text" value="<?= $employment_status?>" data-value="<?= $employment_status?>" >
									<ul class="option_expertise_years">
										<li>Actively Seeking for Job Opportunities</li>
										<li>Employed but Open to Attractive Offers</li>
										<li>Satisfied and Not Looking for A Change</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<div class="form-d-group">
							<input type="submit" value="Save" class="save-btn-variant-1" name="save">
							<a href="#" class="cancel-btn-variant-1">Cancel</a>
						</div>
					</div>
				</div>
			</form>
		<?php else: ?>
			<form action="" method="POST" id="basic_edit" enctype="multipart/form-data">

				<div class="row">
					<div class="col-sm-6">

						<div class="upload-photo">
							<div class="img-container" style="background: url( <?= home_url( 'skubbswp/wp-content/uploads/2017/01/user-placeholder.png' ); ?> ) no-repeat bottom center #e4e4e4; background-size: contain;" ></div>

							<input name="photo_base_64" style="display:none" type="text">
							<p class="profile-view--change_photo"><a href="#">Change Photo</a></p>
						</div>

						<div class="resume-content">
							<div class="btn-panel">

								<div class="row">
									<div class="col-xs-6">
										<div class="upload-button" style="cursor: pointer;">
											<input type="file" name="profile_picture" id="inputProfilePicture" accept=".jpg,.png">
											<p><span><i class="fa fa-plus fa-fw" aria-hidden="true"></i></span>Browse</p>
										</div> <!-- end of .upload-button -->
									</div>

									<div class="col-xs-6">
										<a href="#" class="take-photo"><i class="fa fa-camera fa-fw" aria-hidden="true"></i> Take Photo</a>
									</div>
								</div>

							</div>
						</div>

						<br>
						<div class="resume-content">

							<div class="form-group">
								<label for="tertiary"><strong>Educational Level</strong></label>
								<div class="dropdown-input">
									<input type="text" name="tertiary" class="dropdown-data input-field required" readonly/>
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


							<div class="form-group">
								<label for="course"><strong>Course</strong></label>
								<input type="text" name="course" class="input-field required">
							</div>

							<div class="form-divider rd-row rd-between-xs">
								<div class="left-form">
									<div class="form-group">
										<label for="start_year"><strong>Start Year</strong></label>
										<div class="dropdown-input" readonly="readonly">
											<input type="text" name="start_year" class="dropdown-data input-field required" readonly="">
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
										<label for="end_year"><strong>End Year</strong></label>
										<div class="dropdown-input" readonly="readonly">
											<input type="text" name="end_year" class="dropdown-data input-field required" readonly="">
											<ul class="option_end_year">
												<?php for( $i = date( 'Y' ); $i >= 1950; $i-- ) : ?>
													<li><?= $i ?></li>
												<?php endfor; ?>
											</ul>
										</div>
									</div>
								</div>
							</div>

							<div class="form-group">
								<label for="career_objective"><strong>Career objective</strong></label>
								<textarea class="input-field required" name="career_objective" maxlength="150"></textarea>
							</div>

							<div class="form-group">
								<label for="linkedin"><strong>LinkedIn Profile</strong></label>
								<input type="url" name="linkedin" class="linkedIn-url input-field">
							</div>

						</div>

					</div>

					<div class="col-sm-6">
						<div class="resume-content">
							<div class="form-group">
								<label for="fullname"><strong>First Name</strong></label>
								<input type="text" name="firstname" class="input-field required">
							</div>

							<div class="form-group">
								<label for="fullname"><strong>Last Name</strong></label>
								<input type="text" name="lastname" class="input-field required">
							</div>

							<div class="form-group">
								<label for="email"><strong>Email</strong></label>
								<input type="email" name="email_address" class="input-field required">
							</div>

							<div class="form-group">
								<label class="required" for="birthday"><strong><span class="text-red">*</span> Date of Birth</strong></label>
								<input name="birthday" id="birthday" type="text" class="datepicker input-field required" placeholder="dd-mm-yy" readonly="">
							</div>

							<div class="form-group">
								<label for="gender"><strong>Gender</strong></label>
								<div class="dropdown-input" readonly="readonly">
									<input type="text" name="gender" class="dropdown-data input-field required">
									<ul class="option_gender">
										<li>Male</li>
										<li>Female</li>
									</ul>
								</div> <!-- end of .dropdown-input -->
							</div>

							<div class="form-group">
								<label for="contactnumber"><strong>Contact Number</strong></label>
								<input type="number" name="mobile_contact" class="input-field numeric required" maxlength="8" minlength="8" pattern="[0-9]{8}">
							</div>

							<div class="form-group">
								<label for="streetaddress"><strong>Street Address</strong></label>
								<input type="text" name="address['street']" class="input-field required">
							</div>

							<div class="form-divider rd-row rd-between-xs">
								<div class="left-form">
									<div class="form-group">
										<label for="unitno"><strong>Unit / Building Number</strong></label>
										<input type="text" name="address['unit']" class="input-field required">
									</div>
								</div>

								<div class="right-form">
									<div class="form-group">
										<label for="state"><strong>State</strong></label>
										<input type="text" name="address['state']" class="input-field required">
									</div>
								</div>
							</div>

							<div class="form-divider rd-row rd-between-xs">
								<div class="left-form">
									<div class="form-group">
										<label for="postalcode"><strong>Postal Code</strong></label>
										<input type="text" name="address['postalcode']" class="input-field required">
									</div>
								</div>

								<div class="right-form">
									<div class="form-group">
										<label for="city"><strong>City</strong></label>
										<input type="text" name="address['city']" class="input-field required">
									</div>
								</div>
							</div>


							<div class="form-group">
								<label for="city"><strong>Nationality</strong></label>
								<div class="dropdown-input">
									<input type="text" name="nationality" class="dropdown-data input-field required" readonly/>
									<ul class="option_nationality">
									<?php $nationalities = WWJ::getNationalities(); ?>
									<?php foreach ($nationalities as $key => $value): ?>
										<li data-value="<?= $key ?>"><?= $value ?></li>
									<?php endforeach; ?>
									</ul>
								</div>
							</div> <!-- end of .form-group -->

							<div class="form-group">
								<label for="swa"><strong>Singapore Work Authorization</strong></label>
								<div class="dropdown-input" readonly="readonly">
									<input type="text" name="work_authorization" class="dropdown-data input-field required">
									<ul class="option_swa">
										<li>Singapore Citizen</li>
										<li>Valid SPASS</li>
										<li>Permanent Resident</li>
										<li>Valid EPass</li>
										<li>No Work Permit for Singapore</li>
										<li>Valid Work Permit</li>
									</ul>
							</div>

						</div>
					</div>

				</div>

				<div class="row">
					<div class="col-xs-12">
						<div class="form-d-group">
							<input type="submit" value="Save" class="save-btn-variant-1" name="save">
							<a href="#" class="cancel-btn-variant-1">Cancel</a>
						</div>
					</div>
				</div>
			</form>
		<?php endif; ?>
	</div>



	<?php
	echo image_capture_modal();
	return ob_get_clean();
}








?>