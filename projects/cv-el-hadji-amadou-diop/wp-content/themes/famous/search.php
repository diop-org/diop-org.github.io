<?php get_header(); ?>

<div id="header" class="wrap">
 <h1><?php _e( 'Blog', 'mframe' ); ?> // <span><?php _e( 'Search Results', 'mframe' ); ?></span></h1>
</div>

<div id="content" class="wrap">
 <div id="main"><?php get_template_part( 'loop' ); ?></div>
 <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>