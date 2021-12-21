<?php
/*
@package WordPress
@subpackage Desire
*/
?>
<?php global $options; ?>
<?php get_header(); ?>
<div id="container" style="width: 100%; margin-left: 0; margin-right: 0;">
    <?php if($options['show_breadcrumbs']): ?>
        <?php desire_breadcrumbs(); ?>
    <?php endif; ?>
    <div id="post-0" <?php post_class(); ?>>
        <h1 class="entry-title"><?php _e('Error 404 Page not found','desire'); ?></h1>
        <div class="entry-content">
            <p><?php _e('Oops! Page you are looking for does not exist. Use the navigation menu on top or try to use the search','desire'); ?></p>
            <p><?php get_search_form(); ?></p>
        </div>
    </div>
</div>
<?php get_footer(); ?>