<?php
/* 
	Options	Functions
	Author: Tyler Cuningham
	Establishes the theme options functions.
	Copyright (C) 2011 CyberChimps
	Version 2.0
	
*/

/* Hide Post Icons */

function droidpress_hide_post_icons() {

	global $themename, $themeslug, $options;
	
	if ($options[$themeslug.'_hide_post_icons'] == "1") {

		echo '<style type="text/css">';
		echo ".format-icon {display: none;}";
		echo ".post_container {padding-left: 15px;}";
		echo '</style>';
		
	}
	
}
add_action( 'wp_head', 'droidpress_hide_post_icons');


/* Plus 1 Allignment */

function droidpress_plusone_alignment() {

	global $themename, $themeslug, $options;
	
	if ($options[$themeslug.'_show_fb_like'] == "1" AND $options[$themeslug.'_show_gplus'] == "1" ) {

		echo '<style type="text/css">';
		echo ".gplusone {float: right; margin-right: -38px;}";
		echo '</style>';
		
	}
	
}
add_action( 'wp_head', 'droidpress_plusone_alignment');


/* Featured Image Alignment */

function droidpress_featured_image_alignment() {

	global $themename, $themeslug, $options;
	
	if ($options[$themeslug.'_featured_images'] == "right" ) {

		echo '<style type="text/css">';
		echo ".featured-image {float: right;}";
		echo '</style>';
		
	}
	
	elseif ($options[$themeslug.'_featured_images'] == "center" ) {

		echo '<style type="text/css">';
		echo ".featured-image {text-align: center;}";
		echo '</style>';
		
	}
	
	else {

		echo '<style type="text/css">';
		echo ".featured-image {float: left;}";
		echo '</style>';
		
	}

	
}
add_action( 'wp_head', 'droidpress_featured_image_alignment');

/* Link Color */

function droidpress_add_link_color() {

	global $themename, $themeslug, $options;

	if (isset($options[$themeslug.'_link_color']) == "") {
		$link = '3B5A7B';
	}

	else { 
		$link = $options[$themeslug.'_link_color']; 
	}				
	
		echo '<style type="text/css">';
		echo ".meta-rest a {color: #$link;}";
		echo ".entry a {color: #$link;}";
		echo ".sidebar-widget-style a {color: #$link;}";
		echo '</style>';
		
}
add_action( 'wp_head', 'droidpress_add_link_color');

?>