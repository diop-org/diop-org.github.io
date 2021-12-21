<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title>
<?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'themia' ), max( $paged, $page ) );
?>
</title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

<?php 		
wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!--Start Container-->
<div class="container_24">
<!--Start Header Wrapper-->
<div class="grid_24 header_wrapper">
  <!--Start Header-->
  <div class="header">
    <div class="grid_6 alpha">
      <div class="logo"> <a href="<?php echo home_url(); ?>"><img src="<?php if ( inkthemes_get_option('inkthemes_logo') !='' ) {?><?php echo inkthemes_get_option('inkthemes_logo'); ?><?php } else {?><?php echo get_template_directory_uri(); ?>/images/logo.png<?php }?>" alt="<?php bloginfo('name'); ?>" /></a></div>
    </div>
    <div class="grid_18 omega">
      <!--Start Menu wrapper-->
      <div class="menu_wrapper">
        <!--Start menu-div-->
        <?php inkthemes_nav(); ?>
        <!--End menu-div-->
      </div>
      <!--End Menu wrapper-->
    </div>
    <div class="clear"></div>
  </div>
  <!--End Header-->
</div>
<!--End Header Wrapper-->
<div class="clear"></div>
