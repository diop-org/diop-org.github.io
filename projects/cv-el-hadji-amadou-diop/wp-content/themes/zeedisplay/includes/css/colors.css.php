<?php 
add_action('wp_head', 'themezee_css_colors');
function themezee_css_colors() {
	
	$options = get_option('themezee_options');
	
	if ( isset($options['themeZee_color_activate']) and $options['themeZee_color_activate'] == 'true' ) {
		
		echo '<style type="text/css">';
		echo '
			a, a:link, a:visited,
			.post h2, .attachment h2, .post h2 a:link, .post h2 a:visited,
			#slideshow .post h2 a {
				color: #'.esc_attr($options['themeZee_colors_full']).';
			}
			#sidebar ul li h2,
			#topnavi ul li.current_page_item a, #topnavi ul li.current-cat a, #topnavi ul li.current-menu-item a,
			.comment-author .fn, .comment-reply-link,
			#slide_keys a:link, #slide_keys a:visited {
				color: #'.esc_attr($options['themeZee_colors_full']).' !important;
			}
			.wp-pagenavi .current {
				background-color: #'.esc_attr($options['themeZee_colors_full']).';
			}
		';
		echo '</style>';
	}
}