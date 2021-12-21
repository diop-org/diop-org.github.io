<?php
	
	function themezee_get_fonts_sections() {
		$themezee_sections = array();
		
		$themezee_sections[] = array("id" => "themeZee_fonts_active",
					"name" => __('Activate Custom Fonts', 'themezee_lang'));
		
		$themezee_sections[] = array("id" => "themeZee_fonts_family",
					"name" => __('Font Families', 'themezee_lang'));
					
		$themezee_sections[] = array("id" => "themeZee_fonts_sizes",
					"name" => __('Font Sizes', 'themezee_lang'));

		return $themezee_sections;
	}
	
	function themezee_get_fonts_settings() {
	
		// Array with all available Fonts to choose from
		$zee_fonts = array(
			'Carme' => 'Carme',
			'Coming Soon' => 'Coming Soon',
			'Copse' => 'Copse',
			'Droid Sans' => 'Droid Sans',
			'Josefin Slab' => 'Josefin Slab',
			'Lobster' => 'Lobster',
			'Luckiest Guy' => 'Luckiest Guy',
			'Maven Pro' => 'Maven Pro',
			'Modern Antiqua' => 'Modern Antiqua',
			'Molengo' => 'Molengo',
			'Nobile' => 'Nobile',
			'Oswald' => 'Oswald',
			'PT Sans' => 'PT Sans',
			'Permanent Marker' => 'Permanent Marker',
			'Raleway' => 'Raleway',
			'Rochester' => 'Rochester',
			'The Girl Next Door' => 'The Girl Next Door',
			'Ubuntu' => 'Ubuntu',
			'Verdana' => 'Verdana');
	
		### FONTS SETTINGS
		#######################################################################################
		
		$themezee_settings[] = array("name" => __('Active Custom Fonts?', 'themezee_lang'),
						"desc" => __('Check this to activate Custom Fonts.', 'themezee_lang'),
						"id" => "themeZee_fonts_activate",
						"std" => "false",
						"type" => "checkbox",
						"section" => "themeZee_fonts_active");	
						
		$themezee_settings[] = array("name" => __('Text Font', 'themezee_lang'),
						"desc" => __("Select the font family of text here.", 'themezee_lang'),
						"id" => "themeZee_fonts_text",
						"std" => "standard.css",
						"type" => "fontpicker",
						'choices' => $zee_fonts,
						"section" => "themeZee_fonts_family");
						
		$themezee_settings[] = array("name" => __('Navigation Font', 'themezee_lang'),
						"desc" => __("Select the navigation font here.", 'themezee_lang'),
						"id" => "themeZee_fonts_navi",
						"std" => "standard.css",
						"type" => "fontpicker",
						'choices' => $zee_fonts,
						"section" => "themeZee_fonts_family");
						
		$themezee_settings[] = array("name" => __('Title Font', 'themezee_lang'),
						"desc" => __("Select the title font here.", 'themezee_lang'),
						"id" => "themeZee_fonts_title",
						"std" => "standard.css",
						"type" => "fontpicker",
						'choices' => $zee_fonts,
						"section" => "themeZee_fonts_family");
						
		#######################################################################################
						
		$themezee_settings[] = array("name" => __('Size of Text', 'themezee_lang'),
						"desc" => __("Choose the font size of text in points (default: 10pt).", 'themezee_lang'),
						"id" => "themeZee_font_size_text",
						"std" => "10",
						"type" => "fontsizer",
						"section" => "themeZee_fonts_sizes");
						
		$themezee_settings[] = array("name" => __('Size of Navigation', 'themezee_lang'),
						"desc" => __("Choose the font size of navigation in points (default: 9pt).", 'themezee_lang'),
						"id" => "themeZee_font_size_navi",
						"std" => "9",
						"type" => "fontsizer",
						"section" => "themeZee_fonts_sizes");
						
		$themezee_settings[] = array("name" => __('Size of Page Title', 'themezee_lang'),
						"desc" => __("Choose the font size of page titles in points (default: 26pt)", 'themezee_lang'),
						"id" => "themeZee_font_size_page_title",
						"std" => "26",
						"type" => "fontsizer",
						"section" => "themeZee_fonts_sizes");
						
		$themezee_settings[] = array("name" => __('Size of Post Title', 'themezee_lang'),
						"desc" => __("Choose the font size of post tiles in points (default: 22pt)", 'themezee_lang'),
						"id" => "themeZee_font_size_post_title",
						"std" => "24",
						"type" => "fontsizer",
						"section" => "themeZee_fonts_sizes");
		
		return $themezee_settings;
	}

?>