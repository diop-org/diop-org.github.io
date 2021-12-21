<?php
//get theme options
$options = get_option( 'bizz_theme_settings' );
?>
<?php
	//get custom post type === > Slides
	global $post;
	$args = array(
		'post_type' =>'slides',
		'numberposts' => -1,
		'orderby' => 'ASC'
	);
	$slides = get_posts($args);
?>
<?php if($slides) { ?>
<div id="slider-wrap">
	<div id="slider_nivo" class="nivoSlider"> 
		<?php
		// start loop
        foreach($slides as $post) : setup_postdata($post);
		//get featured image ==> full size
		$featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'nivo-slider');
		// get metabox data
		$slidelink = get_post_meta($post->ID, 'bizz_slides_url', TRUE);
		?>
        <?php
        //only show slide if featured thumbnail is defined
		if ( has_post_thumbnail() ) { ?>
             <?php
			// show link with slide if meta exists
			if($slidelink != '') { ?>
				<a href="<?php echo $slidelink ?>" title="<?php the_title(); ?>"><img src="<?php echo $featured_image[0]; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" width="<?php echo $featured_image[1]; ?>" height="<?php echo $featured_image[2]; ?>" /></a>
         <?php
         // no meta link defined, show plain img
        } else { ?> 
		<img src="<?php echo $featured_image[0]; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" width="<?php echo $featured_image[1]; ?>" height="<?php echo $featured_image[2]; ?>" />
       <?php } ?>
       <?php } ?>
		<?php endforeach; ?>
	</div><!--/slider nivoSlider-->
</div><!--/slider-wrap -->
<?php } wp_reset_postdata(); ?>