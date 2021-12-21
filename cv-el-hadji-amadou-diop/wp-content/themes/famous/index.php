<?php get_header(); ?>

<div id="header" class="wrap">
 <h1><?php _e( 'Blog', 'mframe' ); ?> // <span><?php _e( 'Latest news and discussions', 'mframe' ); ?></span></h1>
</div>

<div id="content" class="wrap">
 <?php query_posts( 'cat=-' . mframe_option( 'index-cats' ) . '&offset=' . mframe_option( 'index-offset' ) . '&paged=' . get_query_var( 'paged' )); ?>
 <div id="main"><?php get_template_part( 'loop' ); wp_reset_query(); ?></div>
 <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>