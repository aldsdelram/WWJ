<?php
	include( 'functions.php'); 

	function set_info(){
		include( 'info.inc');
		$current_user  = get_currentuserinfo();
		$step1 = get_user_meta(get_current_user_id(), 'step1_data', true);
		$step2 = get_user_meta(get_current_user_id(), 'step2_data', true);
		$step3 = get_user_meta(get_current_user_id(), 'step3_data', true);


		$profile_picture = wp_get_attachment_url($step1['photo_base_64']);
		$firstname = $current_user->user_firstname;
		$lastname  = $current_user->user_lastname;
		$gender = $step1['gender'];
		$work_authorization = $step1["work_authorization"];
		$age = 0;
			$sBday = $step1['birthday'];
		    $bday = DateTime::createFromFormat('d-m-Y', $sBday );
		    $date = new DateTime();

		    $diff = $date->diff($bday);
		    $age = $diff->y;
		$availability = $step2["o_start_year"];
		$expertise = $step2["field_of_expertise"]; 
		$contact = $step1["mobile_contact"];
		$email_address= $step1["email_address"];


		$work_experiences =[];
		foreach ($step2['job'] as $key => $value) {
			$work_experience = [];
			$work_experience['job'] = $value;
			$work_experience['start_year'] = $step2['start_year'][$key];
			$work_experience['end_year'] = $step2['end_year'][$key];
			$work_experience['start_month'] = $step2['start_month'][$key];
			$work_experience['end_month'] = $step2['end_month'][$key];
			$work_experience['key_task'] = $step2['keytasks'][$key];
			$work_experience['company_name'] = $step2['company_name'][$key];
			$work_experiences[] = $work_experience;
		}

		$languages = [];
		foreach ($step3['language'] as $key => $value) {
			if($value != ''){
				$language = [];
				$language['name'] = $value;
				$language['rating'] = $step3['proficiency'][$key];
				$languages[] = $language;
			}
		}

		$skills = [];
		foreach($step3['skills'] as $key => $value){
			$skill = [];
			$skill['name'] = Job_Listing::GetIndustryByID($value);
			$skill['rating'] = $step3['ratings'][$value];
			$skills[] = $skill;
		}

		$certificates = [];
		foreach($step3['cert_images'] as $key => $cert_image){
			$cert= [];
			$cert['image'] = $cert_image;
			$cert['award'] = $step3['awards_certification'][$key];
			$cert['body_corporate'] = $step3['body_corporate'][$key];
			$cert['year'] = $step3['cert_year'][$key];

			foreach($cert as $c){
				if($c != null){
					$certificates[] = $cert;
					break;
				}
			}
		}
		$about_me = $step3['other_description'];

		$career_objective =$step1['career_objective'];
		$tertiary =$step1['tertiary'];
		$course = $step1['course'];
		$linkedin = $step1['linkedin'];
		$desired_salary = $step2['desired_salary'];
		$verification = $step2['verification'];

		$school_s_year = $step1["start_year"];
  		$school_e_year = $step1["end_year"];

	}

	function show_profile_page(){
		include( 'info.inc');
		if(is_user_logged_in()){
			set_info();
		}

		ob_start();
		?>
			<div class="btsp-container-fluid">
			<?= show_basic_info() ?>
			<?= show_workplaces() ?>
			<?= show_skill_and_others() ?>
			<?= show_about() ?>
			</div>
		<?php
		return ob_get_clean();
	}
	add_shortcode('show_profile', 'show_profile_page');

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
