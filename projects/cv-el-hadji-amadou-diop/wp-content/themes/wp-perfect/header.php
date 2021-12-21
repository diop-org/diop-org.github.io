<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
    <head profile="http://gmpg.org/xfn/11">
	<title><?php if (is_home()) { echo bloginfo('name');
            } else { echo wp_title('');} ?>
	</title>

        <meta http-equiv="content-type" content="<?php bloginfo('html_type') ?>; charset=<?php bloginfo('charset') ?>" />
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<link href='<?php $td_favicon = get_option('td_favicon'); echo stripslashes($td_favicon); ?>' rel='shortcut icon'/>
        <link href='<?php $td_favicon = get_option('td_favicon'); echo stripslashes($td_favicon); ?>' rel='icon' type='image/ico'/>

	<?php if(is_singular()) { wp_enqueue_script('comment-reply');}?>

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="wrapper">
	<div id="top-nav-container">
		<?php
		if(function_exists('wp_nav_menu')){
		wp_nav_menu( array( 'container_id' => 'top-nav', 'fallback_cb' => 'wp_perfect_default_pages', 'theme_location' => 'pmenu' ) );}
		else{
		wp_perfect_default_pages();
		}
		?>
		<!-- end of #top-nav -->
	</div><!-- #top-nav-container -->
<div style="clear: both;"></div>
<div id="header">
	<div id="header-top">
		<div class="logo">
			<?php $td_logo_check = get_option('td_logo_check'); if($td_logo_check): ?>
			<a href="<?php bloginfo('url'); ?>" ><img src="<?php $td_logo_path = get_option('td_logo_path'); echo stripslashes($td_logo_path); ?>" alt="Logo" /></a>
			<?php else : ?>
			<h1><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
			<div class="description"><?php bloginfo('description'); ?></div>
			<?php endif; ?>
		</div><!-- .logo -->

		<?php $td_check468 = get_option('td_check468'); if($td_check468): ?>
		<div class="headeradd">
			<a href="<?php $td_468adlink = get_option('td_468adlink'); echo stripslashes($td_468adlink); ?>" rel="nofollow"><img src="<?php $td_468adimage = get_option('td_468adimage'); echo stripslashes($td_468adimage); ?>" alt="Advertisement" width="468px" height="60px" /></a>
		</div><!-- .headeradd -->
<?php endif; ?>
	</div> <!-- #header-top -->

	<div id="main-nav-container">
		<?php
		if(function_exists('wp_nav_menu')){
		wp_nav_menu( array( 'container_id' => 'main-nav', 'fallback_cb' => 'wp_perfect_default_menu', 'theme_location' => 'cmenu' ) );}
		else{
		wp_perfect_default_menu();
		}
		?>
		<!-- end of #main-nav -->
		<?php $td_sec_menu_check = get_option('td_sec_menu_check'); if($td_sec_menu_check): ?>
		<div id="sec-nav">
			<ul>
				<li>
				<?php $td_sec_menu_code = get_option('td_sec_menu_code'); echo stripslashes($td_sec_menu_code); ?>
				</li>
			</ul>
		</div> <!-- end of #sec-nav -->
		<?php endif; ?>
	</div> <!-- end of #main-nav-container -->
</div> <!-- end of #header -->

        <div id="main">
