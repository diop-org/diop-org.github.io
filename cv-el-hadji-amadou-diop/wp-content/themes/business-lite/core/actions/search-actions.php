<?php
/**
* Search actions used by Business lite
*
* Author: Tyler Cunningham
* Copyright: © 2012
* {@link http://cyberchimps.com/ CyberChimps LLC}
*
* Released under the terms of the GNU General Public License.
* You should have received a copy of the GNU General Public License,
* along with this software. In the main directory, see: /licensing/
* If not, see: {@link http://www.gnu.org/licenses/}.
*
* @package Business lite
* @since 3.0
*/

/**
* Business search actions
*/
add_action( 'business_search', 'business_search_content' );

/**
* Search results output
*
* @since 3.0
*/
function business_search_content() { 
	global $options, $themeslug;
	$results = apply_filters( 'business_search_results_message', 'Search Results For: %s' ); 
	$noresults = apply_filters( 'business_no_search_results_message', 'No posts found.' ); ?>
	
	<div id="content_left">
		<div class="content_padding">

		<?php if (have_posts()) : ?>

		<h3><?php printf( __( $results ), '<span>' . get_search_query() . '</span>' ); ?></h3><br />

		<?php while (have_posts()) : the_post(); ?>
		
		<div class="post_container">

			<div <?php post_class() ?> id="post-<?php the_ID(); ?>">

				<h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
				<?php get_template_part('meta', 'search' ); ?>

				<div class="entry">

					<?php 
						if ($options->get($themeslug.'_search_show_excerpts') == '1') {
							the_excerpt();
						}
						else {
							the_content();
						}
					 ?>

				</div>

			</div>

		</div><!--end post_container-->
		<?php endwhile; ?>

		<?php business_pagination(); ?>

	<?php else : ?>

		<h2><?php printf( __( $noresults, 'business' )) ; ?></h2>
			<?php printf( __( 'Try your search again', 'business' )); ?>
			<?php get_search_form(); ?>

	<?php endif; ?>
		</div><!--end content_padding-->
	</div><!--end content_left--><?php
}

/**
* End
*/

?>