<?php
/* #################################################################################### */
/*
/* Class for post fullsize background option Set
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

class UIElement_PostBackground extends UIElement {

	public function __construct($type) {
        parent::__construct($type);
	}

	public function getMetaBox() {

		$this->createMetabox(array(
			'id' => MAX_SHORTNAME.'_post_background_meta_box',
			'title' => __('Background Settings', MAX_SHORTNAME),
			'priority' => "high"
		));
		
		$this->addDropdown(array(	
			"id" => MAX_SHORTNAME . "_show_post_fullsize_value",
			"options" => array( 'true' => 'Yes', 'false' => 'No' ),	
			"label" => __('Show a Fullsize Background Image for this photo post on the photo detail page.', MAX_SHORTNAME),
			"standard" => "Yes"			
		));
			
		/** Fullsize Background Group **/
		$this->addGroupOpen(array(
			"id" => MAX_SHORTNAME.'_photo_fullsizeshow_group',
			"dependency" => MAX_SHORTNAME.'_show_post_fullsize_value::true',
			"display" => false
		));
		
		
			//** Fullsize Background URL for Photo posts
			$this->addDropdown(array(	
				"id" => MAX_SHORTNAME."_show_random_fullsize_value",
				"options" => array( 'true' => 'Yes', 'false' => 'No' ),	
				"label" => __('Random Fullsize Background Image from the current gallery.', MAX_SHORTNAME),
				"standard" => "false"
			));
					
			//** Fullsize Background URL for Photo posts
			$this->addInput(array(	
				"id" => MAX_SHORTNAME."_show_page_fullsize_url_value",
				"label" => __('URL for Fullsize Background Image', MAX_SHORTNAME),
				"size" => 640,
				"display" => false,
				"dependency" => MAX_SHORTNAME.'_show_random_fullsize_value::false',
				"standard" => "",
				"desc" => __('Leave blank to show the current featured image as background', MAX_SHORTNAME)
			));
				
			$this->addGroupClose(array(	
				"id" => MAX_SHORTNAME.'_photo_fullsizeshow_group_close'
			));
	}
	
}
?>