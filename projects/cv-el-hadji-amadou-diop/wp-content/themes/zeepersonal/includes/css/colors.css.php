<?php 
add_action('wp_head', 'themezee_css_colors');
function themezee_css_colors() {
	
	$options = get_option('themezee_options');
	
	if ( isset($options['themeZee_color_activate']) and $options['themeZee_color_activate'] == 'true' ) {
		
		echo '<style type="text/css">';
		echo '
			a, a:link, a:visited,
			#sidebar ul li h2,
			.post h2, .attachment h2,
			.post h2 a:link, .post h2 a:visited,
			.postmeta a:link, .postmeta a:visited,
			.postinfo a:link, .postinfo a:visited,
			#comments a:link, #comments a:visited, #respond a:link, #respond a:visited,
			.bottombar ul li h2,
			#comments h3, #respond h3
			{
				color: #'.esc_attr($options['themeZee_colors_full']).';
			}
			#sidebar ul li h2, .bottombar ul li h2,
			#commentform input, #commentform textarea {
				border-left: 3px solid #'.esc_attr($options['themeZee_colors_full']).';
			}
			.post h2, .type-page h2,
			#comments h3, #respond h3 {
				border-left: 5px solid #'.esc_attr($options['themeZee_colors_full']).';
			}
		';
		echo '</style>';
	}
}