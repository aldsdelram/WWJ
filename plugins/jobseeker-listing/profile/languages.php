<?php

function view_languages_content(){
	include( 'info.inc');
	if(is_user_logged_in()){
		set_info();
	}

	ob_start();
	?>
		<div class="btsp-container-fluid white-bg-views experience-view--main_content">
			<?php for($i=1; $i<=5; $i++): ?>

				<?php $lang_contents = ''; ?>

				<?php foreach($languages as $language): ?>
					<?php if($language['rating'] == $i): ?>
						<?php $lang_contents .= '<span class="ev--skill_box">' . ucfirst($language['name']) . '</span>'; ?>
					<?php endif; ?>
				<?php endforeach; ?>

				<div class="row">
					<div class="col-xs-12 col-md-4">
						<?php if($lang_contents) : ?>
							<?= WWJ::getRatingDescription($i); ?>
						<?php endif; ?>
					</div>
					<div class="col-xs-12 col-md-8">
						<?= $lang_contents; ?>
					</div>
				</div>
			<?php endfor; ?>
		</div>
	<?php
	return ob_get_clean();
}


function edit_languages_content(){
	include( 'info.inc');
	if(is_user_logged_in()){
		set_info();
	}


	// var_dump($languages);
	// echo "<br/>===========================<br/>";
	// var_dump($step3);

	if(isset($_REQUEST['save'])){
		$new_data= $_REQUEST;
		$the_step3_data = $step3;

		if($step3 == null)
			$the_step3_data = [];

		$ignore = [
			'o_proficiency',
			'save'
		];

		foreach ($new_data as $k => $value) {
			if(in_array($k, $ignore))
				continue;
			$the_step3_data[$k] = $value;
		}

		update_user_meta(get_current_user_id(), 'step3_data', $the_step3_data);
		wp_redirect(home_url('/jobseeker/dashboard/profile/view/others/'));
		exit;
	}

	$cancelLink = home_url('/jobseeker/dashboard/profile/view/others/');

	ob_start();
	?>
		<div class="btsp-container-fluid white-bg-views experience-view--main_content">
			<form action="" method="POST" id="language_edit" enctype="multipart/form-data">

				<div class="checkbox-group language-items">
					<ul>
						<li class="language-item rd-row rd-between-xs rd-top-xs">
							<div class="rd-col-md-4 rd-col-xs-12">
								<input type="checkbox" name="language[0]" id="english" value="english" <?php if($step3['language'][0]) echo "data-checked='true'"; ?>>
								<label for="english">English</label>
							</div>
							<div class="rd-col-md-8 rd-col-xs-12">
								<div class="form-group">
									<div class="dropdown-input language-show" style="display: none;">
										<input type="text" name="proficiency[0]" class="dropdown-data input-field" placeholder="Proficiency" <?php if($step3['proficiency'][0]){ echo "data-fvalue=\"".$step3['proficiency'][0].' - '.WWJ::getRatingDescription($step3['proficiency'][0])."\" "; echo "data-value='".$step3['proficiency'][0]."' ";  }?>/>
										<ul>
											<?php for($j= 1; $j<= 5; $j++): ?>
												<li data-value="<?= $j ?>"><?= $j ?> - <?= WWJ::getRatingDescription($j); ?></li>
											<?php endfor; ?>
										</ul>
									</div>
								</div>
							</div>
						</li>
						<li class="language-item rd-row rd-between-xs rd-top-xs">
							<div class="rd-col-md-4 rd-col-xs-12">
								<input type="checkbox" name="language[1]" id="mandarin" value="mandarin" <?php if($step3['language'][1]) echo "data-checked='true'"; ?>/>
								<label for="mandarin">Mandarin</label>
							</div>
							<div class="rd-col-md-8 rd-col-xs-12">
								<div class="form-group">
									<div class="dropdown-input language-show" style="display: none;">
										<input type="text" name="proficiency[1]" class="dropdown-data input-field" placeholder="Proficiency" <?php if($step3['proficiency'][1]){ echo "data-fvalue=\"".$step3['proficiency'][1].' - '.WWJ::getRatingDescription($step3['proficiency'][1])."\" "; echo "data-value='".$step3['proficiency'][1]."' ";  }?>/>
										<ul>
											<?php for($j= 1; $j<= 5; $j++): ?>
												<li data-value="<?= $j ?>"><?= $j ?> - <?= WWJ::getRatingDescription($j); ?></li>
											<?php endfor; ?>
										</ul>
									</div>
								</div>
							</div>
						</li>
						<li class="language-item rd-row rd-between-xs rd-top-xs">
							<div class="rd-col-md-4 rd-col-xs-12">
								<input type="checkbox" name="language[2]" id="tamil" value="tamil" <?php if($step3['language'][2]) echo "data-checked='true'"; ?>/>
								<label for="tamil">Tamil</label>
							</div>
							<div class="rd-col-md-8 rd-col-xs-12">
								<div class="form-group">
									<div class="dropdown-input language-show" style="display: none;">
										<input type="text" name="proficiency[2]" class="dropdown-data input-field" placeholder="Proficiency" <?php if($step3['proficiency'][2]){ echo "data-fvalue=\"".$step3['proficiency'][2].' - '.WWJ::getRatingDescription($step3['proficiency'][2])."\" "; echo "data-value='".$step3['proficiency'][2]."' ";  }?>/>
										<ul>
											<?php for($j= 1; $j<= 5; $j++): ?>
												<li data-value="<?= $j ?>"><?= $j ?> - <?= WWJ::getRatingDescription($j); ?></li>
											<?php endfor; ?>
										</ul>
									</div>
								</div>
							</div>
						</li>
						<li class="language-item rd-row rd-between-xs rd-top-xs">
							<div class="rd-col-md-4 rd-col-xs-12">
								<input type="checkbox" name="language[3]" id="malay" value="malay" <?php if($step3['language'][3]) echo "data-checked='true'"; ?>/>
								<label for="malay">Malay</label>
							</div>
							<div class="rd-col-md-8 rd-col-xs-12">
								<div class="form-group">
									<div class="dropdown-input language-show" style="display: none;">
										<input type="text" name="proficiency[3]" class="dropdown-data input-field" placeholder="Proficiency" <?php if($step3['proficiency'][3]){ echo "data-fvalue=\"".$step3['proficiency'][3].' - '.WWJ::getRatingDescription($step3['proficiency'][3])."\" "; echo "data-value='".$step3['proficiency'][3]."' ";  }?>/>
										<ul>
											<?php for($j= 1; $j<= 5; $j++): ?>
												<li data-value="<?= $j ?>"><?= $j ?> - <?= WWJ::getRatingDescription($j); ?></li>
											<?php endfor; ?>
										</ul>
									</div>
								</div>
							</div>
						</li>
						<li class="language-item rd-row rd-between-xs rd-top-xs">
							<div class="rd-col-md-4 rd-col-xs-12">
								<input type="checkbox" name="other_language" id="other_language" <?php if($step3['language'][4]) echo "data-checked='true'"; ?>/>
								<label for="other_language">Other</label>
							</div>
							<div class="rd-col-md-8 rd-col-xs-12">
								<div class="form-group">
									<div class="dropdown-input language-show" style="display: none;">
										<input type="text" name="proficiency[4]" class="dropdown-data input-field" placeholder="Proficiency" <?php if($step3['proficiency'][4]){ echo "data-fvalue=\"".$step3['proficiency'][4].' - '.WWJ::getRatingDescription($step3['proficiency'][4])."\" "; echo "data-value='".$step3['proficiency'][4]."' ";  }?>/>
										<ul>
											<?php for($j= 1; $j<= 5; $j++): ?>
												<li data-value="<?= $j ?>"><?= $j ?> - <?= WWJ::getRatingDescription($j); ?></li>
											<?php endfor; ?>
										</ul>
									</div>
								</div>
							</div>
							<div class="resume-content" style="width: 100%;padding: 0;padding-top: 10px;">
								<div class="form-group">
									<input name="language[4]" class="input-field other_language_field" type="text" placeholder="Input your language" <?php if($step3['language'][4]) echo "value='".$step3['language'][4]."'"; ?>></input>
								</div>
							</div>
						</li>
					</ul>
				</div>

				<div class="row">
					<div class="col-xs-12">
						<div class="form-d-group">
							<input type="submit" value="Save" class="save-btn-variant-1" name="save">
							<a href="<?= $cancelLink ?>" class="cancel-btn-variant-1">Cancel</a>
						</div>
					</div>
				</div>

			</form>
		</div>
	<?php
	return ob_get_clean();
}