<?php


/*_______________CANDIDATE LSITING PAGE___________________________*/
	/**
	 * shows candidate listing page
	 *
	 * @return     <string>  ( html code of candidate listing page )
	 */
	function candidate_listing_func() {
		ob_start();
		?>
			<div id="candidateListing-container">
				<div class="pagination-container">
					<div class="rd-row rd-between-md rd-center-xs">
						<div class="filter-industry rd-row rd-between-xs rd-middle-xs">
							<div class="view-icon rd-row">
								<div class="grid-view"><i class="fa fa-th-large fa-fw fa-lg" aria-hidden="true"></i></div>
								<div class="list-view"><i class="fa fa-th-list fa-fw fa-lg" aria-hidden="true"></i></div>
							</div> <!-- end of .view-icon -->
							<div class="filter-dropdown sort_industry_container">
								<label for="sort_industry">Sort by Industry:</label>
								<select name="sort_industry" id="sort_industry" class="industry_s">
									<?php $industries = Job_Listing::Industries() ?>
									<?php foreach ($industries as $industry) {
										echo '<option value="'.$industry->term_id.'">'.$industry->name.'</option>';
									} ?>
									<!--option value="account_finance">Accounting/Finance</option>
									<option value="marketing">Marketing</option-->
								</select>
							</div> <!-- end of .filter-dropdown -->
						</div> <!-- end of .filter-industry -->
						<div class="pagination-menu rd-row rd-middle-xs">
							<div class="show-per">
								<label for="show_per">Show Per Page</label>
								<select name="show_per" id="show_per">
									<option value="8">8</option>
									<option value="16">16</option>
									<option value="24">24</option>
								</select>
							</div> <!-- end of .show-per -->
							<ul class="paginationTop rd-row"></ul>
						</div> <!-- end of .pagination-menu -->
					</div>
				</div> <!-- end of .pagination-container -->
				<div class="filter-container">
					<div class="rd-row rd-between-xs rd-middle-xs">
						<div class="filter-candidate location">
							<label for="location">Location</label>
							<select name="location" id="location" class="location_s">
								<option value="">All</option>
								<?php $regions = Job_Listing::Regions() ?>
								<?php foreach ($regions as $region) {
									echo '<option value="'.$region->term_id.'">'.$region->name.'</option>';
								} ?>
							</select>
						</div>
						<div class="filter-candidate salary-range">
							<label for="salary_range">Salary Range</label>
							<select name="salary_range" id="salary_range">
								<option value="">All(SGD)</option>
								<option value="0-1999"><?= wc_price(0).' - '.wc_price(1999)?></option>
								<option value="2000-2999"><?= wc_price(2000).' - '.wc_price(2999)?></option>
								<option value="3000-3999"><?= wc_price(2000).' - '.wc_price(2999)?></option>
								<option value="4000-4999"><?= wc_price(4000).' - '.wc_price(4999)?></option>
								<option value="5000-5999"><?= wc_price(5000).' - '.wc_price(5999)?></option>
								<option value=">6000">&gt; <?= wc_price(6000)?></option>
							</select>
						</div>
						<div class="filter-candidate availability">
							<label for="availability">Availability</label>
							<select name="availability" id="availability">
								<option value="">All(Months)</option>
								<option value="1 Week">1 Week</option>
								<option value="2-3 Weeks">2-3 Weeks</option>
								<option value="1 Month">1 Month</option>
								<option value="> 1 Month">1 Month</option>
							</select>
						</div>
						<div class="filter-candidate yoe">
							<label for="yoe">YOE</label>
							<select name="yoe" id="yoe">
								<option value="">All(Years)</option>
								<option value="Less than 1 year">Less than 1 year</option>
								<option value="1-2 years">1-2 years</option>
								<option value="3-4 years">3-4 years</option>
								<option value="5-6 years">5-6 years</option>
								<option value="More than 6 years">More than 6 years</option>
							</select>
						</div>
					</div>
				</div> <!-- end of .filter-container -->
				<p>Candidates in demand. Candidates will be reflected according to your search history</p>
				<div id="candidate-backdrop">
					<div class="registration-message"></div>
					<ul class="list candidates-list rd-row">

						<?php 
							$args = array(
								'role' => 'candidate',
							); 

							$user_query = new WP_User_Query($args);
							$authors = $user_query->get_results();
							?>
							<?php if (!empty($authors)):?>
							    <?php foreach ($authors as $author): ?>
							    	<?php
							   			// $region = $regions[rand(0, count($regions)-1)]->name;
										// $region_id = $regions[rand(0, count($regions)-1)]->term_id;

							    		$candidate_id =  $author->ID;

					    				$step1 = get_user_meta($candidate_id, 'step1_data', true);
										$step2 = get_user_meta($candidate_id, 'step2_data', true);
										$step3 = get_user_meta($candidate_id, 'step3_data', true);

					    				$profile_picture = wp_get_attachment_url($step1['photo_base_64']);
										$firstname = $author->user_firstname;
										$lastname  = $author->user_lastname;
										$desired_salary = $step2['desired_salary'];
										$position_id = $step2["field_of_expertise"]; 
										$position = Job_Listing::GetIndustryByID($position_id);
										$about_me = $step3['other_description'];
										$availability = $step2["o_start_year"];
										$yoe = $step2['expertise_years'];
							    	?>
							    	<li class="candidates-item rd-col-lg-3 rd-col-md-6 rd-col-xs-12">
										<div class="item-container">
											<?php if($profile_picture): ?>
											<div class="img-container" style="background: url( '<?= $profile_picture ?>' ) no-repeat top center; background-size: cover;">
											<?php else: ?>
											<div class="img-container" style="background: url( '<?= wp_get_attachment_url(14) ?>' ) no-repeat top center; background-size: cover;">
											<?php endif; ?>
												<div class="btn-unlock">Unlock Now</div>
											</div>
											<div class="jobseeker-details">
												<div class="rd-row rd-between-xs rd-middle-xs">
													<h3 class="name"><?= $firstname.' '.$lastname ?></h3>
													<div class="add-to-fave added"><i class="fa fa-star" aria-hidden="true"></i></div>
													<?php 
														// $ind_rand = rand(0, count($industries)-1);
														// $position = $industries[$ind_rand]->name;
														// $position_id = $industries[$ind_rand]->term_id;
														// $salary = rand(0,30000);
														// $region = $regions[rand(0, count($regions)-1)]->name;
														// $region_id = $regions[rand(0, count($regions)-1)]->term_id;
														// $availability = rand(1,12);
														// $yoe = rand(1,5);
													?>
													<p class="position">Open Position: <?= $position?></p>
													<p>Desired Salary: <?= wc_price($desired_salary)?></p>
													<div class="hidden_informations" style="display:none">
														<p class="desired_position"><?= $position_id?></p>
														<p class="industry"><?=$position?></p>
														<p class="salary"><?=$salary?></p>
														<p class="region"><?=$region_id?></p>
														<p class="availability"><?=$availability?></p>
														<p class="yoe"><?=$yoe?></p>
													</div>
												</div>
											</div> <!-- end of .jobseeker-details -->
											<div class="other-details">
												<ul>
													<li>
														<div class="rd-row rd-center-xs rd-middle-xs">
															<div>58 Views</div>
															<div class="separator">|</div>
															<div>3 Shortlisted</div>
														</div>
													</li>
													<li>
														<p><?= $about_me ?></p>
													</li>
												</ul>
											</div> <!-- end of .other-details -->
										</div> <!-- end of .item-container -->
									</li> <!-- end of .candidates-item -->
							    <?php endforeach; ?>
							<?php else: ?>
							<?php endif; ?>

						?>


						
					</ul> <!-- end of .candidates-list -->
				</div>
				<div class="pagination-container">
					<div class="rd-row rd-between-md rd-center-xs">
						<div class="filter-industry rd-row rd-between-xs rd-middle-xs">
							<div class="view-icon rd-row">
								<div class="grid-view"><i class="fa fa-th-large fa-fw fa-lg" aria-hidden="true"></i></div>
								<div class="list-view"><i class="fa fa-th-list fa-fw fa-lg" aria-hidden="true"></i></div>
							</div> <!-- end of .view-icon -->
							<div class="filter-dropdown sort_industry_container">
								<label for="sort_industry">Sort by Industry:</label>
								<select name="sort_industry" id="sort_industry">
									<?php $industries = Job_Listing::Industries() ?>
									<?php foreach ($industries as $industry) {
										echo '<option value="'.$industry->term_id.'">'.$industry->name.'</option>';
									} ?>
									<!--option value="account_finance">Accounting/Finance</option-->
								</select>
							</div> <!-- end of .filter-dropdown -->
						</div> <!-- end of .filter-industry -->
						<div class="pagination-menu rd-row rd-middle-xs">
							<div class="show-per">
								<label for="show_per">Show Per Page</label>
								<select name="show_per" id="show_per">
									<option value="8">8</option>
									<option value="16">16</option>
									<option value="24">24</option>
								</select>
							</div> <!-- end of .show-per -->
							<ul class="paginationBottom rd-row"></ul>
						</div> <!-- end of .pagination-menu -->
					</div>
				</div> <!-- end of .pagination-container -->
			</div> <!-- end of #candidateListing-container -->

		<?php
			return ob_get_clean();
		}
	add_shortcode( 'candidate_listing', 'candidate_listing_func' );


