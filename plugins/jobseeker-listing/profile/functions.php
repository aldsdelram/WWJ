<?php

	/**
	 * Sets the information using the global objects, info.inc 
	 */
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
  		$address = $step1['address'];
  		$nationality = $step1['nationality'];
  		$employment_status = $step1['employment_status'];

	}

	/**
	 * Gets the month name.
	 *
	 * @param      int  	$month_number  The month number
	 *
	 * @return     string   The month name.
	 */
	function getMonthName($month_number){
        $monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"];
        return $monthNames[((int)($month_number)-1)];
    }

	/**
	 * Creates a profile container.
	 *
	 * @param      string  $icon      The icon (url)
	 * @param      string  $editIcon  The edit icon (url)
	 * @param      string  $title     The title
	 * @param      string  $content   The content
	 *
	 * @return     string  returns the html content with container
	 */
	function create_profile_container($icon, $editIcon, $edit_url, $title, $content) {
		ob_start();
		?>

		<div class="profile--container">

			<div class="btsp-container-fluid profile-view--header">
				<div class="row">
					<div class="col-xs-12">
						<h1 class="profile-view--header_title">
							<img class="profile-view--header_icon" src="<?= $icon; ?>"><?= $title; ?>
							<?php if($editIcon != '') : ?>
								<a href="<?= $edit_url ?>"><img class="profile-view--edit_icon" src="<?= $editIcon; ?>"></a>
							<?php endif; ?>
						</h1>
					</div>
				</div>
			</div>

			<?= $content; ?>
		</div>

		<?php
		return ob_get_clean();
	}

