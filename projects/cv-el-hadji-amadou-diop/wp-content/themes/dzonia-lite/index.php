<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query. 
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 */
?>
<?php get_header(); ?>
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
      <?php get_template_part( 'loop', 'index' ); ?>
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