/*_____________________JOB LSITING PAGE___________________________*/
	/**
	 * shows job listing page
	 *
	 * @return     <string>  ( html code of job listing page )
	 */

	function job_listing_func() {
		ob_start();
		?>

		<div id="jobListing-container">
			<div class="filter-container">
				<div class="rd-row rd-between-xs">
					<div class="filter-job">
						<label for="keywords">Keywords</label>
						<input type="text" placeholder="All" id="job_keyword"/>
					</div>
					<div class="filter-job">
						<label for="location">Location</label>
						<select name="location" id="location">
							<option value="">All</option>
							<?php $regions = Job_Listing::Regions() ?>
							<?php foreach ($regions as $region) {
								echo '<option value="'.$region->term_id.'">'.$region->name.'</option>';
							} ?>

						</select>
					</div>
					<div class="filter-job">
						<label for="category">Choose Category</label>
						<select name="category" id="category">
							<option value="">All</option>
							<?php $industries = Job_Listing::Industries() ?>
							<?php foreach ($industries as $industry) {
								echo '<option value="'.$industry->term_id.'">'.$industry->name.'</option>';
							} ?>
						</select>
					</div>
					<div class="filter-job btn-panel">
						<button>Search</button>
					</div>
				</div>
				<ul class="job-status rd-row rd-between-xs rd-middle-xs">
					<?php $types = Job_Listing::Types(); ?>
					<?php foreach ($types as $type) {
						echo '<li class="rd-col-md-auto">'
							.'<input type="checkbox" name="job_types" id="'.$type->name.'" value="'.$type->term_id.'"/>'
							.'<label for="'.$type->name.'">'.$type->name.'</label></li>';
					} ?>
					<!--li class="rd-col-md-auto">
						<input type="checkbox" name="contract" id="contract" />
						<label for="contract">Contract</label>
					</li>
					<li class="rd-col-md-auto">
						<input type="checkbox" name="freelance" id="freelance" />
						<label for="freelance">Freelance</label>
					</li>
					<li class="rd-col-md-auto">
						<input type="checkbox" name="fulltime" id="fulltime" />
						<label for="fulltime">Full Time</label>
					</li>
					<li class="rd-col-md-auto">
						<input type="checkbox" name="internship" id="internship" />
						<label for="internship">Internship</label>
					</li>
					<li class="rd-col-md-auto">
						<input type="checkbox" name="parttime" id="parttime" />
						<label for="parttime">Part Time</label>
					</li>
					<li class="rd-col-md-auto">
						<input type="checkbox" name="temporary" id="temporary" />
						<label for="temporary">Temporary</label>
					</li-->
				</ul>
			</div> <!-- end of .filter-section -->
			<div class="pagination-menu rd-row rd-middle-xs rd-end-xs">
				<div class="show-per">
					<label for="show_per">Show per page</label>
					<select name="show_per" id="show_per">
						<option value="5">5</option>
						<option value="10">10</option>
						<option value="15">15</option>
					</select>
				</div> <!-- end of .show-per -->
				<ul class="paginationTop rd-row"></ul>
			</div> <!-- end of .pagination-container -->

			<div id="backdrop" class="job_listing_backdrop">
				<div class="registration-message"></div>
				<table cellpadding="0" cellspacing="0" border="0" class="jobListing-table">
					<thead>
						<tr>
							<th class="logo"></th>
							<th class="jobs">Jobs</th>
							<th class="location">Location</th>
							<th class="job-types">Job Types</th>
							<th>&nbsp;</th>
						</tr>
					</thead>
					<tbody class="list">

						<?php
							$args = array(
								'post_type' => 'job_listings',
								'post_status' => 'publish',
								'posts_per_page' => -1
							);
							$job_listings = new WP_Query($args);						
						?>

						<?php if( $job_listings->have_posts() ) : ?>
						    <?php while( $job_listings->have_posts() ) : $job_listings->the_post(); ?>
						    	<?php 
									$region = $regions[rand(0, count($regions)-1)]->name;
									$region_id = $regions[rand(0, count($regions)-1)]->term_id;
									$type_rand = rand(0, count($types)-1);
									$the_type_name =  $types[$type_rand]->name;
									$the_type_id =  $types[$type_rand]->term_id;
									$type_rand2 = ($type_rand >= count($types) - 1 ) ? $type_rand - 1 : $type_rand + 1;
									// $the_type2_name = $types[$type_rand2]->name;
									// $the_type2_id = $types[$type_rand2]->term_id;
									$ind_rand = rand(0, count($industries)-1);
									$position = $industries[$ind_rand]->name;
									$position_id = $industries[$ind_rand]->term_id;

									$job_category = get_the_terms( $post->ID, 'job_listings_category');
									$job_type = get_the_terms( $post->ID, 'job-types');

									$position = $job_category[0]->name;
									$position_id = $job_category[0]->term_id;
									$the_type_id = $job_type[0]->term_id;
									$the_type__name = $job_type[0]->name;

									// $author_id = get_user_by( 'user_login', get_the_author() );
									// var_dump($author_id);
									$author_d = get_the_author_meta('ID');
									$company_details = get_user_meta(get_current_user_id(), 'emp_step1_data', true);

									$company_logo = $company_details['logo'];
									if($company_logo){
										$company_logo = wp_get_attachment_url($company_logo);
									}
									else{
										$company_logo = home_url( 'skubbswp/wp-content/uploads/2016/12/logo-main.png' );
									}

								?>
								<tr>
									<td>
										<div class="img-logo" style="background: url( '<?= $company_logo ?>' ) no-repeat center #fff; background-size: 95%;"></div>
									</td>
									<td>
										<h3 class="job-title job_title"><?= get_the_title() ?></h3>
										<p><?= the_field('job_description') ?></p>
										<div style="display:none">
											<p class="job_type"><?=$the_type_id?>|<?#$the_type2_id?></p>
											<p class="job_region"><?=$region_id?></p>
											<p class="category"><?=$position_id?></p>
										</div>
									</td>
									<td class="location-list"><?= $region ?></td>
									<td class="jobTypes-list">
										<ul>
											<li><?# $the_type2_name ?></li>
											<li><?= $the_type_name  ?></li>
										</ul>
									</td>

									<td>
										<div class="jtl--actions">
											<button class="save--btn_dark_brown">Save</button>
											<a href="#" class="apply--btn_blue">Apply</a>
										</div>
									</td>

								</tr>
							<?php endwhile; wp_reset_postdata(); ?>
					    <?php endif; ?>

						
					</tbody>
				</table>
			</div>

			<div class="pagination-menu rd-row rd-middle-xs rd-end-xs">
				<div class="show-per">
					<label for="show_per">Show per page</label>
					<select name="show_per" id="show_per">
						<option value="5">5</option>
						<option value="10">10</option>
						<option value="15">15</option>
					</select>
				</div> <!-- end of .show-per -->
				<ul class="paginationBottom rd-row"></ul>
			</div> <!-- end of .pagination-container -->
		</div> <!-- end of #jobListing-container -->

		<?php
			return ob_get_clean();
	}
	add_shortcode( 'job_listing', 'job_listing_func' );


