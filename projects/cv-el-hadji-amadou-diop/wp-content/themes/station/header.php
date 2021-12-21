<?php 
	do_action('pagelines_before_html');
	global $pagelines_ID;
?>
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
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php if ( is_single() || is_page()) wp_enqueue_script( 'comment-reply' ); ?> <!-- This makes the comment box appear where the ‘reply to this comment’ link is -->
	<?php  wp_enqueue_script("jquery"); ?>

<!-- Stylesheets -->
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />	
	<?php get_template_part ('library/dynamic_css'); ?>

	<!-- Modules w/ Javascript -->	
	<?php if((is_page_template('page-carousel.php') || is_page_template('page-carousel-full.php')) && VPRO) get_template_part ('core/inits/init_carousel');?>

	<?php if((is_page_template('page-feature.php') || is_page_template('page-feature-page.php') || (is_home() && pagelines('featureblog'))) && VPRO) get_template_part ('core/inits/init_feature');?>

	<?php if(pagelines('enable_drop_down') && VPRO) get_template_part ('core/inits/init_dropdown');?>

<?php get_template_part ('library/_ie_fixes'); ?>

<!-- Font Replacement -->
  	<?php if(VPRO) get_template_part('library/_font_replacement');?>
	<?php if (pagelines('headerscripts')) echo pagelines('headerscripts');?>

	<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>
	<?php if (pagelines('asynch_analytics')) echo pagelines('asynch_analytics');?>
	<div id="site" class="<?php e_pagelines('colorscheme', 'greybg', $post->ID);?>">
		<div id="wrapper">
		
				<div id="hcontain" class="content fix">
					<div id="header" class="fix">
						<div class="headline">
							<?php if(pagelines('custom_header')):?>
								<a class="home" href="<?php echo get_option('home'); ?>/" title="<?php bloginfo('name');?>"><img src="<?php echo pagelines('custom_header');?>" alt="<?php bloginfo('name');?>" /></a>
							<?php else:?>
							<h1 class="site-title"><a class="home" href="<?php echo get_option('home'); ?>/" title="<?php _e('Home',TDOMAIN);?>"><?php bloginfo('name');?></a></h1>
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
								<?php if(pagelines('myspacelink')):?>
								<a target="_blank" href="<?php echo pagelines('myspacelink');?>" class="myspace"></a>
								<?php endif;?>
							<?php endif;?>
							
						</div>
					</div>
				</div>
			
				<div class="container fix <?php if(pagelines('sidebar_layout', $post->ID) == 'left') echo 'sidebar_left';?>">
					<div class="content">
						<div class="navcontainer">
							<div class="hl"></div>
							<div id="nav" class=" fix">
								<?php function nav_fallback(){?>
									<ul class="<?php if(pagelines('enable_drop_down')):?><?php echo 'dropdown';?><?php endif;?>">
										<?php wp_list_pages('sort_column=menu_order&depth=3&title_li='); ?>
									</ul>
								<?php	}
								
							 	if(function_exists( 'wp_nav_menu')):?>
									<?php wp_nav_menu( array('theme_location'=>'primary', 'menu_class'  => 'mnav dropdown fix', 'container' => null, 'container_class' => '', 'depth' => 3, 'fallback_cb'=>'nav_fallback' ) ); ?>
								<?php else:?>
									<?php nav_fallback();?>
								<?php endif;?>
						
								<?php if(!pagelines('hidesearch')):?>
									<?php get_template_part ( 'library/_searchform'); ?>
								<?php else:?>
									<style type="text/css">#nav ul, #nav .mnav{width:940px;}</style>
								<?php endif;?>
						
						
							</div><!-- /nav -->
						</div>
					</div>
					<div class="clear"></div>