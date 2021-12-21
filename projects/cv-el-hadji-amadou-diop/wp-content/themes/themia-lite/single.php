<?php
/**
 * The single template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query. 
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 */
?>
<?php get_header(); ?>
<!--Start Content wrapper-->
<div class="grid_24 content_wrapper">
     <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
     <div class="grid_15 alpha">
          <!--Start side content-->
          <div class="side_content">
               <!--Start Post-->
               <div class="post">
                    <h1 class="post_title">
                         <?php the_title(); ?>
                    </h1>
                    <ul class="post_info">
                         <li class="postedon"><?php _e( 'Posted on', 'themia' ); ?>
                              <?php the_date(); ?>
                         </li>
                         <li class="postedin"><?php _e( 'in', 'themia' ); ?>
                              <?php the_category(', '); ?>
                         </li>
                         <li class="postedby"><?php _e( 'by', 'themia' ); ?>
                              <?php the_author_posts_link(); ?>
                         </li>
                    </ul>
                    <hr/>
                    <?php the_content(); ?>		
                    <p>
                         <?php the_tags(); ?>
                    </p>
                    <div class="clear"></div>
                     <nav id="nav-single"> <span class="nav-previous">
        <?php previous_post_link( '%link','<span class="meta-nav">&larr;</span> Previous Post '); ?>
        </span> <span class="nav-next">
        <?php next_post_link( '%link','Next Post <span class="meta-nav">&rarr;</span>'); ?>
        </span> </nav>
                    <div class="clear"></div>
                    <div class="dotted_line"></div>
                    <div class="social_link">
                         <h4><?php _e( 'SHARE THIS ARTICLE', 'themia' ); ?></h4>
                         <div class="social_logo"> <a title="Tweet this!" href="http://twitter.com/home/?status=<?php the_title(); ?> : <?php the_permalink(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/twitter-skyblue.png" alt="twitter" title="twitter"/></a> <a title="Share on Delicious" href="http://del.icio.us/post?url=<?php the_permalink(); ?>&title=<?php the_title(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/delicious-skyblue.png" alt="upon" title="upon"/></a> <a title="Share on Facebook" href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;amp;t=<?php the_title(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/facebook-skyblue.png" alt="facebook" title="facebook"/></a> <a title="Digg This!" href="http://digg.com/submit?phase=2&amp;amp;url=<?php the_permalink(); ?>&amp;amp;title=<?php the_title(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/digg-skyblue.png" alt="digg" title="digg"/></a> </div>
                    </div>
                    <div class="dotted_line"></div>
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
