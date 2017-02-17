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

	<div class="btsp-container-fluid jpl--sorting_links">
		<div class="row">
			<div class="col-xs-12">
				<ul>
					<li>All (2)</li>
					<li>Draft (0)</li>
					<li>Pending (1)</li>
					<li>Expired (0)</li>
				</ul>

				<div class="jpl--search">
					
					<input type="text">
				</div>
			</div>
		</div>
	</div>

	<div class="btsp-container-fluid white-bg-views jinv--main">
	</div>

<?php
return ob_get_clean();
}
add_shortcode( 'job_post_listing_page', 'job_posting_list_page_func' );