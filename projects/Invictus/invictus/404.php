<?php
/**
 * 404 Page
 *
 * @package WordPress
 * @subpackage Invictus
 * @since Invictus 1.0
 */

get_header(); ?>

<div id="single-page" class="gallery right-sidebar">

		<div id="primary">

			<article id="post-0" class="post error404 not-found">

				<header class="entry-header">
						
					<h1 class="entry-title"><?php _e( 'Sorry, this page was not found!', 'invictus' ); ?></h1>
					<h2 class="entry-description"><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for.', 'invictus' ); ?></h2>
				
				</header><!-- .entry-header -->

			</article><!-- #post-0 -->

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>