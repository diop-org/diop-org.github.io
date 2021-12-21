<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">

	<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>

	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />	
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats please -->

	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
    <!--[if IE]>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/ie.css" />
    <![endif]--> 
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	
    <?php wp_enqueue_script('jquery'); ?>
	<?php wp_get_archives('type=monthly&format=link'); ?>
	<?php //comments_popup_script(); // off by default ?>
    <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
	<?php wp_head(); ?>
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/epione.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/font.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/other.js"></script>
</head>
<body>
<div class="wrapper">
<!--Header-->
<div id="header">
    <div class="head">
        <div id="logo">
        <a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
        </div>
    </div>
</div>

    
    <div class="error"><a>404</a>
    <div class="error_msg">
    <h2>Not Found</h2>
    <p>Server cannot find the file you requested. File has either been moved or deleted, or you entered the wrong URL or document name. Look at the URL. If a word looks misspelled, then correct it and try it again. If that doesn't work You can try our search option to find what you are looking for. </p>
    <?php get_search_form(); ?>
    </div>
    </div>
</div>