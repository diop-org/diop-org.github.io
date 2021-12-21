<?php
include_once get_template_directory() . '/functions/inkthemes-functions.php';
$functions_path = get_template_directory() . '/functions/';
/* These files build out the options interface.  Likely won't need to edit these. */
require_once ($functions_path . 'admin-functions.php');		// Custom functions and plugins
require_once ($functions_path . 'admin-interface.php');		// Admin Interfaces (options,framework, seo)
/* These files build out the theme specific options and associated functions. */
require_once ($functions_path . 'theme-options.php'); 		// Options panel settings and custom settings
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* jQuery Enqueue */
/*-----------------------------------------------------------------------------------*/
function inkthemes_wp_enqueue_scripts() {
if (!is_admin()) {
wp_enqueue_script('jquery');
wp_enqueue_script( 'inkthemes-ddsmoothmenu', get_template_directory_uri()."/js/ddsmoothmenu.js", array('jquery'));
wp_enqueue_script( 'inkthemes-slides', get_template_directory_uri()."/js/slides.min.jquery.js", array('jquery'));
wp_enqueue_script( 'inkthemes-jcarouselite', get_template_directory_uri()."/js/jcarousellite_1.0.1.js", array('jquery'));
wp_enqueue_script( 'inkthemes-confu-ui', get_template_directory_uri()."/js/cufon-yui.js", array('jquery'));
wp_enqueue_script( 'inkthemes-quicksand-confu', get_template_directory_uri().'/js/mank-sans.cufonfonts.js', array('jquery'));
wp_enqueue_script( 'inkthemes-custom', get_template_directory_uri().'/js/custom.js', array('jquery'));
}elseif (is_admin()){
}
}
add_action('init', 'inkthemes_wp_enqueue_scripts');

//
function inkthemes_get_option( $name ) {
	$options = get_option( 'inkthemes_options' );
	if ( isset( $options[ $name ] ) )
		return $options[ $name ];
}

//
function inkthemes_update_option( $name, $value ) {
	$options = get_option( 'inkthemes_options' );
	$options[ $name ] = $value;
	
	return update_option( 'inkthemes_options', $options );
}

//
function inkthemes_delete_option( $name ) {
	$options = get_option( 'inkthemes_options' );
	unset( $options[ $name ] );
	return update_option( 'inkthemes_options', $options );
}

?>
