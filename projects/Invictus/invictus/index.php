<?php
/**
 * @package WordPress
 * @subpackage Invictus
 */

// Generated values !! DO NOT CHANGE !! 
$main_homepage = true;

// get featured galleries
$cat_string = is_array(get_option_max('fullsize_featured_cat')) ? implode( ',' , get_option_max('fullsize_featured_cat')) : get_option_max('fullsize_featured_cat');

// get post order
$order_string = get_option_max('fullsize_featured_order');
$order_by = "&orderby=".$order_string;

// get the posts
$posts = max_query_term_posts( get_option_max('fullsize_featured_count') , get_option_max('fullsize_featured_cat'), 'gallery', $order_string );

$cntPosts = count($posts);

// check if a slide show is available => more than 1 image for the gallery
$show_slideshow = false;
if( get_option_max('fullsize_featured_count') > 1 ) {
	$show_slideshow = true;
}

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

get_header();

?>

<?php 
	// check if title & exerpt should be shown
	$show_fullsize_title = get_option_max('fullsize_featured_title_show');

	// Check if Homepage Sidebar is activated 
	if ( get_option_max('homepage_show_homepage_sidebar') == 'true' ) { 
	?>
	<div id="sidebar">
		 <?php	/* Widgetised Area */	if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('sidebar-homepage') ) ?>		
	</div>			
	<?php 	} ?>

	<div id="primary" class="template-fullsize-gallery">

		<div id="content" role="main">		
			<header <?php post_class('entry-header'); ?> id="post-<?php the_ID(); ?>" >
			
				<?php if($show_fullsize_title == 'true'){ ?>
				<h1 class="page-title"><?php get_option_max('fullsize_featured_title',true) ?></h1>
				<?php } ?>
				<?php 
				// check if there is a excerpt
				if( get_option_max('fullsize_featured_text') != '' && $show_fullsize_title == 'true' ){ 
				?>
				<h2 class="page-description"><?php get_option_max('fullsize_featured_text',true) ?></h2>
				<?php } ?>
					
			</header>		
		</div>
			
	</div>

<?php get_footer(); ?>