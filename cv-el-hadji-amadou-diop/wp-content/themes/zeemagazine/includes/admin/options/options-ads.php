<?php
	
	function themezee_get_ads_sections() {
		$themezee_sections = array();
					
		$themezee_sections[] = array("id" => "themeZee_ads_banner",
					"name" => __('125x125 Sidebar Banner', 'themezee_lang'));
					
		$themezee_sections[] = array("id" => "themeZee_ads_header",
					"name" => __('Header Banner', 'themezee_lang'));
					
		return $themezee_sections;
	}
	
	function themezee_get_ads_settings() {

		$default_banner = get_template_directory_uri() . '/images/ad_125x125.png';
		$themezee_settings = array();
	
		### 125x125 Banner Settings
		#######################################################################################
		$themezee_settings[] = array("name" => __('Rotate banners?', 'themezee_lang'),
						"desc" => __('Check this to randomly rotate the ad spots.', 'themezee_lang'),
						"id" => "themeZee_ads_rotate",
						"std" => "false",
						"type" => "checkbox",
						"section" => "themeZee_ads_banner");

		$themezee_settings[] = array("name" => __('Ad Spot Image URL', 'themezee_lang') . ' #1',
						"desc" => __('Enter the image URL for this ad spot.', 'themezee_lang'),
						"id" => "themeZee_ads_image_1",
						"std" => $default_banner,
						"type" => "image",
						"section" => "themeZee_ads_banner");
							
		$themezee_settings[] = array("name" =>  __('Ad Spot Destination', 'themezee_lang') . ' #1',
						"desc" => __('Enter the URL where this ad spot points to.', 'themezee_lang'),
						"id" => "themeZee_ads_url_1",
						"std" => "",
						"type" => "text",
						"section" => "themeZee_ads_banner");

		$themezee_settings[] = array("name" => __('Ad Spot Image URL', 'themezee_lang') . ' #2',
						"desc" => __('Enter the image URL for this ad spot.', 'themezee_lang'),
						"id" => "themeZee_ads_image_2",
						"std" => $default_banner,
						"type" => "image",
						"section" => "themeZee_ads_banner");
							
		$themezee_settings[] = array("name" => __('Ad Spot Destination', 'themezee_lang') . ' #2',
						"desc" => __('Enter the URL where this ad spot points to.', 'themezee_lang'),
						"id" => "themeZee_ads_url_2",
						"std" => "",
						"type" => "text",
						"section" => "themeZee_ads_banner");

		$themezee_settings[] = array("name" => __('Ad Spot Image URL', 'themezee_lang') . ' #3',
						"desc" => __('Enter the image URL for this ad spot.', 'themezee_lang'),
						"id" => "themeZee_ads_image_3",
						"std" => $default_banner,
						"type" => "image",
						"section" => "themeZee_ads_banner");
							
		$themezee_settings[] = array("name" => __('Ad Spot Destination', 'themezee_lang') . ' #3',
						"desc" => __('Enter the URL where this ad spot points to.', 'themezee_lang'),
						"id" => "themeZee_ads_url_3",
						"std" => "",
						"type" => "text",
						"section" => "themeZee_ads_banner");

		$themezee_settings[] = array("name" => __('Ad Spot Image URL', 'themezee_lang') . ' #4',
						"desc" => __('Enter the image URL for this ad spot.', 'themezee_lang'),
						"id" => "themeZee_ads_image_4",
						"std" => $default_banner,
						"type" => "image",
						"section" => "themeZee_ads_banner");
							
		$themezee_settings[] = array("name" => __('Ad Spot Destination', 'themezee_lang') . ' #4',
						"desc" => __('Enter the URL where this ad spot points to.', 'themezee_lang'),
						"id" => "themeZee_ads_url_4",
						"std" => "",
						"type" => "text",
						"section" => "themeZee_ads_banner");

		$themezee_settings[] = array("name" => __('Ad Spot Image URL', 'themezee_lang') . ' #5',
						"desc" => __('Enter the image URL for this ad spot.', 'themezee_lang'),
						"id" => "themeZee_ads_image_5",
						"std" => "",
						"type" => "image",
						"section" => "themeZee_ads_banner");
							
		$themezee_settings[] = array("name" => __('Ad Spot Destination', 'themezee_lang') . ' #5',
						"desc" => __('Enter the URL where this ad spot points to.', 'themezee_lang'),
						"id" => "themeZee_ads_url_5",
						"std" => "",
						"type" => "text",
						"section" => "themeZee_ads_banner");

		$themezee_settings[] = array("name" => __('Ad Spot Image URL', 'themezee_lang') . ' #6',
						"desc" => __('Enter the image URL for this ad spot.', 'themezee_lang'),
						"id" => "themeZee_ads_image_6",
						"std" => "",
						"type" => "image",
						"section" => "themeZee_ads_banner");
							
		$themezee_settings[] = array("name" => __('Ad Spot Destination', 'themezee_lang') . ' #6',
						"desc" => __('Enter the URL where this ad spot points to.', 'themezee_lang'),
						"id" => "themeZee_ads_url_6",
						"std" => "",
						"type" => "text",
						"section" => "themeZee_ads_banner");
						
		$themezee_settings[] = array("name" => __('Ad Spot Image URL', 'themezee_lang') . ' #7',
						"desc" => __('Enter the image URL for this ad spot.', 'themezee_lang'),
						"id" => "themeZee_ads_image_7",
						"std" => "",
						"type" => "image",
						"section" => "themeZee_ads_banner");
							
		$themezee_settings[] = array("name" => __('Ad Spot Destination', 'themezee_lang') . ' #7',
						"desc" => __('Enter the URL where this ad spot points to.', 'themezee_lang'),
						"id" => "themeZee_ads_url_7",
						"std" => "",
						"type" => "text",
						"section" => "themeZee_ads_banner");

		$themezee_settings[] = array("name" => __('Ad Spot Image URL', 'themezee_lang') . ' #8',
						"desc" => __('Enter the image URL for this ad spot.', 'themezee_lang'),
						"id" => "themeZee_ads_image_8",
						"std" => "",
						"type" => "image",
						"section" => "themeZee_ads_banner");
							
		$themezee_settings[] = array("name" => __('Ad Spot Destination', 'themezee_lang') . ' #8',
						"desc" => __('Enter the URL where this ad spot points to.', 'themezee_lang'),
						"id" => "themeZee_ads_url_8",
						"std" => "",
						"type" => "text",
						"section" => "themeZee_ads_banner");
								
		### Header Banner Settings
		#######################################################################################
		$themezee_settings[] = array("name" => __('Show Header Banner Ad?', 'themezee_lang'),
						"desc" => __('Check this to show the banner ad in the theme header.', 'themezee_lang'),
						"id" => "themeZee_ads_header_show",
						"std" => "false",
						"type" => "checkbox",
						"section" => "themeZee_ads_header");

		$themezee_settings[] = array("name" => __('468x60 Adbanner Image URL', 'themezee_lang'),
						"desc" => __('Enter the image URL for the banner ad.', 'themezee_lang'),
						"id" => "themeZee_ads_header_image",
						"std" => '',
						"type" => "image",
						"section" => "themeZee_ads_header");
						
		$themezee_settings[] = array("name" => __('468x60 Adbanner Destination URL', 'themezee_lang'),
						"desc" => __('Enter the URL where the banner ad points to.', 'themezee_lang'),
						"id" => "themeZee_ads_header_url",
						"std" => "",
						"type" => "text",
						"section" => "themeZee_ads_header");
	
		return $themezee_settings;
	}

?>