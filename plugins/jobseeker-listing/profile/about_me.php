<?php

function view_about_content(){
	include( 'info.inc');
	if(is_user_logged_in()){
		set_info();
	}

	ob_start();
	?>
		<div class="btsp-container-fluid white-bg-views view--about">
			<div class="row">
				<div class="col-xs-12">
					<p><strong class="textcolor--gray">Why Hire me</strong></p>
					<!--p>“Well, I have all of the skills and experience that you’re looking for and I’m confident that I would be a superstar in this project management role. It’s not just my background leading successful projects for top companies —  or my people skills, which have helped me develop great relationships with developers, vendors, and senior managers alike. But I’m also passionate about this industry and I’m driven to deliver high-quality work.”</p-->
					<p><?= $about_me ?></p>
				</div>
			</div>
		</div>
	<?php
	return ob_get_clean();
}




function edit_about_content(){
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
			'save'
		];


		foreach ($new_data as $k => $value) {
			if(in_array($k, $ignore))
				continue;
			$the_step3_data[$k] = $value;
		}

		// var_dump($step3);
		// echo "<br/>===========================================================<br/>";
		// var_dump($the_step3_data);

		update_user_meta(get_current_user_id(), 'step3_data', $the_step3_data);
		wp_redirect(home_url('/jobseeker/dashboard/profile/view/others/'));
		exit;
	}

	$cancelLink = home_url('/jobseeker/dashboard/profile/view/others/');


	ob_start();
	?>
		<div class="btsp-container-fluid white-bg-views view--about">
			<div class="row">
				<div class="col-xs-12">
					<div class="resume-content">

					<form action="" method="POST" id="about_me_edit" enctype="multipart/form-data">
						<?php if($step3['other_description'] != null): ?>
							<div class="form-group">
								<label for="other_description"><strong>Why Hire me</strong></label>
								<textarea class="input-field required" name="other_description" maxlength="150" data-autoresize=""><?= $about_me ?></textarea>
							</div>
						<?php else: ?>
							<div class="form-group">
								<label for="other_description"><strong>Why Hire me</strong></label>
								<textarea class="input-field required" name="other_description" maxlength="150" data-autoresize=""></textarea>
							</div>
						<?php endif; ?>

						<div class="row">
							<div class="col-xs-12">
								<div class="form-d-group">
									<input type="submit" value="Save" class="save-btn-variant-1" name="save">
									<a href="<?= $cancelLink ?>" class="cancel-btn-variant-1">Cancel</a>
								</div>
							</div>
						</div>
					</form>
					</div>
				</div>
			</div>

		</div>
	<?php
	return ob_get_clean();
}