<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
  <head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<!-- Meta Images -->
	<?php if(pagelines('favicon')):?><link rel="shortcut icon" href="<?php echo pagelines('favicon');?>" type="image/x-icon" /><?php endif;?>
	<?php if(pagelines('touchicon')):?><link rel="apple-touch-icon" href="<?php echo pagelines('touchicon');?>" /><?php endif;?>

<!-- Title and External Script Integration -->
	<?php 
		global $bbpress_forum;
		if($bbpress_forum ):?>
			<title><?php bb_title() ?></title>
			<?php bb_feed_head(); ?>
			<?php bb_head(); ?>
			<link rel="stylesheet" href="<?php bb_stylesheet_uri(); ?>" type="text/css" />
	<?php else:?>
		<title><?php if(is_front_page()) { echo SITENAME; } else { wp_title(''); } ?></title>
	<?php endif;?>
	
	
<!-- Wordpress Stuff -->
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php if ( is_single() || is_page()) wp_enqueue_script( 'comment-reply' ); ?> <!-- This makes the comment box appear where the ‘reply to this comment’ link is -->
	<?php  wp_enqueue_script("jquery"); ?>
	<?php wp_head(); ?>

<!-- Stylesheets -->
	<link rel="stylesheet" href="<?php echo CORE_CSS.'/reset.css';?>" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo CORE_CSS.'/wp_core.css';?>" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo THEME_ROOT.'/style.css';?>" type="text/css" media="screen" />

<?php if(VPRO):?><link rel="stylesheet" href="<?php echo PRO_CSS.'/pro.css';?>" type="text/css" media="screen" />
<?php endif; ?>

<?php if(VPRO  && pagelines('colorscheme', $post->ID) == 'black'):?><link rel="stylesheet" href="<?php echo PRO_CSS.'/color_black.css';?>" type="text/css" media="screen" /><?php endif;?>
<?php if(VPRO  && pagelines('colorscheme', $post->ID) == 'green'):?><link rel="stylesheet" href="<?php echo PRO_CSS.'/color_green.css';?>" type="text/css" media="screen" /><?php endif;?>
<?php if(VPRO  && pagelines('colorscheme', $post->ID) == 'orange'):?><link rel="stylesheet" href="<?php echo PRO_CSS.'/color_orange.css';?>" type="text/css" media="screen" /><?php endif;?>
<?php if(VPRO  && pagelines('colorscheme', $post->ID) == 'red'):?><link rel="stylesheet" href="<?php echo 
PRO_CSS.'/color_red.css';?>" type="text/css" media="screen" /><?php endif;?>

<!-- Modules w/ Javascript -->	
<?php if((is_page_template('page-carousel.php') || is_page_template('page-carousel-full.php')) && VPRO) include (CORE_INITS.'/init_carousel.php');?>

<?php if((is_page_template('page-feature.php') || is_page_template('page-feature-page.php') || (is_home() && pagelines('featureblog'))) && VPRO) include (CORE_INITS.'/init_feature.php');?>

<?php if(pagelines('enable_drop_down') && VPRO) include (CORE_INITS.'/init_dropdown.php');?>

<?php if(DEMO) include(THEME_LIB.'/init_picker.php');?>	


<?php include (THEME_LIB.'/_ie_fixes.php'); ?>
<?php include (THEME_LIB.'/_customcss.php'); ?>

<!-- Font Replacement -->
  	<?php if(VPRO) include(THEME_LIB.'/_font_replacement.php');?>
	<?php if (pagelines('headerscripts')) echo pagelines('headerscripts');?>
</head>
<body <?php body_class(); ?>>
	<?php if (pagelines('asynch_analytics')) echo pagelines('asynch_analytics');?>
	<div id="site">
		<div id="wrapper">
		<?php if(DEMO) include(LIB.'/_picker.php');?>	
	
					<div id="header" class="fix">
						<div class="content fix">
							<div class="headline">
								<?php if(pagelines('custom_header')):?>
									<a class="home" href="<?php echo get_settings('home'); ?>/" title="<?php bloginfo('name');?>"><img src="<?php echo pagelines('custom_header');?>" alt="<?php bloginfo('name');?>" /></a>
								<?php else:?>
								<h1 class="site-title"><a class="home" href="<?php echo get_settings('home'); ?>/" title="<?php _e('Home',TDOMAIN);?>"><?php bloginfo('name');?></a></h1>
								<h6 class="site-description"><?php bloginfo('description');?></h6>
								<?php endif;?>
							</div>
							<div class="icons">
								
								<?php if(pagelines('rsslink')):?>
								<a target="_blank" href="<?php echo RSSURL;?>" class="rsslink"></a>
								<?php endif;?>
								
								<?php if(VPRO):?>
									<?php if(pagelines('twitterlink')):?>
									<a target="_blank" href="<?php echo pagelines('twitterlink');?>" class="twitterlink"></a>
									<?php endif;?>
									<?php if(pagelines('facebooklink')):?>
									<a target="_blank" href="<?php echo pagelines('facebooklink');?>" class="facebooklink"></a>
									<?php endif;?>
									<?php if(pagelines('linkedinlink')):?>
									<a target="_blank" href="<?php echo pagelines('linkedinlink');?>" class="linkedinlink"></a>
									<?php endif;?>
									<?php if(pagelines('youtubelink')):?>
									<a target="_blank" href="<?php echo pagelines('youtubelink');?>" class="youtubelink"></a>
									<?php endif;?>
								<?php endif;?>
								
							</div>
						</div>
					</div>
					<div class="container fix <?php if(m_pagelines('sidebar_layout', $post->ID) == 'left') echo 'sidebar_left';?>">
						<div class="effect containershadow">
							<div class="effect containershadow_rpt">
								<div id="sitenav" class="content fix">
									<div id="nav" class="fix">
										<?php if(pagelines('enable_drop_down')):?>
											<ul class="dropdown clearfix">
										<?php else:?>	 
											<ul class="clearfix">
										<?php endif;?>	
								
											<li class="page_item "><a class="home" href="<?php echo get_settings('home'); ?>/" title="<?php _e('Home',TDOMAIN);?>"><?php _e('Home',TDOMAIN);?></a></li>
											<?php 
												$frontpage_id = get_option('page_on_front');
												if($bbpress_forum && pagelinesforum('exclude_pages')){ $forum_exclude= ','.pagelinesforum('exclude_pages');}
												else{ $forum_exclude = '';}
												wp_list_pages('exclude='.$frontpage_id.$forum_exclude.'&depth=3&title_li=');?>
										</ul>
									</div><!-- /nav -->
									<div class="clear"></div>
								</div>
								
