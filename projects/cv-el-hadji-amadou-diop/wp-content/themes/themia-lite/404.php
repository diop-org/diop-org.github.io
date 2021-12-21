<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 */
?>
<?php get_header(); ?>
<!--Start Contetn wrapper-->
<div class="grid_24 content_wrapper">
     <div class="grid_15 alpha">
          <!--Start side content-->
          <div class="side_content">
               <!--Start Post-->
               <div class="post">
                    <h2><?php _e('404: The Page you are looking for is not found.', 'themia' ); ?></h2>
                    <h4><?php _e('You have landed on the Wrong Page.', 'themia' ); ?></h4>
                    <h4><a href="<?php echo home_url(); ?>"><?php _e('Click Here to Visit our Home Page', 'themia' ); ?></a></h4>
                    <h6> <?php _e('Make a Search if you want to find something specific', 'themia' ); ?></h6>
                    <?php get_search_form(); ?>
               </div>
               <div class="shadow"> </div>
               <!--End Post-->
          </div>
          <!--End side content-->
     </div>
     <?php get_sidebar(); ?>
</div>
<!--End Content wrapper-->
<div class="clear"></div>
</div>
<?php get_footer(); ?>
