<?php

	function show_step_2(){
		ob_start();
		?>
			<h3 class="form-title">Career Summary</h3>
			<div class="form-divider rd-row rd-between-xs">
				<div class="left-form">



					<div class="form-group">
						<div class="dropdown-search-input">						
							<h3 class="required">What is your field of expertise</h3>
							<input type="text" name="field_of_expertise" class="dropdown-data input-field field_of_expertise" readonly/>
							<div class="dropdown-list">
								<div>
									<input class="filter-dropdown" type="text">
								</div>
								<ul class="option_industries">
									<?php $industries = Job_Listing::Industries() ?>
									<?php foreach ($industries as $industry) {
										echo '<li data-value="'.$industry->term_id.'">'.$industry->name.'</li>';
									} ?>
								</ul>
							</div>
						</div>
					</div>



					<div class="form-group">
						<div class="dropdown-search-input">						
							<h3 class="required">How many years of experience do you have in <span class="industry_name">your field of expertise</span>?</h3>
							<input type="text" name="expertise_years" class="dropdown-data input-field expertise_years" readonly/>
							<div class="dropdown-list">
								<div>
									<input class="filter-dropdown" type="text">
								</div>
								<ul class="option_expertise_years">
									<li>Less than 1 year</li>
									<li>1-2 years</li>
									<li>3-4 years</li>
									<li>5-6 years</li>
									<li>More than 6 years</li>
								</ul>
							</div>
						</div>
					</div>

				</div>
				<div class="right-form">
					<div class="form-group">
						<h3 class="required">What is your desired monthly salary?</h3>
						<input type="number" name="desired_salary" class="input-field numeric" min=0 />
					</div> <!-- end of .form-group -->

					<div class="form-group">
						<div class="dropdown-search-input">		
							<h3 class="required">What is your notice period?</h3>
							<input type="text" name="start_year" class="dropdown-data input-field start_year" readonly/>
							<div class="dropdown-list">
								<div>
									<input class="filter-dropdown" type="text">
								</div>
								<ul class="notice_period">
									<li>1 week</li>
									<li>2 weeks</li>
									<li>3 weeks</li>
									<li>1 month</li>
									<li>2 months</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>


			<h3 class="form-title">Work Experience</h3>
			<div class="work_experience_front btsp-container-fluid"></div>
			<div class="work_experience_back"></div>

			<div class="fields-repeated-a"></div>

			<div class="form-group">
				<button class="add-field add_field_with_modal" data-modal="workplace_container"><span><i aria-hidden="true" class="fa fa-plus fa-fw"></i></span> Add Work Experience</button>
			</div>
		<?php
		return ob_get_clean();
	}