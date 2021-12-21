<?php

/** Tell WordPress to run max_setup() when the 'after_setup_theme' hook is run. */
add_action( 'after_setup_theme', 'max_setup' );

if ( ! function_exists( 'max_setup' ) ):

/*-----------------------------------------------------------------------------------*/
/*	Register and load common JS and CSS for various WordPress features.
/*-----------------------------------------------------------------------------------*/

function max_setup() {

	// Init JQuery scripts
	function theme_add_scripts() {
		if (!is_admin()) {		
			wp_deregister_script('jquery');
						
			wp_register_script('jquery', get_template_directory_uri() . '/js/jquery.min.js', false, '1.5.1');
			wp_register_script('validation', get_template_directory_uri() . '/js/jquery.validate.js', 'jquery');
			wp_register_script('jquery-ui-custom', get_template_directory_uri() . '/js/jquery-ui-1.8.10.custom.min.js', 'jquery');
		
			wp_register_script('easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', 'jquery');			
			wp_register_script('jquery-mousewheel', get_template_directory_uri() . '/js/jquery.mousewheel.min.js', 'jquery');
			wp_register_script('jquery-livequery', get_template_directory_uri() . '/js/jquery.livequery.min.js', 'jquery');
			wp_register_script('jquery-animate', get_template_directory_uri() . '/js/jquery.animate-enhanced.min.js', 'jquery');

			wp_register_script('selectivizr', get_template_directory_uri() . '/js/selectivizr.js', 'jquery');
			wp_register_script('prettyphoto', get_template_directory_uri() .'/js/prettyPhoto/jquery.prettyPhoto.js', 'jquery');
			wp_register_script('superbgimage', get_template_directory_uri() . '/js/jquery.superbgimage.min.js', 'jquery');	
			wp_register_script('superfish', get_template_directory_uri() .'/js/superfish.js', 'jquery', '3.1');
			
			// check for iphone, ipad or other devices
			$isiPad = (bool) strpos($_SERVER['HTTP_USER_AGENT'],'iPad');
			$isiPhone = (bool) strpos($_SERVER['HTTP_USER_AGENT'],'iPhone');
			$isiPod = (bool) strpos($_SERVER['HTTP_USER_AGENT'],'iPod');
			
			if($isiPad === true || $isiPhone === true || $isiPod === true){
				wp_register_script('superfish-touch', get_template_directory_uri() .'/js/jquery.sftouchscreen.js', 'jquery', '3.1');
			}		
			
			wp_register_script('tipsy', get_template_directory_uri() .'/js/tipsy/jquery.tipsy.min.js', 'jquery');
			wp_register_script('quicksand', get_template_directory_uri() .'/js/jquery.quicksand.js', 'jquery');
			wp_register_script('masonry', get_template_directory_uri() .'/js/jquery.masonry.min.js', 'jquery');
			wp_register_script('flickrush', get_template_directory_uri() .'/js/jquery.flickrush.min.js', 'jquery');
			
			wp_register_script('custom-script', get_template_directory_uri() .'/js/custom.js', 'jquery');
			wp_register_script('custom-superbgimage', get_template_directory_uri() .'/js/custom-superbgimage.js', 'jquery');
			wp_register_script('custom-quicksand', get_template_directory_uri() .'/js/custom-quicksand.js', 'jquery');
			wp_register_script('custom-scroller', get_template_directory_uri() .'/js/custom-scroller.js', 'jquery');			
			
			// Load the allover needed scripts
			wp_enqueue_script('jquery');
			wp_enqueue_script('jquery-ui-custom');
			wp_enqueue_script('jquery-livequery');
			wp_enqueue_script('superfish');
			if($isiPad === true || $isiPhone === true || $isiPod === true){
				wp_enqueue_script('superfish-touch');	
			}
			wp_enqueue_script('easing');
			wp_enqueue_script('prettyphoto');
			wp_enqueue_script('superbgimage');
			wp_enqueue_script('tipsy');
			wp_enqueue_script('custom-script');	
			
		}
	}	

	// Init additional needed CSS Styles
	function theme_add_styles() {	
		if (!is_admin()) {		
			wp_enqueue_style('prettyphoto', get_template_directory_uri().'/js/prettyPhoto/prettyPhoto.css', false, false);			
			wp_enqueue_style('tipsy', get_template_directory_uri().'/js/tipsy/tipsy.css', false, false);

		}
	}	
	add_action('init', 'theme_add_styles');
	add_action('init', 'theme_add_scripts');
	
	// load the following scripts only on homepage
	function max_index_scripts() {
		if (is_home()){
			wp_enqueue_script('jquery-mousewheel');
			wp_enqueue_script('custom-superbgimage');
		}
	}
	add_action('wp_print_scripts', 'max_index_scripts');	

	// load the following scripts only when using IE - shame on you
	function max_ie_scripts() {
		global $is_IE;
		if($is_IE){
			wp_enqueue_script('selectivizr');
		}
	}
	add_action('wp_print_scripts', 'max_ie_scripts');




}
endif;

?>