<?php 
function pandora_featured_pages() {
	$counter = 0;
	$pages = get_pages();
	foreach ($pages as $page) :
		if ($counter > 3) {
			return true;
		}
		if ( has_post_thumbnail($page->ID) ) {
			$image = wp_get_attachment_image_src( get_post_thumbnail_id($page->ID), array( 300,300 ));?>
			
			<div class="capital-page-button">
				<a href="<?php echo get_page_link($page->ID) ?>" title="">
					<img src="<?php echo $image[0] ?>" width="230" height="100">
				</a>
				<p><a href="<?php echo get_page_link($page->ID) ?>" title="<?php $page->post_title; ?>" rel="bookmark">
					<?php echo $page->post_title; ?></h2>
				</a></p>
			</div><?php
			if ($counter < 3) {
				?> <div id="capital-page-button-space"></div> <?php
			}
			$counter++;
		}
	endforeach;
}
?>
