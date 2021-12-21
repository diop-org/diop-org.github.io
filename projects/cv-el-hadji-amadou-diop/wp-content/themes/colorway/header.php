<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Colorway
 * @since Colorway 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>" />
        <title>
            <?php
            /*
             * Print the <title> tag based on what is being viewed.
             */
            global $page, $paged;
            wp_title('|', true, 'right');
            // Add the blog name.
            bloginfo('name');
            // Add the blog description for the home/front page.
            $site_description = get_bloginfo('description', 'display');
            if ($site_description && ( is_home() || is_front_page() ))
                echo " | $site_description";
            // Add a page number if necessary:
            if ($paged >= 2 || $page >= 2)
                echo ' | ' . sprintf('Page %s', max($paged, $page));
            ?>
        </title>
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        <?php
        /* We add some JavaScript to pages with the comment form
         * to support sites with threaded comments (when in use).
         */
        wp_head();
        ?>
        <!--[if gte IE 9]>
                <script type="text/javascript">
                        Cufon.set('engine', 'canvas');
                </script>
        <![endif]-->
    </head>
    <body <?php body_class(); ?> background="<?php
        if (inkthemes_get_option('inkthemes_bodybg') != '') {
            echo inkthemes_get_option('inkthemes_bodybg');
        } else {
            ?>
              <?php echo get_template_directory_uri(); ?>/images/body-bg.png
            <?php } ?>">
        <!--Start Container Div-->
        <div class="container_24 container">
            <!--Start Header Grid-->
            <div class="grid_24 header">
                <div class="logo"> <a href="<?php echo home_url(); ?>"><img src="<?php if (inkthemes_get_option('colorway_logo') != '') { ?><?php echo inkthemes_get_option('colorway_logo'); ?><?php } else { ?><?php echo get_template_directory_uri(); ?>/images/logo.png<?php } ?>" alt="<?php bloginfo('name'); ?>" /></a> </div>
                <!--Start MenuBar-->
                <div class="menu-bar">
                    <div id="MainNav">
                        <?php inkthemes_nav(); ?>
                    </div>
                </div>
                <!--End MenuBar-->
            </div>
            <div class="clear"></div>
            <!--End Header Grid-->
