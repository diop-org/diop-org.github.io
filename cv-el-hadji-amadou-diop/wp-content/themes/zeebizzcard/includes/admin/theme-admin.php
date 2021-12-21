<?php

add_action('admin_menu', 'themezee_admin_add_page');
function themezee_admin_add_page() {
	add_theme_page(__('Theme Options', 'themezee_lang'), __('Theme Options', 'themezee_lang'), 'edit_theme_options', 'themezee', 'themezee_options_page');
}

// Display admin options page
function themezee_options_page() { 
	$options = get_option('themezee_options');
?>
	<div class="wrap zee_admin_wrap">  			

		<div class="icon32" id="icon-themes"></div>
		<h2><?php _e('Theme Options', 'themezee_lang'); ?></h2>
		
			<?php themezee_options_page_tabs(); ?>
			
			<?php if ( isset( $_GET['settings-updated'] ) ) : ?>
				<div class='updated'><p><?php _e('Theme settings updated successfully.', 'themezee_lang'); ?></p></div>
			<?php endif; ?>
			
			<form class="zee_form" action="options.php" method="post">
				
					<div class="zee_settings">
						<?php settings_fields('themezee_options'); ?>
						<?php do_settings_sections('themezee'); ?>
					</div>
				
				<?php if ( isset ( $_GET['tab'] ) ) : $tab = $_GET['tab']; else: $tab = 'general'; endif; ?>
				<input name="themezee_options[validation-submit]" type="hidden" value="<?php echo $tab ?>" />

				<p><input name="Submit" class="button-primary" type="submit" value="<?php esc_attr_e('Save Changes', 'themezee_lang'); ?>" /></p>
			</form>
			
			<div class="zee_options_sidebar">
				
				<dl>
					<dt><h4><?php _e('Theme Developer', 'themezee_lang'); ?></h4></dt>

					<dd>
						<ul>
							<li><a href="http://themezee.com/" target="_blank">Website</a></li>
							<li><a href="http://twitter.com/ThemeZee" target="_blank">Twitter Account</a></li>
							<li><a href="http://www.facebook.com/ThemeZee" target="_blank">Facebook Page</a></li>
						</ul>
					</dd>
				</dl>
				
				<dl>
					<dt><h4><?php _e('Donate', 'themezee_lang'); ?></h4></dt>

					<dd>
						<p><?php _e('If you like zeeBizzCard and want to help keep this theme free and actively developed donate a few bucks. Thanks!', 'themezee_lang'); ?>
						
						<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
							<input type="hidden" name="cmd" value="_s-xclick">
							<input type="hidden" name="hosted_button_id" value="TZLS9Y4BF8D4C">
							<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
							<img alt="" border="0" src="https://www.paypalobjects.com/de_DE/i/scr/pixel.gif" width="1" height="1">
						</form>
					</dd>
				</dl>
				
				<dl>
					<dt><h4><?php _e('Theme Info', 'themezee_lang'); ?></h4></dt>

					<dd>
						<p><?php _e('<strong>zeeBizzCard</strong> is a clean and elegant styled Business Card Theme for WordPress that fits perfectly for a sleek homepage for personalities, freelancers, entrepreneurs or small business owners.', 'themezee_lang'); ?></p>		
					</dd>
				</dl>
				
				<div id="zee_options_logo">
					<a href="http://themezee.com/" target="_blank">
						<img src="<?php echo get_template_directory_uri(); ?>/includes/admin/images/themezee_logo.png" alt="Logo" />
					</a>
				</div>
				
			</div>
			<div class="clear"></div>
	</div>

<?php
}

// Display Settings Page Tabs Navigation Bar
function themezee_options_page_tabs( $current = 'general' ) {
	
	// Get the current tab
	if ( isset( $_GET['tab'] ) ) :
		$current = $_GET['tab'];
	else:
		$current = 'general';
	endif;
	
	// Fetch all Tabs from theme-settings.php
	$tabs = themezee_get_settings_page_tabs();
	
	// Loop to create Tabs Navigation
	$links = array();
	foreach( $tabs as $tab => $name ) :
		if ( $tab == $current ) :
			$links[] = "<a class=\"nav-tab nav-tab-active\" href=\"?page=themezee&tab=$tab\">$name</a>";
		else :
			$links[] = "<a class=\"nav-tab\" href=\"?page=themezee&tab=$tab\">$name</a>";
		endif;
	endforeach;
	
	// Display Tab Navigaiton
	echo '<h2 id="zee_tabs_navi" class="nav-tab-wrapper">';
	foreach ( $links as $link ) : echo $link; endforeach;
	echo '</h2>';
}

