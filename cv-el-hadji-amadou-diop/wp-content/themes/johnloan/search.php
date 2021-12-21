<?php
/**
 * @package WordPress
 * @subpackage JohnLoan
 */

get_header(); ?>

		<section id="primary">
			<div id="content" role="main">

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'johnloan' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				</header>

				<?php johnloan_content_nav( 'nav-above' ); ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>				

					<?php get_template_part( 'content', 'search' ); ?>

				<?php endwhile; ?>

				<?php johnloan_content_nav( 'nav-below' ); ?>

			<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'johnloan' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'johnloan' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>

			</div><!-- #content -->
			
			<?php get_sidebar(); ?>			
		</section><!-- #primary -->

<?php get_footer(); ?>