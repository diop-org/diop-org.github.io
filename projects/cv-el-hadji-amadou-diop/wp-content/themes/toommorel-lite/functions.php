<?php
include_once TEMPLATEPATH . '/functions/inkthemes-functions.php';
$functions_path = STYLESHEETPATH . '/functions/';
/* These files build out the options interface.  Likely won't need to edit these. */
require_once ($functions_path . 'admin-functions.php');		// Custom functions and plugins
require_once ($functions_path . 'admin-interface.php');		// Admin Interfaces (options,framework, seo)
/* These files build out the theme specific options and associated functions. */
require_once ($functions_path . 'theme-options.php'); 		// Options panel settings and custom settings
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Styles Enqueue */
/*-----------------------------------------------------------------------------------*/
function add_my_stylesheet() {
wp_enqueue_style( 'coloroptions', get_template_directory_uri() ."/css/". get_option('inkthemes_altstylesheet'). ".css", '', '', 'all' );
}
add_action('init', 'add_my_stylesheet');
/*-----------------------------------------------------------------------------------*/
/* jQuery Enqueue */
/*-----------------------------------------------------------------------------------*/
function inkthemes_jquery_init() {
if (!is_admin()) {
wp_deregister_script('jquery');
wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js', false, '1.6.1', true);//load jquery from google api, and place in footer
wp_enqueue_script('jquery');
wp_enqueue_script( 'ddsmoothmenu', get_stylesheet_directory_uri()."/js/ddsmoothmenu.js", array('jquery'));
wp_enqueue_script( 'ddsmoothmenuinit', get_stylesheet_directory_uri()."/js/ddsmoothmenu-init.js", array('jquery'));

wp_enqueue_script( 'homeimagezoomeffect', get_stylesheet_directory_uri()."/js/image-effect.js", array('jquery'));
wp_enqueue_script( 'slides', get_stylesheet_directory_uri().'/js/jquery.scrollTo-min.js', array('jquery'));
wp_enqueue_script( 'slidesinit', get_stylesheet_directory_uri().'/js/stylesheetToggle.js', array('jquery'));
wp_enqueue_script( 'cufonyui', get_stylesheet_directory_uri().'/js/cufon-yui.js', array('jquery'));
wp_enqueue_script( 'cufonfont', get_stylesheet_directory_uri().'/js/DIN_400-DIN_700.font.js', array('jquery'));
wp_enqueue_script( 'tipsy', get_stylesheet_directory_uri().'/js/jquery.tipsy.js', array('jquery')); 
wp_enqueue_script( 'zoombox', get_stylesheet_directory_uri().'/js/zoombox.js', array('jquery'));
wp_enqueue_script( 'validate', get_stylesheet_directory_uri().'/js/jquery.validate.min.js', array('jquery'));
wp_enqueue_script( 'verif', get_stylesheet_directory_uri().'/js/verif.js', array('jquery'));
wp_enqueue_script( 'custom', get_stylesheet_directory_uri().'/js/custom.js', array('jquery'));
}elseif (is_admin()){
}
}
add_action('init', 'inkthemes_jquery_init');
?>
