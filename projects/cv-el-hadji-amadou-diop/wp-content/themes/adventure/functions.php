<?php

/**

 * Adventure Theme Options

 *

 * @package WordPress

 * @subpackage Adventure_Bound_Basic

 * @since Adventure 1.0

 */



/**

 * Properly enqueue styles and scripts for our theme options page.

 *

 * This function is attached to the admin_enqueue_scripts action hook.

 *

 * @since Adventure 1.0

 *

 */

function adventure_admin_enqueue_scripts( $hook_suffix ) {

	wp_enqueue_style( 'adventure-theme-options', get_template_directory_uri() . '/theme-options.css', false, '2011-04-28' );

	wp_enqueue_script( 'adventure-theme-options', get_template_directory_uri() . '/theme-options.js', array( 'farbtastic' ), '2011-06-10' );

	wp_enqueue_style( 'farbtastic' );

}

add_action( 'admin_print_styles-appearance_page_theme_options', 'adventure_admin_enqueue_scripts' );



/**

 * Register the form setting for our adventure_options array.

 *

 * This function is attached to the admin_init action hook.

 *

 * This call to register_setting() registers a validation callback, adventure_theme_options_validate(),

 * which is used when the option is saved, to ensure that our option values are complete, properly

 * formatted, and safe.

 *

 * We also use this function to add our theme option if it doesn't already exist.

 *

 * @since Adventure 1.0

 */

function adventure_theme_options_init() {



	// If we have no options in the database, let's add them now.

	if ( false === adventure_get_theme_options() )

		add_option( 'adventure_theme_options', adventure_get_default_theme_options() );



	register_setting(

		'adventure_options',       // Options group, see settings_fields() call in adventure_theme_options_render_page()

		'adventure_theme_options', // Database option, see adventure_get_theme_options()

		'adventure_theme_options_validate' // The sanitization callback, see adventure_theme_options_validate()

	);



	// Register our settings field group

	add_settings_section(

		'general', // Unique identifier for the settings section

		'', // Section title (we don't want one)

		'__return_false', // Section callback (we don't want anything)

		'theme_options' // Menu slug, used to uniquely identify the page; see adventure_theme_options_add_page()

	);



	// Register our individual settings fields

	add_settings_field(

		'thank_you',  // Unique identifier for the field for this section

		__( '<b>Thank You</b>', 'adventure' ), // Setting field label

		'adventure_thank_you', // Function that renders the settings field

		'theme_options', // Menu slug, used to uniquely identify the page; see adventure_theme_options_add_page()

		'general' // Settings section. Same as the first argument in the add_settings_section() above

	);

	add_settings_field( 'premium_options', __( '<b>Activate Adenture+</br>Features</b>', 'adventure' ), 'adventure_active_premium_options', 'theme_options', 'general' );

	add_settings_field(

		'color_scheme',  // Unique identifier for the field for this section

		__( '<b>Menu Color</b>', 'adventure' ), // Setting field label

		'adventure_settings_field_color_scheme', // Function that renders the settings field

		'theme_options', // Menu slug, used to uniquely identify the page; see adventure_theme_options_add_page()

		'general' // Settings section. Same as the first argument in the add_settings_section() above

	);

	add_settings_field( 'active', __( '', 'adventure' ), 'adventure_is_active', 'theme_options', 'general' );

	add_settings_field( 'link_color', __( '<b>Menu Location</b>', 'adventure' ), 'adventure_settings_field_link_color', 'theme_options', 'general' );

	add_settings_field( 'sidebar_options',     __( '<b>Sidebar Options</b></br>(Only Avaliable</br> with Activation)', 'adventure' ), 'adventure_settings_sidebar_options', 'theme_options', 'general' );

	add_settings_field( 'menu_layout',     __( '<b>Menu Layout</b></br>(Only Avaliable</br> with Activation)', 'adventure' ), 'adventure_settings_menu', 'theme_options', 'general' );

	add_settings_field( 'contrast_options',     __( '<b>Contrast</b></br>(Only Avaliable</br> with Activation)', 'adventure' ), 'adventure_settings_contrast', 'theme_options', 'general' );

}

