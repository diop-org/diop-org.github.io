<?php


	// Removes default WP styling in page/post content and excepts. 
	if(pagelines('no_wp_format')){
		remove_filter('the_content', 'wpautop');
		remove_filter('the_content', 'wptexturize');
		remove_filter('the_excerpt', 'wpautop');
		remove_filter('the_excerpt', 'wptexturize');
	}

	
?>