<?php
/**
 * @package WordPress
 * @subpackage bizz Theme
 */
?>
<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div id="page-heading">
	<h2><?php _e('Blog', 'bizz'); ?></h2>
</div>
<!-- END page-heading -->

<div class="post clearfix">

	<h1 class="single-title"><?php the_title(); ?></h1>
    
    <div class="post-meta">
        <span class="meta-date"><?php the_time('j'); ?> <?php the_time('M'); ?>, <?php the_time('Y'); ?></span>
        <span class="meta-category"><?php the_category(' '); ?></span>
        <span class="meta-author"><?php the_author_posts_link(); ?></span>
    </div>
    <!-- END post-meta --> 


    <div class="entry clearfix">
        <?php if ( has_post_thumbnail() ) { ?>
        		<div class="post-thumbnail">
        			<?php the_post_thumbnail('post-image'); ?>
                </div>
                <!-- END post-thumbnail -->
        <?php } ?>
        
		<?php the_content(); ?>
        <div class="clear"></div>
        
        <?php wp_link_pages(' '); ?>
         
        <div class="post-bottom">
        	<?php the_tags('<div class="post-tags">',' , ','</div>'); ?>
        </div>
        <!-- END post-bottom -->
        
        
        </div>
        <!-- END entry -->
	
	<?php comments_template(); ?>
   
        
</div>
<!-- END post -->

<?php endwhile; ?>
<?php endif; ?>
             
<?php get_sidebar(); ?>
<?php get_footer(); ?>