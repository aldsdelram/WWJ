<?php

function employer_reg_show_step_1(){
	ob_start();
	?>
	

	<div class="employer-registration--main resume-content">
		
		<form action="">

			<!-- 1 -->
				<h2 class="emp--form_title">COMPANY INFORMATION</h2>

				<div class="emp--upload-set">
					<p class="emp--upload_title">Company Header Image</p>

					<div class="emp--upload_box">

						<div class="emp--upload-center centered-axis-xy">
							<label class="emp--upload-btn">
								<input type="file" data-target="upload--hidden">
								<input type="text" class="upload--hidden">
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
										<input type="file" class="file--hidden">
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
									<input type="text" name="company_info[size]" class="input-field">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="company_info[website]">Website:</label>
									<input type="text" name="company_info[website]" class="input-field">
								</div>
							</div>

							<div class="col-sm-6">
								<div class="form-group plus--repeater">
									<label for="company_info[social]">Social Media Page:</label>
									<input type="text" name="company_info[social]" class="input-field"><i class="fa fa-plus" aria-hidden="true"></i>
									<!-- <div class="clearfix"></div> -->
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
							<input type="text" name="company_info[telno]" class="input-field">
						</div>
					</div>

					<div class="col-sm-6">
						<div class="form-group">
							<label for="company_info[fax]">Fax Number:</label>
							<input type="text" name="company_info[fax]" class="input-field">
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
						<div id="mapContainer"></div>
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
						<a href="#" class="ebs--link">NEXT</a>
					</div>
					
				</div>


		</form>

	</div>

	<?php
	return ob_get_clean();
}