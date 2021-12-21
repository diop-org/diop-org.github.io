<?php
/*
@package WordPress
@subpackage Desire
*/
?>
<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo('charset'); ?>" />
<title>
<?php
global $page, $paged, $options, $isMobile;
wp_title('|', true, 'right');
bloginfo('name');
$site_description = get_bloginfo('description', 'display');
if ($site_description && (is_home() || is_front_page()))
    echo " | $site_description";
if ($paged >= 2 || $page >= 2)
    echo ' | ' . sprintf(__('Page %s', 'desire'), max($paged, $page));
?>
</title>
<?php if($isMobile): ?>
<meta name="viewport" content="width=device-width, initial-scale=0.8" />
<?php else: ?>
<meta name="viewport" content="width=device-width" />
<?php endif; ?>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php
if (is_singular() && get_option('thread_comments'))
    wp_enqueue_script('comment-reply');
wp_enqueue_script('jquery');
wp_head();
?>
<style type="text/css">
    html { margin-top: 0 !important; }
    * html body { margin-top: 0 !important; }
</style>
</head>
<body <?php body_class(); ?>>
<div id="wrapper"> <!-- Start of wrapper -->
    <div id="header">
        <table class="tablayout" style="height: <?php echo DESIRE_HEADER_HEIGHT; ?>px;">
            <tr>
                <?php if($options['logo_image'] != ''): ?>
                <td class="tdleft" style="padding-left: 25px; width: <?php echo (DESIRE_HEADER_HEIGHT-30); ?>px;">
                    <img class="logo-image" src="<?php echo $options['logo_image']; ?>"/>
                </td>
                <?php endif; ?>
                <td class="tdleft" style="padding-left: 25px;">
                    <h1 class="site-title"><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
                    <?php if(trim(get_bloginfo('description')) != ''): ?><p class="site-desc"><?php bloginfo('description'); ?></p><?php endif; ?>
                </td>
            </tr>
        </table>
    </div>

    <?php wp_nav_menu(array('theme_location' => 'primary', 'container_class' => 'main-menu')); ?>
    <?php if(!$isMobile): ?>
        <?php desire_slider_posts(); ?>
    <?php endif; ?>