<?php
	
	function themezee_get_about_sections() {
		$themezee_sections = array();
		
		$themezee_sections[] = array("id" => "themeZee_about_details",
					"name" => __('Your Personal Details', 'themezee_lang'));
					
		$themezee_sections[] = array("id" => "themeZee_about_contact",
					"name" => __('Contact Information', 'themezee_lang'));
					
		return $themezee_sections;
	}
	
	function themezee_get_about_settings() {

		$themezee_settings = array();
	
		### PERSONAL INFORMATION 
		#######################################################################################
		$themezee_settings[] = array("name" => __('Name', 'themezee_lang'),
						"desc" => __('Paste your name here.', 'themezee_lang'),
						"id" => "themeZee_about_name",
						"std" => "John Doe",
						"type" => "text",
						"section" => "themeZee_about_details");	
						
		$themezee_settings[] = array("name" => __('Date of Birth', 'themezee_lang'),
						"desc" => __('Paste your date of birth here.', 'themezee_lang'),
						"id" => "themeZee_about_bday",
						"std" => "",
						"type" => "text",
						"section" => "themeZee_about_details");
						
		$themezee_settings[] = array("name" => __('Nationality', 'themezee_lang'),
						"desc" => __('Paste your nationality here.', 'themezee_lang'),
						"id" => "themeZee_about_nationality",
						"std" => "",
						"type" => "text",
						"section" => "themeZee_about_details");	
						
		$themezee_settings[] = array("name" => __('Address', 'themezee_lang'),
						"desc" => __('Paste your address here.', 'themezee_lang'),
						"id" => "themeZee_about_address",
						"std" => "",
						"type" => "text",
						"section" => "themeZee_about_details");	
						
		$themezee_settings[] = array("name" => __('Home Town', 'themezee_lang'),
						"desc" => __('Paste your home town here.', 'themezee_lang'),
						"id" => "themeZee_about_home",
						"std" => "",
						"type" => "text",
						"section" => "themeZee_about_details");	
						
		### CONTACT INFORMATION
		#######################################################################################		

		$themezee_settings[] = array("name" => __('Website', 'themezee_lang'),
						"desc" => __('Paste your website here.', 'themezee_lang'),
						"id" => "themeZee_about_website",
						"std" => "",
						"type" => "text",
						"section" => "themeZee_about_contact");	
						
		$themezee_settings[] = array("name" => __('Email', 'themezee_lang'),
						"desc" => __('Paste your email address here.', 'themezee_lang'),
						"id" => "themeZee_about_email",
						"std" => "",
						"type" => "text",
						"section" => "themeZee_about_contact");	
						
		$themezee_settings[] = array("name" => __('Telephone', 'themezee_lang'),
						"desc" => __('Paste your telephone number here.', 'themezee_lang'),
						"id" => "themeZee_about_telephone",
						"std" => "",
						"type" => "text",
						"section" => "themeZee_about_contact");	
						
		$themezee_settings[] = array("name" => __('vCard', 'themezee_lang'),
						"desc" => __('Paste your download url for your vCard here.', 'themezee_lang'),
						"id" => "themeZee_about_vcard",
						"std" => "",
						"type" => "text",
						"section" => "themeZee_about_contact");	
						
		return $themezee_settings;
	}

?>