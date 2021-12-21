<?php

/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage webmagazine 1.0

 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title>
<?php // Returns the title based on what is being viewed
		if ( is_single() ) { // single posts
single_post_title(); echo ' | '; bloginfo( 'name' );
// The home page or, if using a static front page, the blog posts page.
} elseif ( is_home() || is_front_page() ) {
bloginfo( 'name' );
if( get_bloginfo( 'description' ) )
echo ' | ' ; bloginfo( 'description' );

webmagazine_the_page_number();
} elseif ( is_page() ) { // WordPress Pages
single_post_title( '' ); echo ' | '; bloginfo( 'name' );
} elseif ( is_search() ) { // Search results
printf( __( 'Search results for %s', 'webmagazine' ), '"'.get_search_query().'"' ); webmagazine_the_page_number(); echo ' | '; bloginfo( 'name' );
} elseif ( is_404() ) {  // 404 (Not Found)

_e( 'Not Found', 'webmagazine' ); echo ' | '; bloginfo( 'name' );
} else { // Otherwise:
wp_title( '' ); echo ' | '; bloginfo( 'name' ); webmagazine_the_page_number();}?>
</title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
/* We add some JavaScript to pages with the comment form
* to support sites with threaded comments (when in use).
*/
if ( is_singular() && get_option( 'thread_comments' ) )
wp_enqueue_script( 'comment-reply' );
/* Always have wp_head() just before the closing </head>
* tag of your theme, or you will break many plugins, which
* generally use this hook to add elements to <head> such
 * as styles, scripts, and meta tags.
 */
wp_head();
?>
</head>
<body <?php body_class(); ?>>
<div id="header-wrapper" class="hfeed">
<div id="header">
<div id="masthead">
<div id="branding" role="banner">
<div class="logowrap">
<div class="logobox">
<div class="logopad">

<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" id="customlogo">logo</a>
</div></div></div>

<div class="sitenamewrap">
<div class="sitename">
<div id="sitenamepad" class="sitenamepad-title">
<?php $heading_tag = ( is_home() || is_front_page() ) ? 'h1' : 'div'; ?>
<<?php echo $heading_tag; ?> id="site-title">
<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
</<?php echo $heading_tag; ?>>
</div></div></div>

<div class="taglinewrap">
<div class="tagline">
<div class="taglinepad"><?php bloginfo( 'description' ); ?>
</div></div></div>

<div id="access" class="access-title" role="navigation">
<?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff */ ?>

<div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'webmagazine' ); ?>"><?php _e( 'Skip to content', 'webmagazine' ); ?></a></div>

<?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu.  The menu assiged to the primary position is the one used.  If none is assigned, the menu with the lowest ID is used.  */ ?>

<?php wp_nav_menu( array( 'sort_column' => 'menu_order', 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>
			</div><!-- #access --><?php

<img src="<?php header_image(); ?>" width="<?php echo HEADER_IMAGE_WIDTH; ?>" height="<?php echo HEADER_IMAGE_HEIGHT; ?>" alt="" />
<?php endif; ?>

</div><!-- #branding -->
</div><!-- #masthead -->
</div><!-- #header -->
<div id="main" ><div class="center">