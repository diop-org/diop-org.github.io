<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-Transitional.dtd">
	
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.prg/xfn/11">
	<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
	<meta http-equiv="content-type" content="text/html; charset=<?php bloginfo('charset'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" type="image/x-icon" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php wp_head(); ?>
	
	<!--[if lt IE 7]>
		<link href="<?php bloginfo('template_url'); ?>/ie7.css" rel="stylesheet" type="text/css" />
	<![endif]-->
</head>
<body id="<?php iz_body_id(); ?>" class="<?php iz_body_class(); ?>">
	<div id="top">
		<div class="header">
			<h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
			<p class="desc"><?php bloginfo('description'); ?></p>
		</div>
	</div>
	<div id="middle">
		<div id="middle-inner" class="clearfix">
		
