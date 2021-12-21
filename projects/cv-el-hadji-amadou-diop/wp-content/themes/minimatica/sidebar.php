<?php
/**
 * The Right Sidebar
 *
 * @package WordPress
 * @subpackage Minimatica
 * @since Minimatica 1.0
 */
?>

<div id="sidebar" class="widget-area" role="complementary">
	<?php if( is_active_sidebar( 1 ) ) : ?>
		<?php dynamic_sidebar( 1 ); ?>
	<?php else : ?>
		<?php the_widget( 'WP_Widget_Search' ); ?>
		<?php the_widget( 'Minimatica_Ephemera_Widget', array( 'title' => 'Asides' ) ); ?>
		<?php the_widget( 'WP_Widget_Pages', array(  ) ); ?>
	<?php endif; ?>
</div><!-- #sidebar -->