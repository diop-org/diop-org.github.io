<?php 
add_action('wp_head', 'themezee_css_colors');
function themezee_css_colors() {
	
	$options = get_option('themezee_options');
	
	if ( isset($options['themeZee_color_activate']) and $options['themeZee_color_activate'] == 'true' ) {
		
		echo '<style type="text/css">';
		echo '
			#header, #footer, .wp-pagenavi .current
			{
				background: #'.esc_attr($options['themeZee_colors_full']).';
			}
			a, a:link, a:visited,
			.post h2, .type-page h2, .attachment h2, .post h2 a:link, .post h2 a:visited, #page,
			#comments h3, #respond h3 
			{
				color: #'.esc_attr($options['themeZee_colors_full']).';
			}
		';
		echo '</style>';
	}
}