<?php
/*
Template Name: Blog Page
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
    <?php
    $limit = get_option('posts_per_page');
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    query_posts('showposts=' . $limit . '&paged=' . $paged);
    $wp_query->is_archive = true; $wp_query->is_home = false;
    ?>
    <!-- Start the Loop. -->
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <!--Start Post-->
    <div class="post blog <?php post_class(); ?>" id="post-<?php the_ID(); ?>">
      <h1 class="post_title"><span class="day">
        <?php the_time('d'); ?>
        <span class="month"><?php echo get_the_time('M') ?></span></span><span class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
        </title>
      </h1>
      <div class="dotted_line"></div>
      <div class="post-meta">Posted by
        <?php the_author_posts_link() ?>
        in
        <?php the_category(', '); ?>
        , Followed with <a href="#">
        <?php comments_popup_link('No Comments.', '1 Comment.', '% Comments.'); ?>
        </a> </div>
      <div class="dotted_line"></div>
      <?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
      <a href="<?php the_permalink(); ?>">
      <?php the_post_thumbnail( 'post_thumbnail', array('class' => 'postimg'  )); ?>
      </a>
      <?php
	} else {
	   echo inkthemes_main_image();
	}
		  ?>
      <?php the_excerpt(); ?>
      <a class="read-more" href="<?php the_permalink() ?>">Read More ...</a>
      <div class="tags">
        <?php the_tags('Post Tagged with ',', ',''); ?>
      </div>
      <div class="dotted_line"></div>
    </div>
    <!--End Post-->
    <?php endwhile; else: ?>
    <div class="post">
      <p>
        <?php echo('Sorry, no posts matched your criteria.'); ?>
      </p>
    </div>
    <?php endif; ?>
    <div class="folio-page-info">
      <?php inkthemes_pagination(); ?>
    </div>
  </div>
</div>
<!--End Content-->
<?php get_sidebar(); ?>
<div class="clear"></div>
<div class="hr_big"></div>
<!--End Content Wrapper-->
</div>
<div class="clear"></div>
<!--End Main_wrapper-->
<?php get_footer(); ?>
