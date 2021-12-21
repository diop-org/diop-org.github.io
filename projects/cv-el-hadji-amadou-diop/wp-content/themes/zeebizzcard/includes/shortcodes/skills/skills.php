<?php

	//Shortcode Hooks
	add_shortcode('cardSkill', 'themezee_shortcode_skill_function');
	
	// Toggle Function
	function themezee_shortcode_skill_function($atts, $content = null) {
		
		extract(shortcode_atts(array(
			'title' => '',
			'skill' => '3'
		), $atts));
		
		return '<div class="short_skill"><span class="short_skill_title">'.$title.'</span><div class="short_skill_value"><span class="'.$skill.'"></span></div><p>'.$content.'</p></div>';
		
	}

	locate_template('/includes/shortcodes/skills/tinyMCE/tinyMCE.php', true);

?>