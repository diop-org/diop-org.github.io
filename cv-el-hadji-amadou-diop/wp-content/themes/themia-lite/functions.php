<?php
include_once get_template_directory()  . '/functions/inkthemes-functions.php';
$functions_path = get_template_directory()  . '/functions/';
/* These files build out the options interface.  Likely won't need to edit these. */
require_once ($functions_path . 'admin-functions.php');  // Custom functions and plugins
require_once ($functions_path . 'admin-interface.php');  // Admin Interfaces (options,framework, seo)
/* These files build out the theme specific options and associated functions. */
require_once ($functions_path . 'theme-options.php');   // Options panel settings and custom settings
function inkthemes_wp_enqueue_scripts() {
    if (!is_admin()) {
        wp_enqueue_script('jquery');
        wp_enqueue_script('inkthemes_ddsmoothmenu', get_template_directory_uri() . "/js/ddsmoothmenu.js", array('jquery'));
        wp_enqueue_script('inkthemes_tipsy', get_template_directory_uri() . '/js/jquery.tipsy.js', array('jquery'));        
        wp_enqueue_script('inkthemes_validate', get_template_directory_uri() . '/js/jquery.validate.min.js', array('jquery'));
        wp_enqueue_script('inkthemes_verif', get_template_directory_uri() . '/js/verif.js', array('jquery'));
        wp_enqueue_script('inkthemes_ddsmoothmenuinit', get_template_directory_uri() . "/js/custom.js", array('jquery'));
    } elseif (is_admin()) {
        
    }
}
add_action('wp_enqueue_scripts', 'inkthemes_wp_enqueue_scripts');
function inkthemes_get_option( $name ) {
	$options = get_option( 'inkthemes_options' );
	if ( isset( $options[ $name ] ) )
		return $options[ $name ];
}
function inkthemes_update_option( $name, $value ) {
	$options = get_option( 'inkthemes_options' );
	$options[ $name ] = $value;	
	return update_option( 'inkthemes_options', $options );
}
function inkthemes_delete_option( $name ) {
	$options = get_option( 'inkthemes_options' );
	unset( $options[ $name ] );	
	return update_option( 'inkthemes_options', $options );
}
//Enqueue comment thread js
function inkthemes_enqueue_comment_reply() {
        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
                wp_enqueue_script( 'comment-reply' );
        }
}
add_action( 'wp_enqueue_scripts', 'inkthemes_enqueue_comment_reply' );