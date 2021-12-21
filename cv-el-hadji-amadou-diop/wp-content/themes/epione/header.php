<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
	
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />	
	<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
    <!--[if IE]>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/ie.css" />
    <![endif]--> 
    <?php wp_enqueue_script('jquery'); ?>
    <?php wp_enqueue_script('epione',get_bloginfo('template_directory').'/js/epione.js'); ?>
    <?php wp_enqueue_script('font',get_bloginfo('template_directory').'/js/font.js'); ?>
    <?php wp_enqueue_script('other',get_bloginfo('template_directory').'/js/other.js'); ?>
    <?php //allows the theme to get info from the theme options page
global $options;
foreach ($options as $value) {
        if(isset($value['id'])){if (get_option( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; }
    else { $$value['id'] = get_option( $value['id'] ); }}
    }
?>
	<?php switch ($ep_style) {
		 case "Ruby":?>
	<?php break; ?>	
	<?php case "Aqua":?>
		<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/skins/aqua.css" type="text/css" media="screen" />
	<?php break; ?>
	<?php case "Nature":?>
		<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/skins/nature.css" type="text/css" media="screen" />
	<?php break; ?>
	<?php case "Sunset":?>
		<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/skins/sunset.css" type="text/css" media="screen" />
	<?php break; ?>	
    <?php case "Beauty":?>
		<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/skins/beauty.css" type="text/css" media="screen" />
	<?php break; ?>	
    <?php }?>
    	<?php wp_get_archives('type=monthly&format=link'); ?>
	<?php //comments_popup_script(); // off by default ?>
    <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
	<?php wp_head(); ?>    
</head>

<body <?php body_class(); ?>>
<div class="wrapper">
<!--Header-->
<div id="header">
    <div class="head">
        <div id="logo">
        <a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
        <span class="desc"><?php bloginfo('description'); ?></span>
        </div>
    </div>
</div>

<!--Header END-->

<!--Get Social-->
<?php if(get_option('ep_hide_sc_button')) { ?>
<?php } else { ?>
<div id="get_social">
	<div class="get_social_wrap">
        <a title="Follow Us on Facebook" class="follow_fb_link" href="<?php echo $ep_fb; ?>"></a>
        <a title="Follow Us on Twitter" class="follow_twitter_link" href="<?php echo $ep_twitter; ?>"></a>
        <a title="Subscribe to Our RSS Feed" class="follow_rss_link" href="<?php echo $ep_rss; ?>"></a>
     </div>
</div>
<?php } ?>
<!--Get Social END-->

<!--MENU-->
<div id="menu">
<div class="topmenu"><?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?></div>
</div>
<!--MENU END-->