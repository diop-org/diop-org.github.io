<?php

// Theme Name
define('THEMEZEE_NAME', 'zeeReputation');
define('THEMEZEE_INFO', 'http://themezee.com/zeereputation');

//Content Width
$content_width = 540;

//Load Default Styles and Scripts for the Frontend
add_action('wp_enqueue_scripts', 'themezee_enqueue_scripts');
function themezee_enqueue_scripts() { 
	// Register and Enqueue Stylesheet
	wp_register_style('zee_stylesheet', get_stylesheet_directory_uri() . '/style.css');
	wp_enqueue_style('zee_stylesheet');
	
	// Register and Enqueue Javascripts
	wp_enqueue_script('jquery');
	
	wp_register_script('zee_jquery-cycle', get_template_directory_uri() .'/includes/js/jquery.cycle.all.min.js', array('jquery'));
	wp_enqueue_script('zee_jquery-cycle');
}
locate_template('/includes/js/jscript.php', true);
locate_template('/includes/css/csshandler.php', true);

// init Localization
load_theme_textdomain('themezee_lang', get_template_directory() . '/includes/lang' );

// include Admin Files
locate_template('/includes/admin/theme-functions.php', true);
locate_template('/includes/admin/theme-admin.php', true);

// Add Theme Functions
add_theme_support('post-thumbnails');
add_theme_support('automatic-feed-links');
add_custom_background();
add_editor_style();

// Add Custom Header
define('HEADER_TEXTCOLOR', '');
define('HEADER_IMAGE', get_stylesheet_directory_uri() . '/images/default_header.jpg');
define('HEADER_IMAGE_WIDTH', 590);
define('HEADER_IMAGE_HEIGHT', 120);
define('NO_HEADER_TEXT', true );

function header_style() {
    ?><style type="text/css">
	   #custom_header img {
			width: <?php echo HEADER_IMAGE_WIDTH; ?>px;
            height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
        }
    </style><?php
}
function admin_header_style() {
    ?><style type="text/css">
        #headimg {
            width: <?php echo HEADER_IMAGE_WIDTH; ?>px;
            height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
        }
    </style><?php
}
add_custom_image_header('header_style', 'admin_header_style');

// Register Sidebars
register_sidebar(array('name' => 'Sidebar Blog','id' => 'sidebar-blog'));
register_sidebar(array('name' => 'Sidebar Pages','id' => 'sidebar-pages'));

// Register Menus
register_nav_menu( 'main_navi', 'Main Navigation' );

// Add Default Menu Fallback Function
function themezee_default_menu() {
	echo '<ul id="nav" class="menu">'. wp_list_pages('title_li=&echo=0') .'</ul>'; // NOTE: CHANGE ID HERE TO TOPNAVI AND NAV
}
// include Widget Files
locate_template('/includes/widgets/theme-widget-ads.php', true);
locate_template('/includes/widgets/theme-widget-socialmedia.php', true);

// Change Excerpt More
function themezee_excerpt_more($more) {
    return '';
}
add_filter('excerpt_more', 'themezee_excerpt_more');
?>