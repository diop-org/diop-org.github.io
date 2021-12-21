<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title>
<?php if ( is_home() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;<?php bloginfo('description'); ?><?php } ?>
<?php if ( is_search() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;Search Results<?php } ?>
<?php if ( is_author() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;Author Archives<?php } ?>
<?php if ( is_single() ) { ?><?php wp_title(''); ?>&nbsp;|&nbsp;<?php bloginfo('name'); ?><?php } ?>
<?php if ( is_page() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;<?php wp_title(''); ?><?php } ?>
<?php if ( is_category() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;Archive&nbsp;|&nbsp;<?php single_cat_title(); ?><?php } ?>
<?php if ( is_month() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;Archive&nbsp;|&nbsp;<?php the_time('F'); ?><?php } ?>
<?php if (function_exists('is_tag')) { if ( is_tag() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;Tag Archive&nbsp;|&nbsp;<?php  single_tag_title("", true); } } ?>
</title>

<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/menu.js"></script>


<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/cufon-yui.js"></script> 
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/justus.font.js"></script>
 
 <script type="text/javascript"> 
Cufon.replace('h1');
Cufon.replace('h2');
Cufon.replace('h3');
Cufon.replace('h4');
    </script>

<?php wp_enqueue_script('comment-reply'); ?>
<?php wp_head(); ?>

</head>

<body onload="javascript: mbSet('menu2');">

<div id="wrap">

<div id="header">
<div id="menubar">
<ul id="menu" style="padding:0; margin:0;">
<li class="home"><a href="<?php echo get_settings('home'); ?>/">Home</a></li>
<li class="rss"> <a href="<?php bloginfo('rss2_url'); ?>"> RSS (Posts) </a></li>
<li class="rssc"> <a href="<?php bloginfo('comments_rss2_url'); ?>"> RSS (Comments) </a></li>
</ul>
<div class="clearboth">&nbsp;</div>
</div>

<div id="logo">
<h1><a href="<?php echo get_settings('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
<h2><?php bloginfo('description'); ?></h2>
<div class="clearboth">&nbsp;</div>
</div>


<div id="subbar">	
<ul id="menu2" style="padding:0; margin:0;">	
<?php wp_list_pages('sort_column=menu_order&title_li='); ?>
</ul>
<div class="clearboth">&nbsp;</div>
</div>

</div>