add_action( 'admin_init', 'adventure_theme_options_init' );



/**

 * Change the capability required to save the 'adventure_options' options group.

 *

 * @see adventure_theme_options_init() First parameter to register_setting() is the name of the options group.

 * @see adventure_theme_options_add_page() The edit_theme_options capability is used for viewing the page.

 *

 * By default, the options groups for all registered settings require the manage_options capability.

 * This filter is required to change our theme options page to edit_theme_options instead.

 * By default, only administrators have either of these capabilities, but the desire here is

 * to allow for finer-grained control for roles and users.

 *

 * @param string $capability The capability used for the page, which is manage_options by default.

 * @return string The capability to actually use.

 */

function adventure_option_page_capability( $capability ) {

	return 'edit_theme_options';

}

add_filter( 'option_page_capability_adventure_options', 'adventure_option_page_capability' );



/**

 * Add our theme options page to the admin menu, including some help documentation.

 *

 * This function is attached to the admin_menu action hook.

 *

 * @since Adventure 1.0

 */

function adventure_theme_options_add_page() {

	$theme_page = add_theme_page(

		__( 'Theme Options', 'adventure' ),   // Name of page

		__( 'Theme Options', 'adventure' ),   // Label in menu

		'edit_theme_options',                    // Capability required

		'theme_options',                         // Menu slug, used to uniquely identify the page

		'adventure_theme_options_render_page' // Function that renders the options page

	);



	if ( ! $theme_page )

		return;



	add_action( "load-$theme_page", 'adventure_theme_options_help' );

}

add_action( 'admin_menu', 'adventure_theme_options_add_page' );



function adventure_theme_options_help() {



	$help = '<p>' . __( 'The Adventure Bound Basic Bound Theme by Eric Schwarz provides customization options that are grouped together on the Theme Options screen. If you change themes, options may change or disappear, as they are theme-specific. Your current theme, Adventure Bound Basic, does not provides the following Theme Options, they are only available with the with the premium version Adventure Bound:', 'adventure' ) . '</p>' .
'<ol>' .
'<li>' . __( '<strong>Website Color</strong>: You can choose from a bunch of different images to customize the look and feel for your entire site.', 'adventure' ) . '</li>' .
'<li>' . __( '<strong>Hide Date</strong>: You can choose the opption of not display the date on the home.', 'adventure' ) . '</li>' .
'</ol>' .
'<p>' . __( 'Remember to click "Save Changes" to save any changes you have made to the theme options.', 'adventure' ) . '</p>' .
'<p><strong>' . __( 'For more information:', 'adventure' ) . '</strong></p>' .
'<p>' . __( '<a href="http://schwarttzy.com/web-design/adventure/" target="_blank">Adventure Home Page</a>', 'adventure' ) . '</p>' .
'<p>' . __( '<a href="http://schwarttzy.com/shop/adventureplus/" target="_blank">The Adventure PlusHome Page</a>', 'adventure' ) . '</p>' .
'<p>' . __( '<a href="http://schwarttzy.com/contact-me/" target="_blank">Contact Eric Schwarz</a>', 'adventure' ) . '</p>';



	$sidebar = '<p><strong>' . __( 'For more information:', 'adventure' ) . '</strong></p>' .

		'<p>' . __( '<a href="http://codex.wordpress.org/Appearance_Theme_Options_Screen" target="_blank">Documentation on Theme Options</a>', 'adventure' ) . '</p>' .

		'<p>' . __( '<a href="http://wordpress.org/support/" target="_blank">Support Forums</a>', 'adventure' ) . '</p>';



	$screen = get_current_screen();



	if ( method_exists( $screen, 'add_help_tab' ) ) {

		// WordPress 3.3

		$screen->add_help_tab( array(

			'title' => __( 'Overview', 'adventure' ),

			'id' => 'theme-options-help',

			'content' => $help,

			)

		);



		$screen->set_help_sidebar( $sidebar );

	} else {

		// WordPress 3.2

		add_contextual_help( $screen, $help . $sidebar );

	}

}



