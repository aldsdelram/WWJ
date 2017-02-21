<?php

function view_skills_content(){
	include( 'info.inc');
	if(is_user_logged_in()){
		set_info();
	}

	ob_start();
	?>
		<div class="btsp-container-fluid white-bg-views experience-view--main_content">
			<?php for($i=1; $i<=5; $i++): ?>

				<?php $content = ''; ?>

				<?php foreach($skills as $skill): ?>
					<?php if($skill['rating'] == $i): ?>
						<?php $content .= '<span class="ev--skill_box">' . $skill['name'] . '</span>'; ?>
					<?php endif; ?>
				<?php endforeach; ?>

				<div class="row">
					<div class="col-xs-12 col-md-4">
						<?php if($content) : ?>
							<?= WWJ::getRatingDescription($i); ?>
						<?php endif; ?>
					</div>
					<div class="col-xs-12 col-md-8">
						<?= $content; ?>
					</div>
				</div>

			<?php endfor; ?>
		</div>
	<?php
	return ob_get_clean();
}


function edit_skills_content(){
	include( 'info.inc');
	if(is_user_logged_in()){
		set_info();
	}

	if(isset($_REQUEST['save'])){
		$new_data= $_REQUEST;
		$the_step3_data = $step3;

		if($step3 == null)
			$the_step3_data = [];

		$ignore = [
			'o_rating',
			'rating',
			'save'
		];


		foreach ($new_data as $k => $value) {
			if(in_array($k, $ignore))
				continue;
			if($k == "skills"){
				$the_step3_data[$k] = $value;

				$ratings = [];
				foreach($new_data['skills'] as $value){
					$ratings[$value] = $new_data['rating'][$value];
				}
				$the_step3_data['ratings'] = $ratings;
				continue;
			}
			$the_step3_data[$k] = $value;
		}

		update_user_meta(get_current_user_id(), 'step3_data', $the_step3_data);
		wp_redirect(home_url('/jobseeker/dashboard/profile/view/others/'));
		exit;
	}

	$cancelLink = home_url('/jobseeker/dashboard/profile/view/others/');

	ob_start();
	?>
	
	<div class="btsp-container-fluid white-bg-views skills--edit">
		<div id="resume-form">
	   		<div class="resume-content">

				<?php 
					$step2_data = get_user_meta(get_current_user_id(), 'step2_data', true);
					$industry_id = $step2_data['field_of_expertise'];
					$skills = Job_Listing::getSkills($industry_id); 
					$count = count($skills); 
				?>



				<div class="form-group">
					<div class="dropdown-search-input">
						<label for=""><strong>Add skills</strong></label>
						<input type="text" class="dropdown-data input-field" />
						<div class="dropdown-list">
							<div>
								<input class="filter-dropdown" type="text">
							</div>
							<ul class="skills_options">
								<?php for($i=0; $i<$count; $i++): ?>
									<li data-value="<?= $skills[$i]->term_id ?>"><?= $skills[$i]->name ?></li>
								<?php endfor; ?>
							</ul>
						</div>
					</div>
				</div>


				<form action="" id="edit_skills" method="post">
					<div class="form-container">
						<div class="row">
							<div class="col-sm-6">
								<h3 class="skills-h3">SKILLS</h3>
							</div>

							<div class="col-sm-6">
								<h3 class="skills-h3">PROFICIENCY</h3>
							</div>
						</div>

				<?php for($i=0; $i<$count; $i++): ?>
						<div class="row skill_parent_<?=$skills[$i]->term_id?>" style="display:none;">
							<div class="col-sm-6">
								<?= $skills[$i]->name ?>
								<input class="input_skill" style="display:none;" value="<?=$skills[$i]->term_id?>">
							</div>
							<div class="col-sm-6">
								<div class="col-xs-11">
									<div class="form-group">
										<label for=rating[<?=$skills[$i]->term_id?>]>&nbsp;</label>
										<div class="dropdown-input">
											<input type="text" name="rating[<?=$skills[$i]->term_id?>]" class="dropdown-data input-field" />
											<ul>
												<?php for($j= 1; $j<= 5; $j++): ?>
													<li data-value="<?= $j ?>"><?= $j ?> - <?= WWJ::getRatingDescription($j); ?></li>
												<?php endfor; ?>
											</ul>
										</div>
									</div>
								</div>
								<div class="col-xs-1">
									<a href="javascript:void(0)" data-value="<?=$skills[$i]->term_id?>" class="delete_skill"><i class="fa fa-trash" aria-hidden="true"></i></a>
								</div>
							</div>
						</div>

				<?php endfor; ?>



						

						<!-- SAVE / CANCEL -->
						<div class="row">
							<div class="col-xs-12">
								<div class="form-d-group">
									<input type="submit" value="Save" class="save-btn-variant-1" name="save">
									<a href="<?= $cancelLink ?>" class="cancel-btn-variant-1">Cancel</a>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

	<?php
	return ob_get_clean();
}