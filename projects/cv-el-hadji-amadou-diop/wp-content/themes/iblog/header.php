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
	
<!-- Stylesheets -->

	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />	
	<?php get_template_part ('library/dynamic_css'); ?>

	<?php 
	wp_enqueue_style('ie7-style', THEME_CSS  . '/ie7.css');
	global $wp_styles;
	$wp_styles->add_data( 'ie7-style', 'conditional', 'lte IE 7' );
	?>


<!-- Wordpress Stuff -->
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php if ( is_single() || is_page()) wp_enqueue_script( 'comment-reply' ); ?> <!-- This makes the comment box appear where the ‘reply to this comment’ link is -->
	<?php  wp_enqueue_script("jquery"); ?>

<!-- Modules w/ Javascript -->	
	<?php if((is_page_template('page-carousel.php') || is_page_template('page-carousel-full.php')) && VPRO) get_template_part ('core/inits/init_carousel');?>
	<?php if((is_page_template('page-feature.php') || is_page_template('page-feature-stdpage.php') || is_page_template('page-feature-full.php') || (is_home() && pagelines('featureblog'))) && VPRO) get_template_part ('core/inits/init_feature');?>
	<?php if(pagelines('enable_drop_down') && VPRO) get_template_part ('core/inits/init_dropdown');?>
	<?php if(VPRO) get_template_part ('core/inits/init_sidebar_ui');?>
	<?php get_template_part ('library/_ie_fixes'); ?>
	

<!-- Font Replacement -->
  	<?php if(VPRO) get_template_part('library/_font_replacement');?>
	<?php if (pagelines('headerscripts')) echo pagelines('headerscripts');?>
	
	<?php wp_head(); // Load last so it can be hooked earlier ?>
</head>
<body <?php body_class(); ?>>
<?php if (pagelines('asynch_analytics')) echo pagelines('asynch_analytics');?>

<div id="page" class="fix">
  <div id="wrapper" class="fix" >
    <div id="header" class="fix">
		<?php if(pagelines('custom_header')):?>
			<a href="<?php echo get_option('home'); ?>">
			<img class="headerimage" src="<?php echo pagelines('custom_header');?>" alt="<?php echo SITENAME; ?>"/>
			</a>
		<?php else:?>
	      		<h1 id="blogtitle"><a href="<?php echo get_option('home'); ?>"><span class="sheen"></span><?php bloginfo('name'); ?></a></h1>
	      		<div id="blogdescription"><?php bloginfo('description'); ?></div>
		<?php endif; ?>
		<?php get_template_part ('library/_iconlinks'); ?>
	
	</div><!-- /header -->
	<?php get_template_part ( 'library/_nav'); ?>


	<div id="container" class="fix <?php if(m_pagelines('sidebar_layout', $pagelines_ID) == 'left') echo 'sidebar_left';?>">
		<?php get_template_part('library/_subnav');?>