/**

 * Returns an array of color schemes registered for Adventure.

 *

 * @since Adventure 1.0

 */

function adventure_color_schemes() {

	$color_scheme_options = array(

		'purple' => array(

			'value' => 'purple',

			'label' => __( 'Purple', 'adventure' ),

			'thumbnail' => get_template_directory_uri() . '/images/purp.png',
			
			'default_link_color' => '#0b6492',

		),

		'red' => array(

			'value' => 'red',

			'label' => __( 'Red', 'adventure' ),

			'thumbnail' => get_template_directory_uri() . '/images/red.png',
			
			'default_link_color' => '#b30010',

		),

		'green' => array(

			'value' => 'green',

			'label' => __( 'Green', 'adventure' ),

			'thumbnail' => get_template_directory_uri() . '/images/green.png',
			
			'default_link_color' => '#1e8e21',

		),
		
		'blue' => array(

			'value' => 'blue',

			'label' => __( 'Blue', 'adventure' ),

			'thumbnail' => get_template_directory_uri() . '/images/blue.png',
			
			'default_link_color' => '#1041b4',

		),
		
		'teal' => array(

			'value' => 'teal',

			'label' => __( 'Teal', 'adventure' ),

			'thumbnail' => get_template_directory_uri() . '/images/teal.png',
			
			'default_link_color' => '#32b5a0',

		),
		
		'pink' => array(

			'value' => 'pink',

			'label' => __( 'Pink', 'adventure' ),

			'thumbnail' => get_template_directory_uri() . '/images/pink.png',
			
			'default_link_color' => '#ff0091',

		),
		
		'christmas' => array(

			'value' => 'christmas',

			'label' => __( 'Christmas', 'adventure' ),

			'thumbnail' => get_template_directory_uri() . '/images/christmas.png',
			
			'default_link_color' => '#176001',

		),

	);



	return apply_filters( 'adventure_color_schemes', $color_scheme_options );

}



/**

 * Returns an array of layout options registered for Adventure.

 *

 * @since Adventure 1.0

 */

function adventure_layouts() {

	$layout_options = array(

		'left' => array(

			'value' => 'left',

			'label' => __( 'Content on Left', 'adventure' ),

			'thumbnail' => get_template_directory_uri() . '/images/content-sidebar.png',

		),

		'right' => array(

			'value' => 'right',

			'label' => __( 'Content on Right', 'adventure' ),

			'thumbnail' => get_template_directory_uri() . '/images/sidebar-content.png',

		),

		'content' => array(

			'value' => 'content',

			'label' => __( 'One-column, No Sidebar', 'adventure' ),

			'thumbnail' => get_template_directory_uri() . '/images/content.png',

		),

	);



	return apply_filters( 'adventure_layouts', $layout_options );

}



/**

 * Returns an array of layout options registered for Adventure.

 *

 * @since Adventure 1.0

 */

function adventure_menu() {

	$layout_options = array(

		'bottom' => array(

			'value' => 'bottom',

			'label' => __( 'Menu on Bottom', 'adventure' ),

			'thumbnail' => get_template_directory_uri() . '/images/bottom.png',

		),

		'top' => array(

			'value' => 'top',

			'label' => __( 'Menu on Top', 'adventure' ),

			'thumbnail' => get_template_directory_uri() . '/images/content-sidebar.png',

		),

	);



	return apply_filters( 'adventure_menu', $layout_options );

}



/**

 * Returns an array of layout options registered for Adventure.

 *

 * @since Adventure 1.0

 */

function adventure_contrast() {

	$layout_options = array(

		'seventyfive' => array(

			'value' => 'seventyfive',

			'label' => __( 'Contrast 75%', 'adventure' ),

			'thumbnail' => get_template_directory_uri() . '/images/75.png',

		),

		'eighty' => array(

			'value' => 'eighty',

			'label' => __( 'Contrast 80%', 'adventure' ),

			'thumbnail' => get_template_directory_uri() . '/images/80.png',

		),

		'eightyfive' => array(

			'value' => 'eightyfive',

			'label' => __( 'Contrast 85%', 'adventure' ),

			'thumbnail' => get_template_directory_uri() . '/images/85.png',

		),

	);



	return apply_filters( 'adventure_contrast', $layout_options );

}



