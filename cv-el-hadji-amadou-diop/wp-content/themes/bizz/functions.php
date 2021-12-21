<?php
/**
 * @package WordPress
 * @subpackage bizz Theme
*/


// Set the content width based on the theme's design and stylesheet.
if ( ! isset( $content_width ) ) 
    $content_width = 620;



/*-----------------------------------------------------------------------------------*/
/*	Include functions
/*-----------------------------------------------------------------------------------*/
require('admin/theme-admin.php');
require('functions/pagination.php');
require('functions/better-excerpts.php');
require('functions/shortcodes.php');
require('functions/meta/meta-box-class.php');
require('functions/meta/meta-box-usage.php');
require('functions/flickr-widget.php');



/*-----------------------------------------------------------------------------------*/
/*	Images
/*-----------------------------------------------------------------------------------*/
if ( function_exists( 'add_theme_support' ) )
	add_theme_support( 'post-thumbnails' );

if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'full-size',  9999, 9999, false );
	add_image_size( 'nivo-slider',  910, 400, true );
	add_image_size( 'post-image',  660, 220, true );
	add_image_size( 'portfolio-thumb',  215, 140, true );
	add_image_size( 'portfolio-single',  500, 9999, false );



/*-----------------------------------------------------------------------------------*/
/*	Javascsript
/*-----------------------------------------------------------------------------------*/

add_action('wp_enqueue_scripts','my_theme_scripts_function');

function my_theme_scripts_function() {
	//get theme options
	global $options;
	
	wp_deregister_script('jquery'); 
		wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"), false, '1.4.2'); 
	wp_enqueue_script('jquery');	
	
	// Site wide js
	wp_enqueue_script('superfish', get_template_directory_uri() . '/js/superfish.js');
	wp_enqueue_script('custom', get_template_directory_uri() . '/js/custom.js');

	//portfolio main
	if(is_page_template('template-portfolio.php')) {
		wp_enqueue_script('portfolio', get_template_directory_uri() . '/js/portfolio.js');
	}
	
	//portfolio single
	if( get_post_type() == 'portfolio') {
		wp_enqueue_script('prettyphoto', get_template_directory_uri() . '/js/jquery.prettyPhoto.js');
	}
	
	//homepage js
	if(is_front_page()) {	
		wp_enqueue_script('nivo', get_template_directory_uri() . '/js/jquery.nivo.slider.js');
	}
}



/*-----------------------------------------------------------------------------------*/
/*	Sidebars
/*-----------------------------------------------------------------------------------*/

//Register Sidebars
if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'name' => 'Sidebar',
		'id' => 'sidebar',
		'description' => 'Widgets in this area will be shown in the sidebar.',
		'before_widget' => '<div class="sidebar-box clearfix">',
		'after_widget' => '</div>',
		'before_title' => '<h4><span>',
		'after_title' => '</span></h4>',
));
if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'name' => 'Footer Left',
		'id' => 'footer-left',
		'description' => 'Widgets in this area will be shown in the footer left area.',
		'before_widget' => '<div class="footer-widget clearfix">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
));
if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'name' => 'Footer Middle',
		'id' => 'footer-middle',
		'description' => 'Widgets in this area will be shown in the footer middle area.',
		'before_widget' => '<div class="footer-widget clearfix">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
));
if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'name' => 'Footer Right',
		'id' => 'footer-right',
		'description' => 'Widgets in this area will be shown in the footer right area.',
		'before_widget' => '<div class="footer-widget clearfix">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
));



/*-----------------------------------------------------------------------------------*/
/*	Custom Post Types & Taxonomies
/*-----------------------------------------------------------------------------------*/

