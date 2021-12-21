<?php
/**
 * The main single page template file.
 *
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
      <!--Start Post-->
      <div class="post">
        <?php if (have_posts())
    while (have_posts()) : the_post(); ?>
        <h1 class="post_title">
          <?php the_title(); ?>
        </h1>
        <div class="post_date">
          <ul class="date">
            <li class="day">
              <?php 
              $get_date='d';
              the_time($get_date); ?>
            </li>
            <li class="month"><?php echo get_the_time('M') ?></li>
          </ul>
        </div>
        <ul class="post_meta">
          <li class="post_author"><a href="#">
            <?php the_author_posts_link(); ?>
            </a></li>
          <li class="post_comment"><a href="#">
            <?php comments_popup_link('No Comments.', '1 Comment.', '% Comments.'); ?>
            </a></li>
          <li class="post_category"><a href="#">
            <?php the_category(', '); ?>
            </a></li>
        </ul>
        <div class="clear"></div>
        <div class="post_content">
			<?php the_content(); ?>
			<div class="clear"></div>
			<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . 'Pages:' . '</span>', 'after' => '</div>' ) ); ?>
			<?php edit_post_link('Edit','', '' ); ?>
        </div>
        <div class="clear"></div>
        <div class="tags">
          <?php the_tags('Post Tagged with ', ', ', ''); ?>
        </div>
        <?php endwhile; ?>
      </div>
      <nav id="nav-single"> <span class="nav-previous">
        <?php previous_post_link('%link', __('<span class="meta-nav">&larr;</span> Previous Post ', 'dzonia')); ?>
        </span> <span class="nav-next">
        <?php next_post_link('%link', __('Next Post <span class="meta-nav">&rarr;</span>', 'dzonia')); ?>
        </span> </nav>
      <!--End Post-->
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
