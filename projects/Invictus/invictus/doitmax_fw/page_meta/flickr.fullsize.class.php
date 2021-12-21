<?php
/* #################################################################################### */
/*
/* Class for Flickr Fullsize Option Set
 *
 * @author		Dennis Osterkamp aka "doitmax"
 * @copyright	Copyright (c) Dennis Osterkamp
 * @link		http://www.do-media.de
 * @since		Version 1.0
 * @package 	Invictus
 * 
 * @filedesc 	Option set to create the Flickr Fullsize meta box options
 *
/* #################################################################################### */

class UIElement_FlickrFullsize extends UIElement {

	public function __construct($type) {
        parent::__construct($type);
	}

	public function getMetaBox() {
	
		$this->createMetabox(array(
			'id' => MAX_SHORTNAME.'_page_flickr_fullsize_meta_box',
			'title' => __('Flickr Fullsize Settings', MAX_SHORTNAME),
			'priority' => "high"
		));

		// Flickr Source
		$this->addDropdown(array(
			'id' => 'max_fullsize_flickr_source',
			'label' => __('Flickr image source', MAX_SHORTNAME),
			"options" => array(1 => __('Set', MAX_SHORTNAME),
							   2 => __('User', MAX_SHORTNAME),
							   3 => __('Group', MAX_SHORTNAME)
							   ),
			"standard" => "2",
			"desc" => __('Choose the source of the images to be displayed on your page from flickr.', MAX_SHORTNAME )
		));

		// Flickr Set ID
		$this->addInput(array( 
			"id" => "max_fullsize_flickr_set",
			"standard" => "",
			"label" => __('Flickr set ID', MAX_SHORTNAME),
			"display" => false,
			"size" => 320,
			"dependency" => 'max_fullsize_flickr_source::1',
			"desc" => __('The Flickr set ID can be found in URL of the respective set on Flickr. For example http://www.flickr.com/photos/markjsebastian/sets/<strong>72157594223783465</strong>', MAX_SHORTNAME)
		));

		// Flickr User ID
		$this->addInput(array( 
			"id" => "max_fullsize_flickr_user",
			"standard" => "",
			"label" => __('Flickr user ID', MAX_SHORTNAME),
			"display" => false,
			"size" => 320,
			"dependency" => 'max_fullsize_flickr_source::2',
			"desc" => __('You can get the Flickr user ID here <a href="http://idgettr.com/" target="_blank">idgettr</a>', MAX_SHORTNAME)
		));

		// Flickr User ID
		$this->addInput(array( 
			"id" => "max_fullsize_flickr_group",
			"standard" => "",
			"label" => __('Flickr group ID', MAX_SHORTNAME),
			"display" => false,
			"size" => 320,
			"dependency" => 'max_fullsize_flickr_source::3',
			"desc" => __('You can get the Flickr group ID here <a href="http://idgettr.com/" target="_blank">idgettr</a>', MAX_SHORTNAME)
		));
		
		// Flickr Sorting
		$this->addDropdown(array(
			'id' => 'max_fullsize_flickr_sorting',
			'label' => __('Sorting', MAX_SHORTNAME),
			"options" => array('false' => __('Date added', MAX_SHORTNAME),
							   'true' => __('Random', MAX_SHORTNAME)
							   ),
			"standard" => "false"
		));

		// number of imaes
		$this->addSlider(array(
			"label" => __('Total slides', MAX_SHORTNAME),
			"id" => "max_fullsize_flickr_total_slides",
			"step" => "1",
			"max" => "500",
			"min" => "1",
			"standard" => "50",
			"desc" => __('Enter the number of of pictures to pull from flickr.', MAX_SHORTNAME)
		));
		
		// Image size
		$this->addDropdown(array(
			'id' => 'max_fullsize_flickr_image_size',
			'label' => __('Image size', MAX_SHORTNAME),
			'options' => array(
				'z' => __('Middle, 640px on the longest side', MAX_SHORTNAME),
				'b' => __('Big, 1024px on the longest side', MAX_SHORTNAME),
				'o' => __('Original image, either JPG, GIF or PNG, depending on source format', MAX_SHORTNAME)
			),
			'standard' => "b",
			'desc' => __('Choose the size of the images pulled from flickr to show as fullsize background.', MAX_SHORTNAME)
		));	
		
	}
	
}
?>