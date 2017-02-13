<?php

function employer_reg_show_step_3(){

	if(isset($_REQUEST['next'])){
		$post_data = $_REQUEST;
		// var_dump($post_data);
		$step3_data = [];

		$ignore = [
			'next',
			'referrals',
		];

		foreach ($post_data as $key => $value) {
			if(in_array($key, $ignore))
				continue;
			$step3_data[$key] = $value;
		}

		$referrals = [];
		foreach( $post_data['referrals']['name'] as $key => $name){
			$referral = [];
			$referral['name'] = $name;
			$referral['description']= $post_data['referrals']['description'][$key];
			if(isset($post_data['referrals']['photo'][$key])){
				if($post_data['referrals']['photo'][$key] != ''){
					$attachment = upload_photo($post_data['referrals']['photo'][$key]);

					$step3_data_meta = get_user_meta(get_current_user_id(), 'emp_step3_data', true);
					if($step3_data_meta){
						foreach($step3_data_meta['referrals'] as $meta){
							// echo $meta['photo'];
							wp_delete_attachment( $meta['photo'], true );
						}
					}
					$referral['photo'] = $attachment['ID'];
				}
				else
					$referral['photo'] = '';
			}
			$referrals[] = $referral;
		}

		// var_dump($referrals);

		$step3_data['referrals'] = $referrals;


		// if(isset($post_data['team_members']['logo'])){
		// 	if($post_data['team_members']['logo'] !=null){
		// 		$attachment = upload_photo($post_data['team_members']['logo']);
		// 		$step2_data_meta = get_user_meta(get_current_user_id(), 'emp_step2_data', true);
		// 		if($step2_data_meta){
		// 			foreach($step2_data_meta['team_members'] as $meta){
		// 				wp_delete_attachment( $meta['logo'], true );
		// 			}
		// 		}
		// 		$post_data['team_members']['logo'] = $attachment['ID'];
		// 	}
		// 	else
		// 		$post_data['team_members']['logo'] = '';
		// }

		// $step2_data['team_members'] = $post_data['team_members'];

		update_user_meta(get_current_user_id(), 'emp_step3_data', $step3_data);
		wp_redirect(home_url('/employer/dashboard/registration/success'));
	}


	ob_start();
	?>

	<div class="employer-registration--main resume-content">
		<form action="" class="testform" enctype="multipart/form-data" id="employer1" method="post" name="employer2">
			<div class="form-container">
			<!-- 1 -->
				<h2 class="emp--form_title">WHY JOIN US | <span class="eft--small">Attract top candidates by highlighting your work environment</span></h2>
				<div class="row">
					<div class="col-xs-12">
						<div class="form-group">
							<textarea aria-required="true" class="input-field required" name="join_us" style="height: 55px;" placeholder="Enter text here.."></textarea>
						</div>
					</div>
				</div>

			<!-- 2 -->
				<h2 class="emp--form_title">REFERRALS</h2>

				<div class="row repeater_with_previews">
					<div class="adder">
						<div class="col-sm-4">
							<div class="emp--upload-set">
								<div class="emp--upload_box">
									<div class="emp--upload-center centered-axis-xy">
										<label class="emp--upload-btn">
											<input type="file" data-target="upload--hidden_referrals" class="uploader">
											<input type="text" class="upload--hidden_referrals" data-name="referrals[photo]" data-target-background="with_bg">
											UPLOAD
										</label>
										<p class="emp--upload-text">drag &amp; drop here your image</p>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-8">
							<div class="form-group">
								<label for="company_referrals[product]"><span class="redrisk">*</span> Customer / Client Name:</label> <input class="input-field required" data-required="true" data-name="referrals[name]" type="text">
							</div>
							<div class="form-group">
								<label for="company_referrals[description]">Testimonial:</label> 
								<textarea aria-required="true" class="input-field" data-name="referrals[description]" style="height: 55px;" placeholder="Insert a product or service description that will make candidates love what you are doing (Max. 150 characters)"></textarea>
							</div>
						</div>
						<div class="text-right">
							<a href="javascript:void(0)" class="emp--red-btn-variant-1 btn_add adder_button">ADD</a>
						</div>
					</div>

					<h3 class="emp--title_sub">UPLOAD PREVIEWS</h3>
					<div class="row emp--small_previews emp--referrals_thumbnails previews">
						<?php for($i=0; $i<4; $i++): ?>
							<div class="col-sm-3 preview_container no-data" data-id="<?= $i ?>">
								<div class="emp--upload-set">
									<div class="emp--upload_box with_bg_<?=$i?>">
										<div class="emp--upload-center centered-axis-xy">
										</div>
										<div class="hidden-fields">
											<input type="text" data-edit="referrals[photo]" data-edit-background='true' name="referrals[photo][<?= $i ?>]" >
											<input class="input-field" data-edit="referrals[name]" name="referrals[name][<?=$i?>]" type="text">
											<textarea aria-required="true" class="input-field required" data-edit="referrals[description]"  name="referrals[description][<?= $i?>]" style="height: 55px;" placeholder="Insert a product or service description that will make candidates love what you are doing (Max. 150 characters)"></textarea>
										</div>
									</div>
								</div>
								<a href="javascript:void(0)" class="edit_product edit" data-id="<?=$i?>">EDIT</a>
							</div>
						<?php endfor; ?>						
					</div>
				</div>


				

			<!-- END BUTTONS -->
				<div class="row ebs--buttons">
					<div class="col-sm-4">
						<a href="#" class="ebs--link">PREVIEW MODE</a>
					</div>
					<div class="col-sm-4">
						<input type="submit" class="ebs--submit" value="SAVE THIS FORM">
					</div>
					<div class="col-sm-4">
						<input type="submit" class="ebs--link" value="PUBLISH" name="next">
					</div>
				</div>

			</div>
		</form>
	</div>

	<?php
	return ob_get_clean();
}