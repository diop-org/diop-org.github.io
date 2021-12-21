<?php
/**
 * The template used to display Tag Archive pages
 *
 */
?>
<?php get_header(); ?>
<!--Start Contetn wrapper-->
<div class="grid_24 content_wrapper">
     <div class="grid_15 alpha">
          <!--Start side content-->
          <div class="side_content">
               <h1><?php printf( __( 'Tag Archives: %s', 'themia' ), '' . single_cat_title( '', false ) . '' );?></h1>
               <?php get_template_part( 'loop', 'index' ); ?>
               <?php inkthemes_pagination(); ?>
          </div>
          <!--End side content-->
     </div>
     <?php get_sidebar(); ?>
</div>
<!--End Content wrapper-->
<div class="clear"></div>
</div>
<?php get_footer(); ?>
