<?php

function employer_reg_show_step_2(){
	ob_start();
	?>
	<div class="employer-reg-form-content">
		<form action="" class="testform" enctype="multipart/form-data" id="employer1" method="post" name="employer2">
			<div class="form-container">
				<div class="employer-registration--main resume-content">
					<!-- 1 -->
					<h2 class="emp--form_title">OUR SERVICES | <span class="eft--small">Make a catchy introduction that compels jobseekers</span></h2>
					<div class="row">
						<div class="col-sm-4">
							<div class="emp--upload-set">
								<div class="emp--upload_box">
									<div class="emp--upload-center centered-axis-xy">
										<label class="emp--upload-btn">
											<input data-target="upload--hidden" type="file">
											UPLOAD
										</label>
										<p class="emp--upload-text">drag &amp; drop here your image</p>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-8">
							<div class="form-group">
								<label for="company_services[product]"><span class="redrisk">*</span> Product Name:</label> <input class="input-field" name="company_services[product]" type="text">
							</div>
							<div class="form-group">
								<label for="about_us">Description:</label> 
								<textarea aria-required="true" class="input-field required" name="about_us" style="height: 55px;"></textarea>
							</div>
						</div>
					</div>


					<h3>UPLOAD PREVIEWS</h3>
					<div class="row">
						<div class="col-sm-3">
							<div class="emp--upload-set">
								<div class="emp--upload_box">
									<div class="emp--upload-center centered-axis-xy">
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="emp--upload-set">
								<div class="emp--upload_box">
									<div class="emp--upload-center centered-axis-xy">
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="emp--upload-set">
								<div class="emp--upload_box">
									<div class="emp--upload-center centered-axis-xy">
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="emp--upload-set">
								<div class="emp--upload_box">
									<div class="emp--upload-center centered-axis-xy">
									</div>
								</div>
							</div>
						</div>					
					</div>

					
				</div>
			</div>
		</form><!-- end of .form-container -->
	</div>



	<?php
	return ob_get_clean();
}