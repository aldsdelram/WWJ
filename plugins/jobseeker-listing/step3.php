<?php

function show_step_3(){
	error_reporting(0);
	ob_start();
	?>

	<div class="form-group">
		<h3 class="required">Select skill that you can offer employers</h3>
	</div>
	<div class="form-divider rd-row rd-between-xs skills_group">
		<div class="left-form">
			<div class="form-group">
				<div class="checkbox-group">
				<?php
					$step2_data = get_user_meta(get_current_user_id(), 'step2_data', true);
					$industry_id = $step2_data['field_of_expertise'];
					$skills = Job_Listing::getSkills($industry_id); 
					$count = count($skills);
					$half = $count/2;
				?>
					<ul>
						<?php
							for($i=0; $i<$half; $i++){
								echo "<li>";
								echo '<input type="checkbox" name="skills[]" id="skill_'.$skills[$i]->term_id.'"' 
										.'value="'.$skills[$i]->term_id.'"/>';
								echo '<label for="skill_'.$skills[$i]->term_id.'">'.$skills[$i]->name.'</label>';
								echo "</li>";
							}
						?>
					</ul>
				</div>
			</div>
		</div>
		<div class="right-form">
			<div class="form-group">
				<div class="checkbox-group ">
					<ul>
						<?php
							for($i=$half; $i<$count; $i++){
								echo "<li>";
								echo '<input type="checkbox" name="skills[]" id="skill_'.$skills[$i]->term_id.'"' 
										.'value="'.$skills[$i]->term_id.'"/>';
								echo '<label for="skill_'.$skills[$i]->term_id.'">'.$skills[$i]->name.'</label>';
								echo "</li>";
							}
						?>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="form-group">
		<h3 class="required">Rate the skills that you have chose above</h3>
	</div>
	<div class="skills_set_container form-divider rd-row rd-between-xs">
		<div class="left-form">
				<?php
					for($i=0; $i<$half; $i++){
						echo '<div class="form-group" style="display:none;">';
							echo "<label for=rating[".$skills[$i]->term_id."]>".$skills[$i]->name."</label>";?>
								<div class="dropdown-input">
									<input type="text" name="rating<?='['.$skills[$i]->term_id.']'?>" class="dropdown-data input-field" />
									<ul>
										<li>1</li>
										<li>2</li>
										<li>3</li>
										<li>4</li>
										<li>5</li>
									</ul>
								</div>
							</div>
					<?php
					}
				?>
		</div>
		<div class="right-form">
				<?php
					for($i=$half; $i<$count; $i++){
						echo '<div class="form-group" style="display:none;">';
							echo "<label for=rating[".$skills[$i]->term_id."]>".$skills[$i]->name."</label>";?>
								<div class="dropdown-input">
									<input type="text" name="rating<?='['.$skills[$i]->term_id.']'?>" class="dropdown-data input-field" />
									<ul>
										<li>1</li>
										<li>2</li>
										<li>3</li>
										<li>4</li>
										<li>5</li>
									</ul>
								</div>
							</div>
					<?php
					}
				?>
		</div>
	</div> <!-- end of .form-divider -->
	<div class="form-divider certificate_container">
		<div class="form-group">
			<h3>Achievements</h3>
		</div>
		<div class="fields-repeater certificate_repeater">
			<div class="form-group">
				<div class="btn-panel">
					<div class="upload-button step3-upload">
						<input type="file" class="cert_image" data-name="cert_image[0]"/>
						<p><span><i class="fa fa-plus fa-fw" aria-hidden="true"></i></span> Upload Image</p>
						<input type="text" class="cert_image_64" name="cert_image[0]" style="display:none" />
					</div> <!-- end of .upload-button -->
				</div>
			</div> <!-- end of .form-group -->
			<div class="rd-row rd-between-xs rd-top-xs three-cols">
				<div class="form-group">
					<label for="awards_certification">Awards/Certification</label>
					<textarea name="awards_certification[0]" class="input-field cert_award" data-autoresize=""></textarea>
				</div> <!-- end of .form-group -->
				<div class="form-group">
					<label for="body_corporate">Body Corporate</label>
					<textarea name="body_corporate[0]" class="input-field cert_body_corporate" data-autoresize=""></textarea>
				</div> <!-- end of .form-group -->
				<div class="form-group">
					<label for="year">Year</label>
					<div class="dropdown-input">
						<input type="text" name="cert_year[0]" class="dropdown-data input-field cert_year" />
						<ul>
							<?php for( $i = date( 'Y' ); $i >= 1950; $i-- ) : ?>
								<li><?= $i ?></li>
							<?php endfor; ?>
						</ul>
					</div>
				</div> <!-- end of .form-group -->
			</div>
		</div> <!-- end of .fields-repeater -->
		<div class="fields-repeated"></div>
		<div class="form-group">
			<button id="add-field" class="add-certification"><span><i class="fa fa-plus fa-fw" aria-hidden="true"></i></span> Add More</button>
		</div>
	</div> <!-- end of .form-divider -->
	<div class="form-divider rd-row rd-between-xs">
		<div class="left-form">
			<div class="form-group">
				<h3 class="required">Language</h3>
			</div>
			<div class="checkbox-group language-items">
				<ul>
					<li class="language-item rd-row rd-between-xs rd-top-xs">
						<div class="rd-col-md-4 rd-col-xs-12">
							<input type="checkbox" name="language[0]" id="english" value="english">
							<label for="english">English</label>
						</div>
						<div class="rd-col-md-8 rd-col-xs-12">
							<div class="form-group">
								<div class="dropdown-input language-show" style="display: none;">
									<input type="text" name="proficiency[0]" class="dropdown-data input-field" placeholder="Proficiency" />
									<ul>
										<li>1</li>
										<li>2</li>
										<li>3</li>
										<li>4</li>
										<li>5</li>
									</ul>
								</div>
							</div>
						</div>
					</li>
					<li class="language-item rd-row rd-between-xs rd-top-xs">
						<div class="rd-col-md-4 rd-col-xs-12">
							<input type="checkbox" name="language[1]" id="mandarin" value="mandarin"/>
							<label for="mandarin">Mandarin</label>
						</div>
						<div class="rd-col-md-8 rd-col-xs-12">
							<div class="form-group">
								<div class="dropdown-input language-show" style="display: none;">
									<input type="text" name="proficiency[1]" class="dropdown-data input-field" placeholder="Proficiency" />
									<ul>
										<li>1</li>
										<li>2</li>
										<li>3</li>
										<li>4</li>
										<li>5</li>
									</ul>
								</div>
							</div>
						</div>
					</li>
					<li class="language-item rd-row rd-between-xs rd-top-xs">
						<div class="rd-col-md-4 rd-col-xs-12">
							<input type="checkbox" name="language[2]" id="tamil" value="tamil"/>
							<label for="tamil">Tamil</label>
						</div>
						<div class="rd-col-md-8 rd-col-xs-12">
							<div class="form-group">
								<div class="dropdown-input language-show" style="display: none;">
									<input type="text" name="proficiency[2]" class="dropdown-data input-field" placeholder="Proficiency" />
									<ul>
										<li>1</li>
										<li>2</li>
										<li>3</li>
										<li>4</li>
										<li>5</li>
									</ul>
								</div>
							</div>
						</div>
					</li>
					<li class="language-item rd-row rd-between-xs rd-top-xs">
						<div class="rd-col-md-4 rd-col-xs-12">
							<input type="checkbox" name="language[3]" id="malay" value="malay"/>
							<label for="malay">Malay</label>
						</div>
						<div class="rd-col-md-8 rd-col-xs-12">
							<div class="form-group">
								<div class="dropdown-input language-show" style="display: none;">
									<input type="text" name="proficiency[3]" class="dropdown-data input-field" placeholder="Proficiency" />
									<ul>
										<li>1</li>
										<li>2</li>
										<li>3</li>
										<li>4</li>
										<li>5</li>
									</ul>
								</div>
							</div>
						</div>
					</li>
					<li class="language-item rd-row rd-between-xs rd-top-xs">
						<div class="rd-col-md-4 rd-col-xs-12">
							<input type="checkbox" name="other_language" id="other_language" />
							<label for="other_language">Other</label>
						</div>
						<div class="rd-col-md-8 rd-col-xs-12">
							<div class="form-group">
								<div class="dropdown-input language-show" style="display: none;">
									<input type="text" name="proficiency[4]" class="dropdown-data input-field" placeholder="Proficiency" />
									<ul>
										<li>1</li>
										<li>2</li>
										<li>3</li>
										<li>4</li>
										<li>5</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="resume-content" style="width: 100%;padding: 0;padding-top: 10px;">
							<div class="form-group">
								<input name="language[4]" class="input-field other_language_field" type="text" placeholder="Input your language"></input>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div> <!-- end of .left-form -->
		<div class="right-form">
			<div class="form-group">
				<h3 class="required">Are there any other things you can add to make you stand from others?</h3>
			</div>
			<div class="form-group">
				<label for="other_description">Write a description to make you stand from others. Give your best shot</label>
				<textarea name="other_description" class="input-field required" data-autoresize=""></textarea>
			</div>
		</div> <!-- end of .right-form -->
	</div> <!-- end of .form-divider -->
	<?php
	return ob_get_clean();
}