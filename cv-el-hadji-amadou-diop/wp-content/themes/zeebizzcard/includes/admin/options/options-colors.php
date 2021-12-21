<?php
	
	function themezee_get_colors_sections() {
		$themezee_sections = array();
		
		$themezee_sections[] = array("id" => "themeZee_colors_schemes",
					"name" => __('Predefined Color Schemes', 'themezee_lang'));
					
		$themezee_sections[] = array("id" => "themeZee_colors_custom",
					"name" => __('Custom Colors', 'themezee_lang'));
					
		$themezee_sections[] = array("id" => "themeZee_colors_fonts",
					"name" => __('Font Colors', 'themezee_lang'));
					
		$themezee_sections[] = array("id" => "themeZee_colors_background",
					"name" => __('Background Colors', 'themezee_lang'));
		
		return $themezee_sections;
	}
	
	function themezee_get_colors_settings() {
	
		$color_styles = array(
			'blue.css' => __('Blue', 'themezee_lang'),
			'green.css' => __('Green', 'themezee_lang'),
			'orange.css' => __('Orange', 'themezee_lang'),
			'purple.css' => __('Purple', 'themezee_lang'),
			'red.css' => __('Red', 'themezee_lang'),
			'teal.css' => __('Teal', 'themezee_lang'),
			'standard.css' => __('Standard', 'themezee_lang'));
		
		$themezee_settings = array();
	
		### COLOR SETTINGS
		#######################################################################################
							
		$themezee_settings[] = array("name" => "Set Color Scheme",
						"desc" => __('Please select your color scheme here.', 'themezee_lang'),
						"id" => "themeZee_stylesheet",
						"std" => "standard.css",
						"type" => "select",
						'choices' => $color_styles,
						"section" => "themeZee_colors_schemes"
						);
		
		$themezee_settings[] = array("name" => __('Active Custom Colors?', 'themezee_lang'),
						"desc" => __('Check this to activate the Custom Color Function.', 'themezee_lang'),
						"id" => "themeZee_color_activate",
						"std" => "false",
						"type" => "checkbox",
						"section" => "themeZee_colors_custom");	
						
		#######################################################################################
						
		$themezee_settings[] = array("name" => __('Link Color', 'themezee_lang'),
						"desc" => __("Select the color of links here.", 'themezee_lang'),
						"id" => "themeZee_colors_font_link",
						"std" => "444444",
						"type" => "colorpicker",
						"section" => "themeZee_colors_fonts");
						
		$themezee_settings[] = array("name" => __('Post Title Color', 'themezee_lang'),
						"desc" => __("Select the color of post titles here.", 'themezee_lang'),
						"id" => "themeZee_colors_font_title",
						"std" => "222222",
						"type" => "colorpicker",
						"section" => "themeZee_colors_fonts");
						
		#######################################################################################
		
		$themezee_settings[] = array("name" => __('Logo Background Color', 'themezee_lang'),
						"desc" => __("Select the background color of logo here.", 'themezee_lang'),
						"id" => "themeZee_colors_logo_background",
						"std" => "000000",
						"type" => "colorpicker",
						"section" => "themeZee_colors_background");				
						
		$themezee_settings[] = array("name" => __('Navigation Background Color', 'themezee_lang'),
						"desc" => __("Select the background color of navigation here.", 'themezee_lang'),
						"id" => "themeZee_colors_navi_background",
						"std" => "000000",
						"type" => "colorpicker",
						"section" => "themeZee_colors_background");
						
		$themezee_settings[] = array("name" => __('Sidebar Background Color', 'themezee_lang'),
						"desc" => __("Select the background color of sidebar title here.", 'themezee_lang'),
						"id" => "themeZee_colors_sidebar_background",
						"std" => "000000",
						"type" => "colorpicker",
						"section" => "themeZee_colors_background");		
		
		return $themezee_settings;
	}

?>