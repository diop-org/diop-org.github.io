<?php 

// CORE VERSION
	define('CORE_VERSION', "4.0.0");

// COMMON WP VARIABLES
	define('SITENAME',get_bloginfo('name'));
	define('RSSURL',get_bloginfo('rss2_url'));
	define('FEEDID',get_option('feedid'));
	
// DEFINE CORE CONSTANTS

	define('CORE_FUNCTIONS', CORE . '/functions');
	define('CORE_PLUGINS', CORE . '/plugins');
	define('CORE_CLASSES', CORE . '/classes');
	define('CORE_ADMIN', CORE . '/admin');
	define('CORE_INITS', CORE . '/inits');
	define('CORE_LIB', CORE . '/library');
	define('CORE_TEMPLATES', CORE . '/templates');

// DEFINE DIRECTORY CONSTANTS
	define('THEME_CONFIG', TEMPLATEPATH . '/config');
	define('THEME_LIB', TEMPLATEPATH . '/library');
	define('THEME_SECTIONS', TEMPLATEPATH . '/sections');

// DEFINE WEB FOLDERS
	define('THEME_ROOT', get_bloginfo('template_url'));
	define('CORE_ROOT', THEME_ROOT.'/'.CORENAME);
	define('SECTION_ROOT', THEME_ROOT.'/sections');
	
	// CORE WEB ROOTS
		define('CORE_JS', CORE_ROOT . '/js');
		define('CORE_CSS', CORE_ROOT . '/css');
		define('CORE_IMAGES', CORE_ROOT . '/images');
	
	//THEME SPECIFIC
		define('THEME_CSS', THEME_ROOT . '/css');
		define('THEME_JS', THEME_ROOT . '/js');
		define('THEME_IMAGES', THEME_ROOT . '/images');
	
		define('PAGELINES_PRO', TEMPLATEPATH . '/pro');
		
		// PRO - To be deprecated
			define('PRO', TEMPLATEPATH . '/pro');
		
		define('PRO_CSS', THEME_ROOT . '/pro/css');
		define('DEV', TEMPLATEPATH . '/dev');
			
// DEMO MODE
	define('DEMO', false);	

// LOCALIZE
	function pagelines_localize(){
		// LOCALIZATION - Needs to come after config_theme and before localized config files
			define('TDOMAIN', THEMENAME); 
			define('LANGUAGE_FOLDER', TEMPLATEPATH.'/language');
			load_theme_textdomain(TDOMAIN, LANGUAGE_FOLDER );

			$locale = get_locale();
			$locale_file = TEMPLATEPATH . "/language/$locale.php";
			if ( is_readable( $locale_file ) )
				require_once( $locale_file );
	}


?>