<?php

function save_the_data_of_form(){
	$post_data = $_REQUEST;
	if(isset($post_data['submit_1'])){
		$step1_data = [];
		foreach ($post_data as $key => $value) {
			if($key != 'photo_base_64'){
				$step1_data[$key] = $value;
			}
		}
		if(isset($post_data['photo_base_64'])){
			if($post_data['photo_base_64'] !=null){
				$attachment = upload_photo($post_data['photo_base_64']);

				$step1_data_meta = get_user_meta(get_current_user_id(), 'step1_data', true);
				if($step1_data_meta){
					if($step1_data_meta['photo_base_64']){
						wp_delete_attachment( $step1_data_meta['photo_base_64'], true );
					}
				}
				$step1_data['photo_base_64'] = $attachment['ID'];
			}
			else
				$step1_data['photo_base_64'] = '';
		}
		update_user_meta(get_current_user_id(), 'step1_data', $step1_data);
		wp_redirect(home_url('/jobseeker/dashboard/resume/step02'));
		exit;
	} 

	if(isset($post_data['submit_2'])){
		$step2_data = [];
		foreach ($post_data as $key => $value) {
			if($key != 'submit_2'){
				$step2_data[$key] = $value;
			}
		}
		update_user_meta(get_current_user_id(), 'step2_data', $step2_data);
		wp_redirect(home_url('/jobseeker/dashboard/resume/step03'));
		exit;
	} 

	if(isset($post_data['submit_3'])){
		$step3_data = [];

		foreach ($post_data as $key => $value) {
			if($key == 'skills'){
				$step3_data[$key] = $value;

				$ratings = [];
				foreach($post_data['skills'] as $value){
					$ratings[$value] = $post_data['rating'][$value];
				}

				$step3_data['ratings'] = $ratings;
				continue;
			}
			elseif($key == 'cert_image'){
				$step3_data_meta = get_user_meta(get_current_user_id(), 'step3_data', true);
				if($step3_data_meta){
					if($step3_data_meta['cert_images']){
						foreach($step3_data_meta['cert_images'] as $cert_image_id){
							wp_delete_attachment( $cert_image_id, true );
						}
					}
				}
				$cert_image_id = [];
				foreach($post_data['cert_image'] as $cert_image){
					if($cert_image != null){
						$attachment = upload_photo($cert_image);
						$cert_image_id[] = $attachment['ID'];
					}
					else
						$cert_image_id[] = '';
				}
				$step3_data['cert_images'] = $cert_image_id;
				continue;
			}
			else{
				if($key == 'o_rating' || $key == 'rating')
					continue;
				else{
					$step3_data[$key] = $value;
				}
			}
		}

		update_user_meta(get_current_user_id(), 'step3_data', $step3_data);
		wp_redirect(home_url('/jobseeker/dashboard/resume/success'));
		exit;

	}
}

		
function getFileType($base64image){
	if (strpos($base64image, 'data:image/png;base64,') !== false) {
	    return 'png';
	}
	if (strpos($base64image, 'data:image/jpeg;base64,') !== false) {
	    return 'jpg';
	}
	if (strpos($base64image, 'data:image/jpg;base64,') !== false) {
	    return 'jpg';
	}
}


function upload_photo($base64image){
	$upload_dir       = wp_upload_dir();
	$upload_path      = str_replace( '/', DIRECTORY_SEPARATOR, $upload_dir['path'] ) . DIRECTORY_SEPARATOR;

	$img = $base64image;
	$b64 = $base64image;


	$img = str_replace('data:image/png;base64,', '', $img);
	$img = str_replace('data:image/jpeg;base64,', '', $img);
	$img = str_replace('data:image/jpg;base64,', '', $img);
	$img = str_replace(' ', '+', $img);
	$decoded          = base64_decode($img) ;

	$date = new DateTime();

	$filetype='.png';

	$the_type = 'image/png';
	if(isset($_FILES['profile_picture']))
	{
		if($_FILES['[profile_picture']['type'] == 'image/jpeg' || $_FILES['[profile_picture']['type'] == 'image/jpg'){
				$filetype = '.jpg';
				$the_type = $_FILES['[profile_picture']['type'];
		}
	}

	$the_type = 'image/'.getFileType($base64image);
	$filetype = '.'.getFileType($base64image);

	$userfullname = WWJ::getUserFullName();
	$filename         = "Portal_".$userfullname.$date->getTimestamp().$filetype;
	// $hashed_filename  = md5( $filename . microtime() ) . '_' . $filename;
	// $image_upload     = file_put_contents( $upload_path . $hashed_filename, $decoded );
	$image_upload     = file_put_contents( $upload_path . $filename, $decoded );

	//HANDLE UPLOADED FILE
	if( !function_exists( 'wp_handle_sideload' ) ) {
	  require_once( ABSPATH . 'wp-admin/includes/file.php' );
	}

	// Without that I'm getting a debug error!?
	if( !function_exists( 'wp_get_current_user' ) ) {
	  require_once( ABSPATH . 'wp-includes/pluggable.php' );
	}

	// @new
	$file             = array();
	$file['error']    = '';
	// $file['tmp_name'] = $upload_path . $hashed_filename;
	$file['tmp_name'] = $upload_path . $filename;
	$file['name']     = $hashed_filename;
	$file['name']     = $filename;
	$file['type']     = $the_type;
	// $file['size']     = filesize( $upload_path . $hashed_filename );
	$file['size']     = filesize( $upload_path . $filename );

	// upload file to server
	// @new use $file instead of $image_upload
	$file_return      = wp_handle_sideload( $file, array( 'test_form' => false ) );

	$filename = $file_return['file'];
	$attachment = array(
	 'post_mime_type' => $file_return['type'],
	 'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename)),
	 'post_content' => '',
	 'post_status' => 'inherit',
	 'guid' => $wp_upload_dir['url'] . '/' . basename($filename)
	 );
	$attach_id = wp_insert_attachment( $attachment, $filename, get_current_user_id() );
	require_once(ABSPATH . 'wp-admin/includes/image.php');
	$attach_data = wp_generate_attachment_metadata( $attach_id, $filename );
	wp_update_attachment_metadata( $attach_id, $attach_data );
	$output = array(
	  'URL' => wp_get_attachment_url($attach_id),
	  'ID' => $attach_id,
	);


	return $output;
}