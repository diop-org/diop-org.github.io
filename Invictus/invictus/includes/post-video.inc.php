<?php 
global $meta, $portfolio, $post;

$embededCode = $meta[MAX_SHORTNAME.'_video_embeded_value'];

$_m4v = $meta[MAX_SHORTNAME.'_video_url_m4v_value'];
$_ogv = $meta[MAX_SHORTNAME.'_video_url_ogv_value'];

// Video Preview is an Imager from an URL	
if($meta[MAX_SHORTNAME.'_video_poster_value'] == 'url'){
	$_poster_url = $meta[MAX_SHORTNAME.'_video_url_poster_value'];
}

// Video Preview is the post featured image or the URL was chosen but not set
if( $meta[MAX_SHORTNAME.'_video_poster_value'] == 'featured' || ( $meta[MAX_SHORTNAME.'_video_poster_value'] == 'url' && $meta[MAX_SHORTNAME.'_video_poster_value'] == "" ) ){
	$_previewUrl = max_get_image_path($post->ID, 'full');
	$_poster_url = get_template_directory_uri() . '/timthumb.php?src=' . $_previewUrl .'&w=' . MAX_CONTENT_WIDTH . '&h=' . $meta[MAX_SHORTNAME.'_video_height_value'] . '&q=100&zc=1';
}

?>

<div class="entry-video" <?php if($meta[MAX_SHORTNAME.'_photo_item_type_value'] == "selfhosted") : ?>style="height: <?php echo $meta[MAX_SHORTNAME.'_video_height_value'] ?>px"<?php endif; ?>>

<?php if( $meta[MAX_SHORTNAME.'_photo_item_type_value'] == "selfhosted" ) { ?>	

<video width="<?php echo MAX_CONTENT_WIDTH ?>" height="<?php echo $meta[MAX_SHORTNAME.'_video_height_value'] ?>" id="postVideo_<?php echo $post->ID ?>">
	<?php if($_m4v != '') : ?><source src="<?php echo $_m4v ?>" type="video/mp4" />,<?php endif; ?>
	<?php if($_ogv != '') : ?><source src="<?php echo $_ogv ?>" type="video/ogv" />,<?php endif; ?>
</video>

<?php max_get_video_js($post->ID); ?>
							
<?php } else if ( $meta[MAX_SHORTNAME.'_photo_item_type_value'] == "youtube_embed" || $meta[MAX_SHORTNAME.'_photo_item_type_value'] == "vimeo_embed" ){ ?>
						
	<?php echo stripslashes(htmlspecialchars_decode($embededCode)); ?>
			
<?php } ?>
</div>
