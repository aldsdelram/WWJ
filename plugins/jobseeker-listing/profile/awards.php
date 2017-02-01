<?php

function view_awards_content(){
	include( 'info.inc');
	if(is_user_logged_in()){
		set_info();
	}

	ob_start();
	?>
		<div class="btsp-container-fluid white-bg-views experience-view--main_content">
			<?php foreach($certificates as $cert): ?>
				<div class="row">
					<div class="col-xs-12 col-md-4">
						<?= $cert['year']?>
					</div>
					<div class="col-xs-12 col-md-8">
						<?= $cert['award']?> | <?= $cert['body_corporate']?>
					</div>
				</div>
				<div class="clearfix"></div>	
			<?php endforeach ?>
		</div>
	<?php
	return ob_get_clean();
}


function edit_awards_content(){
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
			'o_cert_year',
			'o_year',
			'save'
		];


		foreach ($new_data as $k => $value) {
			if(in_array($k, $ignore))
				continue;

			if($k == 'cert_image'){
				$step3_data_meta = get_user_meta(get_current_user_id(), 'step3_data', true);
				if($step3_data_meta){
					if($step3_data_meta['cert_images']){
						foreach($step3_data_meta['cert_images'] as $cert_image_id){
							wp_delete_attachment( $cert_image_id, true );
						}
					}
				}
				$cert_image_id = [];
				foreach($new_data['cert_image'] as $cert_image){
					if($cert_image != null){
						$attachment = upload_photo($cert_image);
						$cert_image_id[] = $attachment['ID'];
					}
					else
						$cert_image_id[] = '';
				}
				$the_step3_data['cert_images'] = $cert_image_id;
				continue;
			}
			$the_step3_data[$k] = $value;
		}

		update_user_meta(get_current_user_id(), 'step3_data', $the_step3_data);
		wp_redirect(home_url('/jobseeker/dashboard/profile/view/others/'));
		exit;
	}

	ob_start();
	?>

		<div class="btsp-container-fluid white-bg-views experience-view--main_content">
			<div id="resume-form">
				<div class="resume-content">
					<form action="" method="POST" id="awards_edit" enctype="multipart/form-data">
						<div class="form-container">
							<div class="form-divider certificate_container">
								<div class="form-group">
									<h3>Achievements</h3>
								</div>
								<div class="fields-repeater certificate_repeater">
									<div class="form-group">
										<div class="btn-panel">
											<div class="cert_image_container" data-name="cert_image[0]"></div>
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
								<div class="fields-repeated certificate_repeated"></div>
								<div class="form-group">
									<button id="add-field" class="add-certification"><span><i class="fa fa-plus fa-fw" aria-hidden="true"></i></span> Add More</button>
								</div>
							</div> <!-- end of .form-divider -->
						</div>


						<div class="row">
							<div class="col-xs-12">
								<div class="form-d-group">
									<input type="submit" value="Save" class="save-btn-variant-1" name="save">
									<a href="#" class="cancel-btn-variant-1">Cancel</a>
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