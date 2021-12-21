<?php 
add_action('wp_head', 'themezee_css_layout');
function themezee_css_layout() {
	
	echo '<style type="text/css">';
	$options = get_option('themezee_options');
	
	// Switch Sidebar to right?
	if ( isset($options['themeZee_general_sidebars']) and $options['themeZee_general_sidebars'] == 'right' ) {
	
		echo '
			#wrap {
				float: left;
			}
			#sidewrap, #headwrap {
				margin-left: 600px;
			}
		';
	}
	
	// Remove Rounded Corners?
	if ( isset($options['themeZee_general_corners']) and $options['themeZee_general_corners'] == 'no' ) {
	
		echo '
			#sidewrap, #headwrap, #contentwrap, #wrap,
			#header, #logo, #navi, #footer,
			#sidebar ul li h2, #s, #searchsubmit, #twitter_div #twitter_link,
			.moretext, .postmeta, .post-tags a:link, .post-tags a:visited, .postinfo,
			.network_profiles a,
			.entry input, .entry textarea, .wpcf7-text, .entry input[type="submit"], .wpcf7-submit, 
			.wp-post-image,
			.commentlist .comment, .commentlist .pingback, .commentlist .trackback, .comment-author .fn, .bypostauthor .fn, 
			#commentform input, #commentform textarea, #commentform #submit, 
			.wp-pagenavi .pages, .wp-pagenavi a, .wp-pagenavi .current,
			.short_resume .short_resume_date
			{
				-moz-border-radius: 0 !important;
				-webkit-border-radius: 0 !important;
				-khtml-border-radius: 0 !important;
				border-radius: 0 !important;
			}
		';
	}
	
	// Add Custom CSS
	if ( isset($options['themeZee_general_css']) and $options['themeZee_general_css'] <> '' ) {
		echo $options['themeZee_general_css'];
	}
	
	echo '</style>';
}