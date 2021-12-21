<?php

	// Include Shortcodes CSS
	function themezee_shortcodes_css() {
		echo '<link rel="stylesheet" href="'.get_bloginfo('template_url').'/includes/shortcodes/shortcodes.css" media="screen" />';
	}
	add_action('wp_head', 'themezee_shortcodes_css');
	
	// Include Shortcodes
	locate_template('/includes/shortcodes/resume/resume.php', true);
	locate_template('/includes/shortcodes/skills/skills.php', true);
	locate_template('/includes/shortcodes/plugs/plugs.php', true);
	
	//let's trick tinymce into thinking its a new version to clean up the cache
	function themezee_refresh_mce($ver) {
	  $ver += 3;
	  return $ver;
	}
	add_filter( 'tiny_mce_version', 'themezee_refresh_mce');

?>