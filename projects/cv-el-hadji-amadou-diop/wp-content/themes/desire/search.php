<?php
/*
@package WordPress
@subpackage Desire
*/
?>
<?php global $options; ?>
<?php get_header(); ?>
<?php if($options['sidebar_layout'] == 'one-left-sidebar' and !$isMobile): ?>
    <?php get_sidebar(); ?>
<?php endif; ?>
<div id="container">
    <?php if($options['show_breadcrumbs']): ?>
        <?php desire_breadcrumbs(); ?>
    <?php endif; ?>
    <?php if( have_posts()) : ?>
        <?php while(have_posts()) : the_post(); ?>
            <?php get_template_part('content', 'search'); ?>
        <?php endwhile; ?>
        <?php desire_get_pagination(); ?>
    <?php else: ?>
        <div id="post-0" <?php post_class(); ?>>
            <h1 class="entry-title"><?php _e('No entries found','desire'); ?></h1>
            <div class="entry-content">
                <p><?php _e('Looks like there are no articles related to your search. Try searching again !','desire'); ?></p>
                <p><?php get_search_form(); ?></p>
            </div>
        </div>
    <?php endif; ?>
</div>
<?php if($options['sidebar_layout'] == 'one-right-sidebar' and !$isMobile): ?>
    <?php get_sidebar(); ?>
<?php endif; ?>
<?php get_footer(); ?>