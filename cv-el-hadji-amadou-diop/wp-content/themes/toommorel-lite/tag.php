<?php
/**
 * The template for displaying Search Results pages.
 *
 */ ?>
<?php get_header(); ?>
<div class="grid_16 alpha">
  <div class="content">
    <div class="content-info">
      <?php if (function_exists('inkthemes_breadcrumbs')) inkthemes_breadcrumbs(); ?>
      <h2><?php printf('Tag Archives: %s'.'' . single_tag_title( '', false ) . '' ); ?></h2>
    </div>
    <div class="dotted_line"></div>
    <?php get_template_part( 'loop', 'tag' ); ?>
    <div class='wp-pagenavi'>
      <?php /* Display navigation to next/previous pages when applicable */ ?>
      <?php if (  $wp_query->max_num_pages > 1 ) : ?>
      <?php next_posts_link( '&larr; Older posts'); ?>
      <?php previous_posts_link('Newer posts &rarr;'); ?>
      <?php endif; ?>
    </div>
  </div>
</div>
<!--End Content-->
<?php get_sidebar(); ?>
<div class="clear"></div>
<div class="hr_big"></div>
<!--End Content Wrapper-->
</div>
<div class="clear"></div>
<!--End Main_wrapper-->
<?php get_footer(); ?>