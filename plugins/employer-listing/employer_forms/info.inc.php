<?php
	$current_user  = get_currentuserinfo();
	$step1 = get_user_meta(get_current_user_id(), 'emp_step1_data', true);
	$step2 = get_user_meta(get_current_user_id(), 'emp_step2_data', true);
	$step3 = get_user_meta(get_current_user_id(), 'emp_step3_data', true);

	$name = $step1['company_info']['name'];
	$industry = $step1['company_info']['industry'];
	$size = $step1['company_info']["size"];
	$website = $step1['company_info']["website"];
	$socials = $step1['company_info']['social'];
	$tel_no = $step1['company_info']["telno"];
	$fax_no = $step1['company_info']["fax"];
	$about_us = $step1['about_us'];
	$address = $step1['location']['address'];
	$postal_code = $step1['location']['postal_code'];
	$cover_photo = $step1['cover_photo'];
	$logo = $step1["logo"];

	$videos = $step2["videos"];
	$services = $step2["services"];
	$team_members = $step2['team_members'];

	$join_us = $step3["join_us"];
	$referrals = $step3['referrals'];