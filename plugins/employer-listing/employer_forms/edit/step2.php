<?php

function employer_reg_edit_step_2(){

	if(isset($_REQUEST['next'])){
		$post_data = $_REQUEST;
		// var_dump($post_data);
		$step2_data = [];

		$ignore = [
			'services',
			'team_members',
			'next'
		];

		foreach ($post_data as $key => $value) {
			if(in_array($key, $ignore))
				continue;
			$step2_data[$key] = $value;
		}

		$services = [];
		foreach( $post_data['services']['name'] as $key => $name){
			$service = [];
			$service['name'] = $name;
			$service['description']= $post_data['services']['description'][$key];
			if(isset($post_data['services']['photo'][$key])){
				if($post_data['services']['photo'][$key] !=null){
					$attachment = upload_photo($post_data['services']['photo'][$key]);

					$step2_data_meta = get_user_meta(get_current_user_id(), 'emp_step2_data', true);
					if($step2_data_meta){
						foreach($step2_data_meta['services'] as $meta){
							wp_delete_attachment( $meta['photo'], true );
						}
					}
					$service['photo'] = $attachment['ID'];
				}
				else
					$service['photo'] = '';
			}
			$services[] = $service;
		}

		$step2_data['services'] = $services;


		$team_members = [];
		foreach( $post_data['team_members']['staffname'] as $key => $name){
			$team_member = [];
			$team_member['staffname'] = $name;
			$team_member['position']= $post_data['team_members']['position'][$key];
			if(isset($post_data['team_members']['photo'][$key])){
				if($post_data['team_members']['photo'][$key] !=null){
					$attachment = upload_photo($post_data['team_members']['photo'][$key]);

					$step2_data_meta = get_user_meta(get_current_user_id(), 'emp_step2_data', true);
					if($step2_data_meta){
						foreach($step2_data_meta['team_members'] as $meta){
							wp_delete_attachment( $meta['photo'], true );
						}
					}
					$team_member['photo'] = $attachment['ID'];
				}
				else
					$team_member['photo'] = '';
			}
			$team_members[] = $team_member;
		}

		$step2_data['team_members'] = $team_members;


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

		update_user_meta(get_current_user_id(), 'emp_step2_data', $step2_data);
		wp_redirect(home_url('/employer/dashboard/registration/step-03/'));
	}


	ob_start();
	?>
	<div class="employer-reg-form-content">
		<form action="" class="testform" enctype="multipart/form-data" id="employer1" method="post" name="employer2">
			<div class="form-container">
				<div class="employer-registration--main resume-content">
				<!-- 1 -->
					<h2 class="emp--form_title">OUR SERVICES | <span class="eft--small">Make a catchy introduction that compels jobseekers</span></h2>
					<div class="repeater_with_previews">
						<div class="row adder">
							<div class="col-sm-4">
								<div class="emp--upload-set">
									<div class="emp--upload_box">
										<div class="emp--upload-center centered-axis-xy">
											<label class="emp--upload-btn">
												<input type="file" data-target="upload--hidden_services" class="uploader">
												<input type="text" class="upload--hidden_services" data-name="services[photo]" data-target-background="with_bg">
												UPLOAD
											</label>
											<p class="emp--upload-text">drag &amp; drop here your image</p>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-8">
								<div class="form-group">
									<label for="company_services[product]"><span class="redrisk">*</span> Product Name:</label>
									<input class="input-field required" data-required="true" data-name="services[name]" type="text">
								</div>
								<div class="form-group">
									<label for="company_services[description]">Description:</label> 
									<textarea aria-required="true" class="input-field" data-name="services[description]" style="height: 55px;" placeholder="Insert a product or service description that will make candidates love what you are doing (Max. 150 characters)"></textarea>
								</div>
							</div>
							<div class="text-right">
								<a href="javascript:void(0)" class="emp--red-btn-variant-1 btn_add adder_button">ADD</a>
							</div>
						</div>

						<h3 class="emp--title_sub">UPLOAD PREVIEWS</h3>
						<div class="row emp--small_previews emp--services_thumbnails previews">
							<?php for($i=0; $i<4; $i++): ?>
								<div class="col-sm-3 preview_container no-data" data-id="<?= $i ?>">
									<div class="emp--upload-set">
										<div class="emp--upload_box with_bg_<?=$i?>">
											<div class="emp--upload-center centered-axis-xy">
											</div>
											<div class="hidden-fields">
												<input type="text" data-edit="services[photo]" data-edit-background='true' name="services[photo][<?= $i ?>]" >
												<input class="input-field" data-edit="services[name]" name="services[name][<?=$i?>]" type="text">
												<textarea aria-required="true" class="input-field required" data-edit="services[description]"  name="services[description][<?= $i?>]" style="height: 55px;" placeholder="Insert a product or service description that will make candidates love what you are doing (Max. 150 characters)"></textarea>
											</div>
										</div>
									</div>
									<a href="javascript:void(0)" class="edit_product edit" data-id="<?=$i?>">EDIT</a>
								</div>
							<?php endfor; ?>						
						</div>
					</div>

				<!-- 2 -->
					<h2 class="emp--form_title">TEAM MEMBERS</h2>
					<div class="repeater_with_previews">
						<div class="row adder">
							<div class="col-sm-4">
								<div class="emp--upload-set">
									<div class="emp--upload_box">
										<div class="emp--upload-center centered-axis-xy">
											<label class="emp--upload-btn">
												<input type="file" data-target="upload--hidden_dp_members" class="uploader">
												<input type="text" class="upload--hidden_dp_members" data-name="team_members[photo]" data-target-background="with_bg">
												UPLOAD
											</label>
											<p class="emp--upload-text">drag &amp; drop here your image</p>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-8">
								<div class="form-group">

									<label for="team_members[staffname]"><span class="redrisk">*</span> Staff Name:</label>
									<input class="input-field required" data-required="true" data-name="team_members[staffname]" type="text">
									
								</div>
								<div class="form-group">
									<label for="team_members[position]">Position:</label> 
									<textarea aria-required="true" class="input-field" data-name="team_members[position]" style="height: 55px;"></textarea>
								</div>

								<div class="text-right">
									<a href="javascript:void(0)" class="emp--red-btn-variant-1 btn_add adder_button">ADD</a>
								</div>

							</div>
						</div>

						<h3 class="emp--title_sub">UPLOAD PREVIEWS</h3>
						<div class="row emp--small_previews emp--team_members_thumbnails previews">
							<div class="col-xs-12 flex-5-con">
								<?php for($i=0; $i<5; $i++): ?>
									<div class="preview_container no-data" data-id="<?= $i ?>">
										<div class="emp--upload-set">
											<div class="emp--upload_box with_bg_<?=$i?>">
												<div class="emp--upload-center centered-axis-xy">
												</div>
												<div class="hidden-fields">
													<input type="text" data-edit="team_members[photo]" data-edit-background='true' name="team_members[photo][<?= $i ?>]" >
													<input class="input-field" data-edit="team_members[staffname]" name="team_members[staffname][<?=$i?>]" type="text">
													<textarea aria-required="true" class="input-field required" data-edit="team_members[position]"  name="team_members[position][<?= $i?>]" style="height: 55px;" placeholder="Insert a product or service description that will make candidates love what you are doing (Max. 150 characters)"></textarea>
												</div>
											</div>
										</div>
										<a href="javascript:void(0)" class="edit_product edit" data-id="<?=$i?>">EDIT</a>
									</div>
								<?php endfor; ?>
							</div>					
						</div>
					</div>



				<!-- 3 -->
					<h2 class="emp--form_title">VIDEOS | <span class="eft--small">Share your video to provide a good introduction of your company</span></h2>

					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label for="videos[link1]"><span class="redrisk">*</span> Link 1:</label> <input class="input-field required" name="videos[link1]" type="text">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="videos[link2]"><span class="redrisk">*</span> Link 2:</label> <input class="input-field required" name="videos[link2]" type="text">
							</div>
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
							<input type="submit" class="ebs--link" value="NEXT" name="next">
						</div>
					</div>

				</div>
			</div>
		</form><!-- end of .form-container -->
	</div>



	<?php
	return ob_get_clean();
}