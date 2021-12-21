<?php
/**
 * Template Name: Portfolio Sortable Grid
 *
 * @package WordPress
 * @subpackage Invictus
 * @since Invictus 1.0
 */

global $meta; 

wp_reset_query();

wp_enqueue_script('quicksand');
wp_enqueue_script('custom-quicksand');

$meta = max_get_cutom_meta_array();

get_header(); 

$imgHeight = isset($meta[MAX_SHORTNAME."_page_gallery_sortable_height"]) ? $meta[MAX_SHORTNAME."_page_gallery_sortable_height"] : 106;
$imgWidth  = isset($meta[MAX_SHORTNAME."_page_gallery_sortable_width"]) ? $meta[MAX_SHORTNAME."_page_gallery_sortable_width"] : 146;

// set the image dimensions for this portfolio template
$imgDimensions = array( 'width' => $imgWidth, 'height' => $imgHeight );
$itemCaption = false;
$hasExcerpt = false;
?>

<div id="single-page" class="clearfix left-sidebar">

		<div id="primary" class="portfolio-sortable-grid">
			<div id="content" role="main">
				
				<header class="clearfix entry-header">
						
				<h1 class="page-title"><?php the_title(); ?></h1>
				<?php 
				// check if there is a excerpt
				if( max_get_the_excerpt() ){ 
					$hasExcerpt = true;
				?>
				<h2 class="page-description"><?php max_get_the_excerpt(true) ?></h2>
				<?php } ?>
				
				</header><!-- .entry-header -->
				
				<?php if (@$_COOKIE['wp-postpass_' . COOKIEHASH] == $post->post_password || $post->post_password == "") { ?>					
					<ul class="clearfix splitter <?php if( $hasExcerpt === false ) { echo ("splitter-top"); } ?>">
						<li>
							<ul id="portfolioSort" class="clearfix content-sort">
								<?php if(get_post_meta($post->ID, MAX_SHORTNAME."_page_sortable_show_all", true) == 'true' || !get_post_meta($post->ID, MAX_SHORTNAME."_page_sortable_show_all", true) ) { ?>
								<li class="segment-0 current"><a href="#" data-value="all"><?php _e('All','invictus') ?></a></li>
								<?php } ?>
								<?php 
									// Get the taxonomies for galleries
									$output = "";
									$parent = "";
									$i = 1;						
									
									$gal_array = get_post_meta($post->ID, 'max_sortable_galleries', false);
																	
									foreach( $gal_array[0] as $index => $value ) {
										$_the_term = get_term_by('id', $index, GALLERY_TAXONOMY );
										$output .= '<li class="segment-'.$i.'"><a href="#" data-value="' . $_the_term->slug . '">'.$_the_term->name.'</a></li>';
										$i++;
									};
									echo $output;
								?>
							</ul>
						</li>
					</ul>
								
					<?php
						// including the loop template gallery-loop.php
						get_template_part( 'gallery-loop' );
					?>
								
					<?php } ?>	
					
					<?php /* -- added 2.1.6 -- */ ?>
					<br />
					<div class="clearfix">
					<?php the_content() ?>
					<?php /* -- end -- */ ?>
					
					<?php /* -- added 2.2 -- */ ?>
					<?php if( $meta['max_page_allow_comments'] == 'true') { ?>
					<div id="comments-holder" class="clearfix">
						<?php comments_template( '', true ); ?>
					</div>				
					<?php } ?>
					<?php /* -- end -- */ ?>
					
				</div>			

			</div><!-- #content -->
		</div><!-- #container -->

		<div id="sidebar">
			 <?php	/* Widgetised Area */	if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('sidebar-gallery-sortable') ) ?>		
		</div>

</div>

<?php if( $meta[MAX_SHORTNAME.'_page_gallery_fullwidth'] == true ){ ?>
<script>
	jQuery(function(){

		jQuery('#primary').width( 
			jQuery('#single-page').width() - 
			parseInt(jQuery('#primary').css('padding-left')) - 
			parseInt(jQuery('#primary').css('padding-right')) - 
			parseInt(jQuery('#primary').css('margin-right')) -
			parseInt(jQuery('#primary').css('border-left-width')) -
			parseInt(jQuery('#primary').css('border-right-width'))			
		);

		jQuery(window).resize(function(){
			$('#portfolioList').css('height','');
		})
		
	})
</script>
<?php } ?>
<?php get_footer(); ?>
