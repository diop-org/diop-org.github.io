<?php
/**
 * The main single page template file.
 *
 *
 */
?>
<?php get_header(); ?>
<div class="grid_16 alpha">
  <div class="content">
    <div class="content-info">
      <?php if (function_exists('inkthemes_breadcrumbs')) inkthemes_breadcrumbs(); ?>
      <h2>Our Blog</h2>
    </div>
    <div class="dotted_line"></div>
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <!--Start Post-->
    <div class="post single">
      <h1 class="post_title"><span class="day">
        <?php the_date('d'); ?>
        <span class="month"><?php echo get_the_time('M') ?></span></span><span class="title"><?php the_title(); ?></span></h1>
      <div class="dotted_line"></div>
      <div class="post-meta">Posted by
        <?php the_author_posts_link() ?>
        in
        <?php the_category(', '); ?>
        , Followed with
        <?php comments_popup_link('No Comments.', '1 Comment.', '% Comments.'); ?>
      </div>
      <div class="dotted_line"></div>
      <?php the_content(); ?>
      <div class="tags">
        <?php the_tags('Post Tagged with ',', ',''); ?>
      </div>
      <div class="dotted_line"></div>
      <nav id="nav-single"> <span class="nav-previous">
        <?php previous_post_link( '%link','<span class="meta-nav">&larr;</span> Previous Post '); ?>
        </span> <span class="nav-next">
        <?php next_post_link( '%link','Next Post <span class="meta-nav">&rarr;</span>'); ?>
        </span> </nav>
      <!-- #nav-single -->
      <div class="dotted_line"></div>
    </div>
    <!--End Post-->
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
</div>
<!--End Content-->
<!--Start Sidebar-->
<?php get_sidebar(); ?>
<!--End Sidebar-->
<div class="clear"></div>
<div class="hr_big"></div>
<!--End Content Wrapper-->
</div>
<div class="clear"></div>
<!--End Main_wrapper-->
<?php get_footer(); ?>