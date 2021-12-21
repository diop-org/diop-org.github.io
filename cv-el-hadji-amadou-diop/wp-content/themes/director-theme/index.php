<?php get_header(); ?>

<div class="middle_single"> <!-- Page Starts -->

	<?php if (have_posts()) : ?>
	<?php $post = $posts[0];?>
	<?php while (have_posts()) : the_post(); ?>
	
		<div class="sticky-box">
	                <?php if(is_sticky()) : ?>
	    				<div class="sticky-post"><img src="<?php bloginfo('template_url'); ?>/images/sticky.png" alt="sticky" width="50" height="50"/></div>
	    			<?php endif; ?>
	</div>
	
	<div class="posttop"></div>
	<div class="post_blog"> <!-- Page Content -->
		
		<h2><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		
        <div class="metadata">
        <div class="date"><?php the_time(__('M jS','mystique')); ?></div><div class="author"><?php printf(__('Posted by %1$s','director'),'<a href="'. get_author_posts_url(get_the_author_ID()) .'" title="'. sprintf(__("Posts by %s","director"), attribute_escape(get_the_author())).' ">'. get_the_author() .'</a>');?></div>
        </div>
		
		<div class="entry_blog">
				
			<?php the_content('<span class="readmore"><strong>&nbsp;Read More &raquo;</strong></span>'); ?> 
           <div class="post-data">
		   <img style="vertical-align:-5px;" alt="categories" src="<?php bloginfo('template_directory'); ?>/images/category.gif" height="18" width="18" /> <?php the_category(', ') ?> | <img style="vertical-align:-5px;" alt="comments" src="<?php bloginfo('template_directory'); ?>/images/comments.png" height="16" width="16" />
		   <?php comments_popup_link(__('Comments (0)'), __('Comments (1)'), __('Comments (%)')); ?> <?php edit_post_link('Edit',' ',''); ?>
	       </div>     
		</div>
	</div><!-- Page Content Ends -->	
	<div class="postbot"></div>
		
	<?php endwhile; ?>
     <div class="navigation">
			<div class="fleft"><?php next_posts_link('&laquo; Older') ?></div>
			<div class="fright"> <?php previous_posts_link('Newer &raquo;') ?></div>
	 </div>
	<?php else : ?>

	<h2 class="center">Not Found</h2>

	<?php endif; ?>
	
</div>	<!-- Page Ends -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>