/*___________________CREATE A PROFILE FUNCTION____________________*/
	/**
	 * shows a form for creating a profile
	 *
	 * @return     <string>  ( html code for form )
	 */
	function create_profile_func() {
		ob_start();
		?>

		<h2 class="section-title">Take a next step of career to a new level with us!</h2>
		<form action="" method="" id="careerStep-form">
			<div class="form-group">
				<input type="email" name="jobseeker_email" placeholder="Email" />
			</div>
			<div class="form-group">
				<input type="password" name="jobseeker_password" placeholder="Password" />
			</div>
			<div class="btn-panel">
				<input type="submit" name="jobseeker_submit" value="Create a Profile for Free" />
			</div>
		</form>

		<?php
		return ob_get_clean();
	}
	add_shortcode( 'create_profile', 'create_profile_func' );


/*___________________ TEMPORARY CONTENT ____________________*/

	function coming_your_way_func() {
		ob_start();
		?>

		<div class="btsp-container-fluid white-bg-views">
			<div class="row">
				<div class="col-sm-12">
					<h2 class="section-title">Coming Your Way</h2>
				</div>
			</div>
		</div>

		<?php
		return ob_get_clean();
	}
	add_shortcode( 'coming_yourway', 'coming_your_way_func' );



/*___________________ JOB INVITATION MODAL ____________________*/

	function job_invitation_notification() {
	ob_start();
	?>

		<div class="portal--modal job_invitation_notification">
			<div class="portal--modal-details">
				<div class="portal--modal-content text-center">
					<img src="<?= wp_get_attachment_url(1046); ?>" alt="">

					<h3>CONGRATULATIONS!</h3>
					<h4>You've received an invitation from [company_name]<br>A step closer to a match</h4>
				</div>
			</div>
		</div>

	<?php
	return ob_get_clean();
	}
	add_shortcode( 'job-invitation-notification', 'job_invitation_notification' );