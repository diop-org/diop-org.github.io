<?php while (have_posts()) : the_post(); ?>  


<?php
//design for pages
if ( get_post_type() == 'page') { ?>

    <div class="loop-entry clearfix">
    	<h2><a href="<?php the_permalink(' ') ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
    	<?php echo excerpt('50'); ?>
    </div><!-- END entry -->

<?php } elseif( get_post_type() == 'portfolio') { ?>

    <div class="loop-entry clearfix">
    
    	<?php
        $portfolio_thumb = wp_get_attachment_image_src(get_post_thumbnail_id(), 'portfolio-thumb');
		if($portfolio_thumb) { ?>
    	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="search-portfolio-thumb"><img src="<?php echo $portfolio_thumb[0]; ?>" height="<?php echo $portfolio_thumb[2]; ?>" width="<?php echo $portfolio_thumb[1]; ?>" alt="<?php echo the_title(); ?>" /></a>
        <?php } ?>
        
    	<h2><a href="<?php the_permalink(' ') ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
    	<?php  the_excerpt(''); ?>
        
    </div><!-- END entry -->

<?php } else { ?>
<div class="loop-entry clearfix">

	<?php if ( has_post_thumbnail() ) {  ?>
        <div class="loop-entry-thumbnail">
            <a href="<?php the_permalink(' ') ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('post-image'); ?></a>
        </div>
    <?php } ?>
  
	<div class="loop-entry-right">
    	<h2><a href="<?php the_permalink(' ') ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
    	<?php  the_excerpt(''); ?>
    </div>
    
	<div class="loop-entry-left">
    	<div class="loop-entry-date">
			<?php the_time('j'); ?> <?php the_time('M'); ?>, <?php the_time('Y'); ?>
        </div>
        <div class="loop-entry-author">
        	<?php _e('By', 'bizz'); ?> <?php the_author_posts_link(); ?>
        </div>
        <div class="loop-entry-cat">
       		<?php _e('In', 'bizz'); ?>: <?php the_category(' '); ?>
        </div>
    </div>
     
</div><!-- END entry -->

<?php } ?>



<?php endwhile; ?>