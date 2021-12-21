<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage FreeDream 2010
 */
?>

	</div><!-- #main -->

	<div id="footer" role="contentinfo">
		<div id="colophon">

<?php
	/* A sidebar in the footer? Yep. You can can customize
	 * your footer with four columns of widgets.
	 */
	get_sidebar( 'footer' );
?>
</div><!-- #colophon -->

</div><!-- #container -->
</div><!-- #wrapper -->
<!-- #site-generator -->
<footer id="general">
			<!-- If you'd like to support WordPress, having the "powered by" link somewhere on your blog is the best way; it's our only promotion or advertising. --> 
			<ul>
				<li>&copy; <?php bloginfo('name'); ?>.</li>
				<li><a href="<?php bloginfo('rss2_url'); ?>"><?php esc_attr_e( 'Post' ); ?>(RSS)</a> & <a href="<?php bloginfo('comments_rss2_url'); ?>"><?php esc_attr_e( 'Comments' ); ?>(RSS)</a></li>

                <!-- I would be really grateful if you do not remove the link bellow -->
                <li><a href="http://wptema.xconsult.dk/freedream2010/" title="Download the Freedream 2010 Theme here!">FreeDream 2010 <?php esc_attr_e( 'Theme' ); ?> by m@dzzoni.dk</a> </li>
                <li><a href="http://wordpress.org/" title="<?php esc_attr_e('Semantic Personal Publishing Platform', 'freedream2010'); ?>" rel="generator">
					<?php printf( __('Proudly powered by %s.', 'freedream2010'), 'WordPress' ); ?></a></li>
</ul>
		</footer>
	<!-- End of #site-generator -->	
	</div><!-- #footer -->



<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
</body>
</html>
