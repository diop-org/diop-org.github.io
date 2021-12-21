<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
<script type="text/javascript">
		var root = '<?php bloginfo('template_directory'); ?>/';
	</script>

	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<?php if(get_option('webfolio_style')!=''){?>
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/<?php echo get_option('webfolio_style'); ?>" media="screen" />
	<?php }else{?>
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/green.css" media="screen" />
	<?php }?>
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/jquery.lightbox-0.5.css" media="screen" />
	 <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/superfish.css" media="screen" />
	 <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/slidingboxes.css" media="screen" />	 
	 <!--[if gte IE 7]>
    <link rel="stylesheet" media="screen" type="text/css" href="<?php bloginfo('template_directory'); ?>/ie7.css" />
    <![endif]-->
	<script language="JavaScript" type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery-1.3.2.min.js"></script>
	<script language="JavaScript" type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.form.js"></script>
	<script language="JavaScript" type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.lightbox-0.5.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/superfish.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/stepcarousel.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/custom.js"></script>
	<!-- Cufon replaces normal fonts to proprietary fonts on the fly using
			Javascript. http://wiki.github.com/sorccu/cufon/about -->
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/cufon-yui.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/Fertigo_Pro_400.font.js"></script>
	<?php if(get_option('webfolio_cufon') == 'yes'){?>
	<script type="text/javascript">
 		 Cufon.replace('h1')('h2')('#logo span');
	</script>
	<?php }?>

	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 1.0" href="<?php bloginfo('atom_url'); ?>" />

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php wp_get_archives('type=monthly&format=link'); ?>
	<?php //comments_popup_script(); // off by default ?>
	<?php wp_head(); ?>
	
</head>
<body>
<!-- begin wrapper -->
<div id="wrapper">
	<!-- begin header -->
	<div id="header">
	<div id="site5top"><a href="http://gk.site5.com/t/197">Site5 | Experts In Reseller Hosting</a></div>
	<!-- logo -->
		<div id="logo"><a href="<?php bloginfo('url'); ?>/"><img src="<?php echo get_option('webfolio_logo_img'); ?>" alt="<?php echo get_option('webfolio_logo_alt'); ?>" /></a><span><?php echo get_settings('blogdescription');?></span></div>
		<a href="<?php bloginfo('rss2_url'); ?>" title="RSS" class="rssTag">RSS Feeds</a>
	<!-- end logo -->
	<!-- tag line -->
		<div id="topTagline"></div>
	<!-- end tag line-->
	<!-- begin top search -->
		<div id="searchTop">
			<form id="searchform" action="" method="get">
				<input id="s" type="text" name="s" value=""/>
				<input id="searchsubmit" type="submit" value=""/>
			</form>
		</div>
	<!-- end top search -->
	<!-- begin top menu -->
	<?php if ( function_exists( 'wp_nav_menu' ) ){
				wp_nav_menu( array( 'theme_location' => 'main-menu', 'container_id' => 'topMenu', 'menu_class'=>'sf-menu', 'fallback_cb'=>'mainmenu') );
				}else{
					mainmenu();
				}?>
	<!-- end top menu -->
	</div>
	<!-- end header -->
	
	<!-- begin content -->
	<div id="content" class="clearfix">