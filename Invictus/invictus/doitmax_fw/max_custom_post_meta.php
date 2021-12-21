<?php
/* #################################################################################### */
/*	Custom Post Meta File
 *
 * @author		Dennis Osterkamp aka "doitmax"
 * @copyright	Copyright (c) Dennis Osterkamp
 * @link		http://www.do-media.de
 * @since		Version 1.0
 * @package 	Invictus
 * 
 * @filedesc 	File to create the custom meta fields for posts
 *
/* #################################################################################### */

// Include ui element class
include("uielement.class.php");

// Include option set classes for posts
include('post_meta/blog.class.php');
include('post_meta/photo.class.php');
include('post_meta/background.class.php');
include('post_meta/copyright.class.php');
include('post_meta/slider.class.php');
include('post_meta/blog.slider.class.php');

/*-----------------------------------------------------------------------------------*/
/*	Add the photo post meta box
/*-----------------------------------------------------------------------------------*/

add_action('init', 'max_add_post_meta', 12);

function max_add_post_meta() {
	
	global $wpdb, $p_tpl, $taxonomies, $order_array, $post_id;	
	
	// Get the gallery gategories
	$taxonomies =  max_get_galleries();
	
	$post_id = @$_GET['post'] ? @$_GET['post'] : @$_POST['post_ID'];
		
	@$custom_fields = get_post_custom_values('_wp_page_template', $post_id );
	$p_tpl = $custom_fields[0];
	
	/*-----------------------------------------------------------------------------------*/
	/*	create photo options meta box
	/*-----------------------------------------------------------------------------------*/		
	$obj_photo = new UIElement_Photo('gallery');
	$obj_photo->getMetaBox();

	/*-----------------------------------------------------------------------------------*/
	/*	create slider options meta box
	/*-----------------------------------------------------------------------------------*/		
	$obj_slider = new UIElement_Slider('gallery');
	$obj_slider->getMetaBox();	
	
	/*-----------------------------------------------------------------------------------*/
	/*	create background options meta box
	/*-----------------------------------------------------------------------------------*/		
	$obj_background = new UIElement_PostBackground('gallery');
	$obj_background->getMetaBox();

	/*-----------------------------------------------------------------------------------*/
	/*	create copyright options meta box
	/*-----------------------------------------------------------------------------------*/		
	$obj_copyright = new UIElement_Copyright('gallery');
	$obj_copyright->getMetaBox();
		
	/* Do the database update query
	$q = "UPDATE $wpdb->postmeta SET meta_key = REPLACE (
			meta_key,
			'_value1',
			'_value')";
				
	$related = $wpdb->query($q);
	*/
}

/*-----------------------------------------------------------------------------------*/
/*	Add the Blog post meta box
/*-----------------------------------------------------------------------------------*/

add_action('init', 'max_add_blog_meta', 12);
function max_add_blog_meta() {
	
	/* create blog options meta box */
	$obj_blog = new UIElement_Blog('post');
	$obj_blog->getMetaBox();
	
	/*-----------------------------------------------------------------------------------*/
	/*	create slider options meta box
	/*-----------------------------------------------------------------------------------*/		
	$obj_slider = new UIElement_BlogSlider('post');
	$obj_slider->getMetaBox();		
		
}

?>