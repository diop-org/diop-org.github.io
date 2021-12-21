<?php
//validating
function pandora_options_validator(){
	$_REQUEST['pan_slider_number'] = pandora_i_want_to_be_number($_REQUEST['pan_slider_number'], "0-9", 5, 20);
	$_REQUEST['pan_slider_cat'] = pandora_i_want_to_be_number($_REQUEST['pan_slider_cat'], "0-9", -1, 9999);
	$_REQUEST['pan_news'] = pandora_i_want_to_be_number($_REQUEST['pan_news'], "0-9", 0, 50);
	$_REQUEST['pan_normals'] = pandora_i_want_to_be_number($_REQUEST['pan_normals'], "0-9", 0, 50);
	$_REQUEST['pan_olds'] = pandora_i_want_to_be_number($_REQUEST['pan_olds'], "0-9", 0, 50);
	$_REQUEST['pan_archives'] = pandora_i_want_to_be_number($_REQUEST['pan_archives'], "0-9", 0, 50);
	$_REQUEST['pan_smile'] = esc_url_raw($_REQUEST['pan_smile'], 'http');
		$_REQUEST['pan_smile'] = str_replace("'", '', $_REQUEST['pan_smile']);
	$_REQUEST['pan_favicon'] = esc_url_raw($_REQUEST['pan_favicon'], 'http');
		$_REQUEST['pan_favicon'] = str_replace("'", '', $_REQUEST['pan_favicon']);
	$_REQUEST['pan_page'] = pandora_i_want_to_be_number($_REQUEST['pan_page'], "0-2", 1, 2);
	$_REQUEST['pan_copyright'] = balanceTags($_REQUEST['pan_copyright']);
	$_REQUEST['pan_stats'] = balanceTags($_REQUEST['pan_stats']);
	$_REQUEST['pan_skinner'] = esc_attr($_REQUEST['pan_skinner']);
}

//save
function pandora_save_options(){
	$pandora_admin_settings = array(
		'pan_slider_number' => $_REQUEST['pan_slider_number'],
		'pan_slider_cat' => $_REQUEST['pan_slider_cat'],
		'pan_new_post' => $_REQUEST['pan_news'], 
		'pan_normal_post' => $_REQUEST['pan_normals'], 
		'pan_old_post' => $_REQUEST['pan_olds'], 
		'pan_archive_post' => $_REQUEST['pan_archives'],
		'pan_smile_url' => $_REQUEST['pan_smile'], 
		'pan_custom_favicon' => $_REQUEST['pan_favicon'], 
		'pan_page_style' => $_REQUEST['pan_page'],
		'pan_footer_text' => $_REQUEST['pan_copyright'], 
		'pan_tracking_code' => $_REQUEST['pan_stats'], 
		'pan_skin_name' => $_REQUEST['pan_skinner']		
	);
	return $pandora_admin_settings;
}
?>