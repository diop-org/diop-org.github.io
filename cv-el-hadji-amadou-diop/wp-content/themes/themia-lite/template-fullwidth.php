<?php
/*
Template Name: Fullwidth Page
*/
?>
<?php get_header(); ?>
<!--Start Contetn wrapper-->
<div class="grid_24 content_wrapper">
     <!--Start Fullwidth-->
     <div class="fullwidth">
          <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
          <h1>
               <?php the_title(); ?>
          </h1>
          <?php the_content(); ?>
          <?php comments_template(); ?>
          <!--End comment Section-->
     </div>
     <div class="bigshadow"></div>
     <!--End Fullwidth-->
     <?php endwhile;?>
</div>
<!--End Content wrapper-->
<div class="clear"></div>
</div>
<?php get_footer(); ?>
