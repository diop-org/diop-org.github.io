<?php

// Load additional Predefined Color Schemes if Custom Colors is deactivated
function themezee_load_custom_css() { 
	$options = get_option('themezee_options');
	
	// Load PredefinedColor CSS
	if ( !isset($options['themeZee_color_activate']) or $options['themeZee_color_activate'] != 'true' ) {
		$stylesheet = get_stylesheet_directory_uri() . '/includes/css/colorschemes/' . $options['themeZee_stylesheet'];
		wp_register_style('zee_color_scheme', $stylesheet, array('zee_stylesheet'));
		wp_enqueue_style( 'zee_color_scheme');
	}
}
add_action('wp_enqueue_scripts', 'themezee_load_custom_css');


// Include Fonts from Google Web Fonts API
function themezee_load_web_fonts() { 

	$options = get_option('themezee_options');
	
	// Default Fonts which haven't to be load from Google
	$default_fonts = array('Arial', 'Verdana', 'Tahoma', 'Times New Roman');

	// Load Fonts ?
	if ( isset($options['themeZee_fonts_activate']) and $options['themeZee_fonts_activate'] == 'true' ) :
	
		// Load Text Font
		if(isset($options['themeZee_fonts_text']) and !in_array($options['themeZee_fonts_text'], $default_fonts)) :
			wp_register_style('themezee_text_font', 'http://fonts.googleapis.com/css?family=' . $options['themeZee_fonts_text']);
			wp_enqueue_style('themezee_text_font');
		endif;
		
		// Load Navigation Font
		if(isset($options['themeZee_fonts_navi']) and !in_array($options['themeZee_fonts_navi'], $default_fonts)) :
			wp_register_style('themezee_navi_font', 'http://fonts.googleapis.com/css?family=' . $options['themeZee_fonts_navi']);
			wp_enqueue_style('themezee_navi_font');
		endif;
		
		// Load Title Font
		if(isset($options['themeZee_fonts_title']) and !in_array($options['themeZee_fonts_title'], $default_fonts)) :
			wp_register_style('themezee_title_font', 'http://fonts.googleapis.com/css?family=' . $options['themeZee_fonts_title']);
			wp_enqueue_style('themezee_title_font');
		endif;
		
	// Load Standard Font
	else: 
		wp_register_style('themezee_default_font', 'http://fonts.googleapis.com/css?family=Carme');
		wp_enqueue_style('themezee_default_font');
		wp_register_style('themezee_default_font_two', 'http://fonts.googleapis.com/css?family=Oswald');
		wp_enqueue_style('themezee_default_font_two');
	endif;
}
add_action('wp_enqueue_scripts', 'themezee_load_web_fonts');

// Web Fonts Wrapper Function for Admin
function themezee_load_web_fonts_admin() { 
	
	// Make sure to load Fonts only at Theme Options Page in the Backend
	if ( isset($_GET['page']) and $_GET['page'] == 'themezee' ) :
		themezee_load_web_fonts();
	endif; 
}
add_action('admin_enqueue_scripts', 'themezee_load_web_fonts_admin');


// Include CSS Files
locate_template('/includes/css/colors.css.php', true);
locate_template('/includes/css/fonts.css.php', true);
locate_template('/includes/css/layout.css.php', true);

?>