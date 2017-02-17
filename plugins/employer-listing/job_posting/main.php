<?php

	include( 'functions.php' ); 

	function job_posting_form(){

		if(isset($_REQUEST['publish'])){


			$post_data = $_REQUEST;
			$job_posting_data = [];
			var_dump($post_data);

			$ignore = [
				'publish',
				'o_industry',
				'industry',
				'job_title',
				'o_year_of_experience',
				'o_position_level',
				'o_employment_level',
				'o_qualitification'
			];

			foreach ($post_data as $key => $value) {
				if(in_array($key, $ignore))
					continue;
				$job_posting_data[$key] = $value;
			}

			$post = array(
			   'post_author' => get_current_user_id(),
			   'post_content' => '',
			   'post_status' => 'publish', //draft
			   'post_title' => $post_data['job_title'],
			   'post_parent' => '',
			   'post_type' => 'job_listings'
			);
			$post_id = wp_insert_post($post);

			foreach ($job_posting_data as $key => $value) {
				// $job_posting_data[$key] = $value;
				update_field($key, $value, $post_id);
			}

			$ids = [];
			if($post_data['industry']){
				$ids[] = Job_Listing::GetIndustryByID($post_data['industry']);
				wp_set_object_terms($post_id , $ids, 'job_listings_category', false);
			}

			$value = array("no");
			if($post_data["do_not_publish"] == "yes"){
				$value = array("yes");
			}
			update_field('do_not_publish', $value, $post_id );

			wp_redirect(get_permalink($post_id));
			exit;
		}

		ob_start();
		?>
			<div class="resume-content">
				<form action="" method="POST" id="job_posting" class="testform" enctype="multipart/form-data" novalidate="novalidate">
					<?= job_posting_container('Job Posting Details',job_posting_details()) ?> <br/>
					<?= job_posting_container('Gross Monthly Salary',gross_monthly_salary()) ?><br/>
					<?= job_posting_container('Workplace Location(s)',workplace_location()) ?><br/>
					<?= job_posting_container('Education Details',education_details()) ?><br/>

					<div class="btn-group" style="text-align:center">
						<input value="Publish" name="publish" style="padding: 10px 40px;background: #df141d;color: #fff;cursor: pointer;" type="submit">
					</div>
				</form>
			</div>
		<?php
		return ob_get_clean();
	}
	add_shortcode('job_posting_form', 'job_posting_form');

		function job_posting_details(){
			ob_start();
			?>
				<div class="form-container">
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label for="course">Job Title</label>
								<input name="job_title" class="input-field" type="text">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="industry">Industry</label>
								<div class="dropdown-input">
									<input type="text" name="industry" class="dropdown-data input-field field_of_expertise" readonly/>
									<ul class="option_industries">
										<?php $industries = Job_Listing::Industries() ?>
										<?php foreach ($industries as $industry) {
											echo '<li data-value="'.$industry->term_id.'">'.$industry->name.'</li>';
										} ?>
									</ul>
								</div> <!-- end of .dropdown-input -->
							</div>						
						</div>

						<div class="col-xs-12">
							<div class="form-group">
								<label class="required"><span class="redrisk">*</span> Job Description</label>
								<textarea class="input-field" name="job_description" maxlength="150"></textarea>
							</div>
						</div>

						<div class="col-xs-12">
							<div class="form-group">
								<label for="preferred_skills">Preferred Skills</label>
								<input name="preferred_skills" class="input-field" type="text">
							</div>
						</div>

						<div class="col-sm-6">
							<div class="form-group">
								<label for="no_of_vacancies">No of Vacancies</label>
								<input name="no_of_vacancies" class="input-field numeric" type="number" min=0>
							</div>
						</div>

						<div class="col-sm-6">
							<div class="form-group">
								<label for="expiry_date">Expiry Date</label>
								<input name="expiry_date" class="input-field" type="text" readonly>
							</div>
						</div>

						<div class="col-sm-6">
							<div class="form-group">
								<label for="year_of_experience">Year of Experience</label>
								<div class="dropdown-input">
									<input type="text" name="year_of_experience" class="dropdown-data input-field" readonly/>
									<ul class="option_industries">
										<?php 
											$yoes = [
												"" => "All(Years)",
												"Less than 1 year" => "Less than 1 year",
												"1-2 years" => "1-2 years",
												"3-4 years" => "3-4 years",
												"5-6 years" => "5-6 years",
												"More than 6 years" => "More than 6 years",
											];
										?>
										<?php foreach ($yoes as $key => $yoe) {
											echo '<li data-value="'.$key.'">'.$yoe.'</li>';
										} ?>
									</ul>
								</div> <!-- end of .dropdown-input -->
							</div>						
						</div>



						<div class="col-sm-6">
							<div class="form-group">
								<label for="position_level">Position Level</label>
								<div class="dropdown-input">
									<input type="text" name="position_level" class="dropdown-data input-field" readonly/>
									<ul class="option_industries">
										<?php 
			                                $position_levels = [
			                                    'Fresh / Entry Level',
			                                    'Non-Executive',
			                                    'Executive',
			                                    'Manager',
			                                    'Middle Management',
			                                    'Senior Management',
			                                    'Professional'
			                                ];
			                            ?>
										<?php foreach ($position_levels as $position_level) {
											echo '<li data-value="'.$position_level.'">'.$position_level.'</li>';
										} ?>
									</ul>
								</div> <!-- end of .dropdown-input -->
							</div>						
						</div>

						<div class="col-sm-6">
							<div class="form-group">
								<label for="employment_level">Employment Type</label>
								<div class="dropdown-input">
									<input type="text" name="employment_level" class="dropdown-data input-field" readonly/>
									<ul class="option_industries">
										<?php $types = Job_Listing::Types() ?>
										<?php foreach ($types as $type) {
											echo '<li data-value="'.$type->term_id.'">'.$type->name.'</li>';
										} ?>
									</ul>
								</div> <!-- end of .dropdown-input -->
							</div>						
						</div>
					</div>

				</div>
			<?php
			return ob_get_clean();
		}

		function gross_monthly_salary(){
			ob_start();
			?>
				<div class="form-container">
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label for="min_salary">Min Monthy SGD$</label>
								<input name="min_salary" class="input-field numeric" type="number" min=0>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="max_salary">Max Monthy SGD$</label>
								<input name="max_salary" class="input-field numeric" type="number" min=0>
							</div>
						</div>

					</div>
				</div>
			<?php
			return ob_get_clean();
		}

		function workplace_location(){
			ob_start();
			?>
				<div class="form-container">
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label for="location">Location</label>
								<input name="location" class="input-field" type="text">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="postal_code">Postal Code</label>
								<input name="postal_code" class="input-field numeric" type="number" minlength=6>
							</div>
						</div>

						<div class="col-xs-12">
							<div class="form-group">
								<div class="checkbox-group">
									<ul>
										<li><input id="do_not_publish" name="do_not_publish" type="checkbox" value="yes"><label for="do_not_publish">Do not publish company address</label></li>
									</ul>
								</div>
							</div>
						</div>

					</div>
				</div>
			<?php
			return ob_get_clean();
		}

		function education_details(){
			ob_start();
			?>
				<div class="form-container">
					<div class="row">

						<div class="col-sm-6">
							<div class="form-group">
								<label for="qualification">Add Qualification</label>
								<div class="dropdown-input">
									<input type="text" name="qualification" class="dropdown-data input-field" readonly/>
									<ul class="option_qualification">
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
						</div>

						<div class="col-sm-6">
							<div class="form-group">
								<label for="specialization">Specialization</label>
								<input name="specialization" class="input-field" type="text">
							</div>
						</div>

					</div>
				</div>
			<?php
			return ob_get_clean();
		}


		