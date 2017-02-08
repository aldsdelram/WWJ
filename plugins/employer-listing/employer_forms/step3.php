<?php

function employer_reg_show_step_3(){
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
						<div class="emp--testimonial-set">
							<div class="form-group">
								<label for="referrals[name]"><span class="redrisk">*</span> Customer / Client Name:</label> <input class="input-field" name="referrals[name]" type="text">
							</div>
							<div class="form-group">
								<label for="referrals[testimonial]">Testimonial:</label> 
								<textarea aria-required="true" class="input-field required" name="referrals[testimonial]" style="height: 55px;" placeholder=""></textarea>
								<div class="text-right"><a href="#" class="emp--red-btn-variant-1">ADD NEW</a></div>
							</div>
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
		</form>
	</div>

	<?php
	return ob_get_clean();
}