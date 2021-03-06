<?php



function search_job_position_func() {
	ob_start();
?>

	<div class="searchJob-container">
		<form action="" method="">
			<div class="input-search">
				<input type="text" placeholder="Enter keywords most relevant to your candidate search eg. industry-specific skills, job title etc." />
				<input type="submit" value="Search" />
			</div> <!-- end of .input-search -->
			<div class="filter-search">
				<div class="rd-row rd-between-xs rd-middle-xs">
					<div class="rd-col-xs-auto">
						<div class="rd-row rd-middle-xs">
							<div class="rd-col-xs-auto">
								<label for="location">Location</label>
							</div>
							<div class="rd-col-xs-auto">
								<select name="location" id="location">
									<option value="all">All</option>
									<option value="singapore">Singapore</option>
								</select>
							</div>
						</div>
					</div>
					<div class="rd-col-xs-auto">
						<div class="rd-row rd-middle-xs">
							<div class="rd-col-xs-auto">
								<label for="salary_range">Salary Range</label>
							</div>
							<div class="rd-col-xs-auto">
								<select name="salary_range" id="salary_range">
									<option value="all">All(SGD)</option>
									<option value="1000">1,000</option>
								</select>
							</div>
						</div>
					</div>
					<div class="rd-col-xs-auto">
						<div class="rd-row rd-middle-xs">
							<div class="rd-col-xs-auto">
								<label for="availability">Availability</label>
							</div>
							<div class="rd-col-xs-auto">
								<select name="availability" id="availability">
									<option value="all">All(Months)</option>
									<option value="january">January</option>
								</select>
							</div>
						</div>
					</div>
					<div class="rd-col-xs-auto">
						<div class="rd-row rd-middle-xs">
							<div class="rd-col-xs-auto">
								<label for="yoe">YOE</label>
							</div>
							<div class="rd-col-xs-auto">
								<select name="yoe" id="yoe">
									<option value="all">All(Years)</option>
									<option value="2">2yrs</option>
								</select>
							</div>
						</div>
					</div>
				</div>
			</div> <!-- end of .filter-search -->
		</form> <!-- end of .form -->
	</div> <!-- end of .searchJob-container -->

<?php
	return ob_get_clean();
}
add_shortcode( 'employer_search_jobs', 'search_job_position_func' );

function search_history_func() {
	ob_start();
?>

	<div class="searchHistory-container">
		<div class="container">
			<ul class="searchHistory-list">
				<?php for( $i = 0; $i <= 4; $i++ ) : ?>
				<li>
					<div class="img-container" style="background: url( '<?= home_url( 'skubbswp/wp-content/uploads/2016/12/janelle-chan.png' ) ?>' ) no-repeat top center; background-size: cover;">
						<div class="btn-unlock">Unlock Now</div>
					</div> <!-- end of .img-container -->
					<div class="jobseeker-details">
						<div class="rd-row rd-between-xs rd-middle-xs">
							<h3 class="name">Janelle Chan</h3>
							<div class="add-to-fave added"><i class="fa fa-star fa-fw" aria-hidden="true"></i></div>
							<p>Open Position: Marketing Manager</p>
							<p>Desired Salary: SGD$3,200</p>
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
								<a href="#" class="why-hire">Why you should hire me</a>
							</li>
						</ul>
					</div> <!-- end of .other-details -->
				</li>
				<?php endfor; ?>
			</ul> <!-- end of .searchHistory-list -->
			<div class="btn-panel rd-row rd-center-xs rd-middle-xs">
				<a href="javascript:void(0)" class="searchBy-industry">Search By Industry</a>
			</div> <!-- end of .btn-panel -->
		</div> <!-- end of .container -->
	</div> <!-- end of .searchHistory-container -->

<?php
	return ob_get_clean();
}
add_shortcode( 'search_history', 'search_history_func' );

