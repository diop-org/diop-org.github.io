<?php

//Content Width
$content_width = 480;

//Load Default Styles and Scripts for the Frontend
add_action('wp_enqueue_scripts', 'themezee_enqueue_scripts');
function themezee_enqueue_scripts() { 
	// Register and Enqueue Stylesheet
	wp_register_style('zee_stylesheet', get_stylesheet_directory_uri() . '/style.css');
	wp_enqueue_style('zee_stylesheet');
	
	// Register Font
	wp_register_style('zee_main_font', 'http://fonts.googleapis.com/css?family=Paytone+One');
	wp_enqueue_style('zee_main_font');
	
	// Register and Enqueue Javascripts
	wp_enqueue_script('jquery');
	
	wp_register_script('zee_jquery-ui-min', get_template_directory_uri() .'/includes/js/jquery-ui-1.8.11.custom.min.js', array('jquery'));
	wp_enqueue_script('zee_jquery-ui-min');
	
	wp_register_script('zee_jquery-easing', get_template_directory_uri() .'/includes/js/jquery.easing.1.3.js', array('jquery', 'zee_jquery-ui-min'));
	wp_enqueue_script('zee_jquery-easing');
	
	wp_register_script('zee_jquery-cycle', get_template_directory_uri() .'/includes/js/jquery.cycle.all.min.js', array('jquery', 'zee_jquery-easing'));
	wp_enqueue_script('zee_jquery-cycle');
	
	wp_register_script('zee_slidemenu', get_template_directory_uri() .'/includes/js/jquery.slidemenu.js', array('jquery'));
	wp_enqueue_script('zee_slidemenu');
}
locate_template('/includes/js/jscript.php', true);
locate_template('/includes/css/csshandler.php', true);
locate_template('/includes/shortcodes/shortcodes.php', true);

// init Localization
load_theme_textdomain('themezee_lang', get_template_directory_uri() . '/includes/lang');

// include Admin Files
locate_template('/includes/admin/theme-functions.php', true);
locate_template('/includes/admin/theme-admin.php', true);

// Register Sidebars
register_sidebar(array('name' => 'Sidebar Blog','id' => 'sidebar-blog'));
register_sidebar(array('name' => 'Sidebar Pages','id' => 'sidebar-pages'));

// Register Menus
register_nav_menu( 'main_navi', 'Navigation' );

// include Plugin Files
locate_template('/includes/plugins/theme-plugin-slider.php', true);
locate_template('/includes/plugins/theme-plugin-networks.php', true);
locate_template('/includes/plugins/theme-plugin-about.php', true);

// include Widgets
locate_template('/includes/plugins/theme-widget-socialmedia.php', true);
locate_template('/includes/plugins/theme-widget-twitter.php', true);

// Set Constant
define('THEMEZEE_INFO', 'http://www.syscoweb.com/papismatique');

// Add Theme Functions
add_theme_support('post-thumbnails');
add_theme_support('automatic-feed-links');
add_editor_style();

// Add Custom Header
define('HEADER_TEXTCOLOR', '');
define('HEADER_IMAGE', get_stylesheet_directory_uri() . '/images/default_header.jpg');
define('HEADER_IMAGE_WIDTH', 280);
define('HEADER_IMAGE_HEIGHT', 300);
define('NO_HEADER_TEXT', true );

function themezee_header_style() {
    ?><style type="text/css">
		#portrait_image img {
			margin-top: 10px;
			width: <?php echo HEADER_IMAGE_WIDTH; ?>px;
            height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
        }
    </style><?php
}
function themezee_admin_header_style() {
    ?><style type="text/css">
        #headimg {
            width: <?php echo HEADER_IMAGE_WIDTH; ?>px;
            height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
        }
    </style><?php
}
add_custom_image_header('themezee_header_style', 'themezee_admin_header_style');
add_custom_background( 'themezee_custom_background_callback' );

// Add Custom Background Fix
function themezee_custom_background_callback() {
 
    /* Get the background image. */
    $image = get_background_image();
	
    /* If there's an image, just call the normal WordPress callback. We won't do anything here. */
    if ( !empty( $image ) ) {
        _custom_background_cb();
        return;
    }
	
    /* Get the background color. */
    $color = get_background_color();
 
    /* If no background color, return. */
    if ( empty( $color ) )
        return;
 
    /* Use 'background' instead of 'background-color'. */
    $style = "background: #{$color};";
?>
<style type="text/css">body { <?php echo trim( $style ); ?> }</style>
<?php
}

// Change Excerpt Length
function themezee_excerpt_length($length) {
    return 30;
}
add_filter('excerpt_length', 'themezee_excerpt_length');

// Change Excerpt More
function themezee_excerpt_more($more) {
    return '';
}
add_filter('excerpt_more', 'themezee_excerpt_more');

// Add custom post type Portfolio
add_action('init', 'themezee_add_portfolio');
function themezee_add_portfolio()
{
	register_post_type('portfolio', array(
		'label' => __('Portfolio'),
		'public' => true,
		'show_ui' => true,
		'menu_position' => 6,
		'has_archive' => false,
		'rewrite' => array('slug'=>'portfolio-item'),
		'supports' => array('thumbnail', 'title', 'editor' )
		) 
	);
}
?>