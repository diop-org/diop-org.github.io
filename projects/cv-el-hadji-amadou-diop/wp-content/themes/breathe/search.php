<?php get_header(); ?>
<?php
global $options;
foreach ($options as $value) {
    if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); }
}
?>


    <div class="posts-wrap"> 
<!-- Top Ads -->
<?php if ( $breathe_ads_top == yes ) { ?>
			<div class="top-ads">
				<?php echo stripslashes($breathe_ads_code_top); ?>
			</div>
			<?php } ?>		

 <!-- End Top Ads --> 

	<?php if (have_posts()) : ?>



    	<h2><?php _e('Search results:', 'blank'); ?> </h2>

        

		<?php while (have_posts()) : the_post(); ?>

	

    <div class="post post-index" id="post-<?php the_ID(); ?>">

    

        <h2 class="entry-title index-entry-title">

        <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>

        </h2>



				<div class="additional-meta"><?php the_time('l, j F, Y') ?></div>

<!-- Formating like front page -->

<?php if ( function_exists( 'get_the_image' ) ) { get_the_image(); } ?>
<?php the_excerpt(); ?>

<div class="more clearfloat"><a href="<?php the_permalink() ?> " rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php echo('Read More...&raquo;'); ?></a></div>

<div class="lastline"></div>

			

            <div class="entry-content entry-content-index">

					</div><!-- end .entry-content -->

            

     <div class="entry-meta entry-meta-index">

	

    	<?php the_tags( __('Tags: ', 'blank'), ", ", " ") ?>

        <?php _e('Category: ', 'blank'); ?><?php the_category(', ') ?>

        

		<?php comments_popup_link( __( 'Comments (0)', 'blank' ), __( 'Comments (1)', 'blank' ), __( 'Comments (%)', 'blank' ), 'comments-link', __('Comments closed', 'blank')); ?>

        

        <?php edit_post_link( __('Edit'), ' | ', ''); ?>

 

      </div><!-- end .entry-meta -->

     </div><!-- end .post -->

        

		<?php endwhile; ?>

        

		<div class="navigation navigation-index">

			<div class="nav-prev"><?php next_posts_link( __('&laquo; Older Entries', 'blank')) ?></div>

			<div class="nav-next"><?php previous_posts_link( __('Newer Entries &raquo;', 'blank')) ?></div>

		</div>

<!-- Bottom Ads -->
<?php if ( $breathe_ads_bottom == yes ) { ?>
			<div class="bottom-ads">
				<?php echo stripslashes($breathe_ads_code_bottom); ?>
			</div>
			<?php } ?>
<!-- End bottom ads -->

		



	<?php else : ?>



		<h2 class="search-nothing"><?php _e('Sorry we did not find anything for your search. Please try again!', 'blank'); ?></h2>

		



	<?php endif; ?>

</div><!-- end .posts-wrap -->



<?php get_sidebar(); ?>



<?php get_footer(); ?>