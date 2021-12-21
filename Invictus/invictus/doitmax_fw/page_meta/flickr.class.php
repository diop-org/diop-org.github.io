<?php
/* #################################################################################### */
/*
/* Class for Flickr Stream Set
 *
 * @author		Dennis Osterkamp aka "doitmax"
 * @copyright	Copyright (c) Dennis Osterkamp
 * @link		http://www.do-media.de
 * @since		Version 1.0
 * @package 	Invictus
 * 
 * @filedesc 	Option set to create the flickr stream meta box options
 *
/* #################################################################################### */

class UIElement_Flickr extends UIElement {

	public function __construct($type) {
        parent::__construct($type);
	}

	public function getMetaBox() {
	
		$this->createMetabox(array(
			'id' => MAX_SHORTNAME.'_page_flickr_meta_box',
			'title' => __('Flickr Settings', MAX_SHORTNAME),
			'priority' => "default"
		));

		// Flickr Source
		$this->addDropdown(array(
			'id' => 'max_portfolio_flickr_source',
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
			"id" => "max_portfolio_flickr_set",
			"standard" => "",
			"label" => __('Flickr set ID', MAX_SHORTNAME),
			"display" => false,
			"size" => 320,
			"dependency" => 'max_portfolio_flickr_source::1',
			"desc" => __('The Flickr set ID can be found in URL of the respective set on Flickr. For example http://www.flickr.com/photos/markjsebastian/sets/<strong>72157594223783465</strong>', MAX_SHORTNAME)
		));

		// Flickr User ID
		$this->addInput(array( 
			"id" => "max_portfolio_flickr_user",
			"standard" => "",
			"label" => __('Flickr user ID', MAX_SHORTNAME),
			"display" => false,
			"size" => 320,
			"dependency" => 'max_portfolio_flickr_source::2',
			"desc" => __('You can get the Flickr user ID here <a href="http://idgettr.com/" target="_blank">idgettr</a>', MAX_SHORTNAME)
		));

		// Flickr Group ID
		$this->addInput(array( 
			"id" => "max_portfolio_flickr_group",
			"standard" => "",
			"label" => __('Flickr group ID', MAX_SHORTNAME),
			"display" => false,
			"size" => 320,
			"dependency" => 'max_portfolio_flickr_source::3',
			"desc" => __('You can get the Flickr group ID here <a href="http://idgettr.com/" target="_blank">idgettr</a>', MAX_SHORTNAME)
		));
		
		// Flickr Sorting
		$this->addDropdown(array(
			'id' => 'max_portfolio_flickr_sorting',
			'label' => __('Sorting', MAX_SHORTNAME),
			"options" => array('false' => __('Date added', MAX_SHORTNAME),
							   'true' => __('Random', MAX_SHORTNAME)
							   ),
			"standard" => "false"
		));
		
		// Number of images
		$this->addSlider(array( 
			'id' => 'max_portfolio_flickr_count',
			"standard" => 50,
			"max" => 500,
			"min" => 1,
			"step" => 1,
			"label" => __('Number of images', MAX_SHORTNAME),
			"desc" => __('Enter the number of Images you want to show in this flickr stream gallery.', MAX_SHORTNAME)
		));

		$this->addDropdown(array(
			"id" => 'max_portfolio_flickr_size',
			"label" => __('Image size', MAX_SHORTNAME),
			"options" => array(
				'z' => __('Middle, 640px on the longest side', MAX_SHORTNAME),
				'b' => __('Big, 1024px on the longest side', MAX_SHORTNAME),
				'o' => __('Original image, either JPG, GIF or PNG, depending on source format', MAX_SHORTNAME),
			),							
			"standardd" => "b",
			"desc" => __('Choose the size of the images pulled from flickr to show in the lightbox.','invictus')
		));

		// Show fullwidth?
		$this->addDropdown(array(
			'id' => 'max_portfolio_flickr_fullwidth',
			'label' => __('Show content fullwidth?', MAX_SHORTNAME),
			"options" => array( "true" => "Yes", "false" => "No" ),
			"standard" => "false",
			"display" => false,
			"desc" => __('Choose if you want to show the full browser width for this Flickr stream page template.', MAX_SHORTNAME )
		));
		
		// Link target
		$this->addDropdown(array(
			'id' => 'max_portfolio_flickr_target',
			'label' => __('Link target', MAX_SHORTNAME),
			"options" => array( "false" => "Flickr photo page", "true" => "Lightbox" ),
			"standard" => "false",
			"desc" => __('Select how the links to Flickr images are handled.', MAX_SHORTNAME )
		));
		
		// Content Fullwidth
		$this->addDropdown(array( 
			"id" => MAX_SHORTNAME."_page_gallery_fullwidth",
			"options" => array('true'=>'Yes','false'=>'No'),
			"standard" => 'false',
			"label" => __('Fullsize Content', MAX_SHORTNAME),
			"display" => true,
			"desc" => 'Choose, if you want to show the choosen gallery content in full browser width (Only available for "Sortable" portfolios).',
		));	

		
	}
}
?>