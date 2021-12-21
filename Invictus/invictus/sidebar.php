<?php
/**
 * @package WordPress
 * @subpackage Invictus
 */
?>
	<div id="sidebar">

		<?php if ( is_active_sidebar( 'sidebar-main' ) ) : ?>
		<div id="sidebar-main" class="widget-area" role="complementary">
			<?php	/* Widgetised Area */	if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('sidebar-main') ) ?>
		</div><!-- #tertiary .widget-area -->
		<?php endif; ?>
			
	</div>