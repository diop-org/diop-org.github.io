<?php get_header(); ?>
<?php
global $options;
foreach ($options as $value) {
    if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); }
}
?>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="posts-wrap"> 
<!-- Top Ads -->
<?php if ( $breathe_ads_top == yes ) { ?>
			<div class="top-ads">
				<?php echo stripslashes($breathe_ads_code_top); ?>
			</div>
			<?php } ?>		

 <!-- End Top Ads -->       

<div class="post" id="page">
		
		<h2 class="page-title"><?php the_title(); ?></h2>

			<div class="entry-content" id="page-content">
			
				<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>

				
			</div><!-- end #page-content -->
<!-- Bottom Ads -->
<?php if ( $breathe_ads_bottom == yes ) { ?>
			<div class="bottom-ads">
				<?php echo stripslashes($breathe_ads_code_bottom); ?>
			</div>
			<?php } ?>
<!-- End bottom ads -->
	</div><!-- end #page -->
    
			<?php endwhile; endif; ?>
            
	<?php edit_post_link( __('Edit this page', 'blank'), '<p>', '</p>'); ?>
 </div><!-- end .posts-wrap -->
	
<?php get_sidebar(); ?>

<?php get_footer(); ?>