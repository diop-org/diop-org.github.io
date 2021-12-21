<div class="clear"></div>
</div>	<!-- end of #main -->

<div id="footer">
<?php $td_footer_widgets = get_option('td_footer_widgets'); if($td_footer_widgets): ?>
	<div id="footer-wrap">
		<?php 	/* Widgetized sidebar, if you have the plugin installed. */
		if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Left') ) : ?>
		<?php endif; ?>

		<?php 	/* Widgetized sidebar, if you have the plugin installed. */
		if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Mid') ) : ?>
		<?php endif; ?>

		<?php 	/* Widgetized sidebar, if you have the plugin installed. */
		if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Right') ) : ?>
		<?php endif; ?>
		<div class="clear"></div>
	</div> <!-- #footer-wrap -->
<?php endif; ?>

	<div id="copyright">
		<p style="float:left;">&copy; Copyright 2010 <?php bloginfo('name'); ?> - All rights reserved</p>
		<p style="float:right;">Powered by <a href="http://www.wordpress.org/">WordPress</a> - Theme by <a href="http://www.tricksdaddy.com">TricksDaddy</a></p>
		<div style="clear:both;"> </div>
	</div> <!-- #copyright -->
</div> <!-- #footer -->

		<!--begin of site tracking-->
			<?php $td_ga_code = get_option('td_ga_code'); echo stripslashes($td_ga_code); ?>
		<!--end of site tracking-->

	</div><!-- #wrapper -->
    <?php wp_footer(); ?>
</body>
</html>