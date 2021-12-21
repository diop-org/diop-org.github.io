<?php 
add_action('wp_head', 'themezee_css_colors');
function themezee_css_colors() {
	
	$options = get_option('themezee_options');
	
	if ( isset($options['themeZee_color_activate']) and $options['themeZee_color_activate'] == 'true' ) {
		
		echo '<style type="text/css">';
		echo '
			a, a:link, a:visited,
			.post h2, .type-page h2, .post h2 a:link, .post h2 a:visited, .arh,
			#sidebar a:link, #sidebar a:visited,
			#comments h3, #respond h3, .comment-reply-link
			{
				color: #'.esc_attr($options['themeZee_colors_full']).';
			}
			#sidebar ul li h2,
			#header, #slide_panel, .postcomments, #footer {
				background-color: #'.esc_attr($options['themeZee_colors_full']).';
			}
		';
		echo '</style>';
	}
}