add_action( 'init', 'create_post_types' );
function create_post_types() {
	//slider post type
	register_post_type( 'Slides',
		array(
		  'labels' => array(
			'name' => __( 'HP Slides', 'bizz' ),
			'singular_name' => __( 'Slide', 'bizz' ),		
			'add_new' => _x( 'Add New', 'Slide', 'bizz' ),
			'add_new_item' => __( 'Add New Slide', 'bizz' ),
			'edit_item' => __( 'Edit Slide', 'bizz' ),
			'new_item' => __( 'New Slide', 'bizz' ),
			'view_item' => __( 'View Slide', 'bizz' ),
			'search_items' => __( 'Search Slides', 'bizz' ),
			'not_found' =>  __( 'No Slides found', 'bizz' ),
			'not_found_in_trash' => __( 'No Slides found in Trash', 'bizz' ),
			'parent_item_colon' => ''
			
		  ),
		  'public' => true,
		  'supports' => array('title','thumbnail'),
		  'query_var' => true,
		  'rewrite' => array( 'slug' => 'slides' ),
		)
	  );
	  
	//hp highlights
	register_post_type( 'hp_highlights',
		array(
		  'labels' => array(
			'name' => __( 'HP Highlights', 'bizz' ),
			'singular_name' => __( 'Highlight', 'bizz' ),		
			'add_new' => _x( 'Add New', 'Highlight', 'bizz' ),
			'add_new_item' => __( 'Add New Highlight', 'bizz' ),
			'edit_item' => __( 'Edit Highlight', 'bizz' ),
			'new_item' => __( 'New Highlight', 'bizz' ),
			'view_item' => __( 'View Highlight', 'bizz' ),
			'search_items' => __( 'Search Highlights', 'bizz' ),
			'not_found' =>  __( 'No Highlights found', 'bizz' ),
			'not_found_in_trash' => __( 'No Highlights found in Trash', 'bizz' ),
			'parent_item_colon' => ''
			
		  ),
		  'public' => true,
		  'supports' => array('title','editor'),
		  'query_var' => true,
		  'rewrite' => array( 'slug' => 'hp-highlights' ),
		)
	  );

	//portfolio post type
	register_post_type( 'Portfolio',
		array(
		  'labels' => array(
			'name' => __( 'Portfolio', 'bizz' ),
			'singular_name' => __( 'Portfolio', 'bizz' ),		
			'add_new' => _x( 'Add New', 'Portfolio Project', 'bizz' ),
			'add_new_item' => __( 'Add New Portfolio Project', 'bizz' ),
			'edit_item' => __( 'Edit Portfolio Project', 'bizz' ),
			'new_item' => __( 'New Portfolio Project', 'bizz' ),
			'view_item' => __( 'View Portfolio Project', 'bizz' ),
			'search_items' => __( 'Search Portfolio Projects', 'bizz' ),
			'not_found' =>  __( 'No Portfolio Projects found', 'bizz' ),
			'not_found_in_trash' => __( 'No Portfolio Projects found in Trash', 'bizz' ),
			'parent_item_colon' => ''
			
		  ),
		  'public' => true,
		  'supports' => array('title','editor','thumbnail'),
		  'query_var' => true,
		  'rewrite' => array( 'slug' => 'portfolio' ),
		)
	  );
}


// Add taxonomies
add_action( 'init', 'create_taxonomies' );

//create taxonomies
function create_taxonomies() {
	
// portfolio taxonomies
	$cat_labels = array(
		'name' => __( 'Portfolio Categories', 'bizz' ),
		'singular_name' => __( 'Portfolio Category', 'bizz' ),
		'search_items' =>  __( 'Search Portfolio Categories', 'bizz' ),
		'all_items' => __( 'All Portfolio Categories', 'bizz' ),
		'parent_item' => __( 'Parent Portfolio Category', 'bizz' ),
		'parent_item_colon' => __( 'Parent Portfolio Category:', 'bizz' ),
		'edit_item' => __( 'Edit Portfolio Category', 'bizz' ),
		'update_item' => __( 'Update Portfolio Category', 'bizz' ),
		'add_new_item' => __( 'Add New Portfolio Category', 'bizz' ),
		'new_item_name' => __( 'New Portfolio Category Name', 'bizz' ),
		'choose_from_most_used'	=> __( 'Choose from the most used portfolio categories', 'bizz' )
	); 	

	register_taxonomy('portfolio_cats','portfolio',array(
		'hierarchical' => true,
		'labels' => $cat_labels,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'portfolio-category' ),
	));
}


/*-----------------------------------------------------------------------------------*/
/*	Portfolio Cat Pagination
/*-----------------------------------------------------------------------------------*/

// Set number of posts per page for taxonomy pages
$option_posts_per_page = get_option( 'posts_per_page' );
add_action( 'init', 'my_modify_posts_per_page', 0);
function my_modify_posts_per_page() {
    add_filter( 'option_posts_per_page', 'my_option_posts_per_page' );
}
function my_option_posts_per_page( $value ) {
	global $option_posts_per_page;
	
    if ( is_tax( 'portfolio_cats') ) {
        return 8;
    }
	else {
        return $option_posts_per_page;
    }
}

/*-----------------------------------------------------------------------------------*/
/*	Other functions
/*-----------------------------------------------------------------------------------*/

// Limit Post Word Count
function new_excerpt_length($length) {
	return 50;
}
add_filter('excerpt_length', 'new_excerpt_length');

//Replace Excerpt Link
function new_excerpt_more($more) {
       global $post;
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');
}

// Enable Custom Background
add_custom_background();

// register navigation menus
register_nav_menus(
	array(
	'menu'=>__('Menu'),
	)
);

/// add home link to menu
function home_page_menu_args( $args ) {
$args['show_home'] = true;
return $args;
}
add_filter( 'wp_page_menu_args', 'home_page_menu_args' );

// menu fallback
function default_menu() {
	require_once (TEMPLATEPATH . '/includes/default-menu.php');
}


// functions run on activation --> important flush to clear rewrites
if ( is_admin() && isset($_GET['activated'] ) && $pagenow == 'themes.php' ) {
	$wp_rewrite->flush_rules();
}
?>