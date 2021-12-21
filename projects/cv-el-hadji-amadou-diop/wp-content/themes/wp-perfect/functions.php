<?php

include("includes/theme-options.php");

/* Set the content width based on the theme's design and stylesheet.
 * Used to set the width of images and content.
 */
if ( ! isset( $content_width ) )
	$content_width = 640;

/* Register Sidebar */
/* ----------------------------------------- */

//Sidebar
if ( function_exists('register_sidebar') ) {
    register_sidebar(array(
        'name' => 'Sidebar',
        'before_widget' => '<div class="sidebar-widget wide-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="sidebar-widget-title">',
        'after_title' => '</h3>',
    ));
}

//Footer Left
if ( function_exists('register_sidebar') ) {
    register_sidebar(array(
        'name' => 'Footer Left',
        'before_widget' => '<div class="bottom-widget-small bottom-small-widget alignleft">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="bottom-widget-title">',
        'after_title' => '</h3>',
    ));
}

//Footer Mid
if ( function_exists('register_sidebar') ) {
    register_sidebar(array(
        'name' => 'Footer Mid',
        'before_widget' => '<div class="bottom-widget-small bottom-small-widget alignleft">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="bottom-widget-title">',
        'after_title' => '</h3>',
    ));
}

//Footer Right
if ( function_exists('register_sidebar') ) {
    register_sidebar(array(
        'name' => 'Footer Right',
        'before_widget' => '<div class="bottom-widget-small bottom-small-widget alignleft">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="bottom-widget-title">',
        'after_title' => '</h3>',
    ));
}

// Normally the get_the_content() tag returns the content without formatting.
//I found out a solution to make get_the_content() tag return the same content as the_content().
function get_the_content_with_formatting ($more_link_text = '(more...)', $stripteaser = 0, $more_file = '') {
	$content = get_the_content($more_link_text, $stripteaser, $more_file);
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);
	return $content;
}
?>
<?php 
function comment_list_pings($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	?>
	<li id="comment-<?php comment_ID(); ?>" class="cmt_trackback">
		<?php comment_author_link(); ?><div class="comment-meta"><a href="#comment-<?php comment_ID();?>"><?php comment_date();?><?php edit_comment_link("&nbsp;(Edit)");?></a></div>
		<?php comment_text(); ?>
	</li>
	<?php
}
?>
<?php
/* Wordpress 3.0 Custom Background */

if ( function_exists('add_custom_background') ) {
add_custom_background();
}

/* Wordpress 3.0 Custom Menu */

if (function_exists('wp_nav_menu')) {
add_action( 'init', 'register_my_menus' );
function register_my_menus() {
register_nav_menus(
array(
'pmenu' => __( 'Page Menu' ),
'cmenu' => __( 'Category Menu' ),
)
);
}
}
?>
<?php
function wp_perfect_default_menu() {
	echo '<div id="main-nav"><ul>';
	wp_list_categories('title_li=&depth=0&number=10');
	echo '</ul></div>';
}

function wp_perfect_default_pages() {
	echo '<div id="top-nav"><ul><li><a href="'.get_bloginfo('url').'">Home</a></li>';
	wp_list_pages('title_li=&depth=0&number=10');
	echo '</ul></div>';
}
?>
<?php
if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 120, 120, true );
}
?>