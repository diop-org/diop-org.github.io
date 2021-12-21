<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>
<!--Start Page navi bg-->
<div class="page_navi_bg">
  <!--Start Container-->
  <div class="container_24">
    <div class="grid_24">
      <!--Start Page navi-->
      <div class="page_navi">
        <?php if (function_exists('inkthemes_breadcrumbs')) inkthemes_breadcrumbs(); ?>
      </div>
      <!--End Page navi-->
    </div>
  </div>
  <!--End Container-->
</div>
<!--End Page navi bg-->
<!--Start Container-->
<div class="container_24">
<!--Start  content wrapper-->
<div class="grid_24 content_wrapper">
  <div class="grid_18 alpha">
    <!--Start Content-->
    <div class="content">
      <?php if ( have_posts() ) : ?>
      <h1><?php printf( __( 'Search Results for: %s', 'dzonia' ), '' . get_search_query() . '' ); ?></h1>
      <!--Start Post-->
      <?php get_template_part( 'loop', 'search' ); ?>
      <!--End Post-->
      <?php else : ?>
      <article id="post-0" class="post no-results not-found">
        <header class="entry-header">
          <h1 class="entry-title">
            <?php _e( 'Nothing Found', 'dzonia' ); ?>
          </h1>
        </header>
        <!-- .entry-header -->
        <div class="entry-content">
          <p>
            <?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'dzonia' ); ?>
          </p>
          <?php get_search_form(); ?>
        </div>
        <!-- .entry-content -->
      </article>
      <?php endif; ?>
      <div class="clear"></div>
      <nav id="nav-single"> <span class="nav-previous">
        <?php next_posts_link( __( '&larr; Older posts', 'dzonia' ) ); ?>
        </span> <span class="nav-next">
        <?php previous_posts_link( __( 'Newer posts &rarr;', 'dzonia' ) ); ?>
        </span> </nav>
    </div>
    <!--End Content-->
  </div>
  <div class="grid_6 omega">
    <?php get_sidebar(); ?>
  </div>
</div>
<!--End Content Wrapper-->
<?php get_footer(); ?>
