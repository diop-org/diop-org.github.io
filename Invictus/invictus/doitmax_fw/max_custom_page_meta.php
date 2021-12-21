<?php
/* #################################################################################### */
/*	Custom Page Meta File
 *
 * @author		Dennis Osterkamp aka "doitmax"
 * @copyright	Copyright (c) Dennis Osterkamp
 * @link		http://www.do-media.de
 * @since		Version 1.0
 * @package 	Invictus
 * 
 * @filedesc 	File to create the custom meta fields for pages
 *
/* #################################################################################### */

// Include ui element class
include("uielement.class.php");

// Include option set classes for pages
include('page_meta/page.class.php');
include('page_meta/background.class.php');
include('page_meta/gallery.class.php');
include('page_meta/flickr.class.php');
include('page_meta/flickr.fullsize.class.php');
include('page_meta/video.fullsize.class.php');

/*-----------------------------------------------------------------------------------*/
/*	Add the page meta box
/*-----------------------------------------------------------------------------------*/

add_action('init', 'max_add_page_meta', 12);
function max_add_page_meta() {
	
	global $p_tpl, $taxonomies, $order_array, $wp_cats, $wp_gal_cats;
	
	// Get the gallery gategories
	$taxonomies =  max_get_galleries();
	
	$post_id = @$_GET['post'] ? @$_GET['post'] : @$_POST['post_ID'];
	
	@$custom_fields = get_post_custom_values('_wp_page_template', $post_id );
	$p_tpl = $custom_fields[0];	
		
	/*-----------------------------------------------------------------------------------*/
	/*	create blog options meta box
	/*-----------------------------------------------------------------------------------*/	
				
	if( $p_tpl == "template-blog.php" || $p_tpl == "template-blog-fullsize.php" ) {		

		$obj_blog_page = new UIElement('page');	
		
		$obj_blog_page->createMetabox(array(
			'id' => MAX_SHORTNAME.'_page_blog_meta_box',
			'title' => __('Blog options', MAX_SHORTNAME),
			'priority' => "high"
		));				
		
		// Choose the galleries to display			
		$obj_blog_page->addMultiGalleryCheckbox(array(
			'id' => MAX_SHORTNAME.'_page_blog_category',
			'label' => __('Blog Categories', MAX_SHORTNAME),
			"standard" => "9999",
			"options" => 'category',
			"desc" => __('Choose the Categories, you want to show on this blog page.', MAX_SHORTNAME )
		));		
	}
		

	/*-----------------------------------------------------------------------------------*/
	/*	create page gallery options meta box
	/*-----------------------------------------------------------------------------------*/	
	
	if ($p_tpl == "template-one-column.php" || 
		$p_tpl == "template-two-column.php" || 
		$p_tpl == "template-three-column.php" || 
		$p_tpl == "template-four-column.php" || 
		$p_tpl == "template-scroller.php" ||
		$p_tpl == "template-fullsize-gallery.php" ||
		$p_tpl == "template-grid-fullsize.php" ||
		$p_tpl == "template-galleria.php" ) 
	{

		$obj_gallery = new UIElement_Gallery('page');
		$obj_gallery->getMetaBox();	
	
	}else
	
	/*-----------------------------------------------------------------------------------*/
	/*	template is a simple flickr stream template
	/*-----------------------------------------------------------------------------------*/	

	if ( $p_tpl == "template-flickr.php") {
		
		$obj_flickr = new UIElement_Flickr('page');
		$obj_flickr->getMetaBox();	
		
	}else
	
	/*-----------------------------------------------------------------------------------*/
	/*	template is a sortable template
	/*-----------------------------------------------------------------------------------*/	
	
	if ( $p_tpl == "template-sortable.php") {
		
		$obj_gallery = new UIElement('page');
		$obj_gallery->createMetabox(array(
			'id' => MAX_SHORTNAME.'_page_gallery_meta_box',
			'title' => __('Sortable grid settings', MAX_SHORTNAME),
			'priority' => "high"
		));			
		

		// Choose the galleries to display			
		$obj_gallery->addSortableGalleryCheckbox(array(
			'id' => 'max_sortable_galleries',
			'label' => __('Connect and sort Galleries', MAX_SHORTNAME),
			"standard" => "",
			"options" => $wp_gal_cats,
			"desc" => __('Choose the Galleries, you want to connect and display on this sortable portfolio page. You can sort those galleries to reorder the filter links. <strong>Only marked galleries are sortable.</strong>', MAX_SHORTNAME )
		));	

		// Show "all" link
		$obj_gallery->addDropdown(array( 
			"id" => MAX_SHORTNAME."_page_sortable_show_all",
			"options" => array('true'=>'Yes','false'=>'No'),
			"standard" => 'true',
			"label" => __('Show "All" link on gallery filter', MAX_SHORTNAME),
			"desc" => 'Choose, if you want to show the "All" link on your sortable filter links.',
		));				

		// Image Height
		$obj_gallery->addSlider(array(
			"id" => MAX_SHORTNAME."_page_gallery_sortable_height",
			"label" => __('Image height', MAX_SHORTNAME),
			"max" => 600,
			"min" => 100,
			"step" => 1,				
			"standard" => "112",
			"desc" => __('The height of one sortable image in px.', MAX_SHORTNAME)
		));

		// Image Width
		$obj_gallery->addSlider(array(
			"id" => MAX_SHORTNAME."_page_gallery_sortable_width",
			"label" => __('Image width', MAX_SHORTNAME),
			"max" => 450,
			"min" => 50,
			"step" => 1,				
			"standard" => "148",
			"desc" => __('The width of one sortable image in px.', MAX_SHORTNAME)
		));

		// Content Fullwidth
		$obj_gallery->addDropdown(array( 
			"id" => MAX_SHORTNAME."_page_gallery_fullwidth",
			"options" => array('true'=>'Yes','false'=>'No'),
			"standard" => 'false',
			"label" => __('Fullsize Content', MAX_SHORTNAME),
			"display" => true,
			"desc" => 'Choose, if you want to show the choosen gallery content in full browser width (Only available for "Sortable" portfolios).',
		));
		
		// Show/Hide title and excerpt
		$obj_gallery->addDropdown(array(
			'id' => 'max_page_allow_comments',
			'label' => __('Allow comments', MAX_SHORTNAME),
			"options" => array('false' => __('No', MAX_SHORTNAME),
							   'true' => __('Yes', MAX_SHORTNAME)							   
							   ),
			"standard" => "false",
			"desc" => __('Choose, if you want to show the comment form on this colum gallery page and allow users to post a comment.', MAX_SHORTNAME )
		));

		$obj_gallery->addGroupOpen(array(
			'id' => MAX_SHORTNAME.'_page_group_sorting',
			'label' => __('Select photo order', MAX_SHORTNAME),
			"desc" => __('Select the order to show the photos of the gallery attached to this page.', MAX_SHORTNAME ),
			'float' => true,
			"display" => true
		));	

			// Gallery Photo order
			$obj_gallery->addDropdown(array(
				'id' => 'max_gallery_order',
				"options" => $order_array,
				"standard" => "9999",
				"float" => true
			));
	
			// Gallery Photo sort
			$obj_gallery->addDropdown(array(
				'id' => 'max_gallery_sort',
				'label' => "",
				"options" => array('DESC'=> __('Descending', MAX_SHORTNAME), 'ASC'=> __('Ascending', MAX_SHORTNAME) ),
				"float" => true,
				"standard" => "DESC"
			));
		

		$obj_gallery->addGroupClose(array(
			'id' => MAX_SHORTNAME.'_page_group_sorting',
			'float' => true
		));			
			
	}

	/*-----------------------------------------------------------------------------------*/
	/*	Template is a fullsize flickr template
	/*-----------------------------------------------------------------------------------*/

	else if ($p_tpl == "template-fullsize-flickr.php"){
	
		$obj_flickr_fullsize = new UIElement_FlickrFullsize('page');
		$obj_flickr_fullsize->getMetaBox();
			
	}
	
	/*-----------------------------------------------------------------------------------*/
	/*	Template is a fullsize video template
	/*-----------------------------------------------------------------------------------*/
	
	else if ( $p_tpl == "template-fullsize-video.php" ){
	
		$obj_video_fullsize = new UIElement_VideoFullsize('page');
		$obj_video_fullsize->getMetaBox();
	
	}

	/*-----------------------------------------------------------------------------------*/
	/*	none of the portfolio templates are selected
	/*-----------------------------------------------------------------------------------*/
	
	else {
		
		$obj_gallery = new UIElement('page');
		$obj_gallery->createMetabox(array(
			'id' => MAX_SHORTNAME.'_page_gallery_meta_box',
			'title' => __('Gallery Settings', MAX_SHORTNAME),
			'priority' => "high"
		));		

		// Portfolio Template is not selected
		$obj_gallery->addAlert(array(
			'id' => 'max_page_gallery_alert',
			'label' => __('No Portfolio Template selected!', MAX_SHORTNAME),
			"standard" => "",
			"display" => true,
			"desc" => __('You have to choose a portfolio template on the right panel and publish your page to select a gallery.', MAX_SHORTNAME )
		));
	}
	
	/*-----------------------------------------------------------------------------------*/
	/*	Create page background options meta box
	/*-----------------------------------------------------------------------------------*/

	if( $p_tpl != "template-fullsize-gallery.php" && $p_tpl != "template-fullsize-flickr.php" && $p_tpl != "template-fullsize-video.php"  ) {
		$obj_background = new UIElement_PageBackground('page');
		$obj_background->getMetaBox();		
	}
	
}

?>