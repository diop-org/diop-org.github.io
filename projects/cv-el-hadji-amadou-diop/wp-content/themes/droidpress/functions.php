<?php

/*
	Functions
	Author: Tyler Cunningham
	Establishes the core theme functions.
	Copyright (C) 2011 CyberChimps
	Version 2.0
*/


// Define global variables.

	$themename = 'droidpress';
	$themenamefull = 'DroidPress';
	$themeslug = 'dp';
	$options = get_option($themename);

// Define Content Width.

if ( ! isset( $content_width ) ) $content_width = 600;

// Add support for post formats.
	add_theme_support(
		'post-formats',
		array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat')
	);

// Custom excerpt functions. 

function droidpress_new_excerpt_more($more) {

	global $themename, $themeslug, $options;
    
    	if ($options[$themeslug.'_excerpt_link_text'] == '') {
    		$linktext = '(Read More...)';
   		}
    
    	else {
    		$linktext = $options[$themeslug.'_excerpt_link_text'];
   		}
    
    global $post;
	return '<a href="'. get_permalink($post->ID) . '"> <br /><br /> '.$linktext.'</a>';
}
add_filter('excerpt_more', 'droidpress_new_excerpt_more');

function droidpress_new_excerpt_length($length) {

	global $themename, $themeslug, $options;
	
		if ($options[$themeslug.'_excerpt_length'] == '') {
    		$length = '55';
    	}
    
    	else {
    		$length = $options[$themeslug.'_excerpt_length'];
    	}

	return $length;
}
add_filter('excerpt_length', 'droidpress_new_excerpt_length');

// Add auto-feed links support.	
	add_theme_support('automatic-feed-links');
	
// Add post-thumb support.

	global $themename, $themeslug, $options;
	
		if($options[$themeslug.'_featured_image_height'] == "") {
			$featureheight = '100';
	}		
	
	else {
		$featureheight = $options[$themeslug.'_featured_image_height']; 
		
	}
	
		if ($options[$themeslug.'_featured_image_width'] == "") {
			$featurewidth = '100';
	}		
	
	else {
		$featurewidth = $options[$themeslug.'_featured_image_width']; 
	}
	add_theme_support( 'post-thumbnails' ); 
	set_post_thumbnail_size( $featureheight, $featurewidth, true );
	
	
// This theme allows users to set a custom background
	add_custom_background();
	
// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();
	

// PIE  
function droidpress_render_ie_pie() { ?>
	
	<style type="text/css" media="screen">
		#header li a, .postmetadata, .post_container, #navbackground, .wp-caption, .sidebar-widget-style, .sidebar-widget-title, .boxes, .box1, .box2, .box3, .box-widget-title,
  			{
  				behavior: url('<?php get_stylesheet_directory_uri('stylesheet_directory'); ?>/library/pie/PIE.htc');
			}
	</style>
<?php
}

add_action('wp_head', 'droidpress_render_ie_pie', 8);

// + 1 Button 

function droidpress_plusone(){
	
	$path =  get_template_directory_uri() ."/library/js/";

	$script = "
		
		<script type=\"text/javascript\" src=\"".$path."plusone.js\"></script>
		";
	
	echo $script;
}
add_action('wp_head', 'droidpress_plusone');



// Call Superfish
if ( !is_admin() ) 
{
	function droidpress_superfish()
 	{  
   
    	// Adjust the below path to where scripts dir is, if you must.
    	$scriptdir = get_template_directory_uri() ."/library/sf/";
 
    	// Register the Superfish javascript file
    	wp_register_script( 'superfish', $scriptdir.'sf.js', false, '1.4.8');
    	wp_register_script( 'sf-menu', $scriptdir.'sf-menu.js');
   
   		 //load the scripts.
    	wp_enqueue_script('superfish');
    	wp_enqueue_script('sf-menu');
    	
  	}
add_action('wp_enqueue_scripts', 'droidpress_superfish');
}
	
// Register menu names
	
function droidpress_register_menus() {
	register_nav_menus(
		array( 'header-menu' => 'Header Menu', 'footer-menu' => 'Footer Menu' )
  	);
}

add_action( 'init', 'droidpress_register_menus' );
	
// Menu fallback
	
function droidpress_menu_fallback() {
	global $post; ?>
	
	<ul id="menu-nav" class="sf-menu">
		<?php wp_list_pages( 'title_li=&sort_column=menu_order&depth=3'); ?>
	</ul><?php
}

//Add link to theme settings in Admin bar

function droidpress_admin_link() {

	global $wp_admin_bar;

	$wp_admin_bar->add_menu( array( 'id' => 'DroidPress', 'title' => 'DroidPress Settings', 'href' => admin_url('themes.php?page=theme_options')  ) ); 
  
}
add_action( 'admin_bar_menu', 'droidpress_admin_link', 113 );


// DroidPress Widgits Init

function droidpress_widgets_init() {
    register_sidebar(array(
    	'name' => 'Sidebar Widgets',
    	'id'   => 'sidebar-widgets',
    	'description'   => 'These are widgets for the sidebar.',
    	'before_widget' => '<div id="%1$s" class="sidebar-widget-style">',
    	'after_widget'  => '</div>',
    	'before_title'  => '<h2 class="sidebar-widget-title">',
    	'after_title'   => '</h2>'
    ));
    	
	register_sidebar(array(
		'name' => 'Footer',
		'id' => 'footer-widgets',
		'description'   => 'These are widgets for the footer',
		'before_widget' => '<div class="footer-widgets">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="footer-widget-title">',
		'after_title' => '</h3>',
	));
}
add_action( 'widgets_init', 'droidpress_widgets_init' );    

	//Theme options files
	
require_once ( get_template_directory() . '/library/options/options-core.php' );
require_once ( get_template_directory() . '/library/options/meta-box.php' );
require_once ( get_template_directory() . '/library/options/options-themes.php' );
?>