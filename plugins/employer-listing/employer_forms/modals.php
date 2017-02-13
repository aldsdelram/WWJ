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
							<img class="sfd--img" src="<?= plugins_url() . '/employer-listing/img/employer-reg-1.png' ?>" alt="">		

							<div class="clearfix">
								<h3 class="sfd--slanted">Art of Keyword Searches <span class="sfd--slanted-border"></span></h3>
							</div>

							<p class="sfd--desc">For most recruiters, the first step in your search will be to filter out a list of potential candidates using salary range or work experience as the determining factors. We recommend you to run keyword searches as well to further streamline candidates in WWJ applicant tracking system (ATS) for an even better match.
							<br><br>
							Simply insert keywords that fit your job position such as desired skill sets and even personality traits. The ATS will instantly populate and rank a list of candidates whose resumes contain those keywords!</p>
						</div>

						<!-- 2 -->
						<div class="box-to-fade box-no-2">
							<img class="sfd--img" src="<?= plugins_url() . '/employer-listing/img/employer-reg-2.png' ?>" alt="">

							<div class="clearfix">
								<h3 class="sfd--slanted">Improve Your Interview Skills <span class="sfd--slanted-border"></span></h3>
							</div>

							<p class="sfd--desc">Flawed interview processes has been cited as a common reason for failures exhibited by new employees. Interviewers are often too focused on making sure new hires are technically competent, whereas other factors that are just as important to employee success — like coachability, emotional intelligence, temperament and motivation — are often overlooked.
							<br><br>
							So what are some other great questions to ask? "Who are you going to be 10 years from today?" and "What makes you get up in the morning and do what you do?" can tell you a lot about a candidate's drive and ambition. </p>
						</div>

						<!-- 3 -->
						<div class="box-to-fade box-no-3">
							<img class="sfd--img" src="<?= plugins_url() . '/employer-listing/img/employer-reg-3.png' ?>" alt="">

							<div class="clearfix">
								<h3 class="sfd--slanted">Chalk Up Your Positive Reviews <span class="sfd--slanted-border"></span></h3>
							</div>

							<p class="sfd--desc">
							Potential employees often seek insider information about companies they want to work for, and this includes salary estimates, interview tips and reviews from current and former employees.
							<br><br>
							Top candidates are likely to accept a job invite if the company has supporting reviews, an updated profile, and actively manages the employer brand by responding to enquiries.
							<br><br>
							If you have a lot of negative reviews from former employees, it may be time to work on your company culture before you try to fill any open positions. Doing so can help improve employee retention and lead to more positive reviews that will attract quality employees.
							</p>
						</div>

						<!-- 4 -->
						<div class="box-to-fade box-no-4">
							<img class="sfd--img" src="<?= plugins_url() . '/employer-listing/img/employer-reg-4.png' ?>" alt="">

							<div class="clearfix">
								<h3 class="sfd--slanted">Check LinkedIn Profiles <span class="sfd--slanted-border"></span></h3>
							</div>

							<p class="sfd--desc">As employers, you should conduct a background check to see what comes up about your potential employee. LinkedIn profiles present a key way to find out more about the individual as a person and an employee — for better or for worse.
							<br><br>
							Most importantly, it can be used as a skills assessment, especially if a candidate has professional blog posts or portfolio work. </p>
						</div>

						<!-- 5 -->
						<div class="box-to-fade box-no-5">
							<img class="sfd--img" src="<?= plugins_url() . '/employer-listing/img/employer-reg-5.png' ?>" alt="">

							<div class="clearfix">
								<h3 class="sfd--slanted">Look Out for Referrals <span class="sfd--slanted-border"></span></h3>
							</div>

							<p class="sfd--desc">Strong candidates tend to have referrals because they are reliable enough that someone is willing to vouch for them. Do not be afraid to contact these referrals to find out more about how the candidate performed in his or her previous job positions!
							<br><br>
							More importantly, you have a better judgement if there are red flags raised about the candidate. Verifying now can save you a lot of time in future.</p>
						</div>
					</div>

					<div class="sfd--bullets"></div>

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
							<a href="#" class="yes" style="width: auto; padding: 10px">I’M READY TO FIND MY NEXT DREAM CANDIDATE</a>
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