/**

 * Returns the default options for Adventure.

 *

 * @since Adventure 1.0

 */

function adventure_get_default_theme_options() {

	$default_theme_options = array(
								   
		'color_scheme' => 'purple',

		'link_color'   => adventure_get_default_link_color( 'purple' ),
		
		'premium_options' => 'Paste Transaction Code',
		
		'active' => 'deactive',
		
		'sidebar_options' => 'content-sidebar',

		'menu_layout' => 'bottom',
		
		'contrast_options' => '75',
		
	);



	if ( is_rtl() )

 		$default_theme_options['theme_layout'] = 'purple';



	return apply_filters( 'adventure_default_theme_options', $default_theme_options );

}


/**

 * Returns the default link color for Adventure, based on color scheme.

 *

 * @since Adventure 1.0

 *

 * @param $string $color_scheme Color scheme. Defaults to the active color scheme.

 * @return $string Color.

*/

function adventure_get_default_link_color( $color_scheme = null ) {

	if ( null === $color_scheme ) {

		$options = adventure_get_theme_options();

		$color_scheme = $options['color_scheme'];

	}



	$color_schemes = adventure_color_schemes();

	if ( ! isset( $color_schemes[ $color_scheme ] ) )

		return false;



	return $color_schemes[ $color_scheme ]['default_link_color'];

}

/**

 * Returns the options array for Adventure.

 *

 * @since Adventure 1.0

 */

function adventure_get_theme_options() {

	return get_option( 'adventure_theme_options', adventure_get_default_theme_options() );

}
/**

 * Renders the Thank You setting field.

 *

 * @since Eric Schwarz edited this huge pain in my

 */

function adventure_thank_you() {	

	?>
    
<p>Thank you for supporting my WordPress Theme "Adventure."</p>
<p>I would like to encourage you to regularly check for updates because I spend a lot of time improving and fixing the code so that it just simply keeps working better. You'll find the blead-edge downloads <a href="http://schwarttzy.com/web-design/adventure/" target="_blank">Here</a>.</p>
<p>If you would really like to show me your support of the Adventure theme or would like to be able to use the additional features below, just quick pick up your own Activation Code by visiting the <a href="http://schwarttzy.com/shop/adventureplus/" target="_blank">Adventure+ Page</a>.</p>
<ol>
<li>Menu at top or bottom.</li>
<li>A Drop down-menu is built in</li>
<li>The ability to upload header images</li>
<li>Move the content to the left, the right, or just remove the sidebar</li>
<li>An additional widget area below content can be used</li>
<li>Choose from 3 different contrast ratios for readability</li>
<li>Custom Google Font's in the next release</li>
</ol>
<p>With the addition of all the features from purchasing Adventure+, I also help out with small customizations of the theme and I lend my knowledge of WordPress to you for any question or support you may need.</p>
<p>If you have any questions, comments, problems, or suggestions please feel free to <a href="http://schwarttzy.com/contact-me/" target="_blank">Contact Me Here.</a></p>
<p>Thank you again for your Support,</p>
<a href="http://schwarttzy.com/about-2/" target="_blank"><P>Eric J. Schwarz</P></a>

	<?php

}



/**

 * Renders the Color Scheme setting field.

 *

 * @since Adventure 1.3

 */

