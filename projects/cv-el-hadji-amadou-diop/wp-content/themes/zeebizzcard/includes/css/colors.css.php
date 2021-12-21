<?php 
add_action('wp_head', 'themezee_css_colors');
function themezee_css_colors() {
	
	$options = get_option('themezee_options');
	
	if ( isset($options['themeZee_color_activate']) and $options['themeZee_color_activate'] == 'true' ) {
		
		echo '<style type="text/css">';
		echo '
			a, a:link, a:visited, .wp-pagenavi a
			{
				color: #'.esc_attr($options['themeZee_colors_font_link']).';
			}
			.wp-pagenavi .current 
			{
				background-color: #'.esc_attr($options['themeZee_colors_font_link']).';
			}
			.page-title, .post-title,
			.post-title a:link, .post-title a:visited 
			{
				color: #'.esc_attr($options['themeZee_colors_font_title']).';
			}
			
			#logo
			{
				background-color: #'.esc_attr($options['themeZee_colors_logo_background']).';
			} 
			#sidebar ul li h2
			{
				background-color: #'.esc_attr($options['themeZee_colors_sidebar_background']).';
			}
			#navi, #navi ul li ul
			{
				background-color: #'.esc_attr($options['themeZee_colors_navi_background']).';
			}
		';
		echo '</style>';
	}
}