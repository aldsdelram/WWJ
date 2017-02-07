<?php

function employer_reg_show_step_1(){
	ob_start();
	?>
		<h2 class="emp-form_title">COMPANY INFORMATION</h2>

		<div class="emp-form_group">
			<label for="company-name"><span class="asterisk">*</span> Company Name:</label><br>
			<input type="text" id="company-name">
		</div>

	<?php
	return ob_get_clean();
}