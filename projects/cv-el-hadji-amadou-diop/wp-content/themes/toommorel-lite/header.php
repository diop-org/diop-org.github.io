<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title>
<?php bloginfo('name'); ?> | <?php is_home() ? bloginfo('description') : wp_title(''); ?>
</title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
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
<body  <?php body_class(); ?> style="background:url(<?php if ( get_option('inkthemes_bodybg') !='' ) {?><?php echo get_option('inkthemes_bodybg'); ?><?php } else { ?>background:url('images/bodybg.png');<?php } ?>);" >
<!--Start Container-->
<div class="container_24">
  <!--Start Main-->
  <div class="grid_24 header_wrapper">
    <!--Start Header Div-->
    <div class="header">
      <div class="logo"><a href="<?php echo home_url(); ?>"><img src="<?php if ( get_option('inkthemes_logo') !='' ) {?><?php echo get_option('inkthemes_logo'); ?><?php } else {?><?php echo get_template_directory_uri(); ?>/images/logo.png<?php }?>" alt="<?php bloginfo('name'); ?>" /></a> </div>
    </div>
    <!--End Header Div-->
    <div class="clear"></div>
  </div>
</div>
<div class="clear"></div>
<!--Start Container-->
<div class="container_24">
<!--Start Main-->
<div class="grid_24">
<!--Start Menubar-->
<!--Start Main_wrapper-->
<div class="menu_wrapper">
<div class="menu_bar">
  <div id="MainNav">
    <!--Start menu-div-->
    <?php inkthemes_nav(); ?>
    <!--End menu-div-->
  </div>
</div>
<!--End Menubar-->
<!--Start right nav-->
<div class="right_navi_top">
  <div id="topSocial">
    <?php if ( get_option('inkthemes_delicious') !='' ) {?>
    <a href="<?php echo get_option('inkthemes_delicious'); ?>" title="Delicious"><img src="<?php echo get_template_directory_uri(); ?>/images/delicious_32.png" alt="delicious" title="delicious"/></a>
    <?php } else {?>
    <?php }?>
    <?php if ( get_option('inkthemes_linkedin') !='' ) {?>
    <a href="<?php echo get_option('inkthemes_linkedin'); ?>" title="LinkeIn"><img src="<?php echo get_template_directory_uri(); ?>/images/linkedin_32.png" alt="linkedin" title="linkedin"/></a>
    <?php } else {?>
    <?php }?>
    <?php if ( get_option('inkthemes_facebook') !='' ) {?>
    <a href="<?php echo get_option('inkthemes_facebook'); ?>" title="Join Us!"><img src="<?php echo get_template_directory_uri(); ?>/images/facebook_32.png" alt="facebook" title="facebook"/></a>
    <?php } else {?>
    <?php }?>
    <?php if ( get_option('inkthemes_twitter') !='' ) {?>
    <a href="<?php echo get_option('inkthemes_twitter'); ?>" title="Follow Us!"title="Delicious"><img src="<?php echo get_template_directory_uri(); ?>/images/twitter_32.png" alt="twitter" title="twitter"/></a>
    <?php } else {?>
    <?php }?>
    <?php if ( get_option('inkthemes_rss') !='' ) {?>
    <a href="<?php echo get_option('inkthemes_rss'); ?>" title="Feed in RSS"><img src="<?php echo get_template_directory_uri(); ?>/images/rss_32.png" alt="rss" title="rss"/></a>
    <?php } else {?>
    <?php }?>
  </div>
</div>
<!--End right nav-->
<div class="clear"></div>
</div>
</div>
</div>
<div class="clear"></div>
<div class="wrap">
  <div class="bg_line">
      <div class="container_24">
          <div class="grid_24">
              <div class="header_line"></div>
          </div>
          <div class="clear"></div>
      </div>
  </div>
</div>
<div class="clear"></div>
<div class="container_24">
<!--Start Main-->
<div class="grid_24 main">
<!--Start Menubar-->
<!--Start Main_wrapper-->
<div class="main_wrapper">