function adventure_settings_field_color_scheme() {

	$options = adventure_get_theme_options();

	

	foreach ( adventure_color_schemes() as $scheme ) {

	?>
	
    
	<div class="layout image-radio-option color-scheme">

	<label class="description">

		<input type="radio" name="adventure_theme_options[color_scheme]" value="<?php echo esc_attr( $scheme['value'] ); ?>" <?php checked( $options['color_scheme'], $scheme['value'] ); ?> />

		<input type="hidden" id="default-color-<?php echo esc_attr( $scheme['value'] ); ?>" value="<?php echo esc_attr( $scheme['default_link_color'] ); ?>" />

		<span>

			<img src="<?php echo esc_url( $scheme['thumbnail'] ); ?>" width="136" height="122" alt="" />

			<?php echo $scheme['label']; ?>

		</span>

	</label>

	</div>

	<?php

	}

}



/**

 * Renders the Link Color setting field.

 *

 * @since Adventure 1.3

 */

function adventure_settings_field_link_color() {

	$options = adventure_get_theme_options();

	?>

	<input type="text" name="adventure_theme_options[link_color]" id="link-color" value="<?php echo esc_attr( $options['link_color'] ); ?>" />

	<a href="#" class="pickcolor hide-if-no-js" id="link-color-example"></a>

	<input type="button" class="pickcolor button hide-if-no-js" value="<?php esc_attr_e( 'Select a Color', 'adventure' ); ?>" />

	<div id="colorPickerDiv" style="z-index: 100; background:#eee; border:1px solid #ccc; position:absolute; display:none;"></div>

	<br />

	<span><?php printf( __( 'Default color: %s', 'adventure' ), '<span id="default-color">' . adventure_get_default_link_color( $options['color_scheme'] ) . '</span>' ); ?></span>

	<?php

}

function adventure_active_premium_options() {
	
	$options = adventure_get_theme_options();
	
	?>
	
    <input type="text" name="adventure_theme_options[premium_options]" id="premium-options" value="<?php echo $options['premium_options']; ?>" /> <b><?php echo strtoupper ($options['active']);?></b><?php if ($options['active'] != 'active'){ ?></br><?php echo ' Paste the Transaction Code from the in the email you receive from Schwarttzy.com in the box above and click "Save" at the bottom to enable the premium features.';?> <a href="http://Schwarttzy.com/transaction.png">Click Here to see a sample.</a> <?php }
}

function adventure_is_active() {
	
	$options = adventure_get_theme_options();
}

/**

 * Renders the Layout setting field.

 *

 * @since Adventure 1.3

 */

function adventure_settings_sidebar_options() {

	$options = adventure_get_theme_options();

	foreach ( adventure_layouts() as $layout ) {

		?>

		<div class="layout image-radio-option theme-layout">

		<label class="description">

			<input type="radio" name="adventure_theme_options[sidebar_options]" value="<?php echo esc_attr( $layout['value'] ); ?>" <?php checked( $options['sidebar_options'], $layout['value'] ); ?> />

			<span>

				<img src="<?php echo esc_url( $layout['thumbnail'] ); ?>" width="136" height="122" alt="" />

				<?php echo $layout['label']; ?>

			</span>

		</label>

		</div>

		<?php

	}

}



/**

 * Renders the Layout setting field.

 *

 * @since Adventure 1.3

 */

function adventure_settings_color_scheme() {

	$options = adventure_get_theme_options();

	foreach ( adventure_color_scheme() as $layout ) {

		?>

		<div class="layout image-radio-option theme-layout">

		<label class="description">

			<input type="radio" name="adventure_theme_options[link_color]" value="<?php echo esc_attr( $layout['value'] ); ?>" <?php checked( $options['link_color'], $layout['value'] ); ?> />

			<span>

				<img src="<?php echo esc_url( $layout['thumbnail'] ); ?>" width="136" height="122" alt="" />

				<?php echo $layout['label']; ?>

			</span>

		</label>

		</div>

		<?php

	}

}



/**

 * Renders the Layout setting field.

 *

 * @since Adventure 1.3

 */

