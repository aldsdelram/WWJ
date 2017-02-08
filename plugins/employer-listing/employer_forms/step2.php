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
								<label for="company_services[description]">Description:</label> 
								<textarea aria-required="true" class="input-field required" name="company_services[description]" style="height: 55px;" placeholder="Insert a product or service description that will make candidates love what you are doing (Max. 150 characters)"></textarea>
							</div>
						</div>
					</div>

					<h3 class="emp--title_sub">UPLOAD PREVIEWS</h3>
					<div class="row emp--small_previews">
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

				<!-- 2 -->
					<h2 class="emp--form_title">TEAM MEMBERS</h2>
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
								<label for="team_members[staffname]"><span class="redrisk">*</span> Staff Name:</label> <input class="input-field" name="team_members[staffname]" type="text">
							</div>
							<div class="form-group">
								<label for="team_members[position]">Position:</label> 
								<textarea aria-required="true" class="input-field required" name="team_members[position]" style="height: 55px;"></textarea>
							</div>
						</div>
					</div>

				<!-- 3 -->
					<h2 class="emp--form_title">VIDEOS | <span class="eft--small">Share your video to provide a good introduction of your company</span></h2>

					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label for="videos[link1]"><span class="redrisk">*</span> Link 1:</label> <input class="input-field" name="videos[link1]" type="text">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="videos[link2]"><span class="redrisk">*</span> Link 2:</label> <input class="input-field" name="videos[link2]" type="text">
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
							<a href="#" class="ebs--link">NEXT</a>
						</div>
					</div>

				</div>
			</div>
		</form><!-- end of .form-container -->
	</div>



	<?php
	return ob_get_clean();
}