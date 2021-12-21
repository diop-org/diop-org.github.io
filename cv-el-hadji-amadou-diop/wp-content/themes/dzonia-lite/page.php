<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the wordpress construct of pages
 * and that other 'pages' on your wordpress site will use a
 * different template.
 *
 */
get_header();
?>
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
      <?php if (have_posts()): the_post(); ?>
        <h1 class="post_title">
          <?php the_title(); ?>
        </h1>
      <?php the_content(); ?>
      <div class="clear"></div>
		<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . 'Pages:' . '</span>', 'after' => '</div>' ) ); ?>
        <?php edit_post_link('Edit','', '' ); ?>
      <?php endif; ?>
	  <hr />
      <div class="clear"></div>
      <!--Start Comment Section-->
      <?php comments_template(); ?>
      <!--End comment Section-->
    </div>
    <!--End Content-->
  </div>
  <div class="grid_6 omega">
    <?php get_sidebar(); ?>
  </div>
</div>
<!--End Content Wrapper-->
<?php get_footer(); ?>
