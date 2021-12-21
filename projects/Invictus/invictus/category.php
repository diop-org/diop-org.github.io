<?php
/**
 * Category Template
 *
 * @package WordPress
 * @subpackage Invictus
 * @since Invictus 1.0
 */

get_header(); 

$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

$page = get_post($pageID);

$category = get_the_category();

?>

<div id="single-page" class="clearfix blog left-sidebar">

		<div id="primary">

				<header class="page-header">

					<h1 class="page-title"><?php
						printf( __( 'Category Archives: %s', 'invictus' ), '<span>' . single_cat_title( '', false ) . '</span>' );
					?></h1>

					<?php $categorydesc = category_description(); if ( ! empty( $categorydesc ) ) echo apply_filters( 'archive_meta', '<h2 class="page-description">' . $categorydesc ); ?>
				</header>

			<div id="content" role="main">		
			
			<?php 
				// including the content template blog-loop.php
				get_template_part( 'blog-loop' );
			?>				
							
			</div><!-- #content -->	
				
		</div><!-- #primary -->

		<div id="sidebar">
			 <?php	/* Widgetised Area */	if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('sidebar-blog') ) ?>		
		</div>
		
</div>
<?php get_footer(); ?>
