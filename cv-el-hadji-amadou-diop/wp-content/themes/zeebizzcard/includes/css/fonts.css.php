<?php 
add_action('wp_head', 'themezee_css_fonts');
function themezee_css_fonts() {
	
	echo '<style type="text/css">';
	$options = get_option('themezee_options');
	
	if ( isset($options['themeZee_fonts_activate']) and $options['themeZee_fonts_activate'] == 'true' ) {
	
		echo '
			body, .postmeta {
				font-family: "'.esc_attr($options['themeZee_fonts_text']).'";
				font-size: '.esc_attr($options['themeZee_font_size_text']).'pt;
			}
			#logo h1, .post-title, .page-title {
				font-family: "'.esc_attr($options['themeZee_fonts_title']).'";
				font-size: '.esc_attr($options['themeZee_font_size_page_title']).'pt;
			}
			#logo h2, #navi ul li a, #sidebar ul li h2 {
				font-family: "'.esc_attr($options['themeZee_fonts_navi']).'";
				font-size: '.esc_attr($options['themeZee_font_size_navi']).'pt;
			}
			.postmeta {
				font-size: 0.85em;
			}
			.post-title {
				font-size: '.esc_attr($options['themeZee_font_size_post_title']).'pt;
			}
			
		';
	}
	echo '</style>';
}