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

	function get_skills(){
		
		$industry_id = $_POST['industry_id'];
		$html = '<li data-value="">Select skill</li>';

		$skills = Job_Listing::getSkills($industry_id); 
		$cand_skills = [];
		$count = count($skills); 

		for($i=0; $i<$count; $i++){
			$html .= '<li data-value="'.$skills[$i]->term_id.'">'.$skills[$i]->name.'</li>';
		}

		$response['html'] = $html;
		echo json_encode($response);
		wp_die();
	}
	add_action('wp_ajax_get_skills', 'get_skills');
	add_action('wp_ajax_nopriv_get_skills', 'get_skills');