function adventure_settings_menu() {

	$options = adventure_get_theme_options();

	foreach ( adventure_menu() as $layout ) {

		?>

		<div class="layout image-radio-option theme-layout">

		<label class="description">

			<input type="radio" name="adventure_theme_options[menu_layout]" value="<?php echo esc_attr( $layout['value'] ); ?>" <?php checked( $options['menu_layout'], $layout['value'] ); ?> />

			<span>

				<img src="<?php echo esc_url( $layout['thumbnail'] ); ?>" width="136" height="122" alt="" />

				<?php echo $layout['label']; ?>

			</span>

		</label>

		</div>

		<?php

	}

}




/**

 * Renders the Layout setting field.

 *

 * @since Adventure 1.3

 */

function adventure_settings_contrast() {

	$options = adventure_get_theme_options();

	foreach ( adventure_contrast() as $layout ) {

		?>

		<div class="layout image-radio-option theme-layout">

		<label class="description">

			<input type="radio" name="adventure_theme_options[contrast_options]" value="<?php echo esc_attr( $layout['value'] ); ?>" <?php checked( $options['contrast_options'], $layout['value'] ); ?> />

			<span>

				<img src="<?php echo esc_url( $layout['thumbnail'] ); ?>" width="136" height="122" alt="" />

				<?php echo $layout['label']; ?>

			</span>

		</label>

		</div>

		<?php

	}

}


/**

 * Returns the options array for Adventure.

 *

 * @since Adventure 1.2

 */

function adventure_theme_options_render_page() {

	?>

	<div class="wrap">

		<?php screen_icon(); ?>

		<h2><?php printf( __( '%s Theme Options', 'adventure' ), get_current_theme() ); ?></h2>

		<?php settings_errors(); ?>



		<form method="post" action="options.php">

			<?php

				settings_fields( 'adventure_options' );

				do_settings_sections( 'theme_options' );

				submit_button();

			?>

		</form>

	</div>

	<?php

}



/**

 * Sanitize and validate form input. Accepts an array, return a sanitized array.

 *

 * @see adventure_theme_options_init()

 * @todo set up Reset Options action

 *

 * @since Adventure 1.0

 */

function adventure_theme_options_validate( $input ) {

	$output = $defaults = adventure_get_default_theme_options();

	// Color scheme must be in our array of color scheme options

	if ( isset( $input['color_scheme'] ) && array_key_exists( $input['color_scheme'], adventure_color_schemes() ) )

		$output['color_scheme'] = $input['color_scheme'];

	// Our defaults for the link color may have changed, based on the color scheme.

	$output['link_color'] = $defaults['link_color'] = adventure_get_default_link_color( $output['color_scheme'] );
	
	// Link color must be 3 or 6 hexadecimal characters

	if ( isset( $input['link_color'] ) && preg_match( '/^#?([a-f0-9]{3}){1,2}$/i', $input['link_color'] ) )

		$output['link_color'] = '#' . strtolower( ltrim( $input['link_color'], '#' ) );
	
	$options = adventure_get_theme_options();

	// Sanitize $input['premium_options']
	$input['premium_options'] = strtoupper ( ltrim( $input['premium_options'] ) );
		
	// Determine if we need to poll the activation code server
	if ( $input['premium_options'] != $options['premium_options'] && 'active' != $options['active'] ) {
		// Build premium options activation server URL
		$actives = 'http://schwarttzy.com/varify.php?actives=' . $input['premium_options'];
		// Poll the activation server
		$homepage = wp_remote_request( $actives );
		// Set $output['active'] accordingly
		$output['active'] = ( 'active' == $homepage[body] ? 'active' : 'deactive' );
		$output['premium_options'] = $input['premium_options']; }
	elseif ( $input['premium_options'] == $options['premium_options'] && 'active' == $options['active'] ) {
		$output['active'] = 'active';
		$output['premium_options'] = $input['premium_options']; }
		
	// Theme layout must be in our array of theme layout options

	if ( isset( $input['sidebar_options'] ) && array_key_exists( $input['sidebar_options'], adventure_layouts() ) )

		$output['sidebar_options'] = $input['sidebar_options'];

	// Theme layout must be in our array of theme layout options

	if ( isset( $input['menu_layout'] ) && array_key_exists( $input['menu_layout'], adventure_menu() ) )

		$output['menu_layout'] = $input['menu_layout'];

	// Theme layout must be in our array of theme layout options

	if ( isset( $input['contrast_options'] ) && array_key_exists( $input['contrast_options'], adventure_contrast() ) )

		$output['contrast_options'] = $input['contrast_options'];


	return apply_filters( 'adventure_theme_options_validate', $output, $input, $defaults );

}



