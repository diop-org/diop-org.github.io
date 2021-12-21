<?php
/**
 * The template for displaying Category pages.
 *
 */ ?>
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
      <h2><?php printf( __( 'Category Archives: %s','dzonia' ), '' . single_cat_title( '', false ) . '' ); ?></h2>
      <?php
			$category_description = category_description();
			if ( ! empty( $category_description ) )
				echo '' . $category_description . '';
		/* Run the loop for the category page to output the posts.
		 * If you want to overload this in a child theme then include a file
		 * called loop-category.php and that will be used instead.
		 */?>
      <?php get_template_part( 'loop', 'category' );
		?>
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
