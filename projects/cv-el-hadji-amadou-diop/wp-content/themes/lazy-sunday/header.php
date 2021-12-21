<?php
/**
 * @package Lazy Sunday
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php wp_title( '&laquo;', true, 'right' ); ?> <?php bloginfo( 'name' ); ?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="header-wrapper">
	<div class="menu-wrapper">
		<div class="title">
			<h1><a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a></h1>
			<div class="tagline"><?php bloginfo( 'description' ); ?></div>
		</div>
		<div class="navmenu">
			<?php 
	      		$menu = has_nav_menu( 'hmenu' );
	      		if ( $menu ) { 
	      			wp_nav_menu( array( 'theme_location' => 'hmenu', 'depth' => '3' ) ); 
	      		} ?>
      	</div>
	</div>
</div>
<div class="wrapper">
	<?php if ( get_header_image() != '' ) { ?>
		<div id="header"></div>
	<?php } ?>