/**

 * Enqueue the styles for the current color scheme.

 *

 * @since Adventure 1.0

 */

function adventure_enqueue_color_scheme() {

	$options = adventure_get_theme_options();

	$color_scheme = $options['color_scheme'];

	if ( 'red' == $color_scheme )

		wp_enqueue_style( 'red', get_template_directory_uri() . '/red.css', array(), null );

	elseif ( 'green' == $color_scheme )

		wp_enqueue_style( 'green', get_template_directory_uri() . '/green.css', array(), null );
		
	elseif ( 'blue' == $color_scheme )

		wp_enqueue_style( 'blue', get_template_directory_uri() . '/blue.css', array(), null );

	elseif ( 'teal' == $color_scheme )

		wp_enqueue_style( 'teal', get_template_directory_uri() . '/teal.css', array(), null );

	elseif ( 'pink' == $color_scheme )

		wp_enqueue_style( 'pink', get_template_directory_uri() . '/pink.css', array(), null );

	elseif ( 'christmas' == $color_scheme )

		wp_enqueue_style( 'christmas', get_template_directory_uri() . '/christmas.css', array(), null );

	do_action( 'adventure_enqueue_color_scheme', $color_scheme );

}

add_action( 'wp_enqueue_scripts', 'adventure_enqueue_color_scheme' );



/**

 * Add a style block to the theme for the current link color.

 *

 * This function is attached to the wp_head action hook.

 *

 * @since Adventure 1.0

 */
 

function adventure_print_link_color_style() {

	$options = adventure_get_theme_options();

	$link_color = $options['link_color'];


	$default_options = adventure_get_default_theme_options();



	// Don't do anything if the current link color is the default.

	if ( $default_options['link_color'] == $link_color )

		return;

?>

<style>
/* Link color */
a, .label a:hover, #title a:hover, #site-title a:focus, #site-title a:hover, #site-title a:active, .entry-title a:hover, .entry-title a:focus, .entry-title a:active, .comments-link a:hover, section.recent-posts .other-recent-posts a[rel="bookmark"]:hover, section.recent-posts .other-recent-posts .comments-link a:hover, 	.format-image footer.entry-meta a:hover, #site-generator a:hover {color: <?php echo $link_color; ?>;}
section.recent-posts .other-recent-posts .comments-link a:hover {border-color: <?php echo $link_color; ?>;}
article.feature-image.small .entry-summary p a:hover, .entry-header .comments-link a:hover, .entry-header .comments-link a:focus,.entry-header .comments-link a:active, .feature-slider a.active {background-color: <?php echo $link_color; ?>;}
</style>

<?php

}

add_action( 'wp_head', 'adventure_print_link_color_style' );



/**

 * Adds Adventure layout classes to the array of body classes.

 *

 * @since Adventure 1.0

 */

			
