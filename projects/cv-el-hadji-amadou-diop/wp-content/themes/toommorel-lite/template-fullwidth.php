<?php
/*
Template Name: Fullwidth Page
*/
?>
<?php get_header(); ?>
<div class="content full_page">
  <div class="content-info">
    <?php if (function_exists('inkthemes_breadcrumbs')) inkthemes_breadcrumbs(); ?>
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <h2>
      <?php the_title(); ?>
    </h2>
  </div>
  <div class="dotted_line"></div>
  <?php the_content(); ?>
  <div class="dotted_line"></div>
  <?php endwhile;?>
  <div class="clear"></div>
  <div class="social_link">
    <h4>SHARE THIS ARTICLE</h4>
    <div class="social_logo"> <a title="Tweet this!" href="http://twitter.com/home/?status=<?php the_title(); ?> : <?php the_permalink(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/twitter-skyblue.png" alt="twitter" title="twitter"/></a> <a title="Share on Delicious" href="http://del.icio.us/post?url=<?php the_permalink(); ?>&title=<?php the_title(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/delicious-skyblue.png" alt="upon" title="upon"/></a> <a title="Share on Facebook" href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;amp;t=<?php the_title(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/facebook-skyblue.png" alt="facebook" title="facebook"/></a> <a title="Digg This!" href="http://digg.com/submit?phase=2&amp;amp;url=<?php the_permalink(); ?>&amp;amp;title=<?php the_title(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/digg-skyblue.png" alt="digg" title="digg"/></a> </div>
  </div>
  <div class="clear"></div>
  <div class="dotted_line"></div>
  <!--Start Comment Section-->
  <?php comments_template(); ?>
  <!--End comment Section-->
</div>
<!--End Content-->
<div class="clear"></div>
<div class="hr_big"></div>
<!--End Content Wrapper-->
</div>
<div class="clear"></div>
<!--End Main_wrapper-->
<?php get_footer(); ?>