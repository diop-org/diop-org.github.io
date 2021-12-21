<?php
/*
Copyright (c) 2010 MobilizeToday.com, Mobile Web Solutions Inc.

Support: http://www.mobilizetoday.com/wordpress-themes/mobius/

This file is part of the Mobius WordPress Theme.
*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
<link rel="apple-touch-icon" href="<?php bloginfo('stylesheet_directory'); ?>/icon-pda.png"/>
<link rel="SHORTCUT ICON" href="<?php bloginfo('stylesheet_directory'); ?>/favicon.ico"/>
<link rel="icon" type="image/vnd.microsoft.icon" href="<?php bloginfo('stylesheet_directory'); ?>/favicon.ico" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php
	global $options;
	foreach ($options as $value) {
		if (get_option( @$value['id'] ) === FALSE) { @$$value['id'] = @$value['std']; } else { @$$value['id'] = get_option( @$value['id'] ); }
	}
        
    if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
		wp_enqueue_script('jquery');
	
	$screens = array('sky-blue' => 1,'rain-forest' => 2,'amethyst' => 3); 
	if (!isset($mobius_current_css) || ($mobius_current_css == '') || !isset($screens[$mobius_current_css])) 
	{
		$mobius_current_css = 'sky-blue';					
	}		
?>
	<script type="text/javascript">
	// <![CDATA[
	if (screen.width > 640)
	{
		//desktop version
		document.write('<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen,tv,projection" />');
		document.write('<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/desktop-<?php echo $mobius_current_css; ?>.css" type="text/css" title="skin" media="screen,tv,projection" />');
		document.write('<!--[if lte IE 7]><link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/ie.css" type="text/css" media="screen" /><![endif]-->');

	}
	else
	{
		//mobile version
		document.write('<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />');
	 	document.write('<link rel="stylesheet"  href="<?php bloginfo( 'url' ); ?>/?mobile=<?php echo $mobius_current_css; ?>" type="text/css" media="all" />');		
		
		<?php if ($mobius_show_sidebar != true) { ?>
		document.write('<style type="text/css"> div.sl { display: none !important; }</style>');		
		<?php } ?>		

	 	var ua = navigator.userAgent.toLowerCase();
	 	if ((ua.indexOf('iemobile') != -1) || (ua.indexOf('msie') != -1))
	 		document.write('<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/ie-mobile.css" type="text/css" media="all" />');
	 	else if (ua.indexOf('blackberry') != -1)
	 		document.write('<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/blackberry.css" type="text/css" media="all" />');
	 	else if ((ua.indexOf('symbian') != -1) || (ua.indexOf('midp') != -1))
	 		document.write('<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/symbian.css" type="text/css" media="all" />');
	}
	// ]]>
	</script>

<?php wp_head(); ?>
        <script type="text/javascript">
	// <![CDATA[
	if (screen.width > 640)
	{
		//desktop version
		document.write('<'+'script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.checkbox.min.js"><'+'/script>');
		document.write('<'+'script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.stylish-select.min.js"><'+'/script>');
		document.write('<'+'script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/desktop.js"><'+'/script>');
	}
	else
	{
		//mobile version
	 	document.write('<'+'script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.galleryScroll.1.5.2.js"><'+'/script>');
	 	document.write('<'+'script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/mobile.js"><'+'/script>');
	}
	// ]]>
	</script>
</head>
<body <?php body_class(); ?>>

<div id="wrapper">

	<div id="middle">

		<div id="container">
			<div id="content">

				<div id="header">
					<h1><a href="<?php bloginfo('home'); ?>"><?php bloginfo('name'); ?></a></h1>
					<strong><?php bloginfo('description'); ?></strong>
				</div>

				<div id="icons">
					<div class="transparency"></div>
					<div class="items">
						<a href="#skip-to-nav" class="skip-navigation">Skip To Navigation</a>
						<?php if ($mobius_show_rss == true) { ?><a href="<?php echo bloginfo('rss_url');?>" class="rss"></a><?php } ?>
						<?php if ($mobius_show_twitter == true) { ?><a href="<?php echo $mobius_twitter_url;?>" class="twitter"></a><?php } ?>
						<?php if ($mobius_show_facebook == true) { ?><a href="<?php echo $mobius_facebook_url;?>" class="facebook"></a><?php } ?>


					</div>

				</div>

				<div id="menu">
					<div class="transparency"></div>
						<div id="search-box">

							<form action="<?php echo get_option('home');?>/">
								<fieldset>
									<div><input type="text" name="s" value="Search..." /></div>
								</fieldset>

							</form>

						</div>
					<div class="items">
					<ul id="nav-main">
						<?php wp_list_pages('title_li='); ?>
					</ul>
						<a href="javascript:void(null)" class="show-search"></a>
					</div>
                                </div>
				<div class="clear"></div>
				<div>