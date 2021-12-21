<?php
/* #################################################################################### */
/*
/* Class for Blog Slider Option Set
 *
 * @author		Dennis Osterkamp aka "doitmax"
 * @copyright	Copyright (c) Dennis Osterkamp
 * @link		http://www.do-media.de
 * @since		Version 1.0
 * @package 	MaxFrame
 * 
 * @filedesc 	Option set to create the blog slider meta box options
 *
/* #################################################################################### */

class UIElement_BlogSlider extends UIElement {

	public function __construct($type) {
        parent::__construct($type);
	}

	public function getMetaBox() {
	
		global $slider_array, $nivo_effect_array, $easing_transitions_array;

		// check if the type is a gallery post type
		$isGallery = $this->type == 'gallery' ? true : false;

		$this->addGroupOpen(array(
			'id' => MAX_SHORTNAME.'_photo_group_slider',
			"dependency" => MAX_SHORTNAME.'_photo_item_type_value::none',
			"display" => false
		));
		
		
			$this->createMetabox(array(
				'id' => MAX_SHORTNAME.'_photo_slider_meta_box',
				'title' => __('Slider Settings', MAX_SHORTNAME),
				'priority' => "high"
			));
					
				// Choose the slider to display
				$this->addDropdown(array(
					'id' => MAX_SHORTNAME.'_photo_slider_select',
					'label' => __('Select Slider', MAX_SHORTNAME),
					"options" => array('none'=>"No Slider", 'slider-nivo' => 'Nivo Slider', 'slider-slides' => 'Slides Slider' ),
					"standard" => "none",
					"display" => true,
					"desc" => __('Choose the slider you want to display on this page instead of the featured image.', MAX_SHORTNAME )
				));
				
				/*-----------------------------------------------------------------------------------*/
				/*	Get the images
				/*-----------------------------------------------------------------------------------*/		
				$this->addUploadImage(array(
					'id' => MAX_SHORTNAME.'_featured_image',
					'label' => __('Images for this slider', MAX_SHORTNAME),
					'media_label' => __('Use this Image as Featured Image', MAX_SHORTNAME),
					'button' => __('Browse', MAX_SHORTNAME),
					'standard' => '',
					"display" => false,
					'dependency' => MAX_SHORTNAME.'_photo_slider_select::{contains}slider',
					"desc" => 'These pictures are displayed in the slider in addition to the post featured image. The featured image is alwasy displayed first.'
				));		
						
				/*-----------------------------------------------------------------------------------*/
				/*	Slides Settings
				/*-----------------------------------------------------------------------------------*/
	
				$this->addGroupOpen(array(
					'id' => MAX_SHORTNAME.'_photo_slider_slides',
					'dependency' => MAX_SHORTNAME.'_photo_slider_select::{contains}slides',
					"display" => false
				));
				
					// Autoplay?
					$this->addDropdown(array(
						'id' => MAX_SHORTNAME.'_photo_slider_slides_autoplay',
						'label' => __('Autoplay?', MAX_SHORTNAME),
						"options" => array('false' => "No", 'true' => "Yes"),
						"standard" => "false",
						"display" => true,
						"desc" => __('Choose if the slider should start playing on load.', MAX_SHORTNAME )
					));
		
					// Slider pause time
					$this->addSlider(array( 
						"id" => MAX_SHORTNAME."_photo_slider_slides_pause",
						"standard" => 3000,
						"max" => 20000,
						"step" => 50,
						"min" => 500,
						"label" => __('Autoplay interval', MAX_SHORTNAME),
						"desc" => __('Choose how long each slide will show in milliseconds (1000ms = 1 second).', MAX_SHORTNAME),
						'dependency' => MAX_SHORTNAME.'_photo_slider_slides_autoplay::true',
						"display" => false
					));				
	
				$this->addGroupClose(array( 
					'id' => MAX_SHORTNAME.'_photo_slider_slides'
				));
	
				/*-----------------------------------------------------------------------------------*/
				/*	Nivo Slider Settings
				/*-----------------------------------------------------------------------------------*/
				$this->addGroupOpen(array(
					'id' => MAX_SHORTNAME.'_photo_slider_nivo',
					'dependency' => MAX_SHORTNAME.'_photo_slider_select::{contains}nivo',
					"display" => false
				));
					
					// Slider pause time
					$this->addSlider(array( 
						"id" => MAX_SHORTNAME."_photo_slider_nivo_pause",
						"standard" => 3000,
						"max" => 20000,
						"step" => 50,
						"min" => 500,
						"label" => __('Autoplay interval', MAX_SHORTNAME),
						"desc" => __('Choose how long each slide will show in milliseconds (1000ms = 1 second).', MAX_SHORTNAME)
					));					
		
					// Choose the Animation Type
					$this->addDropdown(array(
						'id' => MAX_SHORTNAME.'_photo_slider_nivo_effect',
						'label' => __('Effect', MAX_SHORTNAME),
						"options" => $nivo_effect_array,
						"standard" => "random",
						"desc" => __('Choose the animation effect for the slider. Default is "Random"', MAX_SHORTNAME )
					));
		
					// Slices
					$this->addSlider(array( 
						"id" => MAX_SHORTNAME."_photo_slider_nivo_slices",
						"standard" => 15,
						"max" => 50,
						"min" => 1,
						"label" => __('Slices', MAX_SHORTNAME),
						'dependency' => MAX_SHORTNAME.'_photo_slider_nivo_effect::{contains}slice',
						"desc" => __('Choose the number of slices for the slice animation of each slider image.', MAX_SHORTNAME)
					));
					
					// Box Cols
					$this->addSlider(array( 
						"id" => MAX_SHORTNAME."_photo_slider_nivo_boxcols",
						"standard" => 8,
						"max" => 20,
						"min" => 1,
						"label" => __('Box cols', MAX_SHORTNAME),
						'dependency' => MAX_SHORTNAME.'_photo_slider_nivo_effect::{contains}box',
						"desc" => __('Choose the number of box cols for the slices of boxed animations.', MAX_SHORTNAME)
					));
					
					// Box Rows
					$this->addSlider(array( 
						"id" => MAX_SHORTNAME."_photo_slider_nivo_boxrows",
						"standard" => 4,
						"max" => 20,
						"min" => 1,
						"label" => __('Box rows', MAX_SHORTNAME),
						'dependency' => MAX_SHORTNAME.'_photo_slider_nivo_effect::{contains}box',
						"desc" => __('Choose the number of box rows for the slices of boxed animations.', MAX_SHORTNAME)
					));			
					
					// Slider speed of transition
					$this->addSlider(array( 
						"id" => MAX_SHORTNAME."_photo_slider_nivo_speed",
						"standard" => 500,
						"max" => 2000,
						"step" => 50,
						"min" => 100,
						"label" => __('Slide transition speed', MAX_SHORTNAME),
						"desc" => __('Choose the speed of transition of each slider image in milliseconds (1000ms = 1 second).', MAX_SHORTNAME)
					));
		
				$this->addGroupClose(array(
					'id' => MAX_SHORTNAME.'_photo_slider_nivo'
				));

			$this->addGroupClose(array(
				'id' => MAX_SHORTNAME.'_photo_group_slider'
			));
			
			/** No Slider Options Group **/
			$this->addGroupOpen(array(
				'id' => MAX_SHORTNAME.'_photo_group_no_slider',
				"dependency" => MAX_SHORTNAME.'_photo_item_type_value::{not}none',
				"display" => false
			));
			
				// No Galleries created
				$this->addAlert(array(
					'id' => MAX_SHORTNAME.'_photo_no_slider_alert',
					'label' => __('Sliders are disabled.', MAX_SHORTNAME),
					"standard" => "",
					"display" => true,
					"desc" => __('Slider options are disabled if a video is selected for this blog post.', MAX_SHORTNAME )
				));		
	
			$this->addGroupClose(array(
				'id' => MAX_SHORTNAME.'_photo_group_no_slider',
			));
							
					
	}
	
}

?>
