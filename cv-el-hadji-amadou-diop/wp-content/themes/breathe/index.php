<?php
global $options;
foreach ($options as $value) {
    if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); }
}
?>
<?php get_header(); ?>

	<?php if (have_posts()) : ?>
<div class="posts-wrap">

<!-- Welcome box -->
<?php if ( $breathe_welcome == yes ) { ?>
			<div class="welcome">
				<?php echo stripslashes($breathe_welcome_message); ?>
			</div>
			<?php } ?>
<!-- End welcome box -->

<!-- Top Ads -->
<?php if ( $breathe_ads_top == yes ) { ?>
			<div class="top-ads">
				<?php echo stripslashes($breathe_ads_code_top); ?>
			</div>
			<?php } ?>
<!-- End Top Ads -->

		<?php while (have_posts()) : the_post(); ?>
	
    <div class="post post-index" id="post-<?php the_ID(); ?>">
    

        <h2 class="entry-title index-entry-title">
        <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
        </h2>

				<div class="additional-meta"><?php the_time('l, j F, Y') ?></div>

<?php if ( function_exists( 'get_the_image' ) ) { get_the_image(); } ?>
    
<?php the_excerpt(); ?>

 <div class="more clearfloat"><a href="<?php the_permalink() ?> " rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php echo('Read More...&raquo;'); ?></a></div>

<div class="comments"><a href="<?php comments_link(); ?>"><?php comments_number('0', '1', '%', 'number'); ?> Comments</a>
        </div>
			
            <div class="entry-content entry-content-index">
					


<div class="lastline"></div>
		
     	

</div><!-- end .entry-content -->
            
     </div>  <!-- end .post -->
      
		<?php endwhile; ?>
         
		<div class="navigation navigation-index">
			<div class="nav-prev"><?php next_posts_link( __('&laquo; Older Entries', 'blank')) ?></div>
			<div class="nav-next"><?php previous_posts_link( __('Newer Entries &raquo;', 'blank')) ?></div>
		</div>

<?php if ( $breathe_ads_bottom == yes ) { ?>
			<div class="bottom-ads">
				<?php echo stripslashes($breathe_ads_code_bottom); ?>
			</div>
			<?php } ?>

	<?php else : ?>

		<h2><?php _e('The page you`re looking for doesn`t exist', 'blank'); ?></h2>
		<div class="search-404">
		<?php _e('Do you want to search for it?', 'blank'); ?><br />
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>
		</div>
        
	<?php endif; ?>
 </div><!-- end .posts-wrap -->
<?php get_sidebar(); ?>

<?php get_footer(); ?>
