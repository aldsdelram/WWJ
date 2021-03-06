<?php

function employer_help_button_modal() {
	ob_start();
	?>
		<div class="portal--modal help_modal_container">
			<div class="portal--modal-details">
				<div class="portal--modal-content">
					<div class="help_modal_close">x</div>
					
					<div class="simple-fading-divs">
						<h2 class="sfd--title">Help Tips</h2>
						<!-- 1 -->
						<div class="box-to-fade box-no-1">
							<img class="sfd--img" src="<?= wp_get_attachment_url(988); ?>" alt="">		

							<div class="clearfix">
								<h3 class="sfd--slanted">Provide a Standout Company Profile <span class="sfd--slanted-border"></span></h3>
							</div>

							<p class="sfd--desc">Fill out the form on the left. If you want job seekers to choose you over your competitors, use your company description to sell them on why they should work for you. You can always come back to edit the data in My Profile.</p>
						</div>

						<!-- 2 -->
						<div class="box-to-fade box-no-2">
							<img class="sfd--img" src="<?= wp_get_attachment_url(989); ?>" alt="">		

							<div class="clearfix">
								<h3 class="sfd--slanted">Reinforce Your Brand <span class="sfd--slanted-border"></span></h3>
							</div>

							<p class="sfd--desc">Your Mission and Core Values Statements can be used to outline and reinforce what your business is about and confirm what you stand for. Don’t forget to use your logo and company colours to portray a more professional image.</p>
						</div>

						<!-- 3 -->
						<div class="box-to-fade box-no-3">
							<img class="sfd--img" src="<?= wp_get_attachment_url(993); ?>" alt="" style="max-width: 107%;margin-left: -20px;">

							<div class="clearfix">
								<h3 class="sfd--slanted">Peddling Your Perks <span class="sfd--slanted-border"></span></h3>
							</div>

							<p class="sfd--desc">
							Whether your company embraces ongoing training, new ideas, casual dress code, free lunches, pet-friendly offices, or anything else your employees may enjoy, highlight the convenience it provides for employees!
							</p>
						</div>

						<!-- 4 -->
						<div class="box-to-fade box-no-4">
							<img class="sfd--img" src="<?= wp_get_attachment_url(990); ?>" alt="" style="max-width: 107%;margin-left: -20px;">

							<div class="clearfix">
								<h3 class="sfd--slanted">Win with Images <span class="sfd--slanted-border"></span></h3>
							</div>

							<p class="sfd--desc"> A lot of companies don’t use images in their Company Profile, and this is really a missed opportunity. Include photos of key staff members and leading products. Good quality photos can help differentiate your business from your competitors. </p>
						</div>

						<!-- 5 -->
						<div class="box-to-fade box-no-5">
							<img class="sfd--img" src="<?= wp_get_attachment_url(992); ?>" alt="">

							<div class="clearfix">
								<h3 class="sfd--slanted">Proofread Before Submitting <span class="sfd--slanted-border"></span></h3>
							</div>

							<p class="sfd--desc">Before hitting the submit button, take a final glance at the content you have provided. Keep in mind that once you hit that button, your profile will be published directly on WWJ Portal. Errors on a company profile negatively affects you image!</p>
						</div>
					</div>

					<div class="sfd--bullets"></div>

					<div class="sfd--footer">
						<img src="<?= wp_get_attachment_url(52); ?>" alt="">
						<p><span class="flexit">Tel: <a href="tel:6567176668">+65 6717-6668</a> | Email: <a href="mailto:jobs@workworkjay.com">jobs@workworkjay.com</a></span></p>
					</div>

				</div>
			</div>
		</div>
	<?php
	return ob_get_clean();
}


function emp_success_modal(){
	ob_start();
	?>
		<div class="portal--modal success_container" style="display: block;">
			<div class="portal--modal-details">
				<div class="portal--modal-content" style="padding:0;">
					<div style="padding: 50px 20px;">
						<img src="<?= wp_get_attachment_url(723)?>">
						<h3 style="font: 24px/30px 'Open Sans'; margin: 0 0 30px; padding: 0 56px; text-transform: uppercase;"> Congratulations ACE GROUP</h3>
						<div class="btn-panel">
							<a href="<?= home_url('employer/candidates-listing') ?>" class="yes" style="width: auto; padding: 10px; margin-bottom: 10px">I'M READY TO FIND MY NEXT DREAM CANDIDATE</a><br/>
							<a href="<?= home_url('employer/company-profile-view/') ?>" class="no" style="width: auto; padding: 10px">I'm READY TO VIEW MY COMPANY PROFILE</a>

						</div>
					</div>
				</div>
			</div>
		</div>

		<script>
			jQuery('.portal--modal .success_container').show();
		</script>
	<?php
	return ob_get_clean();
}
