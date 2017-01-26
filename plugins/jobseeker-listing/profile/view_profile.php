<?php

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

    function getMonthName($month_number){
        $monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"];
        return $monthNames[((int)($month_number)-1)];
    }


?>