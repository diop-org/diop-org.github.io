<?php

/**
 * Register widgetized area
 */
 if ( ! function_exists( 'max_widgets_init' ) ):
function max_widgets_init() {
	
	$before_title  = '<h2 class="widget-title">';
	$after_title   = '</h2>';
	$before_widget = '<aside id="%1$s" class="widget %2$s">';
	$after_widget  = '</aside>';
	
	$_sidebar_array = array(
		array( "id" => "blog", "name" => __('Blog Sidebar', MAX_SHORTNAME), "description" =>  __( 'Blog Sidebar Widget Area', MAX_SHORTNAME) ),
		array( "id" => "homepage", "name" => __( 'Homepage Sidebar', MAX_SHORTNAME), "description" =>  __( 'Homepage Widget Area', MAX_SHORTNAME) ),
		array( "id" => "blog-post", "name" => __( 'Blog Post Sidebar', MAX_SHORTNAME), "description" =>  __( 'Blog Post Sidebar Widget Area', MAX_SHORTNAME) ),
		array( "id" => "gallery-project", "name" => __( 'Gallery Project Page Sidebar', MAX_SHORTNAME), "description" =>  __( 'Gallery Project Page Template Widget Area', MAX_SHORTNAME) ),
		array( "id" => "gallery-sortable", "name" => __( 'Gallery Sortable Sidebar', MAX_SHORTNAME), "description" =>  __( 'Gallery Sortable Template Widget Area', MAX_SHORTNAME) ),
		array( "id" => "gallery-four", "name" => __( 'Gallery 4 Column Sidebar', MAX_SHORTNAME), "description" =>  __( 'Gallery 4 Column Template Widget Area', MAX_SHORTNAME) ),
		array( "id" => "gallery-three", "name" => __( 'Gallery 3 Column Sidebar', MAX_SHORTNAME), "description" =>  __( 'Gallery 3 Column Template Widget Area', MAX_SHORTNAME) ),
		array( "id" => "gallery-two", "name" => __( 'Gallery 2 Column Sidebar', MAX_SHORTNAME), "description" =>  __( 'Gallery 2 Column Template Widget Area', MAX_SHORTNAME) ),
		array( "id" => "gallery-one", "name" => __( 'Gallery 1 Column Sidebar', MAX_SHORTNAME), "description" =>  __( 'Gallery 1 Column Template Widget Area', MAX_SHORTNAME) ),
		array( "id" => "tag", "name" => __( 'Tag Sidebar', MAX_SHORTNAME), "description" =>  __( 'Tag Template Widget Area', MAX_SHORTNAME) ),
		array( "id" => "gallery-flickr", "name" => __( 'Gallery Flickr Sidebar', MAX_SHORTNAME), "description" =>  __( 'Gallery Flickr Template Widget Area', MAX_SHORTNAME) ),
		array( "id" => "gallery-taxonomy", "name" => __( 'Gallery Taxonomy Sidebar', MAX_SHORTNAME), "description" =>  __( 'Gallery Taxonomy Template Widget Area', MAX_SHORTNAME) ),
		array( "id" => "main", "name" => __( 'Sidebar left Template Sidebar', MAX_SHORTNAME), "description" =>  __( 'Sidebar for Custom Template with left sidebar', MAX_SHORTNAME) ),
		array( "id" => "search-result", "name" => __( 'Sidebar Search Result', MAX_SHORTNAME), "description" =>  __( 'Sidebar for Search results with left sidebar', MAX_SHORTNAME) ),
		array( "id" => "archive-result", "name" => __( 'Sidebar Archive', MAX_SHORTNAME), "description" =>  __( 'Sidebar for Archive with left sidebar', MAX_SHORTNAME) ),
		array( "id" => "contact", "name" => __( 'Sidebar Contact', MAX_SHORTNAME), "description" =>  __( 'Sidebar for Contact page with left sidebar', MAX_SHORTNAME) ),
		array( "id" => "fullsize-gallery", "name" => __( 'Sidebar Fullsize Gallery', MAX_SHORTNAME), "description" =>  __( 'Sidebar for fullsize gallery templates', MAX_SHORTNAME) ),
		array( "id" => "fullsize-video", "name" => __( 'Sidebar Fullsize Video', MAX_SHORTNAME), "description" =>  __( 'Sidebar for fullsize video templates', MAX_SHORTNAME) ),
		array( "id" => "fullsize-flickr", "name" => __( 'Sidebar Fullsize Flickr', MAX_SHORTNAME), "description" =>  __( 'Sidebar for fullsize flickr templates', MAX_SHORTNAME) )
	);
	
	// Loop array with sidebars
	foreach($_sidebar_array as $index => $value){
		register_sidebar( array (
			'name' => $value['name'],
			'id' => "sidebar-" . $value['id'],
			'description' => $value['description'],
			'before_widget' => $before_widget,
			'after_widget' => $after_widget,
			'before_title' => $before_title,
			'after_title' => $after_title
		) );		
	}
	
}
/** Register sidebars by running max_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'max_widgets_init' );
endif;


/*-----------------------------------------------------------------------------------*/
/*	Load Widgets 
/*-----------------------------------------------------------------------------------*/

// Add the Terms Custom Widget
include($fw_path."/widgets/widget-terms.php");
// Add the Recent Photos Widget
include($fw_path."/widgets/widget-recent-photos.php");
// Add the Recent Tweets Widget
include($fw_path."/widgets/widget-twitter.php");
// Add the Flickr Stream Widget
include($fw_path."/widgets/widget-flickr.php");
// Add the Custom Video Widget
include($fw_path."/widgets/widget-video.php");
// Add the Custom Welcome Teaser Widget
include($fw_path."/widgets/widget-teaser.php");

?>