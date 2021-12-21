<?php 
/**
 * The loop that displays Kwicks Accordion Slider
 *
 *
 * @package WordPress
 * @subpackage Invictus
 * @since Invictus 2.1
 */

global $meta, $post;

?>

<div id="kwicksHolder" class="page-slider">
	<div id="kwicksBorder">

		<ul id="kwicksSlider">
		<?php
			// Catch and create the image for the slider
			$i = 0;
			foreach( $meta[MAX_SHORTNAME.'_featured_image'] as $sort => $value ){
				?>
				<li class="kwick<?php echo $i ?>"> 
					<?php
					max_get_slider_image( $value, 'nivo-slider', $i );
					
					// Get Image URL
					$img_array = image_downsize( $value['imgID'], 'nivo-slider');
					$img_url = $img_array[0];			
					
					?> 
				</li>
				<?php
				$i++;			
			}
		?>		
		</ul>	
		
	</div>
</div>

<script type="text/javascript">

jQuery(document).ready(function() {
	
	// generated each item width depending on its container width and amount of kwicks items
	var l = jQuery('#kwicksSlider li').size(),
		w = jQuery('#kwicksSlider').width(),
		liWidth = w / l,
		space = <?php echo $meta[MAX_SHORTNAME.'_photo_slider_kwicks_spacing']; ?>,
		add =  space / l ;
		
	// set the width of each item
	jQuery('#kwicksSlider li').css({ width: ( liWidth + add ) - space  });

	// The slider itself
    jQuery('#kwicksSlider').kwicks({  
        min: <?php echo $meta[MAX_SHORTNAME.'_photo_slider_kwicks_min']; ?>,
        spacing : <?php echo $meta[MAX_SHORTNAME.'_photo_slider_kwicks_spacing']; ?>,
		sticky: <?php echo $meta[MAX_SHORTNAME.'_photo_slider_kwicks_sticky']; ?>,
		defaultKwick: <?php echo $meta[MAX_SHORTNAME.'_photo_slider_kwicks_default']; ?>,
		easing: "<?php echo $meta[MAX_SHORTNAME.'_photo_slider_kwicks_easing']; ?>",
		duration: <?php echo $meta[MAX_SHORTNAME.'_photo_slider_kwicks_duration']; ?>
    });	

		
});  
</script>