function adventure_layout_classes( $existing_classes ) {

	$options = adventure_get_theme_options();

	$current_layout = $options['sidebar_options'];

	if ( in_array( $current_layout, array( 'left', 'right', 'content' ) ) )
	
		$classes = array( 'selected' );

	else

		$classes[] = $current_layout;

	if ( 'left' == $current_layout )

		$classes[] = 'right-sidebar';

	if ( 'content' == $current_layout )

		$classes[] = 'none-sidebar';

	elseif ( 'right' == $current_layout )

		$classes[] = 'left-sidebar';
		
	else
	
		$classes[] = $current_layout;

	$classes = apply_filters( 'adventure_layouts', $classes, $current_layout );

	return array_merge( $existing_classes, $classes );

}
function adventure_layout_menu( $existing_classes ) {
	$options = adventure_get_theme_options();
	$current_layout = $options['menu_layout'];

	if ( 'bottom' == $current_layout )
		$classes[] = 'bottom';
	elseif ( 'top' == $current_layout )
		$classes[] = 'top';
	else
		$classes[] = $current_layout;

	$classes = apply_filters( 'adventure_menu', $classes, $current_layout );

	return array_merge( $existing_classes, $classes );
}
function adventure_layout_contrast( $existing_classes ) {
	$options = adventure_get_theme_options();
	$current_layout = $options['contrast_options'];

	if ( 'seventyfive' == $current_layout )
		$classes[] = 'seventyfive';
	elseif ( 'eighty' == $current_layout )
		$classes[] = 'eighty';
	elseif ( 'eightyfive' == $current_layout )
		$classes[] = 'eightyfive';
	else
		$classes[] = $current_layout;

	$classes = apply_filters( 'adventure_contrast', $classes, $current_layout );

	return array_merge( $existing_classes, $classes );
}
function adventure_active_final() {
$options = adventure_get_theme_options();
if ( $options['active'] == 'active' ) {	
add_filter( 'body_class', 'adventure_layout_classes' );
add_filter( 'body_class', 'adventure_layout_menu' );
add_filter( 'body_class', 'adventure_layout_contrast' );

register_sidebars(4, array(
'name'=>'widget%d',
'id' => 'widget',
'description' => 'Widgets in this area will be shown below the the content of every page.',
'before_widget' => '',
'after_widget' => '',
'before_title' => '<h2>',
'after_title' => '</h2>',
    ));
}
}
add_action( 'widgets_init', 'adventure_active_final' );
if ( ! isset( $content_width ) ) $content_width = 740;
function adventure_setup(){
add_theme_support( 'automatic-feed-links' );
register_nav_menu( 'bar', 'The Menu Bar' );
register_sidebar(array(
'name' => 'SideBar',
'id' => 'sidebar',
'description' => 'Widgets in this area will be shown in the sidebar.',
'before_widget' => '',
'after_widget' => '',
'before_title' => '<h2>',
'after_title' => '</h2>',
));
add_custom_background();
add_theme_support( 'post-thumbnails', array( 'post', 'page' ) );
add_image_size( 'page-thumbnail', 740, 9999, true );
define('HEADER_TEXTCOLOR', '');
define('HEADER_IMAGE_WIDTH', 994);
define('HEADER_IMAGE_HEIGHT', 175);
define('NO_HEADER_TEXT', true );
add_custom_image_header( 'adventure_header_style', 'adventure_admin_header_style', 'adventure_admin_header_image');
if ( ! function_exists( 'adventure_header_style' ) ) : function adventure_header_style() {}endif;
if ( ! function_exists( 'adventure_admin_header_style' ) ) : function adventure_admin_header_style() {}endif;
if ( ! function_exists( 'adventure_admin_header_image' ) ) : function adventure_admin_header_image() {?><img class="left title" title="<?php bloginfo('name'); ?>" src="<?php header_image(); ?>" alt="<?php bloginfo('description');?>" ><?php }endif;
}
add_action( 'after_setup_theme', 'adventure_setup' );
function adventure_enqueue_comment_reply() { if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {  wp_enqueue_script( 'comment-reply' ); } }
add_action( 'wp_enqueue_scripts', 'adventure_enqueue_comment_reply' );
function adventure_print_comment($comment, $args, $depth) { $GLOBALS['comment'] = $comment; ?>
<div id="comment-<?php comment_ID() ?>" <?php comment_class(); ?>>
<div class="avatar"><?php echo get_avatar( $comment, 100 ); ?></div>
<div class="commentinfo"><?php comment_author_link() ?> commented</div>
<?php if ($comment->comment_approved == '0') : ?><em>Your comment is awaiting moderation.</em><br /><?php endif; ?>
<?php comment_text() ?>
<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
<div class="right"><?php comment_date() ?> at <?php comment_time() ?> <?php edit_comment_link('Edit','  ','') ?></div>
</div>
<?php } ?>