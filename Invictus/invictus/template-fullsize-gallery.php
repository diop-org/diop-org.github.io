<?php
/**
 * Template Name: Portfolio Fullsize Background Gallery
 * 
 * @package WordPress
 * @subpackage Invictus
 */

if ( !post_password_required() ) {
	wp_enqueue_script('jquery-mousewheel');
	wp_enqueue_script('custom-superbgimage');

	$isFullsizeGallery = true;
	$showSuperbgimage = true;
}

// Generated values !! DO NOT CHANGE !! 
// get the posts for the supersized background

$term = get_term_by('id', get_post_meta($post->ID, 'max_select_gallery', true), GALLERY_TAXONOMY);
$taxonomy_name = $term->name;
$the_term = get_term_by('slug', $taxonomy_name, GALLERY_TAXONOMY);

// get post order
$order_string = get_post_meta($post->ID, 'max_gallery_order', true);
$order_by = "&orderby=".$order_string;

$sort_string = get_post_meta($post->ID, 'max_gallery_sort', true);
$sort_by = "&order=".$sort_string;

//Get the page meta informations and store them in an array
$meta = max_get_cutom_meta_array();

get_header();

?>

<?php 
// get the password protected login template part
if ( post_password_required() ) {
	get_template_part( 'includes/page', 'password.inc' );
} else{
?>

	<?php	
	$show_fullsize_title = get_post_meta($post->ID, 'max_show_page_fullsize_title', true);	
	?>
	
		<div id="sidebar" class="fullsize-sidebar">
			 <?php	/* Widgetised Area */	if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('sidebar-fullsize-gallery') ) ?>		
		</div>

		<div id="primary" class="template-fullsize-gallery">

			<div id="content" role="main">		
			<header <?php post_class('entry-header'); ?> id="post-<?php echo the_ID() ?>" >
			
				<?php if($show_fullsize_title == "true"){ ?>
				<h1 class="page-title"><?php the_title() ?></h1>
				<?php } ?>
				<?php 
				// check if there is a excerpt
				if( max_get_the_excerpt() && $show_fullsize_title == "true" ){ 
				?>
				<h2 class="page-description"><?php max_get_the_excerpt(true) ?></h2>
				<?php } ?>
					
			</header>		
			</div>
				
		</div>

<?php

// get the posts
$posts = max_query_term_posts( 9999, get_post_meta($post->ID, 'max_select_gallery', true), 'gallery', $order_string, GALLERY_TAXONOMY, $sort_string );
$cntPosts = count($posts);

// check if there are video posts in the query
$_query_has_videos = false;

if (have_posts()) : while (have_posts()) : the_post();
	if( get_post_meta( $post->ID, MAX_SHORTNAME.'_photo_item_type_value', true) == 'selfhosted' || 
		get_post_meta( $post->ID, MAX_SHORTNAME.'_photo_item_type_value', true) == 'youtube_embed' ||
		get_post_meta( $post->ID, MAX_SHORTNAME.'_photo_item_type_value', true) == 'vimeo_embed'  ){
		$_query_has_videos = true;
	}
endwhile;
endif;

// check if a slide show is available => more than 1 image for the gallery
$show_slideshow = false;
if( $cntPosts > 1 ) {
	$show_slideshow = true;
}
?>

<?php } ?>
<?php get_footer(); ?>