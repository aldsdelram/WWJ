<?php
	include( 'step1.php'); 
	include( 'step2.php'); 
	include( 'step3.php'); 
	include( 'modals.php'); 
	include( 'functions.php'); 

	function resume_form_func( $atts ) {
		$default_atts = array(
			'step' 	=> 1,
			'page' 	=> 'first'
		);

		extract( shortcode_atts( $default_atts, $atts ) );
		ob_start();
		?>

		<?php 
			save_the_data_of_form();
		?>

		<div id="resume-form">
			<div class="resume-header">
				<ul class="resume-steps">
					<li class="steps <?= ( in_array( $step, array( 1, 2, 3 ) ) ) ? 'active' : '' ?>">
						<div class="icon"><img src="<?= home_url( 'skubbswp/wp-content/uploads/2017/01/icon-step01.png' ); ?>" /></div>
						<label for="step01">About Me</label>
					</li>
					<li class="steps <?= ( in_array( $step, array( 2, 3 ) ) ) ? 'active' : '' ?>">
						<div class="icon"><img src="<?= home_url( 'skubbswp/wp-content/uploads/2017/01/icon-step02.png' ); ?>" /></div>
						<label for="step02">Availability &amp; Experience</label>
					</li>
					<li class="steps <?= ( $step == 3 ) ? 'active' : '' ?>">
						<div class="icon"><img src="<?= home_url( 'skubbswp/wp-content/uploads/2017/01/icon-step03.png' ); ?>" /></div>
						<label for="step03">Skills &amp; Others</label>
					</li>
				</ul>
				<div class="steps-title">
					<?php
						$step_title = array(
							1 => 'Tell Us More About Yourself',
							2 => 'Share Your Experience and Availability',
							3 => 'Add Skills and Other Achievement to Complete Your Profile'
						);
					?>
					<h3><?= $step_title[ $step ] ?></h3>
				</div>
			</div> <!-- end of .resume-header -->
			<div class="resume-content">
				<form action="" method="POST" id="resume<?= $step ?>" class="testform" enctype="multipart/form-data">
					<div class="form-container">
						<?php if ( $step == 2 ): ?>
							<?= show_step_2(); ?>
						<?php elseif ( $step == 3 ): ?>
 							<?= show_step_3(); ?>
						<?php else: ?>
							<?= show_step_1(); ?>
						<?php endif ?>
					</div> <!-- end of .form-container -->
					<div class="btn-panel rd-row rd-middle-xs rd-center-xs">
						<?php if ( $step != 1 ): ?>
							<a href="#">Back</a>
						<?php endif ?>
						<input type="submit" name="submit_<?=$step?>" value="<?= ( $page == 'last' ) ? 'Submit' : 'Next' ?>" />
					</div>
				</form>
			</div> <!-- end of .resume-content -->
		</div> <!-- end of #resume-form -->

		<?= image_capture_modal(); ?>
		<?= add_workplace_modal(); ?>
		<?= workplace_verification_modal(); ?>

	<?php
		return ob_get_clean();
	}
	add_shortcode( 'resume_form', 'resume_form_func' );


	function success_page(){
		$default_atts = array(
			'step' 	=> 3,
			'page' 	=> 'last'
		);

		extract( shortcode_atts( $default_atts, $atts ) );
		ob_start();
		?>
		<div id="resume-form">
			<div class="resume-header">
				<ul class="resume-steps">
					<li class="steps <?= ( in_array( $step, array( 1, 2, 3 ) ) ) ? 'active' : '' ?>">
						<div class="icon"><img src="<?= home_url( 'skubbswp/wp-content/uploads/2017/01/icon-step01.png' ); ?>" /></div>
						<label for="step01">About Me</label>
					</li>
					<li class="steps <?= ( in_array( $step, array( 2, 3 ) ) ) ? 'active' : '' ?>">
						<div class="icon"><img src="<?= home_url( 'skubbswp/wp-content/uploads/2017/01/icon-step02.png' ); ?>" /></div>
						<label for="step02">Availability &amp; Experience</label>
					</li>
					<li class="steps <?= ( $step == 3 ) ? 'active' : '' ?>">
						<div class="icon"><img src="<?= home_url( 'skubbswp/wp-content/uploads/2017/01/icon-step03.png' ); ?>" /></div>
						<label for="step03">Skills &amp; Others</label>
					</li>
				</ul>
				<div class="steps-title">
					<?php
						$step_title = array(
							1 => 'Tell Us More About Yourself',
							2 => 'Share Your Experience and Availability',
							3 => 'Add Skills and Other Achievement to Complete Your Profile'
						);
					?>
					<h3><?= $step_title[ $step ] ?></h3>
				</div>
			</div> <!-- end of .resume-header -->
			<div class="resume-content">
				<form action="" method="POST" id="resume<?= $step ?>" class="testform" enctype="multipart/form-data">
					<div class="form-container">
						<?= show_step_3();?>
					</div>
				</form>
			</div>
		</div>

		<?= success_modal() ?>
		<?php return ob_get_clean();
	}
	add_shortcode( 'resume_success', 'success_page' );
