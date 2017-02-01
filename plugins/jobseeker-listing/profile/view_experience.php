<?php

function view_experience_content(){
	include( 'info.inc');
	if(is_user_logged_in()){
		set_info();
	}

	ob_start();
	?>
		<div class="btsp-container-fluid white-bg-views experience-view--main_content">

			<?php foreach($work_experiences as $key => $work_experience): ?>

				<div class="row exp--sets">
					<div class="col-xs-12">
						<h2><div class="exp--job-title"><?= $work_experience['job'] ?> | <a href="<?= home_url('jobseeker/dashboard/profile/edit/experience/?company='.$key) ?>">EDIT</a></div> </h2>
						<h3><div class="exp--company-name"><?= $work_experience['company_name'] ?></div></h3>

						<p class="exp--description"><strong class="textcolor--gray">Task Lists</strong><br>
						<span><?= $work_experience['key_task']?></span></p>
					</div>

					<div class="col-xs-12 exp--miscs">

						<div class="row">
							<div class="col-sm-6"><strong class="textcolor--gray">Years of Experience</strong></div>
							<div class="col-sm-6">
								
								<?php
									$FromDate = date_create_from_format('d-m-Y', '01-'.$work_experience['start_month'].'-'.$work_experience['start_year']);
									$ToDate = new DateTime();
									if($work_experience['end_year'] != 'Present'){
										$ToDate = date_create_from_format('d-m-Y', '01-'.$work_experience['end_month'].'-'.$work_experience['end_year']);
									}
									$interval = $ToDate->diff($FromDate);

									if($interval->format('%y') < 1){
										echo "< 1 Year";
									}
									else{
										echo $interval->format('%y Year');		
										if($interval->format('%y') > 1)
											echo 's';
									}
								?>

							</div>
						</div>

						<div class="row">
							<div class="col-sm-6"><strong class="textcolor--gray">References</strong></div>
							<div class="col-sm-6">
								<?php if($verification): ?>
									<?php $ver = $verification[$key]; ?>
									<?php foreach ($ver['firstname'] as $k => $v): ?>
										<div>
											<span class="ref_name"><strong><?= $v ?></strong></span><br/>
											<span class="ref_spanosition"><!--Manager--><?= $work_experiences[$key]['company_name']?></span><br/>
											<span class="ref_phone"><?= WWJ::formatContactNumber($ver['contact'][$k]);?></span><br/>
											<span><a class="ref_mail" href="mailto:<?= $ver['email'][$k]?>"><?= $ver['email'][$k]?></a></span>
										</div>			
									<?php endforeach; ?>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>

			<h1>MISCELLANEOUS</h1>

			<div class="row">
				<div class="col-sm-6"><strong class="textcolor--gray">Field of Expertise</strong></div>
				<div class="col-sm-6"><?= Job_Listing::GetIndustryByID($expertise) ?></div>
			</div>

			<div class="row">
				<div class="col-sm-6"><strong class="textcolor--gray">Years of Experience in Field of Expertise</strong></div>
				<div class="col-sm-6"><?= $step2['expertise_years'] ?></div>
			</div>

			<div class="row">
				<div class="col-sm-6"><strong class="textcolor--gray">Desired Monthly Salary</strong></div>
				<div class="col-sm-6"><?= wc_price($desired_salary) ?></div>
			</div>

			<div class="row">
				<div class="col-sm-6"><strong class="textcolor--gray">Notice Period</strong></div>
				<div class="col-sm-6"><?= $availability ?></div>
			</div>

		</div>
	<?php
	return ob_get_clean();
}


