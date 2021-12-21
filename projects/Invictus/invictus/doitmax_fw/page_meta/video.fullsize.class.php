<?php
/* #################################################################################### */
/*
/* Class for Video Fullsize Option Set
 *
 * @author		Dennis Osterkamp aka "doitmax"
 * @copyright	Copyright (c) Dennis Osterkamp
 * @link		http://www.do-media.de
 * @since		Version 1.0
 * @package 	Invictus
 * 
 * @filedesc 	Option set to create the Video Fullsize meta box options
 *
/* #################################################################################### */

class UIElement_VideoFullsize extends UIElement {

	public function __construct($type) {
        parent::__construct($type);
	}

	public function getMetaBox() {
	
		$this->createMetabox(array(
			'id' => MAX_SHORTNAME.'_page_video_fullsize_meta_box',
			'title' => __('Fullsize Video Settings', MAX_SHORTNAME),
			'priority' => "high"
		));
		
		// Photo item type		
		$this->addDropdown(array(
			'id' => MAX_SHORTNAME."_page_item_type_value",
			'label' => __('Choose video type', MAX_SHORTNAME),			
			'options' => array('selfhosted'=> __('Self hosted video', MAX_SHORTNAME), 
							   'youtube_embed'=> __('YouTube embedded video', MAX_SHORTNAME),
							   'vimeo_embed'=> __('Vimeo embedded video', MAX_SHORTNAME)
							  ),
			'standard' => "selfhosted",
		));		
		
		/*-----------------------------------------------------------------------------------*/
		/* Embeded Video Options */
		/*-----------------------------------------------------------------------------------*/		

		$this->addGroupOpen(array(
			"id" => MAX_SHORTNAME.'_page_group_embeded',
			"dependency" => MAX_SHORTNAME.'_page_item_type_value::{contains}embed',
			"display" => false
		));
							
			/** URL for fullsize **/
			$this->addInput(array(
				"id" => MAX_SHORTNAME."_video_embeded_url_value",
				"label" => __('Video ID for Fullsize', MAX_SHORTNAME),
				"display" => true,
				"size" => "320",
				"standard" => "",
				"desc" => __('If you want to use a Youtube or Vimeo video for your fullsize background, you need to paste the id of the video here. You can find the ID in the URL of your video (e.g. http://www.youtube.de/watch?v=<strong>123456</strong> or http://www.vimeo.com/<strong>123456</strong>.</strong>', MAX_SHORTNAME)
			));			
			
		$this->addGroupClose(array(
			"id" => MAX_SHORTNAME.'_page_group_embeded_close'
		));
		
		/*-----------------------------------------------------------------------------------*/
		/*	Self hosted video options
		/*-----------------------------------------------------------------------------------*/

		$this->addGroupOpen(array(
			"id" => MAX_SHORTNAME.'_page_group_selfhosted',
			"dependency" => MAX_SHORTNAME.'_page_item_type_value::selfhosted',
			"display" => false
		));
					
			// Video H.264 Url
			$this->addInput(array(
				"id" => MAX_SHORTNAME."_video_url_m4v_value",
				"label" => __('H.264 File URL (required)', MAX_SHORTNAME),
				"size" => 640,
				"display" => true,
				"desc" => __('The URL of your self hosted H.264 video file ( .mp4, .m4v, .f4v ). This file is required to make your video run in all browsers!', MAX_SHORTNAME),
				"standard" => "",
			));
												
			// Video Url OGV
			$this->addInput(array(
				"id" => MAX_SHORTNAME."_video_url_ogv_value",
				"label" => __('OGV File URL (required)', MAX_SHORTNAME),
				"size" => 640,
				"display" => true,
				"desc" => __('The URL of your self hosted OGG Theora video file ( .ogg, .ogv ). This file is required to make your video run in all browsers!', MAX_SHORTNAME),
				"standard" => "",
			));		
										
			// Photo link taregt
			$this->addDropdown(array(
				"id" => MAX_SHORTNAME.'_video_poster_value',
				"label" => __('Video preview image', MAX_SHORTNAME),
				"options" => array( 'featured' => "Post featured image", 'url' => "Image URL"),
				"standard" => 'featured',
				"desc" => __('Choose image you want to use for your video preview. This picture is displayed when the video was not played yet.', MAX_SHORTNAME)
			));
				
			// Video Preview url
			$this->addInput(array(
				"id" => MAX_SHORTNAME."_video_url_poster_value",
				"label" => __('Video preview image URL', MAX_SHORTNAME),
				"size" => 640,
				"display" => false,
				"dependency" => MAX_SHORTNAME.'_video_poster_value::url',
				"desc" => __('The URL of your video preview image file.', MAX_SHORTNAME)
			));									

			// Autoplay Video on page ready
			$this->addDropdown(array(
				"id" => MAX_SHORTNAME.'_video_fill_value',
				"label" => __('Stretching', MAX_SHORTNAME),
				"options" => array('none' => __('None', MAX_SHORTNAME),
							   'fill' => __('Fill', MAX_SHORTNAME),
							   'excactfit' => __('Exactfit', MAX_SHORTNAME),
							   'uniform' => __('Uniform', MAX_SHORTNAME)
							   ),
				"standard" => 'fill',
				"desc" => __('Stretching defines how to resize the poster image and video to fit the display. <a href="#" onclick="jQuery(\'#strechInfo\').toggle(); return false;">Show detailed information</a>', MAX_SHORTNAME ).'
											<ul id="strechInfo" style="display: none; font-size: 11px; padding: 10px; background: #eee; margin: 10px 0 0">
											<li><strong>None</strong>: keep the original dimensions.</li>
											<li><strong>Exactfit</strong>: disproportionally stretch the video/image to exactly fit the display.</li>
											<li><strong>Uniform</strong>: stretch the image/video while maintaining its aspect ratio. There\'ll be black borders.</li>
											<li><strong>Fill</strong>: stretch the image/video while maintaining its aspect ratio, completely filling the display.</li>		
											</ul>'
			));
						
		$this->addGroupClose(array(
			"id" => MAX_SHORTNAME.'_page_group_selfhosted_close',
		));
		
		// Autoplay Video on page ready
		$this->addDropdown(array(
			"id" => MAX_SHORTNAME.'_video_autoplay_value',
			'label' => __('Autoplay video', MAX_SHORTNAME),
			"options" => array('true' => __('Yes', MAX_SHORTNAME),
						   'false' => __('No', MAX_SHORTNAME)
						   ),
			"standard" => 'false',
			"desc" => __('If set to "Yes", your video will automatically start on page load.', MAX_SHORTNAME )
		));		
				
	}

}

?>