<?php
/**
 * Template Name: Blog Fullsize Template
 *
 * @package WordPress
 * @subpackage Invictus
 * @since Invictus 1.0
 */

global $page_tpl;

$showSuperbgimage = true ;

get_header(); 

wp_reset_query();

$blog_cat = "";
if(get_post_meta($post->ID, MAX_SHORTNAME.'_page_blog_category', true) != ""){
	$blog_cat = implode(',',get_post_meta($post->ID, MAX_SHORTNAME.'_page_blog_category', true));
}
$blog_posts = query_posts( array('posts_per_page' => get_option_max('general_posts_per_page'), 'paged' => $paged, 'cat' => $blog_cat ) );

$custom_fields = get_post_custom_values('_wp_page_template', $post->ID);
$page_tpl = $custom_fields[0];

?>

<div id="single-page" class="clearfix blog">

		<div id="primary" class="template-fullsize">

			<header <?php post_class('entry-header'); ?> id="post-<?php the_ID(); ?>" >
			
				<h1 class="page-title"><?php the_title(); ?> </h1>
				<?php 
				// check if there is a excerpt
				if( max_get_the_excerpt() ){ 
				?>
				<h2 class="page-description"><?php max_get_the_excerpt(true) ?></h2>
				<?php } ?>
					
			</header>

			<div id="content" role="main">		
			
			<?php /* -- added 2.0 -- */ ?>
			<?php the_content() ?>
			<?php /* -- end -- */ ?>
			
			<?php
			if ( !post_password_required() ) {				
				// including the content template blog-loop.php
				get_template_part( 'blog-loop' );
			} 
			?>
							
			</div><!-- #content -->	
			
		</div><!-- #primary -->

</div>
<?php get_footer(); ?>
