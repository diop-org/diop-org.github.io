<?php
/**
 * The loop that displays portfolio items.
 *
 *
 * @package WordPress
 * @subpackage invictus
 * @since invictus 1.0
 */

global $imgDimensions, $substrExcerpt, $itemCaption, $shortname, $paged, $meta, $the_term, $taxonomy_name, $page_obj, $hideExcerpt;

//Get the page meta informations and store them in an array
$meta = max_get_cutom_meta_array();

// store current page id
$page_obj = get_page($post->ID);

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$pageInfo = get_post_meta($post->ID, 'max_show_gallery_info', true);

// get page template
$custom_fields = get_post_custom_values('_wp_page_template', $post->ID);
$p_tpl = $custom_fields[0];

// get post order & sorting
$order_string = $meta['max_gallery_order'];
$order_by = "&orderby=".$order_string;

$sort_string = $meta['max_gallery_sort'];
$sort_by = "&order=".$sort_string;

// If template is a standard portfolio template
if ($p_tpl == "template-one-column.php" || 
	$p_tpl == "template-two-column.php" || 
	$p_tpl == "template-three-column.php" || 
	$p_tpl == "template-four-column.php" ){

	// query posts for the above templates
	$posts = max_query_posts(PER_PAGE_DEFAULT, $meta['max_select_gallery'], $order_string, false, $sort_string);

}

// if template is a fullsize grid templat
if($p_tpl == "template-grid-fullsize.php" ) {
	$pageInfo = false;
	$posts = max_query_posts($meta['max_gallery_per_page'], $meta['max_select_gallery'], $order_string, false, $sort_string);
}

// Template is the Sortable Grid Temp late
if( $p_tpl == "template-scroller.php" ){
	$pageInfo = false;
	// query posts for the above templates	
	$posts = max_query_term_posts( 9999 , $meta['max_select_gallery'], 'gallery', $order_by, GALLERY_TAXONOMY, $sort_string );			
}

// Template is the Sortable Grid Temp late
if( $p_tpl == "template-sortable.php"){
	$pageInfo = false;
	// query posts for the above templates	
	$posts = max_query_term_posts( 9999 , $meta['max_sortable_galleries'], 'gallery', $order_string, GALLERY_TAXONOMY, $sort_string );		
}

?>
	<?php if (@$_COOKIE['wp-postpass_' . COOKIEHASH] == $post->post_password || $post->post_password == "") { ?>

			<?php if (have_posts()) : ?>
				
				<ul id="portfolioList" class="clearfix portfolio-list">
					
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>							

					<?php
					$_term_classes = "";
					
					// check if the template is a quicksand sortable template
					if( $p_tpl == "template-sortable.php" ){
						
						// get the term slug and display it as class list
						foreach( @get_the_terms( $post->ID, GALLERY_TAXONOMY) as $term ) {
							$_term_classes .= $term->slug." ";
						}
						
					}
					?>	
						
						<li data-id="id-<?php echo $post->ID ?>" class="item <?php echo max_get_post_lightbox_class() . " "; ?><?php echo $_term_classes . " "; ?><?php if( get_option_max('image_show_fade') != "true") { echo("no-hover"); } ?>">
							<div class="shadow">
							<?php
							
								// get the gallery item 
								max_get_post_custom_image();
								
								if($itemCaption === true) {
								
									// check if caption option is selected 
									if ( get_option_max( 'image_show_caption' ) == 'true' ) {
									
									?>
									
									<div class="item-caption">
										<strong><?php echo get_the_title() ?></strong><br />
										<?php 
											if( $hideExcerpt === false || !$hideExcerpt) {
												echo get_the_excerpt();
											}
										?>
									</div>							
								
								<?php 
									} 
								} 						
								
							?>
							</div>
						
							
							<?php 
											
							// check if additional options is selected
							if ( $pageInfo == 'true' ) {
								
								?>
								
								<div class="item-information">
									<ul>										
										<?php if( get_post_meta($post->ID, $shortname.'_photo_copyright_link_value', true) != "" ){ ?>
										
										<li><?php _e('Copyright','invictus') ?>: <a href="<?php echo get_post_meta($post->ID, $shortname.'_photo_copyright_link_value', true) ?>" title="<?php echo get_post_meta($post->ID, $shortname.'_photo_copyright_information_value', true) ?>" target="_blank"><?php echo get_post_meta($post->ID, $shortname.'_photo_copyright_information_value', true) ?></a></li>
										
										<?php } else { ?>
										
										<li><?php _e('Copyright','invictus') ?>: <?php echo get_post_meta($post->ID, $shortname.'_photo_copyright_information_value', true) ?></li>
										
										<?php } ?>
																				
										<li><?php _e('Location','invictus') ?>: <span><?php echo get_post_meta($post->ID, $shortname.'_photo_location_value', true) ?></span></li>
										<?php if(get_post_meta($post->ID, $shortname.'_photo_date_value',true) != "" && max_is_valid_timestamp(get_post_meta($post->ID, $shortname.'_photo_date_value',true)) === true ){ ?>
										<li><?php _e('Date','invictus') ?>: <span><?php echo date('m/d/Y', get_post_meta($post->ID, $shortname.'_photo_date_value', true)) ?></span></li>
										<?php }else{ ?>
										<li><?php _e('Date','invictus') ?>: <span>-</span></li>
										<?php } ?>
									</ul>
								</div>							
							
							<?php 
							} 							
							?>
							
						</li>
								
						<?php endwhile; ?>
					
						<?php else : ?>
					
						<h2><?php _e('No Entries found','invictus') ?></h2>
					
						<?php endif; ?>
						
					</ul>
					
					<?php 						
					/* Display navigation to next/previous pages when applicable */ 
					if (function_exists("max_pagination")) {					
						max_pagination();					
					}						
					?>
<?php endif; ?>
<?php } ?>
<?php wp_reset_query(); ?>