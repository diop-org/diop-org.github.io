<?php
/**
 * @package Lazy Sunday
 */

function lazysunday_sidebar() {
	register_sidebar( array(
		'id' => 'footer-sidebar1',
		'name' => __( 'Footer Sidebar 1', 'lazy-sunday' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>'
		) 
	);
	register_sidebar( array(
		'id' => 'footer-sidebar2',
		'name' => __( 'Footer Sidebar 2', 'lazy-sunday' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>'
		) 
	);
	register_sidebar( array(
		'id' => 'footer-sidebar3',
		'name' => __( 'Footer Sidebar 3', 'lazy-sunday' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>'
		) 
	);
}

add_action( 'widgets_init', 'lazysunday_sidebar' );

function lazy_sunday_theme_setup() {
	
	if ( function_exists( 'register_nav_menu' ) ) {
		register_nav_menu( 'hmenu', __( 'Horizontal Menu' , 'lazy-sunday' ) );
	}
	 
	if ( ! isset( $content_width ) ) 
		$content_width = 900;
		
	add_theme_support( 'automatic-feed-links' );

	add_editor_style();
	
	add_custom_background();
	
	add_theme_support( 'post-thumbnails' ); 
	
	set_post_thumbnail_size( 280, 100, true );
	
	load_theme_textdomain( 'lazy-sunday', get_template_directory() . '/languages' );

	$locale = get_locale();
	$locale_file = get_template_directory() . "/languages/$locale.php";
	if ( is_readable( $locale_file ) ) {
		require_once( $locale_file );
	}
	
}

add_action( 'after_setup_theme', 'lazy_sunday_theme_setup' );

function lazysunday_limit_posts_per_archive_page() {
	if ( is_category() || is_tag() || is_archive() || is_search() )
		$limit = 12;
	else
		$limit = get_option('posts_per_page');

	set_query_var('posts_per_archive_page', $limit);
}
add_filter( 'pre_get_posts', 'lazysunday_limit_posts_per_archive_page' );

// site header style
function lazysunday_header_style() {
    ?><style type="text/css">
        #header {
            background-image:url(<?php header_image(); ?>);
            background-repeat: no-repeat;
        }
    </style><?php
}

// admin header style
function lazysunday_admin_header_style() {
    ?><style type="text/css">
        #headimg {
            width: <?php echo HEADER_IMAGE_WIDTH; ?>px;
            height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
            background-repeat: no-repeat;
        }
        #headimg h1 {
        	display: none;
        }
        #headimg #desc {
        	display: none;
        }
    </style><?php
}

add_custom_image_header( 'lazysunday_header_style', 'lazysunday_admin_header_style' );

define('HEADER_TEXTCOLOR', 'ffffff');
define('HEADER_IMAGE', '%s/images/default_header.jpg'); // %s is the template dir uri
define('HEADER_IMAGE_WIDTH', 940);
define('HEADER_IMAGE_HEIGHT', 200);

?>