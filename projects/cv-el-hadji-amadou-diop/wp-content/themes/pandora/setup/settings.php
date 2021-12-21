<?php
function pandora_get_options(){
	return get_option('pandora_settings');
}
$pandora_options = pandora_get_options();
$pandora_siteurl = get_site_url();

//install -----------------------------------------------------------
//for non-installed and for theme preview or not-changed theme
if (!isset($pandora_options['pan_slider_number'])){
	$pandora_options = pandora_preview_options();
	update_option('pandora_settings',$pandora_options);
}

function pandora_my_version(){
	global $pandora_options;
	if (isset($pandora_options['pan_version_number'])){
		return $pandora_options['pan_version_number'];
	}
	return "1.3.2";
}

$pandora_version = pandora_my_version();

function pandora_preview_options(){
	$pandora_preview_settings = array(
		'pan_slider_number' => 5,
		'pan_slider_cat' => -1,
		'pan_new_post' => 0, 
		'pan_normal_post' => 2, 
		'pan_old_post' => 6, 
		'pan_archive_post' => 2, 
		'pan_smile_url' => get_template_directory_uri() . '/images/pandora-logo2.png', 
		'pan_custom_favicon' => '', 
		'pan_page_style' => 1,
		'pan_footer_text' => '', 
		'pan_tracking_code' => '', 
		'pan_skin_name' => ''		
	);
	return $pandora_preview_settings;
}
//instal end ---------------------------------------------------------

//call pandora options admin area
if (is_admin() == true) {
	require_once (get_template_directory() . '/setup/admin/home.php');
}

//setting of pandora

function pandora_my_column_style() {
	global $pandora_options;
	$col_css;
	if ($pandora_options['pan_page_style'] == 1) {
		$col_css = "3-col-right.css";
	}
	elseif ($pandora_options['pan_page_style'] == 2) {
		$col_css = "3-col.css";
	}
	else {
		$col_css = "2-col.css";
	}
	$col_css = "/". $col_css;
	return $col_css;
}	
wp_enqueue_style('pandora_custom_styles', get_template_directory_uri() . pandora_my_column_style(), false, '1.0');

//called in functions/slider.php
function pandora_slider_properties() {
	global $pandora_options;
	$output = array(
	'max' => $pandora_options['pan_slider_number'],
	'cat' => $pandora_options['pan_slider_cat']
	);
	return $output;
}

//called in functions/logo.php
function pandora_my_little_logo() {
	global $pandora_options;
	return $pandora_options['pan_smile_url'];
}

//called in footer.php
function pandora_my_job(){
	global $pandora_options;
	if ($pandora_options['pan_skin_name'] != '') {
		return _e( 'Skinned by ', 'pandora' ) . $pandora_options['pan_skin_name'];
	}
}

//called in footer.php
function pandora_my_copyright(){
	global $pandora_options;
	$kopi = "";
	if ($pandora_options['pan_footer_text'] != '') {
		$kopi = $pandora_options['pan_footer_text'];
	}
	else {
		$kopi = _e( 'Setup your copyright text in Admin Page/Pandora options', 'pandora' );
	} 
	?>
		<span id="user_licence"><?php echo $kopi ?><br /><?php echo pandora_my_job() ?></span><br />
		<span id="theme-link">
			<?php _e( 'Pandora theme &copy; is created by', 'pandora' ) ?>
			<a href="http://belicza.com/" title="belicza.com" rel="designer" target="_blank">belicza.com</a>
			<?php _e( ' for <a href="http://wordpress.org/" target="_blank" rel="generator" title="WordPress">WordPress Engine</a>.', 'pandora' ) ?>
			<?php _e( 'Licenced on ', 'pandora' ) ?>GPL.
		</span>
	<?php
}

//called in footer.php
function pandora_web_statisctics(){
	global $pandora_options;
	return $pandora_options['pan_tracking_code'];
}

//called in header.php
function pandora_my_favicon(){
	global $pandora_options;
	if ($pandora_options['pan_custom_favicon'] != ''){
		return '<link rel="shortcut icon" href="'. $pandora_options['pan_custom_favicon'] .'" />';
	}
}

//called in loop.php. it is set the number of displayed posts
function pandora_my_post_architecture(){
	global $pandora_options;
	$max[0] = $pandora_options['pan_new_post'];
	$max[1] = $pandora_options['pan_normal_post'];
	$max[2] = $pandora_options['pan_old_post'];
	$max[3] = $pandora_options['pan_archive_post'];
	return $max;
}
?>