// Display Setting Fields
function themezee_display_setting( $setting = array() ) {
	$options = get_option('themezee_options');
	
	if ( ! isset( $options[$setting['id']] ) )
		$options[$setting['id']] = $setting['std']; 

	switch ( $setting['type'] ) {
	
		case 'text':
			echo "<input id='".$setting['id']."' name='themezee_options[".$setting['id']."]' type='text' value='". esc_attr($options[$setting['id']]) ."' />";
			echo '<br/><label>'.$setting['desc'].'</label>';
		break;
		
		case 'textarea':
			echo "<textarea id='".$setting['id']."' name='themezee_options[".$setting['id']."]' rows='5'>" . esc_attr($options[$setting['id']]) . "</textarea>";
			echo '<br/><label>'.$setting['desc'].'</label>';
		break;
			
		case 'checkbox':
			echo "<input id='".$setting['id']."' name='themezee_options[".$setting['id']."]' type='checkbox' value='true'";
			checked( $options[$setting['id']], 'true' );
			echo ' /><label> '.$setting['desc'].'</label>';
		break;
		
		case 'select':
			echo "<select id='".$setting['id']."' name='themezee_options[".$setting['id']."]'>";
		 
			foreach ( $setting['choices'] as $value => $label ) {
				echo "<option ".selected( $options[$setting['id']], $value )." value='" . $value . "' >" . $label . "</option>";
			}
		 
			echo "</select>";
			echo '<br/><label>'.$setting['desc'].'</label>';
		break;
		
		case 'radio':
			foreach ( $setting['choices'] as $value => $label ) {
				echo "<input id='".$setting['id']."'";
				checked( $options[$setting['id']], $value );
				echo " type='radio' name='themezee_options[".$setting['id']."]' value='" . $value . "'/> " . $label . "<br/>";
			}
		break;
		
		case 'logo':
			echo "<p id='zee-logo-bg'><img id='zee-logo-img' src='" . esc_attr($options[$setting['id']]) . "' /></p>";
			echo "<input id='".$setting['id']."' name='themezee_options[".$setting['id']."]' type='text' value='". esc_attr($options[$setting['id']]) ."' />";
			echo '<br/><label>'.$setting['desc'].'</label>';
		break;
		
		case 'fontpicker':
			echo "<select id='".$setting['id']."' name='themezee_options[".$setting['id']."]'>";
				foreach ( $setting['choices'] as $value => $label ) {
					echo "<option ".selected( $options[$setting['id']], $value )." value='" . $value . "' >" . $label . "</option>";
				}
			echo "</select>";
			echo '<br/><label>'.$setting['desc'].'</label>';
			echo "<div id='zee-font-bg' style='font-family: " . esc_attr($options[$setting['id']]) . ";'>Grumpy wizards make toxic brew for the evil Queen and Jack.</div>";

		break;
		
		case 'colorpicker':
			echo "#<input id='".$setting['id']."' name='themezee_options[".$setting['id']."]' class='colorpickerfield' type='text' maxlength='6' value='". esc_attr($options[$setting['id']]) ."' />";
			echo '<br/><label>'.$setting['desc'].'</label>';
		break;
		
		case 'fontsizer':
			echo "<input id='".$setting['id']."' name='themezee_options[".$setting['id']."]' class='fontsizerfield' type='text' maxlength='2' value='". esc_attr($options[$setting['id']]) ."' /> pt";
			echo '<br/><label>'.$setting['desc'].'</label>';
		break;
		
		default:
			echo "<input id='".$setting['id']."' name='themezee_options[".$setting['id']."]' size='40' type='text' value='". esc_attr($options[$setting['id']]) ."' />";
			echo '<br/><label>'.$setting['desc'].'</label>';
		break;
	}
}

// Register Settings
add_action('admin_init', 'themezee_register_settings');
function themezee_register_settings() {

	// Choose Setting Tab
	if ( isset ( $_GET['tab'] ) ) :
		$tab = $_GET['tab'];
	else:
		$tab = 'general';
	endif;
	
	$themezee_sections = themezee_get_sections($tab);	
	$themezee_settings = themezee_get_settings($tab);
	
	register_setting( 'themezee_options', 'themezee_options', 'themezee_options_validate' );
	
	// Create Setting Sections
	foreach ($themezee_sections as $section) {
		add_settings_section($section['id'], $section['name'], 'themezee_section_text', 'themezee');
	}
	
	// Create Setting Fields
	foreach ($themezee_settings as $setting) {
		add_settings_field($setting['id'], $setting['name'], 'themezee_display_setting', 'themezee', $setting['section'], $setting);
	}
}

// Validate Settings
function themezee_options_validate($input) {
	$options = get_option('themezee_options');

	if ( isset ( $input['validation-submit'] ) ) :
		$tab = $input['validation-submit'];
	else:
		$tab = 'general';
	endif;
	$validate_settings = themezee_get_settings($tab);

	foreach ($validate_settings as $setting) {
		
		if ($setting['type'] == 'checkbox' and !isset($input[$setting['id']]) ) 
		{
			$options[$setting['id']] = 'false'; 
		}
		elseif ($setting['type'] == 'radio' and !isset($input[$setting['id']]) ) 
		{
			$options[$setting['id']] = 1; 
		}
		elseif ($setting['type'] == 'textarea')
		{
			$options[$setting['id']] = wp_kses_post(trim($input[$setting['id']]));
		}
		else 
		{
			$options[$setting['id']] = esc_attr(trim($input[$setting['id']]));
		}
	}
	return $options;
}
function themezee_section_text() {}

?>