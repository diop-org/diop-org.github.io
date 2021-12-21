<?php 
/**
 * Password protected content login
 *
 *
 * @package WordPress
 * @subpackage Invictus
 * @since Invictus 2.2
 */
 
// get page template
$custom_fields = get_post_custom_values('_wp_page_template', $post->ID);
$template = $custom_fields[0];

?>

<div id="single-page" class="clearfix left-sidebar">
	<div id="primary" style="margin-left: 20px;" <?php if($template == 'template-grid-fullsize.php') { echo 'class="portfolio-fullsize-grid"'; } ?>>
		<div id="content" role="main">
				
			<header class="entry-header" style="padding: 0;">
				<h1 class="page-title"><?php the_title(); ?></h1>
			</header><!-- .entry-header -->
				
			<?php the_content() ?>	
				
		</div><!-- #content -->
	</div><!-- #container -->
</div>