<?php
	
	// Function to display the Personal Details Box
	function themezee_display_plugin_about() {
		$options = get_option('themezee_options');
		
		$about = '<div class="personal_details"><ul>';
		
		// Display Name
		if ( isset($options['themeZee_about_name']) and $options['themeZee_about_name'] <> '' ) :
			$about .= '<li>
				<span class="detail_title">'. __('Name', 'themezee_lang') .'</span>
				<div class="detail_value">'. esc_attr($options['themeZee_about_name']) . '</div>
				<div class="clear"></div>
			</li>';
		endif;
		
		// Display Date of Birth
		if ( isset($options['themeZee_about_bday']) and $options['themeZee_about_bday'] <> '' ) :
			$about .= '<li>
				<span class="detail_title">'. __('Date of Birth', 'themezee_lang') .'</span>
				<div class="detail_value">'. esc_attr($options['themeZee_about_bday']) . '</div>
				<div class="clear"></div>
			</li>';
		endif;
		
		// Display Nationality
		if ( isset($options['themeZee_about_nationality']) and $options['themeZee_about_nationality'] <> '' ) :
			$about .= '<li>
				<span class="detail_title">'. __('Nationality', 'themezee_lang') .'</span>
				<div class="detail_value">'. esc_attr($options['themeZee_about_nationality']) . '</div>
				<div class="clear"></div>
			</li>';
		endif;
		
		// Display Address
		if ( isset($options['themeZee_about_address']) and $options['themeZee_about_address'] <> '' ) :
			$about .= '<li>
				<span class="detail_title">'. __('Address', 'themezee_lang') .'</span>
				<div class="detail_value">'. esc_attr($options['themeZee_about_address']) . '</div>
				<div class="clear"></div>
			</li>';
		endif;
		
		// Display Home Town
		if ( isset($options['themeZee_about_home']) and $options['themeZee_about_home'] <> '' ) :
			$about .= '<li>
				<span class="detail_title">'. __('Home Town', 'themezee_lang') .'</span>
				<div class="detail_value">'. esc_attr($options['themeZee_about_home']) . '</div>
				<div class="clear"></div>
			</li>';
		endif;
		
		// Display Website
		if ( isset($options['themeZee_about_website']) and $options['themeZee_about_website'] <> '' ) :
			$about .= '<li>
				<span class="detail_title">'. __('Website', 'themezee_lang') .'</span>
				<div class="detail_value"><a href="'. esc_attr($options['themeZee_about_website']) . '">'. esc_attr($options['themeZee_about_website']) . '</a></div>
				<div class="clear"></div>
			</li>';
		endif;
		
		// Display Email
		if ( isset($options['themeZee_about_email']) and $options['themeZee_about_email'] <> '' ) :
			$about .= '<li>
				<span class="detail_title">'. __('Email', 'themezee_lang') .'</span>
				<div class="detail_value"><a href="mailto:'. esc_attr($options['themeZee_about_email']) . '">'. esc_attr($options['themeZee_about_email']) . '</a></div>
				<div class="clear"></div>
			</li>';
		endif;
		
		// Display Telephone
		if ( isset($options['themeZee_about_telephone']) and $options['themeZee_about_telephone'] <> '' ) :
			$about .= '<li>
				<span class="detail_title">'. __('Telephone', 'themezee_lang') .'</span>
				<div class="detail_value">'. esc_attr($options['themeZee_about_telephone']) . '</div>
				<div class="clear"></div>
			</li>';
		endif;
		
		// Download vCard
		if ( isset($options['themeZee_about_vcard']) and $options['themeZee_about_vcard'] <> '' ) :
			$about .= '<li>
				<span class="detail_title">'. __('vCard', 'themezee_lang') .'</span>
				<div class="detail_value"><a href="'. esc_attr($options['themeZee_about_vcard']) . '">'.  __('Download vCard', 'themezee_lang') . '</a></div>
				<div class="clear"></div>
			</li>';
		endif;
		
		$about .= '</ul></div>';
		
		return $about;
	}
	
	// Shortcode Function for About Plugin
	function themezee_shortcode_about_function($atts, $content = null) {
		return themezee_display_plugin_about();
	}
	add_shortcode('cardAbout', 'themezee_shortcode_about_function');
	
?>