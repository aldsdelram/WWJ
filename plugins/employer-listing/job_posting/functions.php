<?php

	function job_posting_container($title, $content){
		ob_start();
		?>

			<!-- headet title -->
			<div class="btsp-container-fluid gray--header_bg">
			   	<div class="row">
				    <div class="col-xs-12">
				    	<h1 class="gray--header_title"><?= $title?></h1>
				    </div>
			   	</div>
			</div>
			<div class="btsp-container-fluid white-bg-views job_posting--main">
				<div class="row">
					<?= $content?>
				</div>
			</div>
		<?php
		return ob_get_clean();
	}