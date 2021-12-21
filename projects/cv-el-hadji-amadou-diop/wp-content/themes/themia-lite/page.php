<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the wordpress construct of pages
 * and that other 'pages' on your wordpress site will use a
 * different template.
 *
 * @package WordPress
 */
?>
<?php get_header(); ?>
<!--Start Contetn wrapper-->
<div class="grid_24 content_wrapper">
     <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
     <div class="grid_15 alpha">
          <!--Start side content-->
          <div class="side_content">
               <!--Start Post-->
               <div class="post">
                   <h1><?php the_title(); ?></h1>
                    <?php the_content(); ?>
                   <?php wp_link_pages( array( 'before' => '<div class="clear"></div><div class="page-link"><span>' . __( 'Pages:', 'themia' ) . '</span>', 'after' => '</div>' ) ); ?>
               </div>
               <div class="shadow"> </div>
               <!--End Post-->
               <!--Start Comment box-->
               <?php comments_template(); ?>
               <!--End comment Section-->
          </div>
          <!--End side content-->
          <?php endwhile;?>
     </div>
     <?php get_sidebar(); ?>
</div>
<!--End Content wrapper-->
<div class="clear"></div>
</div>
<?php get_footer(); ?>
