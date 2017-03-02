<?php

	// include( 'functions.php' ); 
	global $post_id;

	function job_posting_edit_form(){

		global $wp;
		global $post_id;
		$post_id = $wp->query_vars['job_id'];


		if(isset($_REQUEST['publish'])){

			$post_data = $_REQUEST;
			$job_posting_data = [];
			// var_dump($post_data);

			$ignore = [
				'publish',
				'o_industry',
				'industry',
				'job_title',
				'skills',
				'o_year_of_experience',
				'o_position_level',
				'o_employment_level',
				'o_qualitification',
				'employment_level',
				'o_undefined', 
				'expiry_date',
			];


			$new_url = sanitize_title($post_data['job_title']);
			$my_post = array(
			      'ID'           => $post_id,
			      'post_title'   => $post_data['job_title'],
			      'slug'		 => $new_url
			);
			wp_update_post( $my_post );

			foreach ($post_data as $key => $value) {
				if(in_array($key, $ignore))
					continue;
				$job_posting_data[$key] = $value;
			}

			// $post = array(
			//    'post_author' => get_current_user_id(),
			//    'post_content' => '',
			//    'post_status' => 'publish', //draft
			//    'post_title' => $post_data['job_title'],
			//    'post_parent' => '',
			//    'post_type' => 'job_listings'
			// );
			// $post_id = 

			foreach ($job_posting_data as $key => $value) {
				// $job_posting_data[$key] = $value;
				update_field($key, $value, $post_id);
			}

			$ids = [];
			if($post_data['industry']){
				$ids[] = Job_Listing::GetIndustryByID($post_data['industry']);
				// $ids[] = $post_data['industry'];
				wp_set_object_terms($post_id , $ids, 'job_listings_category', false);
			}

			$ids = [];
			if($post_data['employment_level']){
				// $ids[] = Job_Listing::GetIndustryByID($post_data['employment_level']);
				$ids[] = (int)$post_data['employment_level'];
				wp_set_object_terms($post_id , $ids, 'job-types', false);
			}



			$value = array("no");
			if($post_data["do_not_publish"] == "yes"){
				$value = array("yes");
			}
			update_field('do_not_publish', $value, $post_id );


			$value = [];
			foreach($post_data['skills'] as $skill){
				$value[] =
				array(				
					"skill_id" => $skill
				);
			}
			update_field( 'preferred_skills', $value, $post_id);

			$date = DateTime::createFromFormat('d/m/Y', $post_data['expiry_date']);
			update_field( 'expiry_date', $date, $post_id);

			wp_redirect(get_permalink($post_id));
			exit;
		}

		ob_start();
		?>
			<div class="resume-content">
				<form action="" method="POST" id="job_posting" class="testform" enctype="multipart/form-data" novalidate="novalidate">
					<?= job_posting_container('Job Posting Details',e_job_posting_details()) ?> <br/>
					<?= job_posting_container('Gross Monthly Salary',e_gross_monthly_salary()) ?><br/>
					<?= job_posting_container('Workplace Location(s)',e_workplace_location()) ?><br/>
					<?= job_posting_container('Education Details',e_education_details()) ?><br/>

					<div class="btn-group" style="text-align:center">
						<input value="Publish" name="publish" style="padding: 10px 40px;background: #df141d;color: #fff;cursor: pointer;" type="submit">
					</div>
				</form>
			</div>
		<?php
		return ob_get_clean();
	}
	add_shortcode('job_posting_edit_form', 'job_posting_edit_form');

		function e_job_posting_details(){
			global $post_id;

			$post = get_post($post_id);
			$job_category = get_the_terms( $post->ID, 'job_listings_category');
			$job_type = get_the_terms( $post->ID, 'job-types');

			$industry_name = $job_category[0]->name;
			$industry_id = $job_category[0]->term_id;
			$employment_id = $job_type[0]->term_id;
			$employment_level = $job_type[0]->name;
			$skills = Job_Listing::getSkills($industry_id); 
			$skill_count = count($skills);
			$description = get_post_meta($post_id, 'job_description', true);
			$working_hours = get_field('working_hours', $post_id);
			$vacancies = get_field('no_of_vacancies', $post_id);
			$year_of_experience = get_field('year_of_experience', $post_id);
			$position_level = get_field('position_level', $post_id);
			$date = get_field('expiry_date', $post_id);

			ob_start();
			?>
				<div class="form-container btsp-container-fluid">
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label for="course">Job Title</label>
								<input name="job_title" class="input-field" type="text" value="<?= get_the_title($post_id)?>">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="industry">Industry</label>
								<div class="dropdown-input">
									<input type="text" class="dropdown-data input-field field_of_expertise" name="industry" readonly data-fvalue="<?= $industry_name?>" data-value="<?= $industry_id?>">
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
								<textarea class="input-field" name="job_description" maxlength="150"><?= $description ?></textarea>
							</div>
						</div>

						<!--div class="col-xs-12">
							<div class="form-group">
								<label for="preferred_skills">Preferred Skills</label>
								<input name="preferred_skills" class="input-field" type="text">
							</div>
						</div-->

						<div class="col-xs-12">
							<div class="form-group">
								<div class="selector_tagger" data-selected-name="skills">
									<div class="dropdown-search-input">
										<label for="industry">Preferred Skills</label>
										<input type="text" class="dropdown-data input-field" />
										<div class="dropdown-list">
											<div>
												<input class="filter-dropdown" type="text">
											</div>
											<ul class="preferred_skills_options option_lists">
												<?php if($skill_count > 0): ?>
													<?php for($i=0; $i<$skill_count; $i++): ?>
														<li data-value="<?= $skills[$i]->term_id ?>"><?= $skills[$i]->name ?></li>
													<?php endfor; ?>			
												<?php else: ?>
													<li data-value="">Select for an Industry First</li>
												<?php endif; ?>
											</ul>
										</div>
									</div>
									<div class="skills_selected selected_container">
										

									<?php if( have_rows('preferred_skills', $post_id) ): ?>
									    <?php while ( have_rows('preferred_skills', $post_id) ) : the_row(); ?>
									    	<?php $id = get_sub_field('skill_id')?>

									    	<div class="selected_tag"><span class="tag_name"><?= Job_Listing::GetIndustryByID($id)?><span><input style="display:none" name="skills[]" value="<?= $id ?>" type="text"><span class="delete_tag">×</span></span></span></div>

									    <?php endwhile; ?>
									<?php endif; ?>

										


									</div>
								</div>
							</div>
						</div>





						<div class="col-sm-6">
							<div class="form-group">
								<label for="no_of_vacancies">No of Vacancies</label>
								<input name="no_of_vacancies" class="input-field numeric" type="number" min=0 value="<?= $vacancies ?>">
							</div>
						</div>

						<?php
							if(!$date){
								$today = new DateTime();
								$today->add(new DateInterval('P2W'));
								$date = $today->format('d/m/Y');
							}
						?>

						<div class="col-sm-6">
							<div class="form-group">
								<label for="expiry_date">Expiry Date</label>
								<input name="expiry_date" class="input-field" type="text" readonly value="<?= $date ?>">
							</div>
						</div>

						<div class="col-sm-6">
							<div class="form-group">
								<label for="year_of_experience">Year of Experience</label>
								<div class="dropdown-input">
									<input type="text" name="year_of_experience" class="dropdown-data input-field" readonly data-value="<?= $year_of_experience ?>" data-fvalue="<?= $year_of_experience ?>" />
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
									<input type="text" name="position_level" class="dropdown-data input-field" readonly data-value="<?= $position_level?>" data-fvalue="<?= $position_level ?>"/>
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
									<input type="text" name="employment_level" class="dropdown-data input-field" readonly data-value="<?= $employment_id?>" data-fvalue="<?= $employment_level ?>"/>
									<ul class="option_industries">
										<?php $types = Job_Listing::Types() ?>
										<?php foreach ($types as $type) {
											echo '<li data-value="'.$type->term_id.'">'.$type->name.'</li>';
										} ?>
									</ul>
								</div> <!-- end of .dropdown-input -->
							</div>						
						</div>

						<div class="col-sm-6">
							<div class="form-group">
								<label for="course">Working Hours</label>
								<input name="working_hours" class="input-field" type="text" value="<?= $working_hours ?>"> 
							</div>
						</div>

					</div>

				</div>
			<?php
			return ob_get_clean();
		}

		function e_gross_monthly_salary(){
			global $post_id;


			$min_salary = get_field('min_salary', $post_id);
			$max_salary = get_field('max_salary', $post_id);


			ob_start();
			?>
				<div class="form-container">
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label for="min_salary">Min Monthy SGD$</label>
								<input name="min_salary" class="input-field numeric" type="number" min=0 value="<?= $min_salary ?>">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="max_salary">Max Monthy SGD$</label>
								<input name="max_salary" class="input-field numeric" type="number" min=0 value="<?= $max_salary?>">
							</div>
						</div>

					</div>
				</div>
			<?php
			return ob_get_clean();
		}

		function e_workplace_location(){
			global $post_id;

			$do_not_publish = get_field('do_not_publish', $post_id);
			$location = get_field('location', $post_id);
			$postal_code = get_field('postal_code', $post_id);

			$checked = '';
			if($do_not_publish == 'yes'){
				$checked = 'checked';
			}

			ob_start();
			?>
				<div class="form-container">
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label for="location">Location</label>
								<input name="location" class="input-field" type="text"value="<?= $location ?>">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="postal_code">Postal Code</label>
								<input name="postal_code" class="input-field numeric" type="number" minlength=6 value="<?= $postal_code ?>">
							</div>
						</div>

						<div class="col-xs-12">
							<div class="form-group">
								<div class="checkbox-group">
									<ul>
										<li><input id="do_not_publish" name="do_not_publish" type="checkbox" value="yes" <?= $checked?>><label for="do_not_publish">Do not publish company address</label></li>
									</ul>
								</div>
							</div>
						</div>

					</div>
				</div>
			<?php
			return ob_get_clean();
		}

		function e_education_details(){
			global $post_id;


			$qualification = get_field('qualification', $post_id);
			$specialization = get_field('specialization', $post_id);

			ob_start();
			?>
				<div class="form-container">
					<div class="row">

						<div class="col-sm-6">
							<div class="form-group">
								<label for="qualification">Add Qualification</label>
								<div class="dropdown-input">
									<input type="text" name="qualification" class="dropdown-data input-field" readonly data-value="<?= $qualification ?>" data-fvalue="<?= $qualification ?>"/>
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
								<input name="specialization" class="input-field" type="text" value="<?= $specialization ?>">
							</div>
						</div>

					</div>
				</div>
			<?php
			return ob_get_clean();
		}


