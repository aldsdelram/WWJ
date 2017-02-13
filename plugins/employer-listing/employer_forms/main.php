<?php

include( 'step1.php' ); 
include( 'step2.php' ); 
include( 'step3.php' ); 
include( 'modals.php' ); 


	function employer_regform_func( $atts ) {
		$default_atts = array(
			'step' 	=> 1
		);

		extract( shortcode_atts( $default_atts, $atts ) );
		ob_start();
		?>

		<div class="help-button">
			<i class="fa fa-question-circle" aria-hidden="true" data-modal="help_modal_container"></i>
			<span class="bg-circle"></span>
		</div>

		<div id="employer-reg-form" class="btsp-container-fluid white-bg-views">

			<div class="employer-reg-form-header">
				<div class="erf--step_states clearfix">
					<div class="erf--ss_1<?= ( in_array( $step, array( 1, 2, 3 ) ) ) ? ' ss_active' : '' ?>">
						<div class="ss_circle_set">
							<div class="ss_circle">
								<img src="<?= plugins_url() . '/employer-listing/img/ss-step-1.png' ?>" alt="">
							</div>
							<p>BASIC INFORMATION</p>
						</div>
					</div>

					<div class="erf--ss_2<?= ( in_array( $step, array( 2, 3 ) ) ) ? ' ss_active' : '' ?>">
						<div class="ss_circle_set">
							<div class="ss_circle">
								<img src="<?= plugins_url() . '/employer-listing/img/ss-step-2.png' ?>" alt="">
							</div>
							<p>WORK ENVIRONMENT</p>
						</div>
					</div>

					<div class="erf--ss_3<?= ( $step == 3 ) ? ' ss_active' : '' ?>">
						<div class="ss_circle_set">
							<div class="ss_circle">
								<img src="<?= plugins_url() . '/employer-listing/img/ss-step-3.png' ?>" alt="">
							</div>
							<p>WHY JOIN US</p>
						</div>
					</div>
				</div>
			</div>

			<div class="employer-reg-form-content">

				<form action="" method="POST" id="employer<?= $step ?>" class="testform" enctype="multipart/form-data">
					<div class="form-container">
						<?php if ( $step == 1 ): ?>
							<?= employer_reg_show_step_1(); ?>
						<?php elseif ( $step == 2 ): ?>
 							<?= employer_reg_show_step_2(); ?>
						<?php else: ?>
							<?= employer_reg_show_step_3(); ?>
						<?php endif ?>
					</div> <!-- end of .form-container -->
				</form>

			</div>
			
		</div>

		<?= employer_help_button_modal(); ?>

	<?php
		return ob_get_clean();
	}
	add_shortcode( 'employer-reg-form', 'employer_regform_func' );
	// [employer-reg-form step=""]
	

	function employer_success_form_func( $atts ) {
		$default_atts = array(
			'step' 	=> 3
		);

		extract( shortcode_atts( $default_atts, $atts ) );
		ob_start();
		?>

		<div class="help-button">
			<i class="fa fa-question-circle" aria-hidden="true" data-modal="help_modal_container"></i>
			<span class="bg-circle"></span>
		</div>

		<div id="employer-reg-form" class="btsp-container-fluid white-bg-views">

			<div class="employer-reg-form-header">
				<div class="erf--step_states clearfix">
					<div class="erf--ss_1<?= ( in_array( $step, array( 1, 2, 3 ) ) ) ? ' ss_active' : '' ?>">
						<div class="ss_circle_set">
							<div class="ss_circle">
								<img src="<?= plugins_url() . '/employer-listing/img/ss-step-1.png' ?>" alt="">
							</div>
							<p>BASIC INFORMATION</p>
						</div>
					</div>

					<div class="erf--ss_2<?= ( in_array( $step, array( 2, 3 ) ) ) ? ' ss_active' : '' ?>">
						<div class="ss_circle_set">
							<div class="ss_circle">
								<img src="<?= plugins_url() . '/employer-listing/img/ss-step-2.png' ?>" alt="">
							</div>
							<p>WORK ENVIRONMENT</p>
						</div>
					</div>

					<div class="erf--ss_3<?= ( $step == 3 ) ? ' ss_active' : '' ?>">
						<div class="ss_circle_set">
							<div class="ss_circle">
								<img src="<?= plugins_url() . '/employer-listing/img/ss-step-3.png' ?>" alt="">
							</div>
							<p>WHY JOIN US</p>
						</div>
					</div>
				</div>
			</div>

			<div class="employer-reg-form-content">

				<form action="" method="POST" id="employer<?= $step ?>" class="testform" enctype="multipart/form-data">
					<div class="form-container">
						<?= employer_reg_show_step_3(); ?>
					</div> <!-- end of .form-container -->
				</form>



			</div>
			
		</div>
		<?= emp_success_modal()?>
		<?= employer_help_button_modal(); ?>

	<?php
		return ob_get_clean();
	}
	add_shortcode( 'employer-success-form', 'employer_success_form_func' );
	// [employer-reg-form step=""]
	

