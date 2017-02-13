<?php

function employer_reg_show_step_1(){

	if(isset($_REQUEST['next'])){
		$post_data = $_REQUEST;
		$step1_data = [];

		$ignore = [
			'company',
			'o_company_info',
			'next'
		];

		foreach ($post_data as $key => $value) {
			if(in_array($key, $ignore))
				continue;
			$step1_data[$key] = $value;
		}

		if(isset($post_data['company']['cover_photo'])){
			if($post_data['company']['cover_photo'] !=null){
				$attachment = upload_photo($post_data['company']['cover_photo']);

				$step1_data_meta = get_user_meta(get_current_user_id(), 'emp_step1_data', true);
				if($step1_data_meta){
					if($step1_data_meta['cover_photo']){
						wp_delete_attachment( $step1_data_meta['cover_photo'], true );
					}
				}
				$step1_data['cover_photo'] = $attachment['ID'];
			}
			else
				$step1_data['cover_photo'] = '';
		}

		if(isset($post_data['company']['logo'])){
			if($post_data['company']['logo'] !=null){
				$attachment = upload_photo($post_data['company']['logo']);

				$step1_data_meta = get_user_meta(get_current_user_id(), 'emp_step1_data', true);
				if($step1_data_meta){
					if($step1_data_meta['logo']){
						wp_delete_attachment( $step1_data_meta['logo'], true );
					}
				}
				$step1_data['logo'] = $attachment['ID'];
			}
			else
				$step1_data['logo'] = '';
		}

		update_user_meta(get_current_user_id(), 'emp_step1_data', $step1_data);
		wp_redirect(home_url('/employer/dashboard/registration/step-02/'));


	}
	ob_start();
	?>
	

	<div class="employer-registration--main resume-content">
		<!--form action="" method="post"-->
			<!-- 1 -->
				<h2 class="emp--form_title">COMPANY INFORMATION</h2>
				<div class="emp--upload-set">
					<p class="emp--upload_title">Company Header Image</p>

					<div class="emp--upload_box">
						<div class="emp--upload-center centered-axis-xy">
							<label class="emp--upload-btn">
								<input type="file" data-target="upload--hidden_cover" class="uploader">
								<input type="text" class="upload--hidden_cover" name="company[cover_photo]">
								CHOOSE COVER
							</label>
							<p class="emp--upload-text">drag &amp; drop here your image</p>
						</div>

					</div>
				</div>

				<div class="row">
					<div class="col-sm-4">
						<div class="emp--upload-set">
							<div class="emp--upload_box">
								<div class="emp--upload-center centered-axis-xy">
									<label class="emp--upload-btn">
										<input type="file" data-target="upload--hidden_dp" class="uploader">
										<input type="text" class="upload--hidden_dp" name="company[logo]">
										UPLOAD LOGO
									</label>
									<p class="emp--upload-text">drag &amp; drop here your image</p>
								</div>
							</div>
						</div>
					</div>

					<div class="col-sm-8">
						<div class="form-group">
							<label for="company_info[name]"><span class="redrisk">*</span> Company Name:</label>
							<input type="text" name="company_info[name]" class="input-field required">
						</div>

						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<p><span class="redrisk">*</span> Industry:</p>
									<div class="dropdown-input" readonly="readonly">
										<input type="text" name="company_info[industry]" class="dropdown-data input-field valid required" aria-invalid="false">
										<ul class="option_expertise_years">
											<li>list 1</li>
											<li>list 2</li>
											<li>list 3</li>
											<li>list 4</li>
										</ul>
									</div>
								</div>
							</div>

							<div class="col-sm-6">
								<div class="form-group">
									<label for="company_info[size]"><span class="redrisk">*</span> Size:</label>
									<input type="number" name="company_info[size]" class="input-field required numeric" min=1>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="company_info[website]">Website:</label>
									<input type="url" name="company_info[website]" class="input-field">
								</div>
							</div>

							<div class="col-sm-6">
								<div class="form-group plus--repeater">
									<label for="company_info[social][]">Social Media Page:</label>
									<div class="to_repeat">
										<input type="text" name="company_info[social][]" class="input-field">
										<i class="fa fa-plus" aria-hidden="true"></i>
										<div class="clearfix"></div>
									</div>
									<div class="repeated">
									</div>
									<!-- <input type="text" name="company_info[social]" class="input-field"><i class="fa fa-minus" aria-hidden="true"></i> -->
									<!-- <div class="clearfix"></div> -->
									<!-- <input type="text" name="company_info[social]" class="input-field"><i class="fa fa-minus" aria-hidden="true"></i> -->
								</div>
							</div>
						</div>

					</div>
				</div>

				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label for="company_info[telno]">Telephone Number:</label>
							<input type="number" name="company_info[telno]" class="input-field numeric" minlength=8 maxlength=8>
						</div>
					</div>

					<div class="col-sm-6">
						<div class="form-group">
							<label for="company_info[fax]">Fax Number:</label>
							<input type="text" name="company_info[fax]" class="input-field numeric" minlength=8 maxlength=8>
						</div>
					</div>
				</div>

			<!-- 2 -->
				<h2 class="emp--form_title"><span class="redrisk">*</span> COMPANY OVERVIEW	| <span class="eft--small">Make a catchy introduction that compels jobseekers</span></h2>
				<div class="form-group">
					<label for="about_us">About Us:</label>
					<textarea name="about_us" class="input-field required" aria-required="true" style="height: 55px;"></textarea>
				</div>

			<!-- 3 -->
				<h2 class="emp--form_title">LOCATION MAP</h2>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label for="location[address]"><span class="redrisk">*</span> Location:</label>
							<input type="text" id="location_address" name="location[address]" class="input-field required">
						</div>
					</div>

					<div class="col-sm-6">
						<!-- <div class="form-group">
							<p><span class="redrisk">*</span> Postal Code:</p>
							<div class="dropdown-input" readonly="readonly">
								<input type="text" name="location[postal_code]" class="dropdown-data input-field valid required" aria-invalid="false">
								<ul class="option_expertise_years">
									<li>1233</li>
									<li>1234</li>
									<li>1235</li>
									<li>1236</li>
								</ul>
							</div>
						</div> -->

						<div class="form-group">
							<label for="location[postal_code]"><span class="redrisk">*</span> Postal Code:</label>
							<input type="text" name="location[postal_code]" class="input-field required">
						</div>
					</div>

				</div>

				<div class="row">
					<div class="col-xs-12">
						<div id="mapContainer" class="gmap_div"></div>
					</div>
				</div>

				<!-- END BUTTONS -->
				<div class="row ebs--buttons">
					<div class="col-sm-4">
						<a href="#" class="ebs--link">PREVIEW MODE</a>
					</div>
					<div class="col-sm-4">
						<input type="submit" class="ebs--submit" value="SAVE THIS FORM" name="save">
					</div>
					<div class="col-sm-4">
						<input type="submit" class="ebs--link" value="NEXT" name="next">
					</div>
				</div>
		<!--/form-->

	</div>

	<?php
	return ob_get_clean();
}