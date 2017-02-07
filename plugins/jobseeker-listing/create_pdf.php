<?php
include("mpdf/mpdf.php");

function createContent(){

	/**
	 * @lastreview 01182017-alds-address-nationality-pending 
	 */

	include('profile/info.inc');
	set_info();
	ob_start()?>
	<style>
		.triangle_rect_box{
			background-image: url('var:triangle_box');
			background-size: contain;
			position: relative;
			width: 59.15mm;
			height: 10.12mm;
			font-size: 14pt;
			color: #fff;
			text-align: center;
			text-transform: uppercase;
			padding-top: 2.23mm;
		}

		.rating{
			/*background-image: url('var:white_circle');*/
		}
	</style>

	<html>
		<div class="left">
			<div class="display_picture" style="background-image: url(<?=wp_get_attachment_url($step1['photo_base_64']) ?>);"></div>


			<h1 class="heading-v-3"> notice period </h1>
			<p class="left_details"><?= $availability ?></p>


			<h1 class="heading-v-3"> desired salary </h1>
			<p class="left_details"><?= wc_price(10) ?></p>

			<h1 class="heading-v-3"> personal </h1>
				<div class="columns_2">
					<div class="col_2_left">Name</div>
					<div class="col_2_right"><?= $firstname . ' ' . $lastname?></div>
				</div>

				<div class="columns_2">
					<div class="col_2_left">Birthday</div>
					<div class="col_2_right"><?= $bday->format('d M Y')?></div>
				</div>

				<div class="columns_2">
					<div class="col_2_left">Nationality</div>
					<div class="col_2_right">Pending</div>
				</div>
	
			<h1 class="heading-v-3"> contact </h1>
				<div class="columns_2">
					<div class="col_2_left">Address</div>
					<div class="col_2_right">BLK 22 Pasir Ris Dr 4 #04-136 (S) 510224</div>
				</div>
	
				<div class="columns_2">
					<div class="col_2_left">Mobile</div>
					<div class="col_2_right"><?= WWJ::formatContactNumber($contact) ?></div>
				</div>

				<div class="columns_2">
					<div class="col_2_left">Email</div>
					<div class="col_2_right"><?= $email_address?></div>
				</div>

			<h1 class="heading-v-3"> links </h1>
				<div class="link_column">
					<div class="link_col_left"><img src="<?= wp_get_attachment_url(307) ?>"></div>
					<div class="link_col_right"><a href="<?= $linkedin ?>">Click here to view profile</a></div>
				</div>

			<h1 class="heading-v-3"> SKILLS PROFICIENCY </h1>
				<!--div class="skill_column main">
					<div class="skill_col_left"></div>
					<div class="skill_col_right"><p class="rating">5</p></div>
				</div-->
				<?php foreach($skills as $skill): ?>
					<div class="skill_column">
						<div class="skill_col_left"><?= $skill['name'] ?></div>
						<div class="skill_col_right"><p class="rating"><?= $skill['rating']?></p></div>
					</div>
				<?php endforeach; ?>

			<h1 class="heading-v-3"> language PROFICIENCY </h1>

				<?php foreach($languages as $language): ?>
					<div class="skill_column">
						<div class="skill_col_left"><?= $language['name'] ?></div>
						<div class="skill_col_right"><p class="rating"><?= $language['rating']?></p></div>
					</div>
				<?php endforeach; ?>

			<h1 class="heading-v-3"> more about me </h1>
			<ul class="more-details">
				<li><?= $about_me?></li>
			</ul>

		</div>

		<div class="right">
			<!--h1 class="heading-v-1"> personal statement </h1>
			<p>
				An experienced professional; known for my enthusiasm, dedication and exceptional work ethic. Work well under pressure and tight deadlines. Positive personality influences and drives team to give their best efforts in projects.
			</p-->

			<h1 class="heading-v-1"> career objective </h1>
			<p>
				<?= $career_objective ?>
			</p>
			<p></p>
			<h1 class="heading-v-1"> career highlights </h1>


			<?php foreach($work_experiences as $work_experience): ?>

			<div class="container-v-1">
				<div class="col-1">
					<div class="triangle_rect_box">
						<?= getMonthName($work_experience['start_month']).' '.$work_experience['start_year'].
	                                        ' - '.
                            getMonthName($work_experience['end_month']).' '.$work_experience['end_year'];
                        ?>
					</div>
				</div>
				<div class="col-2">
					<div class="redcircle"></div>
					<h1 class="heading-v-2"><?= $work_experience['job'] ?></h1>
					<p class="company_name"><?= $work_experience['company_name'] ?></p>
					<ul class="task_details">
						<li><?= $work_experience['key_task']?></li>
					</ul>
				</div>
				<div class="clearfix"></div>	
			</div>
			<?php endforeach; ?>
			
			<h1 class="heading-v-1"> education </h1>

			<div class="container-v-1">
				<div class="col-1">
					<div class="triangle_rect_box"><?= $school_s_year .' - '. $school_e_year?></div>
				</div>
				<div class="col-2">
					<div class="redcircle"></div>
					<h1 class="heading-v-2"><?= $tertiary ?> in <?= $course ?></h1>
					<!--p class="company_name">Singapore Management University, School of Business</p-->
				</div>
				<div class="clearfix"></div>	
			</div>


			<h1 class="heading-v-1"> awards leadership </h1>

			<?php foreach($certificates as $cert): ?>
			<div class="container-v-1">
				<div class="col-1">
					<div class="triangle_rect_box"><?= $cert['year']?></div>
				</div>
				<div class="col-2">
					<div class="redcircle"></div>
					<h1 class="heading-v-2"><?= $cert['award']?></h1>
					<p class="company_name"><?= $cert['body_corporate']?></p>
					<?php if($cert['image'] != null):?>
						<img src="<?= wp_get_attachment_url($cert['image'])?>" style="height:30mm;"/>
					<?php endif; ?>
				</div>
				<div class="clearfix"></div>	
			</div>
			<?php endforeach ?>

			<h1 class="heading-v-1"> references </h1>

			<?php if($verification): ?>
				<?php foreach($verification as $key => $ver): ?>
					<?php foreach ($ver['firstname'] as $k => $v): ?>
					<div class="container-v-2">
						<!--div class="ref_image" style="background-image:url('<?= plugin_dir_url( __FILE__  ).'img/sugat.png'?>');"></div-->
						<div class="ref_image" style="background-image:url('<?= wp_get_attachment_url(308) ?>');"></div>
						<div class="ref_details">
							<p>
								<span class="ref_name"><strong><?= $v ?></strong></span><br/>
								<span class="ref_spanosition"><!--Manager--><?= $work_experiences[$key]['company_name']?></span><br/>
								<span class="ref_phone"><?= WWJ::formatContactNumber($ver['contact'][$k]);?></span><br/>
								<span><a class="ref_mail" href="mailto:<?= $ver['email'][$k]?>"><?= $ver['email'][$k]?></a></span>
							</p>
						</div>
					</div>
					<?php endforeach; ?>
				<?php endforeach; ?>
			<?php endif; ?>

		</div>

		<div class="logo">
			<a href="<?= home_url() ?>">
				<img src="var:logo" />
			</a>
		</div>


	</html>
	<?php


	return ob_get_clean();
}

