<?php
/**
 * @package WordPress
 * @subpackage JohnLoan
 */

/**
 * Make theme available for translation
 * Translations can be filed in the /languages/ directory
 * If you're building a theme based on johnloan, use a find and replace
 * to change 'johnloan' to the name of your theme in all the template files
 
load_theme_textdomain( 'johnloan', TEMPLATEPATH . '/languages' );

$locale = get_locale();
$locale_file = TEMPLATEPATH . "/languages/$locale.php";
if ( is_readable( $locale_file ) )
	require_once( $locale_file );

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 530;

/**
 * This theme uses wp_nav_menu() in one location.
 */
register_nav_menus( array(
	'primary' => __( 'Primary Menu', 'johnloan' ),
	'secondary' => __( 'Secondary Menu', 'johnloan' ),
) );

/**
 * Add default posts and comments RSS feed links to head
 */
add_theme_support( 'automatic-feed-links' );

/**
 * Add Post Format support
 */
add_theme_support( 'post-formats', array( 'aside', 'gallery', 'quote', 'status' ) );

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 */
function johnloan_page_menu_args($args) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'johnloan_page_menu_args' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function johnloan_widgets_init() {
	register_sidebar( array (
		'name' => __( 'Sidebar', 'johnloan' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );

}
add_action( 'init', 'johnloan_widgets_init' );

/**
 * Display navigation to next/previous pages when applicable
 */
function johnloan_content_nav($nav_id) {
	global $wp_query;
	
	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="<?php echo $nav_id; ?>">
			<h1 class="section-heading"><?php _e( 'Post navigation', 'johnloan' ); ?></h1>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'johnloan' ) ); ?></div>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'johnloan' ) ); ?></div>
		</nav><!-- #nav-above -->
	<?php endif;
}

/**
 * Returns a "Continue Reading" link for excerpts
 */
function johnloan_continue_reading_link() {
	return ' <a href="'. get_permalink() . '">' . __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'johnloan' ) . '</a>';
}

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and johnloan_continue_reading_link().
 */
function johnloan_auto_excerpt_more( $more ) {
	return ' &hellip;' . johnloan_continue_reading_link();
}
add_filter( 'excerpt_more', 'johnloan_auto_excerpt_more' );

/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 */
function johnloan_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= johnloan_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'johnloan_custom_excerpt_more' );

/**
 * This theme was built with PHP, Semantic HTML, CSS, love, and a Toolbox.
 */