function edit_experience_content(){
	include( 'info.inc');
	if(is_user_logged_in()){
		set_info();
	}
	$key = isset($_REQUEST['company']) ? $_REQUEST['company'] : -1;
	if(isset($_REQUEST['save'])){
		if($key == -1){
			$key = 0;
			$new = true;
		}

		$new_data= $_REQUEST;
		$the_step2_data = $step2;

		$ignore = [
			'o_start_month',
			'o_start_year',
			'o_end_year',
			'o_end_month',
			'company',
			'key',
			'save'
		];

		foreach ($new_data as $k => $value) {
			if(in_array($k, $ignore))
				continue;
			$the_step2_data[$k][$key] = $value[$key];
		}
		update_user_meta(get_current_user_id(), 'step2_data', $the_step2_data);
		wp_redirect(home_url('/jobseeker/dashboard/profile/view/experience/'));
		exit;
	}

	if($work_experiences == null)
		$work_experiences = null;

	$cancelLink = home_url('/jobseeker/dashboard/profile/view/experience/');

	ob_start();
	?>
		<div id="resume-form">
			<div class="resume-content">
				<form action="" method="POST" id="experience_edit" enctype="multipart/form-data">

				<?php if($key == -1 || $key >= count($work_experiences)): ?>
					<?php if($key < count($work_experiences)) $key = 0 ?>
						<div class="form-container">
							<div class="form-group">
								<label>Job Title</h3>
								<input class="input-field required" name="job[<?= $key?>]" type="text">
							</div>

							<div class="form-group">
								<label>Company</h3>
								<input class="input-field required" name="company_name[<?= $key?>]" type="text">
							</div>

							<div class="form-group">
								<label class="required">Key Tasks Performed / Achievements</label>
								<textarea class="input-field required" data-autoresize="" name="keytasks[<?= $key?>]"></textarea>
							</div>

							<div class="form-divider rd-row rd-between-xs form-group">
								<div class="left-form">
									<h3 class="required">From (mm - yyyy)</h3>
									<div class="form-divider rd-row rd-between-xs">
										<div class="left-form">
											<div class="form-group">
												<div class="dropdown-input">
													<label for="from_month">Month</label>
													<input class="dropdown-data input-field required" name="start_month[<?= $key?>]" type="text">
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
													<input class="dropdown-data input-field required" name="start_year[<?= $key?>]" type="text">
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
													<input class="dropdown-data input-field required" name="end_month[<?= $key?>]" type="text">
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
													<input class="dropdown-data input-field required" name="end_year[<?= $key?>]" type="text">
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
								<label class="company_year_error">To Date Must Not be late to the From Date</label>
							</div>


							<h1>REFERENCES</h1>
							<div class="verification_form" data-key="<?= $key?>">
								<div class="fields-repeater">
									<div class="form-group">
										<label>First Name</label>
										<input class="input-field required verification_name" name="verification[<?= $key?>][firstname][]" type="text">
									</div>
									<div class="form-group">
										<label>Email</label>
										<input class="input-field required verification_email" name="verification[<?= $key?>][email][]" type="email">
									</div>
									<div class="form-group">
										<label>Contact Number</label>
										<input class="input-field required verification_contact numeric" name="verification[<?= $key?>][contact][]" type="number">
									</div>
								</div>
								<div class="fields-repeated"></div>
								<div class="form-group">
									<button class="add-field add_more_verification"><span><i class="fa fa-plus fa-fw" aria-hidden="true"></i></span> Add More</button>
								</div>
							</div>
						</div>
				<?php else: ?>
					<?php $work_experience = $work_experiences[$key]; ?>
					<div class="form-container">
						<div class="form-group">
							<label>Job Title</h3>
							<input class="input-field required" name="job[<?= $key?>]" type="text" value="<?= $work_experience['job']?>">
						</div>

						<div class="form-group">
							<label>Company</h3>
							<input class="input-field required" name="company_name[<?= $key?>]" type="text" value="<?= $work_experience['company_name']?>">
						</div>

						<div class="form-group">
							<label class="required">Key Tasks Performed / Achievements</label>
							<textarea class="input-field required" data-autoresize="" name="keytasks[<?= $key?>]"><?= $work_experience['key_task']?></textarea>
						</div>

						<div class="form-divider rd-row rd-between-xs form-group">
							<div class="left-form">
								<h3 class="required">From (mm - yyyy)</h3>
								<div class="form-divider rd-row rd-between-xs">
									<div class="left-form">
										<div class="form-group">
											<div class="dropdown-input">
												<label for="from_month">Month</label>
												<input class="dropdown-data input-field required" name="start_month[<?= $key?>]" type="text" value="<?= $work_experience['start_month']?>" data-value="<?= $work_experience['start_month']?>">
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
												<input class="dropdown-data input-field required" name="start_year[<?= $key?>]" type="text" value="<?= $work_experience['start_year']?>" data-value="<?= $work_experience['start_year']?>">
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
												<input class="dropdown-data input-field required" name="end_month[<?= $key?>]" type="text" value="<?= $work_experience['end_month']?>" data-value="<?= $work_experience['end_month']?>">
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
												<input class="dropdown-data input-field required" name="end_year[<?= $key?>]" type="text" value="<?= $work_experience['end_year']?>" data-value="<?= $work_experience['end_year']?>">
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
							<label class="company_year_error">To Date Must Not be late to the From Date</label>
						</div>


						<h1>REFERENCES</h1>

						<div class="verification_form" data-key="<?=$key?>">
						<?php if($verification): ?>
							<?php $ver = $verification[$key]; ?>
							<?php $ctr = 0; ?>
							<?php foreach ($ver['firstname'] as $k => $v): ?>
								<?php if($ctr == 1): ?>
									<div class="fields-repeated">
										<div>
											<div class="delete-field" onclick="delete_field( this );" style=" z-index:999"=""><i class="fa fa-times fa-fw" aria-hidden="true"></i> Delete</div>
								<?php elseif($ctr==0): ?>
									<div class="fields-repeater">
								<?php endif; ?>								
									<div class="form-group">
										<label>First Name</label>
										<input class="input-field required verification_name" name="verification[<?= $key?>][firstname][]" type="text" value="<?= $v ?>">
									</div>
									<div class="form-group">
										<label>Email</label>
										<input class="input-field required verification_email" name="verification[<?= $key?>][email][]" type="email" value="<?= $ver['email'][$k]?>">
									</div>
									<div class="form-group">
										<label>Contact Number</label>
										<input class="input-field required verification_contact numeric" name="verification[<?= $key?>][contact][]" type="number" value="<?= $ver['contact'][$k] ?>">
									</div>
								<?php if($ctr == 1) :?>									
										</div>
									</div>
								<?php elseif($ctr == 0):?>
									</div>
								<?php endif; ?>
								<?php $ctr++ ?>
							<?php endforeach; ?>
						<?php endif; ?>
							<?php if($ctr == 1) :?>
								<div class="fields-repeated"></div>
							<?php endif;?>
							<div class="form-group">
								<button class="add-field add_more_verification"><span><i class="fa fa-plus fa-fw" aria-hidden="true"></i></span> Add More</button>
							</div>
						</div>

					</div>
				<?php endif;?>

						<div class="form-d-group">
						    <input type="submit" value="Save" class="save-btn-variant-1" name="save">
						    <a href="<?= $cancelLink?>" class="cancel-btn-variant-1">Cancel</a>
					    </div>
				</form>
			</div>
		</div>



	<?php
	return ob_get_clean();
}