function createPDF(){
	ob_clean();



	$mpdf=new mPDF('utf-8', array(459, 882), 0, '', 0, 0, 0, 0, 0, 0);
	$mpdf->showImageErrors = true;
	$stylesheet = file_get_contents(plugin_dir_url( __FILE__  ) .'/css/resume.css');
	$mpdf->WriteHTML($stylesheet,1);

	/*images*/	
		$mpdf->triangle_box = file_get_contents(plugin_dir_url( __FILE__  ).'img/triangle_box.png');
		$mpdf->award_img = file_get_contents(plugin_dir_url( __FILE__  ).'img/netfirst.png');
		$mpdf->logo = file_get_contents(plugin_dir_url( __FILE__  ).'img/logo-white.png');


		// $mpdf->display_picture = file_get_contents(plugin_dir_url( __FILE__  ).'img/aa.png');
		// if($step1['photo_base_64'])
			// $mpdf->display_picture = 'http://preskubbs.com/wwj2/skubbswp/wp-content/uploads/2017/01/DP_Skubbs-Administrator1484291225.png';

	$mpdf->SetTitle('Resume');
	$mpdf->WriteHTML(createContent());
	$mpdf->Output('Resume.pdf', 'I');
	exit;	
}


function show_pdf($atts){
	createPDF();
}
add_shortcode('SHOW_PDF', 'show_pdf');