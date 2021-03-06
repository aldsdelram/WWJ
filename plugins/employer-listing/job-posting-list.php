<?php

function job_posting_list_page_func() {
ob_start();
?>

	<!-- header title -->
	<div class="btsp-container-fluid gray--header_bg">
		<div class="row">
			<div class="col-xs-12">
				<h1 class="gray--header_title pull-left">Jobs</h1>

			</div>
		</div>
	</div>

	<!-- sorting links -->
	<div class="btsp-container-fluid jpl--sorting_links">
		<div class="row">
			<div class="col-sm-9">
				<ul>
					<li class="sort-active"><a href="#">All (2)</a></li>
					<li><a href="#">Draft (0)</a></li>
					<li><a href="#">Pending (1)</a></li>
					<li><a href="#">Expired (0)</a></li>
				</ul>
			</div>

			<div class="col-sm-3">
				<div class="jpl--search pull-right">
					<label for="job-posting-search"><i class="fa fa-search"></i></label>
					<input type="text" id="job-posting-search" placeholder="Search..">
				</div>
			</div>
		</div>
	</div>

	<!-- main -->
	<div class="btsp-container-fluid white-bg-views jinv--main">
		<!-- 1 -->
		<div class="row jpl--single_set">
			<div class="col-sm-8">
				<div class="jpl--ss_info">
					<h2>Waitress</h2>
					<h4>Posted by: Natalie<br>
					Expiry: Jan 31, 2017</h4>
				</div>
			</div>

			<div class="col-sm-4">
				<div class="jpl--ss_misc">
					<p class="jpl--ss_recommend"><a href="#">1 Recommended</a></p>
					auto repost
					<div class="jpl--repost_switch">
						<input id="cmn-toggle-1" class="cmn-toggle cmn-toggle-round" type="checkbox">
						<label for="cmn-toggle-1"></label>
					</div>
				</div>
			</div>

			<div class="col-sm-12">
				<div class="jpl--ss_stats">
					<span>Viewed: 20</span>
					<span>Applied: 0</span>
					<span>Shortlisted: 0</span>
					<span>Rejected: 0</span>
				</div>
			</div>
		</div>

		<!-- 2 -->
		<div class="row jpl--single_set">
			<div class="col-sm-8">
				<div class="jpl--ss_info">
					<h2>Secretary</h2>
					<h4>Posted by: Natalie<br>
					Expiry: Feb 03, 2017</h4>
				</div>
			</div>

			<div class="col-sm-4">
				<div class="jpl--ss_misc">
					<p class="jpl--ss_recommend"><a href="#">1 Recommended</a></p>
					auto repost
					<div class="jpl--repost_switch">
						<input id="cmn-toggle-2" class="cmn-toggle cmn-toggle-round" type="checkbox">
						<label for="cmn-toggle-2"></label>
					</div>
				</div>
			</div>

			<div class="col-sm-12">
				<div class="jpl--ss_stats">
					<span>Viewed: 20</span>
					<span>Applied: 0</span>
					<span>Shortlisted: 0</span>
					<span>Rejected: 0</span>
				</div>
			</div>
		</div>

		<!-- pagination -->
		<div class="row">
			<div class="col-xs-12">
				<div class="jpl--paginator">
					<span>per page</span>
					<ul>
						<li class="active-paginator"><a href="#">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#"><i class="fa fa-chevron-right"></i></a></li>
					</ul>
				</div> 
			</div>
		</div>
	</div>
	

<?php
return ob_get_clean();
}
add_shortcode( 'job_post_listing_page', 'job_posting_list_page_func' );