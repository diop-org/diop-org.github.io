<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
 <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
 <title><?php if( is_home() || is_front_page()) { bloginfo('name'); echo " - "; bloginfo('description'); } else { wp_title('',true,''); } ?></title>
 <link rel="shortcut icon" href="<?php mframe_option('favicon', 1); ?>" />
 <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
 <base href="<?php echo home_url( '/' ); ?>" />

 <?php wp_head(); ?>
</head>

<body <?php body_class('noscript'); ?> id="style<?php mframe_option('style', 1); ?>">

<div id="nav" class="wrap">
 <div class="head"></div>
 <div class="loop">
  <div class="fill">
   <?php get_template_part( 'theme/popups' ); ?>
   <div class="logo <?php echo mframe_option('logo-image-support') == false ? 'text' : 'image'; ?>"><a href="<?php echo home_url( '/' ); ?>" title="<?php bloginfo('description'); ?>">
   	<?php if ( mframe_option('logo-image-support') == false ) { mframe_option( 'logo-text', 1 ); } else { echo '<img src="' . mframe_option('logo-image') . '" width="' . mframe_option('logo-image-w') . '" height="' . mframe_option('logo-image-h') . '" />'; } ?>
   </a></div>
   <?php mframe_display( 'nav' ); ?>
   <div style="clear: both;"></div>
  </div>
 </div>
 <div class="foot"></div>
</div><?php

	if( mframe_option( 'slider-show' ))
	{
		if( mframe_enable( 'location', array( 'location' => mframe_option( 'slider-location' ))))
			get_template_part( 'theme/slider' );
	}
	?>