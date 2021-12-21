<?php
/**
 * This file initializes the PageLines framework 
 *
 * @package PageLines Core
 *
 **/


//	Run the pagelines_pre Hook
	do_action('pagelines_code_pre');

// GET GLOBAL VARIABLES
	include(CORE.'/globals.php');

// GET MASTER CONFIGURATION
	include_once(THEME_CONFIG . '/config_theme.php');


//LOCALIZE
	pagelines_localize();

// CORE FUNCTION LIBRARIES
	include (CORE.'/functions/functions_library.php');

// SHORTCODES
	include (CORE_FUNCTIONS.'/shortcode_library.php');

// THEME CONFIGURATION

	include_once(THEME_CONFIG . '/config_options.php'); // The Pagelines Option config class
	include_once(THEME_CONFIG . '/config_features.php'); // The Pagelines Features config class
	include_once(THEME_CONFIG . '/config_page_post.php'); // The Pagelines Page/Post options config 
	include_once(THEME_CONFIG . '/config_widgets.php');
	

// SUPPORTED WORDPRESS OPTIONS
	if (function_exists( 'add_theme_support' )){
		
		
		add_theme_support( 'post-thumbnails', array('post') ); // Add it for posts & all custom post types
		add_theme_support( 'menus' );
		
		// Add default posts and comments RSS feed links to head
		add_theme_support( 'automatic-feed-links' );
	} 


/*
	Deprected Core 3.0 Files
*/

 	include_once(THEME_CONFIG . '/config_sidebars.php');
	if(file_exists(THEME_CONFIG . '/config_template.php')) include_once(THEME_CONFIG . '/config_template.php');


	
	/*
		TODO Deprecate these files with Core to 4
	*/
	// CORE OPTIONS HANDLING
		include (CORE_ADMIN.'/options.class.php');
	
	// INITIATE OPTIONS OBJECT - must come after theme functions file (or functions won't exist)
	 	$GLOBALS['pagelines'] = new Options; 
	
	// WP CONFIG OPTIONS
		include (CORE_FUNCTIONS.'/wp_config_options.php');

	
// VERSIONS 
	if(VPRO) include(PAGELINES_PRO.'/init_pro.php');
	if(VDEV) include(DEV.'/init_dev.php');	

	
//ADMIN INTERFACES
	include (CORE_ADMIN.'/init_admin.php'); 
	include (CORE_ADMIN.'/admin_functions.php');

	include (CORE_ADMIN.'/option_templates.php'); 
	include (CORE_ADMIN.'/pagepost_setup.php');

	add_action('pagelines_before_html', 'pagelines_id_setup');
	function pagelines_id_setup(){
		global $post;
		global $pagelines_ID;
		
		if(isset($post) && is_object($post)) $pagelines_ID = $post->ID;
		else $pagelines_ID = '';
		
		// CORE PLUGINS
			if(!function_exists('twitter_messages')) include (CORE_PLUGINS.'/twitter.php');
	}

//	Run the pagelines_init Hook
	do_action('pagelines_code_init');

	
