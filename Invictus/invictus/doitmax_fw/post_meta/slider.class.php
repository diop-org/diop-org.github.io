<?php
/* #################################################################################### */
/*
/* Class for Slider Option Set
 *
 * @author		Dennis Osterkamp aka "doitmax"
 * @copyright	Copyright (c) Dennis Osterkamp
 * @link		http://www.do-media.de
 * @since		Version 1.0
 * @package 	MaxFrame
 * 
 * @filedesc 	Option set to create the slider meta box options
 *
/* #################################################################################### */

class UIElement_Slider extends UIElement {

	public function __construct($type) {
        parent::__construct($type);
	}

	public function getMetaBox() {
	
		global $slider_array, $nivo_effect_array, $easing_transitions_array;

		// check if the type is a gallery post type
		$isGallery = $this->type == 'gallery' ? true : false;
		
		$this->createMetabox(array(
			'id' => MAX_SHORTNAME.'_photo_slider_meta_box',
			'title' => __('Slider Settings', MAX_SHORTNAME),
			'priority' => "high"
		));
		
		$this->addGroupOpen(array(
			'id' => MAX_SHORTNAME.'_photo_group_slider',
			"dependency" => MAX_SHORTNAME.'_photo_item_type_value::projectpage',
			"display" => false
		));
			
			// Choose the slider to display
			$this->addDropdown(array(
				'id' => MAX_SHORTNAME.'_photo_slider_select',
				'label' => __('Select Slider', MAX_SHORTNAME),
				"options" => $slider_array,
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
			
			/*-----------------------------------------------------------------------------------*/
			/*	Kwicks Accordion Settings
			/*-----------------------------------------------------------------------------------*/			
			$this->addGroupOpen(array(
				'id' => MAX_SHORTNAME.'_photo_slider_kwicks',
				'dependency' => MAX_SHORTNAME.'_photo_slider_select::{contains}kwicks',
				"display" => false
			));		
	
				// Min Width
				$this->addSlider(array( 
					"id" => MAX_SHORTNAME."_photo_slider_kwicks_min",
					"standard" => 47,
					"max" => 120,
					"step" => 1,
					"min" => 20,
					"label" => __('Minimum width', MAX_SHORTNAME),
					"desc" => __('The width (in pixels) of a fully collapsed item. Do not set too large, otherwise it can cause unwanted results. For best results leave it by default 47px.', MAX_SHORTNAME)
				));
				
				// Item Spacing
				$this->addSlider(array( 
					"id" => MAX_SHORTNAME."_photo_slider_kwicks_spacing",
					"standard" => 6,
					"max" => 20,
					"step" => 1,
					"min" => 0,
					"label" => __('Item Spacing', MAX_SHORTNAME),
					"desc" => __('Choose the spacing between the items in your Accordion.', MAX_SHORTNAME)
				));

				// Choose the portfolio to display
				$this->addDropdown(array(
					'id' => MAX_SHORTNAME.'_photo_slider_kwicks_easing',
					'label' => __('Transition easing', MAX_SHORTNAME),
					"options" => $easing_transitions_array,
					"standard" => "linear",
					"desc" => __('Choose the easing effect of the transition.', MAX_SHORTNAME )
				));	
		
				// Animation Duration
				$this->addSlider(array( 
					"id" => MAX_SHORTNAME."_photo_slider_kwicks_duration",
					"standard" => 250,
					"max" => 5000,
					"step" => 50,
					"min" => 50,
					"label" => __('Duration', MAX_SHORTNAME),
					"desc" => __('Choose the number of milliseconds required for each animation to complete.', MAX_SHORTNAME)
				));		
					
				// Choose sticky
				$this->addDropdown(array(
					'id' => MAX_SHORTNAME.'_photo_slider_kwicks_sticky',
					'label' => __('Sticky item', MAX_SHORTNAME),
					"options" => array( "true" => "Yes",
										"false" => "No"
									   ),
					"standard" => "true",
					"desc" => __('One item will always be expanded if activated.', MAX_SHORTNAME )
				));				
			
				// Starting Item
				$this->addInput(array( 
					"id" => MAX_SHORTNAME."_photo_slider_kwicks_default",
					"standard" => "0",
					"label" => __('Initial active item', MAX_SHORTNAME),
					"size" => 60,
					"display" => false,
					"dependency" => MAX_SHORTNAME.'_photo_slider_kwicks_sticky::true',
					"desc" => __('The initially expanded item (if and only if sticky is activated). Note: Zero based, left-to-right (or top-to-bottom).', MAX_SHORTNAME)
				));			
				
			$this->addGroupClose(array(
				'id' => MAX_SHORTNAME.'_photo_slider_kwicks'
			));	

			$this->addGroupClose(array(
				'id' => MAX_SHORTNAME.'_photo_group_slider'
			));
			
			/** No Slider Options Group **/
			$this->addGroupOpen(array(
				'id' => MAX_SHORTNAME.'_photo_group_no_slider',
				"dependency" => MAX_SHORTNAME.'_photo_item_type_value::{not}projectpage',
				"display" => false
			));
			
				// No Galleries created
				$this->addAlert(array(
					'id' => MAX_SHORTNAME.'_photo_no_slider_alert',
					'label' => __('Sliders are disabled.', MAX_SHORTNAME),
					"standard" => "",
					"display" => true,
					"desc" => __('Slider options are disabled for this link type and can only be attached to "Project Page" link type.', MAX_SHORTNAME )
				));		
	
			$this->addGroupClose(array(
				'id' => MAX_SHORTNAME.'_photo_group_no_slider',
			));
			
		
	}
	
}

?>
