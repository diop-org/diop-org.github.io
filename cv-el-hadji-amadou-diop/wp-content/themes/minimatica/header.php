<?php
/**
 * The Theme Header Template
 *
 * Used to display the document <head> section and page header
 *
 * @package WordPress
 * @subpackage Minimatica
 * @since Minimatica 1.0
 */
?><!DOCTYPE html><!-- HTML5, for the win! -->
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php minimatica_doc_title(); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php 
/**
 * Hook used to isert content in the document's <head> section.
 * Always have this before closing the <head> tag.
 */
wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="wrapper" class="hfeed">
		<header id="header" role="banner">
			<?php $heading_tag = ( is_home() || is_front_page() ) ? 'h1' : 'div'; ?>
			<<?php echo $heading_tag; ?> id="site-title"><a href="<?php echo home_url(); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></<?php echo $heading_tag; ?>>
		</header><!-- #header -->