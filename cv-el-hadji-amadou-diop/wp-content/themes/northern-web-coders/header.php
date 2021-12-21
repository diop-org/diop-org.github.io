<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>" />
<title><?php bloginfo('name'); ?></title>
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
<style type="text/css" media="screen">
@import url( <?php bloginfo('stylesheet_url'); ?> );
</style>                     	
<?php
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
	wp_head();
?>         
</head>
<body <?php body_class(); ?>>
<header><h1 id="header"><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
<em><?php bloginfo('description'); ?></em>
</header>
<nav><?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => '') ); ?></nav>