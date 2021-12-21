<?php
/* #################################################################################### */
/*
/* Class for Page Option Set
 *
 * @author		Dennis Osterkamp aka "doitmax"
 * @copyright	Copyright (c) Dennis Osterkamp
 * @link		http://www.do-media.de
 * @since		Version 1.0
 * @package 	Invictus
 * 
 * @filedesc 	Option set to create the page meta box options
 *
/* #################################################################################### */

class UIElement_Page extends UIElement {

	public function __construct($type) {
        parent::__construct($type);
	}

	public function getMetaBox() {

		$this->createMetabox(array(
			'id' => MAX_SHORTNAME.'_page_settings_meta_box',
			'title' => __('Page Settings', MAX_SHORTNAME),
			'priority' => "high"
		));
				
	}
}

?>