<?php
/* #################################################################################### */
/*
/* Class for post copyright option Set
 *
 * @author		Dennis Osterkamp aka "doitmax"
 * @copyright	Copyright (c) Dennis Osterkamp
 * @link		http://www.do-media.de
 * @since		Version 1.0
 * @package 	Invictus
 * 
 * @filedesc 	Option set to create the post fullsize background meta box options
 *
/* #################################################################################### */

class UIElement_Copyright extends UIElement {

	public function __construct($type) {
        parent::__construct($type);
	}

	public function getMetaBox() {

		global $post_id;

		$this->createMetabox(array(
			'id' => MAX_SHORTNAME.'_post_copyright_meta_box',
			'title' => __('Additional information', MAX_SHORTNAME),
			'priority' => "high"
		));
		
		// Copyright MetaBox
		$this->addInput(array(
			"id" => MAX_SHORTNAME."_photo_copyright_information_value",
			"label" => __('&copy; Copyright information / Owner', MAX_SHORTNAME),
			"size" => "320",
			"standard" => "",
			"desc" => __('Who is the owner of this picture? Be sure you have the permissions to use this picture on your website.', MAX_SHORTNAME)
		));

		// Copyright Link MetaBox
		$this->addInput(array(
			"id" => MAX_SHORTNAME."_photo_copyright_link_value",
			"label" => __('&copy; Copyright Link', MAX_SHORTNAME),
			"size" => "640",
			"standard" => "",
			"desc" => __('Link to the owner of this picture (remember to add a http:// before your link).', MAX_SHORTNAME)
		));			
			
		// Location MetaBox
		$this->addInput(array(
			"id" => MAX_SHORTNAME."_photo_location_value",
			"type" => "input",
			"label" => __('Location', MAX_SHORTNAME),
			"size" => "320",
			"standard" => "",
			"desc" => __('Enter the location, the picture was taken.', MAX_SHORTNAME)
		));
					
		// Date MetaBox
		$this->addDate(array(
			"id" => MAX_SHORTNAME."_photo_date_value",
			"label" => __('Date of shot', MAX_SHORTNAME),
			"desc" => __('Click on the input to open the datepicker and choose the date the picture was taken.', MAX_SHORTNAME),
			"standard" => ""
		));		
		
	}
	
}
?>