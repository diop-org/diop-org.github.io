<?php
/**
 * The footer Template
 *
 * @package WordPress
 * @subpackage minimatica
 * @since Minimatica 1.0
 */
 ?>
 		<footer id="footer">
			<?php get_sidebar( 'footer' ); ?>
 			<nav id="access" role="navigation">
 				<?php wp_nav_menu( array( 'theme_location'  => 'primary_nav', 'container_id' => 'primary-nav', 'container_class' => 'nav', 'fallback_cb' => 'minimatica_nav_menu' ) ); ?>
			</nav><!-- #access -->
		</footer><!-- #footer -->
	</div><!-- #wrapper -->
	<?php wp_footer(); ?>
</body>
</html>