<?php
/*
Template Name: Blog Page
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
      <?php
    $limit = get_option('posts_per_page');
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    query_posts('showposts=' . $limit . '&paged=' . $paged);
    $wp_query->is_archive = true; $wp_query->is_home = false;
    ?>
      <!-- Start the Loop. -->
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <!--Start Post-->
      <div class="post">
        <h1 class="post_title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
          <?php the_title(); ?>
          </a> </h1>
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
          <?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
          <a href="<?php the_permalink(); ?>">
          <?php the_post_thumbnail( 'post_thumbnail', array('class' => 'postimg'  )); ?>
          </a>
          <?php
	} else { ?>
          <a href="<?php the_permalink() ?>"><?php echo inkthemes_main_image(); ?></a>
          <?php
	}
		  ?>
			<?php the_excerpt(); ?>
			<div class="clear"></div>
			<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . 'Pages:' . '</span>', 'after' => '</div>' ) ); ?>
			<?php edit_post_link('Edit','', '' ); ?>
        </div>
        <a href="<?php the_permalink() ?>" class="continue"><?php _e( 'Continue reading &rarr;', 'dzonia'); ?></a>
        <div class="tags">
          <?php the_tags('Post Tagged with ', ', ', ''); ?>
        </div>
      </div>
      <!--End Post-->
      <?php endwhile; else: ?>
      <div class="post">
        <p>
          <?php _e('Sorry, no posts matched your criteria.', 'dzonia'); ?>
        </p>
      </div>
      <?php endif; ?>
      <!--End Loop-->
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
