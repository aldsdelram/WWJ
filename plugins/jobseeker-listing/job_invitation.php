<?php

function job_invitation_func() {
ob_start();
?>

	<div class="job-invitation--container">

		<!-- header title -->
		<div class="btsp-container-fluid gray--header_bg gh--floats">
			<div class="row">
				<div class="col-xs-12">
					<h1 class="gray--header_title pull-left">INVITATIONS</h1>

					<div class="jinv-status-dropdown--container pull-right">
						<label class="select--variant_1">
						    <select>
						        <option>All</option>
						        <option>New</option>
						        <option>Accepted</option>
						        <option>Rejected</option>
						    </select>
						</label>
					</div>
				</div>
			</div>
		</div>

		<div class="btsp-container-fluid white-bg-views jinv--main">
			<!-- NEW -->
			<div class="jinv--whole_set">
				<div class="title--variant-1">NEW</div>
				<div class="row">
					<div class="col-sm-3">
						<div class="jinv--image_up" style="background-image: url('http://preskubbs.com/wwj2/skubbswp/wp-content/uploads/2017/02/bbq-house-logo.jpg');">
						</div>
						<div class="jinv--btn_set">
							<a href="#" class="jinv--chat_btn">Chat</a>
							<a href="#" class="jinv--reject_btn">Reject</a>
						</div>
					</div>
					<div class="col-sm-9">
						<p class="jinv--info_set"><span>Company Name:</span> <span class="jinv-con--comp_name">BBQ HOUSE</span></p>
						<p class="jinv--info_set"><span>Job Offered:</span> <span class="jinv-con--job_offered">Sales Director</span></p>
						<p class="jinv--info_set"><span>Salary:</span> <span class="jinv-con--salary">Negotiable</span></p>
						<p class="jinv--info_set"><span>Schedule Interview:</span> <span class="jinv-con--schedule_interview">Pending</span></p>
						<p class="jinv--info_set">
							<span>Job Responsibilities:</span><br>
							<span class="jinv-con--job_responsibilities">Sales Director is responsible for successfully planning, recruiting, training, coaching and executing creative strategies to meet sales targets.</span>
						</p>
					</div>

					<div class="col-xs-12 jinv--set-separator"><hr></div>
				</div>
			</div>

			<!-- ACCEPTED -->
			<div class="jinv--whole_set">
				<div class="title--variant-1 clearfix">ACCEPTED <a href="#" class="pull-right red-btn--view_all">View All</a></div>

				<div class="row">
					<div class="col-sm-3">
						<div class="jinv--image_up" style="background-image: url('http://preskubbs.com/wwj2/skubbswp/wp-content/uploads/2017/02/bbq-house-logo.jpg');">
						</div>
						<div class="jinv--btn_set">
							<a href="#" class="jinv--chat_btn">Chat</a>
							<a href="#" class="jinv--reject_btn">Reject</a>
						</div>

						<div class="jinv--interview_date_active">
							<span>Inteview Date:</span><br>
							<strong>Feb 10, 2016</strong>
						</div>
					</div>
					<div class="col-sm-9">
						<p class="jinv--info_set"><span>Company Name:</span> <span class="jinv-con--comp_name">BBQ HOUSE</span></p>
						<p class="jinv--info_set"><span>Job Offered:</span> <span class="jinv-con--job_offered">SALES AND MARKETING ASSOCIATE</span></p>
						<p class="jinv--info_set"><span>Salary:</span> <span class="jinv-con--salary">Negotiable</span></p>
						<p class="jinv--info_set"><span>Schedule Interview:</span> <span class="jinv-con--schedule_interview">Feb 10, 2016</span></p>
						<p class="jinv--info_set">
							<span>Job Responsibilities:</span><br>
							<span class="jinv-con--job_responsibilities">Assist in all related booking activities, making each event efficient and effective to the guest’s delight, focusing on the brand experience and customer service.</span>
						</p>
					</div>
					<div class="col-xs-12 jinv--set-separator"><hr></div>
				</div>

				<div class="row">
					<div class="col-sm-3">
						<div class="jinv--image_up" style="background-image: url('http://preskubbs.com/wwj2/skubbswp/wp-content/uploads/2017/02/bbq-house-logo.jpg');">
						</div>
						<div class="jinv--btn_set">
							<a href="#" class="jinv--chat_btn">Chat</a>
							<a href="#" class="jinv--reject_btn">Reject</a>
						</div>

						<div class="jinv--interview_date_inactive">
							<a href="#">Accept Interview Date</a>
						</div>
					</div>
					<div class="col-sm-9">
						<p class="jinv--info_set"><span>Company Name:</span> <span class="jinv-con--comp_name">BBQ HOUSE</span></p>
						<p class="jinv--info_set"><span>Job Offered:</span> <span class="jinv-con--job_offered">SALES AND MARKETING ASSOCIATE</span></p>
						<p class="jinv--info_set"><span>Salary:</span> <span class="jinv-con--salary">Negotiable</span></p>
						<p class="jinv--info_set"><span>Schedule Interview:</span> <span class="jinv-con--schedule_interview">Feb 10, 2016</span></p>
						<p class="jinv--info_set">
							<span>Job Responsibilities:</span><br>
							<span class="jinv-con--job_responsibilities">Assist in all related booking activities, making each event efficient and effective to the guest’s delight, focusing on the brand experience and customer service.</span>
						</p>
					</div>
					<div class="col-xs-12 jinv--set-separator"><hr></div>
				</div>
			</div>

			<!-- REJECTED -->
			<div class="jinv--whole_set jinv--trash_a_data">
				<div class="title--variant-1">REJECTED</div>

				<div class="row">
					<a href="#" class="jinv--trash_button"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
					<div class="col-sm-3">
						<div class="jinv--image_up" style="background-image: url('http://preskubbs.com/wwj2/skubbswp/wp-content/uploads/2017/02/bbq-house-logo.jpg');">
						</div>
					</div>
					<div class="col-sm-9">
						<p class="jinv--info_set"><span>Company Name:</span> <span class="jinv-con--comp_name">BBQ HOUSE</span></p>
						<p class="jinv--info_set"><span>Job Offered:</span> <span class="jinv-con--job_offered">SALES AND MARKETING ASSOCIATE</span></p>
						<p class="jinv--info_set"><span>Salary:</span> <span class="jinv-con--salary">Negotiable</span></p>
						<p class="jinv--info_set"><span>Schedule Interview:</span> <span class="jinv-con--schedule_interview">Feb 10, 2016</span></p>
						<p class="jinv--info_set">
							<span>Job Responsibilities:</span><br>
							<span class="jinv-con--job_responsibilities">Assist in all related booking activities, making each event efficient and effective to the guest’s delight, focusing on the brand experience and customer service.</span>
						</p>
					</div>
					<div class="col-xs-12 jinv--set-separator"><hr></div>
				</div>
			</div>
		</div>

	</div>
	
<?php
return ob_get_clean();
}
add_shortcode( 'job_invitaion_view', 'job_invitation_func' );