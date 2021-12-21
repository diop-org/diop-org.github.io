<?php
/* #################################################################################### */
/*
/* Class for Photo Post Option Set
 *
 * @author		Dennis Osterkamp aka "doitmax"
 * @copyright	Copyright (c) Dennis Osterkamp
 * @link		http://www.do-media.de
 * @since		Version 1.0
 * @package 	MaxFrame
 * 
 * @filedesc 	Option set to create the photo post meta box options
 *
/* #################################################################################### */

class UIElement_Photo extends UIElement {

	public function __construct($type) {
        parent::__construct($type);
	}

	public function getMetaBox() {
		
		global $cropping_array, $post_id;
		
		$this->createMetabox(array(
			'id' =>  MAX_SHORTNAME . "_image_detail_settings",
			'title' => __('Image detail settings', MAX_SHORTNAME),
			'priority' => "high"
		));
		
		// backward compatibility to version 2.0
		$old_item_type = get_post_meta($post_id, MAX_SHORTNAME.'_photo_item_type_value', true);
		if($old_item_type == "Project Page") update_post_meta($post_id, MAX_SHORTNAME.'_photo_item_type_value', "projectpage");
		if($old_item_type == "External Link") update_post_meta($post_id, MAX_SHORTNAME.'_photo_item_type_value', "external");
		if($old_item_type == "Lightbox") update_post_meta($post_id, MAX_SHORTNAME.'_photo_item_type_value', "lightbox");
					
		// Photo item type		
		$this->addDropdown(array(
			'id' => MAX_SHORTNAME."_photo_item_type_value",
			'label' => __('Choose Link Type', MAX_SHORTNAME),			
			'options' => array('lightbox'=>'Lightbox', 
							   'projectpage'=> __('Project Page', MAX_SHORTNAME), 
							   'external'=> __('External Link', MAX_SHORTNAME), 
							   'selfhosted'=> __('Self hosted video', MAX_SHORTNAME), 
							   'youtube_embed'=> __('YouTube embedded video', MAX_SHORTNAME),
							   'vimeo_embed'=> __('Vimeo embedded video', MAX_SHORTNAME)
							  ),
			'standard' => "lightbox",
		));	
		
		/*-----------------------------------------------------------------------------------*/
		/* Embeded Video Options */
		/*-----------------------------------------------------------------------------------*/		

		$this->addGroupOpen(array(
			"id" => MAX_SHORTNAME.'_photo_group_embeded',
			"dependency" => MAX_SHORTNAME.'_photo_item_type_value::{contains}embed',
			"display" => false
		));
							
			/** Embedded Code **/
			$this->addTextarea(array(
				"id" => MAX_SHORTNAME."_video_embeded_value",
				"label" => __('Embed-Code', MAX_SHORTNAME),
				"display" => true,
				"rows" => '8',
				"size" => "480",
				"standard" => "",
				"desc" => __('If you want to embed a video on the photo details page, paste the embed code here. The recommend width is ' . MAX_CONTENT_WIDTH . 'px with any height to fit the content dimensions. <strong>Add "?wmode=transparent" to the URL in your embeded code to avoid content overlapping.</strong>', MAX_SHORTNAME)
			));
			
			/** URL for fullsize **/
			$this->addInput(array(
				"id" => MAX_SHORTNAME."_video_embeded_url_value",
				"label" => __('Video ID for Fullsize', MAX_SHORTNAME),
				"display" => true,
				"size" => "320",
				"standard" => "",
				"desc" => __('If you want to use a Youtube or Vimeo video for your Fullsize Gallery, you need to paste the id of the video here. You can find the ID in the URL of your video (e.g. http://www.youtube.de/watch?v=<strong>123456</strong> or http://www.vimeo.com/<strong>123456</strong>.</strong>', MAX_SHORTNAME)
			));			
			
		$this->addGroupClose(array(
			"id" => MAX_SHORTNAME.'_photo_group_embeded_close'
		));
		
		/*-----------------------------------------------------------------------------------*/
		/*	Self hosted video options
		/*-----------------------------------------------------------------------------------*/

		$this->addGroupOpen(array(
			"id" => MAX_SHORTNAME.'_photo_group_selfhosted',
			"dependency" => MAX_SHORTNAME.'_photo_item_type_value::selfhosted',
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
							
			// Video Height
			$this->addSlider(array(
				"id" => MAX_SHORTNAME."_video_height_value",
				"label" => __('Video Height', MAX_SHORTNAME),
				"max" => 1000,
				"min" => 1,
				"step" => 1,				
				"standard" => "371",
				"desc" => __('The height of the Video in px (eg 371).', MAX_SHORTNAME)
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
			
		$this->addGroupClose(array(
			"id" => MAX_SHORTNAME.'_photo_group_selfhosted_close',
		));
		
		/*-----------------------------------------------------------------------------------*/
		/*	Lightbox options
		/*-----------------------------------------------------------------------------------*/		
		
		$this->addGroupOpen(array(
			"id" => MAX_SHORTNAME.'_photo_group_lightbox',
			"dependency" => MAX_SHORTNAME.'_photo_item_type_value::lightbox',
			"display" => false
		));
		
			$this->addDropdown(array(
				"id" => MAX_SHORTNAME."_photo_lightbox_type_value",
				"label" => __('Type of media', MAX_SHORTNAME),
				"options" => array('photo'=>'Featured Image', 'youtube'=>'YouTube-Video', 'vimeo'=>'Vimeo-Video'),
				"standard" => "photo",
				"display" => true,
				"desc" => __('Choose the type of media, you want to show in the Lightbox', MAX_SHORTNAME)
			));

			// Youtube Url MetaBox
			$this->addInput(array(				
				"id" => MAX_SHORTNAME."_photo_video_youtube_value",
				"label" => __('YouTube URL to show in Lightbox', MAX_SHORTNAME),
				"size" => 640,
				"standard" => "",
				"display" => false,
				'dependency' => MAX_SHORTNAME.'_photo_lightbox_type_value::youtube',
				'desc' => __('Enter the YouTube URL your want to show in your lightbox. To change the height or width, simple add for example <em>&width=800&height=600</em> to your url', MAX_SHORTNAME)
			));
			
			// Vimeo Url MetaBox
			$this->addInput(array(				
				"id" => MAX_SHORTNAME."_photo_video_vimeo_value",
				"label" => __('Vimeo URL', MAX_SHORTNAME),
				"size" => 640,
				"standard" => "",
				"display" => false,
				'dependency' => MAX_SHORTNAME.'_photo_lightbox_type_value::vimeo',
				'desc' => __('Enter the Vimeo URL your want to show in your lightbox. To change the height or width, simple add for example <em>&width=800&height=600</em> to your url', MAX_SHORTNAME)
			));			

		$this->addGroupClose(array(
			"id" => MAX_SHORTNAME.'_photo_group_lightbox_close',
		));
		
		$this->addGroupOpen(array(
			"id" => MAX_SHORTNAME.'_photo_group_external',
			'dependency' => MAX_SHORTNAME.'_photo_item_type_value::external',
			"display" => false
		));		
		
			//** External Link option
			$this->addInput(array(	
				"id" => MAX_SHORTNAME."_photo_external_link_value",
				"label" => __('Link to an external URL (remember http://)', MAX_SHORTNAME),
				"size" => 640,
				"standard" => ""		
			));
	
			// External Link Target
			$this->addDropdown(array(
				"id" => MAX_SHORTNAME."_external_link_target_value",
				"label" => __('Link target', MAX_SHORTNAME),
				"options" => array('_blank'=>'_blank', '_new' => '_new', '_self' => '_self' ),
				"standard" => "_blank",
				"desc" => __('Choose the link target to open your external link.', MAX_SHORTNAME )					
			));		

		$this->addGroupClose(array(
			"id" => MAX_SHORTNAME.'_photo_group_external_close',
		));
				
		// Cropping direction of featured image
		$this->addDropdown(array(
			"id" => MAX_SHORTNAME."_photo_cropping_direction_value",
			"label" => __('Preview cropping direction', MAX_SHORTNAME),
			"options" => $cropping_array,		
			"standard" => "c",
			"desc" => __('Choose the position from where your thumbnail of an image will be cropped if cropping is activated in your Invictus Theme Settings.', MAX_SHORTNAME )					
		));
	
	}
	
}