<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes() ?>>
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php if (is_home()) {
	echo bloginfo('name');
} elseif (is_category()) {
	echo __('Category &raquo; ', 'blank'); wp_title('&laquo; @ ', TRUE, 'right');
	echo bloginfo('name');
} elseif (is_tag()) {
	echo __('Tag &raquo; ', 'blank'); wp_title('&laquo; @ ', TRUE, 'right');
	echo bloginfo('name');
} elseif (is_search()) {
	echo __('Search results &raquo; ', 'blank');
	echo the_search_query();
	echo '&laquo; @ ';
	echo bloginfo('name');
} elseif (is_404()) {
	echo '404 '; wp_title(' @ ', TRUE, 'right');
	echo bloginfo('name');
} else {
	echo wp_title(' @ ', TRUE, 'right');
	echo bloginfo('name');
} ?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/suckerfish.js"></script>

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?> <!-- enables nested comments in WP 2.7 -->

<!-- Drop down menu -->
<?php wp_enqueue_script('jquery'); ?>

<script type='text/javascript'>
jQuery(document).ready(function() {
jQuery("#dropmenu ul").css({display: "none"}); // Opera Fix
jQuery("#dropmenu li").hover(function(){
		jQuery(this).find('ul:first').css({visibility: "visible",display: "none"}).show(268);
		},function(){
		jQuery(this).find('ul:first').css({visibility: "hidden"});
		});
});
</script>
<!-- end Drop down menu -->

<!-- This makes the options work -->
<?php
global $options;
foreach ($options as $value) {
    if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); }
}
?>
<!-- end options -->

<?php wp_head(); //leave for plugins ?>

</head>

<body>
<div id="wrapper"> <!-- #wrapper ends in footer.php -->
<div id="top" class="clearfloat"><!-- #this is the corners at the top -->

<h1><a href="<?php echo get_option('home'); ?>"><?php bloginfo('name'); ?></a>
<span class="black"><?php bloginfo('description'); ?></span></h1>

</div>

<div id="header">

<div id="nav">
<?php if ( $breathe_hide_pages == 'no' ) { ?>
<ul id="dropmenu">
<li ><a rel="<?php _e("bookmark"); ?>" title="<?php _e("Home"); ?>" href="<?php bloginfo('url'); ?>"><?php _e("Home"); ?></a></li>
<?php wp_list_pages('sort_column=menu_order&title_li='); ?>
</ul>
<?php } ?>
</div>


	
	

<div id="search">
            <?php include (TEMPLATEPATH . "/searchform.php"); ?>  
 </div>
 </div><!-- Close Head -->

<div class="breadcrumb">
<ul >
  <li><?php if (function_exists('pixopoint_menu')) {pixopoint_menu();} ?></li>
</ul>

</div>
<!-- end #header -->

