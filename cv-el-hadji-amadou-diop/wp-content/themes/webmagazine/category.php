<?php

/**

 * The template for displaying Category Archive pages.

 *

 * @package WordPress

 * @subpackage webmagazine 1.0

 

 */

?>



<?php get_header(); ?>

<?php if ( function_exists('yoast_breadcrumb') ) {
	yoast_breadcrumb('<p id="breadcrumbs">','</p>');
} ?>

		<div id="container">

			<div id="content" role="main">
				



				<?php

					printf( __( 'Category Archives: %s', 'webmagazine' ), '<span>' . single_cat_title( '', false ) . '</span>' );

				?>

				<?php

					$category_description = category_description();

					if ( ! empty( $category_description ) )

						echo '<div class="archive-meta">' . $category_description . '</div>';



				/* Run the loop for the category page to output the posts.

				 * If you want to overload this in a child theme then include a file

				 * called loop-category.php and that will be used instead.

				 */

				get_template_part( 'loop', 'category' );

				?>



			</div><!-- #content -->

		</div><!-- #container -->



<?php get_sidebar(); ?>

<?php get_footer(); ?>

