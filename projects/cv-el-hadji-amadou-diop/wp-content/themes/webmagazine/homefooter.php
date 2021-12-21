<?php

/**

 * The template for displaying the footer.

 *

 * Contains the closing of the id=main div and all content

 * after.  Calls sidebar-footer.php for bottom widgets.

 *

 * @package WordPress

 * @subpackage webmagazine

 * @since Twenty Ten 1.0

 */

 

?>

	</div><!-- #main -->

</div><!-- .center -->

	<div id="footer" role="contentinfo">

		<div id="colophon">



<?php

	/* A sidebar in the footer? Yep. You can can customize

	 * your footer with four columns of widgets.

	 */

	get_sidebar( 'footer' );

?>



			<div id="site-info" class="footer-area" >
<div class="groove">
</div>
				
<br />
<a href="http://wordpressthememagazine.com/2010/08/25/new-wordpress-magazine-theme/">Webmagazine Theme</a>

				<br />
<a href="http://wordpressthememagazine.com/">By Wordpress Theme Magazine</a>

		
<div id="site-generator" class="footer-area">

				<?php do_action( 'webmagazine_credits' ); ?>

				<a href="<?php echo esc_url( __('http://wordpress.org/', 'webmagazine') ); ?>"

						title="<?php esc_attr_e('Semantic Personal Publishing Platform', 'webmagazine'); ?>" rel="generator">

					<?php printf( __('Powered by %s.', 'webmagazine'), 'WordPress' ); ?>

				</a>

			</div><!-- #site-info -->



			
			</div><!-- #site-generator -->



		</div><!-- #colophon -->

	</div><!-- #footer -->



</div>

</div>

<?php

	/* Always have wp_footer() just before the closing </body>

	 * tag of your theme, or you will break many plugins, which

	 * generally use this hook to reference JavaScript files.

	 */



	wp_footer();

?>


</body>

</html>

