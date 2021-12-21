<?php 
/**
 * The loop that displays Slides Slider
 *
 *
 * @package WordPress
 * @subpackage Invictus
 * @since Invictus 2.1
 */

global $meta, $post;

?>
<!--BEGIN .slider --> 
<div id="slider-<?php echo get_the_id() ?>" class="slides-slider page-slider" data-loader="<?php echo get_template_directory_uri(); ?>/css/<?php get_option_max('color_main',true) ?>/loading.gif"> 
	<div class="slides_container clearfix">
			
			<?php
			
			$_temp_meta['imgID'] = get_post_thumbnail_id($post->ID);
			
			if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) { 
			?>
			<div class="slide">
			<?php 			
				max_get_slider_image( $_temp_meta, 'slides-slider' );						
			?>
			</div>
			<?php
			}
	
			// Catch and create the image for the slider
			$i = 1;
					
			foreach( $meta[MAX_SHORTNAME.'_featured_image'] as $sort => $value ){
			?>
			<div class="slide">
								
			<?php
				max_get_slider_image( $value, 'slides-slider', $i );
				$i++;
			?>
			</div>
			<?php
			}
		?>	
	</div> 
</div>
<!--END .slider --> 

<script type="text/javascript">
	jQuery(document).ready(function(){	
	
		jQuery("#slider-<?php echo get_the_id() ?> .slides_control").height(jQuery("#slider-<?php echo get_the_id() ?> .slide:first img").height() );
	
		var slide = jQuery("#slider-<?php echo get_the_id() ?>");		
			slide.slides({
				preload: true,
				preloadImage: jQuery("#slider-<?php echo get_the_id() ?>").attr('data-loader'), 
				generatePagination: true,
				effect: 'fade',
				generateNextPrev: true,
				autoHeight: true,
				<?php if($meta[MAX_SHORTNAME.'_photo_slider_slides_autoplay'] == 'true'){ ?>
				play: <?php echo $meta[MAX_SHORTNAME.'_photo_slider_slides_pause'] ?>,
				pause: <?php echo $meta[MAX_SHORTNAME.'_photo_slider_slides_pause'] ?>,
				<?php } ?>
				crossfade: false,
				autoHeightSpeed: 250,
				slidesLoaded: function () { 
					jQuery(".slides_control").animate({ height: jQuery(".slides_control img:first").height() }, 250)
				}
			});		
	});
</script>