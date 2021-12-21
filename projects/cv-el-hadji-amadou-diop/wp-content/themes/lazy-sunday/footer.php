<?php
/**
 * @package Lazy Sunday
 */
?>
</div> <!-- end div.wrapper -->
<div class="footer-wrapper">
	<div class="footer-sidebar-wrapper">
		<?php get_sidebar('1'); 
			  get_sidebar('2');
			  get_sidebar('3');
		?>
	</div>
	<div class="footer-colophon">
		<a href="http://www.carolinemoore.net" target="_blank"><?php _e( 'Lazy Sunday Theme by Caroline Moore' , 'lazy-sunday' ); ?></a> | 
		<?php _e( 'Copyright' , 'lazy-sunday' ); ?> <?php echo date('Y'); ?> <?php bloginfo('name'); ?> | 
		<?php _e( 'Powered by' , 'lazy-sunday' ); ?> <a href="http://www.wordpress.org" target="_blank"><?php _e( 'WordPress' , 'lazy-sunday' ); ?></a>
	</div>
</div>

<?php wp_footer(); ?>

</body>
</html>

		