function phone_slide_jobseeker_func() {
	ob_start();
?>

	<div class="phoneSlider-container">
		<div class="container">
			<div class="img-phone"></div>
			<ul class="phoneSlider-list">
				<?php for( $i = 0; $i <= 5; $i++ ) : ?>
					<li>
						<div class="phone-container">
							<div class="img-container" style="background: url( '<?= home_url( 'skubbswp/wp-content/uploads/2017/01/mila-khoo.png' ) ?>' ) no-repeat top center; background-size: cover;"></div>
							<div class="phone-details">
								<h3>Janelle Chan</h3>
								<p class="position">Marketing Manage</p>
								<p class="salary">SGD $5,000</p>
								<p class="motto">"I'm a team player and efficient"</p>
							</div> <!-- end of .phone-details -->
							<a href="#">View Profile</a>
						</div> <!-- end of .phone-container -->
					</li>
				<?php endfor; ?>
			</ul> <!-- end of .phoneSlider-list -->
		</div>
	</div> <!-- end of .phoneSlider-container -->

<?php
	return ob_get_clean();
}
add_shortcode( 'phone_jobseeker', 'phone_slide_jobseeker_func' );




/*___________________________ CANDIDATE LSITING PAGE ___________________________*/
	/**
	 * shows candidate listing page
	 *
	 * @return     <string>  ( html code of candidate listing page )
	 */
	function e_candidate_listing_func() {
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
										$sBday = $step1['birthday'];
									    $bday = DateTime::createFromFormat('d-m-Y', $sBday );
							    		$gender = $step1['gender'];


							    		$age = -1;
										$sBday = $step1['birthday'];
									    $bday = DateTime::createFromFormat('d-m-Y', $sBday );
									    $date = new DateTime();

									    if($bday){
										    $diff = $date->diff($bday);
										    $age = $diff->y;
									    }

									    $unlocked = get_user_meta(get_current_user_id(), 'unlocked_candidates', true);
										if($unlocked == null){
											$unlocked = [];
										}
							    	?>
							    	<li class="candidates-item candidate-<?= $candidate_id ?> rd-col-lg-3 rd-col-md-6 rd-col-xs-12">
										<div class="item-container">
											<?php if($profile_picture): ?>
											<div class="img-container" style="background: url( '<?= $profile_picture ?>' ) no-repeat top center; background-size: cover;">
											<?php else: ?>
											<div class="img-container" style="background: url( '<?= wp_get_attachment_url(14) ?>' ) no-repeat top center; background-size: cover;">
											<?php endif; ?>

												<?php if(in_array($candidate_id, $unlocked)): ?>
													<div class="btn-unlock show-modal unlocked" data-modal="#candidate-info-modal">Unlocked</div>
												<?php else: ?>
													<div class="btn-unlock show-modal" data-modal="#candidate-info-modal">Unlock Now</div>
												<?php endif; ?>
												<div class="unlock_information" style="display:none">
													<div class="name"><?= $firstname.' '.$lastname ?></div>
													<div class="age"><?= $age != -1 ? $age : 'Not yet available' ?></div>
													<div class="gender"> <?= $gender!= null? $gender: 'Not yet Avaialable' ?></div>
													<div class="open_position"> <?= $position!= null? $position: 'Not yet Avaialable' ?></div>
													<div class="desired_salary"> <?= wc_price($desired_salary)?></div>
													<div class="about_me"> <?= $about_me ?></div>
													<div class="candidate_image"> <?= $profile_picture ? $profile_picture : wp_get_attachment_url(14) ?></div>
													<div class="candidate_id"><?= $candidate_id ?></div>
												</div>
											</div>
											<div class="jobseeker-details">
												<div class="rd-row rd-between-xs rd-middle-xs">
													<div class="rd-row rd-between-xs rd-middle-xs name_container" style="width: 100%;" >
														<h3 class="name"><?= $firstname.' '.$lastname ?></h3>
														<div class="add-to-fave added"><i class="fa fa-star" aria-hidden="true"></i></div>
													</div>
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
	add_shortcode( 'employer_candidate_listing', 'e_candidate_listing_func' );




/*___________________________ JOB INVITATION FORM ___________________________*/
	/**
	 * Employer Job Invitation Form
	 *
	 * @return     [employer-job-invitation-form]  ( return shortcode )
	 */


	function employer_job_invitation_form_func() {

		global $wp;
		$candidate_id = $wp->query_vars['candidate_id'];

		$the_user = get_userdata($candidate_id);
		


		ob_start();
		?>
			<div class="employer__job-invitation-form">

				<div class="btsp-container-fluid gray--header_bg">
					<div class="row">
						<div class="col-xs-12">
							<h1 class="gray--header_title pull-left">Job Invitation Details</h1><span class="gray--header__mini_text">Bring your candidate up to date with a brief description of the job offered</span>
						</div>
					</div>
				</div>


				<?php if($the_user): ?>
					<div class="btsp-container-fluid resume-content white-bg-views">
					
						<div class="cm--loader"><div class="spin-con"><i class="fa fa-refresh fa-spin fa-3x fa-fw margin-bottom"></i></div></div>

						<!-- form -->
						<form class="jif--form" data-candidate="<?= $candidate_id ?>">
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label for="job_title">Job Title</label>
										<input type="text" name="job_title" class="input-field"/>
									</div>

									<div class="form-group">
										<label for="job_title">Key Responsibilities</label>
										<input type="text" name="key_responsibilities" class="input-field"/>
									</div>

									<div class="form-group">
										<label for="job_title">Other Information</label>
										<input type="text" name="other_information" class="input-field"/>
									</div>
								</div>

								<div class="col-sm-6">
									<div class="form-group">
										<label for="job_title">Working Hours</label>
										<input type="text" name="working_hours" class="input-field"/>
									</div>

									<div class="form-group">
										<div class="dropdown-search-input">
											<label for="salary_range">Salary Range</label>
											<input type="text" name="salary_range" class="dropdown-data input-field" />
											<div class="dropdown-list">
												<div>
													<input class="filter-dropdown" type="text">
												</div>
												<ul class="salary_range">
													<li data-value="">All(SGD)</li>
													<li data-value="0-1999"><?= wc_price(0.00) ?> - <?= wc_price(1999.00) ?></li>
													<li data-value="2000-2999"><?= wc_price(2000.00) ?> - <?= wc_price(2999.00) ?></li>
													<li data-value="3000-3999"><?= wc_price(2000.00) ?> - <?= wc_price(2999.00) ?></li>
													<li data-value="4000-4999"><?= wc_price(4000.00) ?> - <?= wc_price(4999.00) ?></li>
													<li data-value="5000-5999"><?= wc_price(5000.00) ?> - <?= wc_price(5999.00) ?></li>
													<li data-value=">6000">&gt; <?= wc_price(6000.00) ?></li>
												</ul>

											</div>
										</div>
									</div>

								</div>
							</div>

						<!-- buttons -->
							<div class="row">
								<div class="col-xs-12">
									<p class="text-center jif__submit-set">
										<input class="btn--darkgray_variant jif_submit" type="submit" value="Submit">
										<a class="btn--red_variant" href="<?= home_url('employer/candidates-listing/') ?>">Cancel</a>
									</p>
								</div>
							</div>

						<!-- success message -->
							<div class="row">
								<div class="col-xs-12">
									<div class="jif__success text-center">
										<h4>JOB INVITE SENT</h4>
										<h5>Remember to respond promptly to any questions posed by your candidate [<u><?= $first_name = $the_user->first_name . ' ' . $the_user->last_name; ?></u>]!</h5>
									</div>
								</div>
							</div>
						</form>
					</div>
				<?php else: ?>
					<div class="btsp-container-fluid resume-content white-bg-views">
						<div>
							<h2> Sorry but the user does not exists </h2>
						</div>
					</div>
				<?php endif; ?>
			</div>
		<?php
		return ob_get_clean();
	}
	add_shortcode( 'employer-job-invitation-form', 'employer_job_invitation_form_func' );




