<?php
/**
 * Template Name: Full-width, no sidebar
 * Description: A full-width template with no sidebar
 *
 * @package WordPress
 * @subpackage Invictus
 */

get_header(); ?>
<?php 
// get the password protected login template part
if ( post_password_required() ) {
	get_template_part( 'includes/page', 'password.inc' );
} else {
?>
		<div id="primary" class="template-fullsize">
			
			<div id="content" role="main" class="clearfix">

				<?php the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

			</div><!-- #content -->
		</div><!-- #primary -->
<?php } ?>
<?php get_footer(); ?>