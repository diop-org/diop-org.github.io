<?php
/**
 * The Footer Sidebar
 *
 * @package WordPress
 * @subpackage minimatica
 * @since Minimatica 1.0
 */
?>

<?php if( is_active_sidebar( 2 ) ) : ?>
	<div id="footer-area" class="widget-area" role="complementary">
		<?php dynamic_sidebar( 2 ); ?>
		<div class="clear"></div>
	</div><!-- #footer-area -->
<?php endif; ?>