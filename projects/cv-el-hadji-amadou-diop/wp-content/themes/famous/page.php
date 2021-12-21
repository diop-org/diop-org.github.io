<?php get_header(); ?>

<div id="header" class="wrap">
 <h1><?php bloginfo( 'name' ); ?> // <span><?php the_title(); ?></span><?php edit_post_link( __( 'Edit', 'mframe' ), ' // ', '' ); ?></h1>
</div>

<div id="content" class="wrap">
 <div id="main"><?php if ( have_posts()) : while ( have_posts()) : the_post(); ?>
  <div id="post-<?php the_ID(); ?>" class="post page">
   <div class="entry"><?php the_content(); wp_link_pages('before=<p class="clear">&after=</p>'); ?></div>
  </div><?php endwhile; if ( mframe_option( 'show-comments' )) comments_template(); endif; ?>
 </div>
 <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>