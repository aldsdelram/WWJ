<?php

	/*
		Plugin Name: Employer Listing
		Plugin URI: http://preskubbs.com/wwj2/
		Description: Shortcodes for Employers
		Author: Skubbs
		Version: 1.0.0
		Author URI: http://preskubbs.com/wwj2/
		Network: true
	*/

	function employer_scripts_func() {
		wp_enqueue_script( 'employer-js', plugin_dir_url( __FILE__ ) . '/employer.js' );
	}
	add_action( 'wp_enqueue_scripts', 'employer_scripts_func' );

	function search_job_position_func() {
		ob_start();
	?>

		<div class="searchJob-container">
			<form action="" method="">
				<div class="input-search">
					<input type="text" placeholder="Search the job position that you need here." />
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
				<ul class="phoneSlider-list">
					<?php for( $i = 0; $i <= 5; $i++ ) : ?>
						<li>
							<div class="phone-container">
								<div class="img-container" style="background: url( '<?= home_url( 'skubbswp/wp-content/uploads/2017/01/mila-khoo.png' ) ?>' ) no-repeat top center; background-size: cover;"></div>
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

?>