<?php if (strpos($_SERVER['HTTP_USER_AGENT'],"MSIE 8")) {
header("X-UA-Compatible: IE=7");} ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
	$options = get_option('patagonia_options');
	if (is_home()) {
		$home_menu = 'current_page_item';
	} else {
		$home_menu = 'page_item';
	}
	if($options['feed'] && $options['feed_url']) {
		if (substr(strtoupper($options['feed_url']), 0, 7) == 'HTTP://') {
			$feed = $options['feed_url'];
		} else {
			$feed = 'http://' . $options['feed_url'];
		}
	} else {
		$feed = get_bloginfo('rss2_url');
	}
?>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<?php if( is_front_page() ) : ?>
		<title><?php bloginfo('name'); ?> | <?php bloginfo('description');?></title>
		<?php elseif( is_404() ) : ?>
		<title>Page Not Found | <?php bloginfo('name'); ?></title>
    <?php elseif( is_search() ) : ?>
    <title><?php  print 'Search Results for ' . wp_specialchars($s); ?> | <?php bloginfo('name'); ?></title>
		<?php else : ?>
		<title><?php wp_title($sep = ''); ?> | <?php bloginfo('name');?></title>
		<?php endif; ?>
<meta http-equiv="imagetoolbar" content="no" />
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" media="print" href="<?php bloginfo('stylesheet_directory'); ?>/print.css" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/clear.js"></script>
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>
</head>
<body>
<div id="wrapper">
<div id="header">
	<div id="search2">
		  <form method="get" id="searchform2" action="<?php bloginfo('home'); ?>/">
		  <div><input class="searchinput" type="text" onfocus="doClear(this)" value="<?php _e('Search'); ?>" name="s" id="s" />
		  <input type="submit" id="searchsubmit2" class="search_button" value="Search" />
		  </div>
		  </form>
	</div>
		  <h1><a href="<?php bloginfo('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
		  <h2><?php bloginfo('description'); ?></h2>
</div>
<div id="tabs">
		<ul id="page-list"  class="clearfix"><li <?php if(is_home()){ echo 'class="page_item current_page_item"'; } else { echo 'class="page_item"'; } ?>><a href="<?php bloginfo('url') ?>" title="Home" >Home</a></li>
		<?php
			if($options['menu_type'] == 'categories') {
				wp_list_categories('title_li=0&orderby=name&show_count=0');
			} else {
				wp_list_pages('title_li=0&sort_column=menu_order');
			}
		?></ul>
</div>
<div id="tabs3">
</div>