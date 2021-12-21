<?php
/* #################################################################################### */
/*
/* Class for Page Background Option Set
 *
 * @author		Dennis Osterkamp aka "doitmax"
 * @copyright	Copyright (c) Dennis Osterkamp
 * @link		http://www.do-media.de
 * @since		Version 1.0
 * @package 	Invictus
 * 
 * @filedesc 	Option set to create the page background meta box options
 *
/* #################################################################################### */

class UIElement_PageBackground extends UIElement {

	public function __construct($type) {
        parent::__construct($type);
	}

	public function getMetaBox() {

		$this->createMetabox(array(
			'id' => MAX_SHORTNAME.'_page_background_meta_box',
			'title' => __('Background Settings', MAX_SHORTNAME),
			'priority' => "default"
		));

		// Show Background Image?
		$this->addDropdown(array(
			'id' => 'max_show_page_fullsize',
			'label' => __('Show fullsize background?', MAX_SHORTNAME),
			"options" => array("true"=>"Yes", "false"=>"No"),
			"standard" => "true",
			"desc" => __('Choose, if you want to show a fullsize background image for this page. <strong>Settings are disabled, when "Fullsize Background" gallery type was selected.</strong>', MAX_SHORTNAME )
		));

		// Fullsize background file URL
		$this->addInput(array( 
			"id" => "max_show_page_fullsize_url",
			"standard" => "",
			"label" => __('URL for Fullsize Background Image', MAX_SHORTNAME),
			"display" => false,
			"size" => 640,
			"dependency" => 'max_show_page_fullsize::true',
			"desc" => __('The URL of your video preview image file. Leave blank to show a random image from homepage fullsize featured galleries.', MAX_SHORTNAME)
		));				
				
	}
}
?>
