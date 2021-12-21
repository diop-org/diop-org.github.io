<?php if (strpos($_SERVER['HTTP_USER_AGENT'],"MSIE 8")) {
header("X-UA-Compatible: IE=7");} ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
	$options = get_option('director_options');
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
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style.css" type="text/css" media="screen" />
<meta name="distribution" content="global" />
<meta name="robots" content="follow, all" />
<meta name="language" content="EN" />
<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
<link rel="Shortcut Icon" href="<?php echo get_settings('home'); ?>/" type="image/x-icon" />
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_print_scripts("jquery"); ?>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery-easing-1.3.pack.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery-easing-compatibility.1.2.pack.js"></script>
<script type="text/javascript"><!--//--><![CDATA[//><!--//--><!]]></script>
<!--[if lt IE 7]>
 <script src="http://ie7-js.googlecode.com/svn/version/2.0(beta3)/IE7.js"
 type="text/javascript">
 </script>
<![endif]--> 
<script type='text/javascript'>
jQuery(document).ready(function() {
	jQuery("#dir_menu ul, .dir_menu ul").css({display: "none"}); // Opera Fix
	jQuery("#dir_menu li, .dir_menu li").hover(function(){
		jQuery(this).find('ul:first').css({visibility: "visible",display: "none"}).show(268);
	},function(){
		jQuery(this).find('ul:first').css({visibility: "hidden"});
	});
	jQuery('#search-box').focus(function() {
		var search = jQuery('.dir_search');
		jQuery(search).addClass('dir_search_active');
	}).blur(function() {
		var search = jQuery('.dir_search');
		jQuery(search).removeClass('dir_search_active');
	});
});
function addBookmark(){
	if (document.all) {window.external.AddFavorite(location.href, document.title);}
	else if (window.sidebar){window.sidebar.addPanel(document.title, location.href, "");}
}
</script>
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php wp_head();?>
</head>
<body<?php if ( is_home() ) { ?> id="home"<?php } ?>>
<div id="layout">
	<div id="logo">
	<img src="<?php bloginfo('template_directory'); ?>/images/logo.png" alt="<?php echo get_bloginfo('name');?>"/>
	</div>
		<div id="header">
		  <h1><a href="<?php bloginfo('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
		  <h2><?php bloginfo('description'); ?></h2>		
		</div>
	 <ul id="dir_menu" class="dir_menu">
     <li><a href="<?php echo get_option('home'); ?>"><span>Home</span></a></li>
	 <?php wp_list_pages('sort_column=menu_order&title_li=&link_before=<span>&link_after=</span>&include='.get_dir_config('menu_include').'&exclude_tree='.get_dir_config('menu_exclude')); ?>
     </ul>
       <div id="nav1"></div><div style="clear:both"></div>
	<div id="search_rss_wrapper"><!--  RSS starts-->
		<div class="wrapper_left">
		<div class="rss">
		<a id="feedrss" title="<?php _e('Subscribe to our RSS Feed!', 'patagonia'); ?>" href="<?php echo clean_url($feed); ?>"><?php _e('<abbr title="RSS"></abbr>', 'patagonia'); ?></a>
		</div>
		<div class="twitter">
		<?php if($options['twitter_icon'] && $options['twitter_nick']) : ?>
		<a id="twitterid" title="<?php _e('Follow us on Twitter!', 'director'); ?>" href="http://twitter.com/<?php echo sanitize_user($options['twitter_nick']); ?>"><?php _e('', 'director'); ?></a>
		</div>
			<div class="facebook">
			<?php endif; if($options['facebook_icon'] && $options['facebook_url']) : ?>
				<a id="facebookid" title="<?php _e('Connect with us on Facebook!', 'director'); ?>" href="<?php echo clean_url($options['facebook_url']); ?>/"><?php _e('', 'director'); ?></a>
			<?php endif; ?>
			</div>
	    </div>
		<div class="wrapper_right">
			<form class="searchform" method="get" action="<?php echo clean_url($_SERVER['PHP_SELF']); ?>">
			<input type="text" name="s" value="Search this site" onclick="this.value='';" class="search_input" />
			<input type="submit" class="submit_button" value="Search" /></form>
		</div>
    </div>
	  <div style="clear:both"></div>
<div id="gback">
<div id="grid">