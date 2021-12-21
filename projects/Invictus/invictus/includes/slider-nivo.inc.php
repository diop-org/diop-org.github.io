<?php 
/**
 * The loop that displays Nivo Slider
 *
 *
 * @package WordPress
 * @subpackage Invictus
 * @since Invictus 2.1
 */

global $meta, $post;

?>

<div id="nivoHolder"  class="page-slider">
	<div class="nivo-border">
		<div id="nivoSlider" class="nivoSlider">	
		<?php
			// Catch and create the image for the slider
			$i = 0;
			foreach( $meta[MAX_SHORTNAME.'_featured_image'] as $sort => $value ){
				max_get_slider_image( $value, 'nivo-slider', $i );
				$i++;			
			}
		?>		
		</div>	

		<?php
			// Catch and freate the caption for the slider
			$i = 0;
			foreach( $meta[MAX_SHORTNAME.'_featured_image'] as $sort => $value ){
				
				// Get Image URL
				$img_array = image_downsize( $value['imgID'], 'nivo-slider');
				$img_url = $img_array[0];			
				
				?> 

				<?php 			
				$i++;
			}
		?>	
		<div class="nivo-control-holder"></div>		
	</div>
</div>

<script type="text/javascript">
	$(window).load(function() {
		$('#nivoSlider').nivoSlider({
			effect: '<?php echo $meta[MAX_SHORTNAME.'_photo_slider_nivo_effect']; ?>',
			slices: '<?php echo $meta[MAX_SHORTNAME.'_photo_slider_nivo_slices']; ?>',
			boxCols: '<?php echo $meta[MAX_SHORTNAME.'_photo_slider_nivo_boxcols']; ?>',
			boxRows: '<?php echo $meta[MAX_SHORTNAME.'_photo_slider_nivo_boxrows']; ?>',
			animSpeed: '<?php echo $meta[MAX_SHORTNAME.'_photo_slider_nivo_speed']; ?>',
			pauseTime: '<?php echo $meta[MAX_SHORTNAME.'_photo_slider_nivo_pause']; ?>',
			directionNav: true,
			directionNavHide: false,
			captionOpacity: 1			
		});
		
		jQuery('#nivoSlider .nivo-caption')
			.css({ background: 'rgba(0,0,0,0.7)' });
		
	});
</script>