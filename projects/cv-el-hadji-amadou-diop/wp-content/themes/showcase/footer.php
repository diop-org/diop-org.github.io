	<footer>
		<div id="footer-wrap">
			<div id="footer" class="row">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer') ) : ?>
				<div class="widget column grid_4">
					<div class="inner">
						<h2>This Footer is Widgetized</h2>
						<p>
							Add some widgets to get started.
						</p>
 					</div>
				</div>
			<?php endif; ?>
			</div>
		</div>
		<div id="credit-wrap">
		  <div id="credit" class="row">
			  <div class="column grid_6">
			    <?php echo ((get_option( 'sc_footer_text' )) ? get_option( 'sc_footer_text' ) : "&nbsp;") ?>
			  </div>
				<div class="column grid_6 aright">
					<p>Showcase Theme by <a href="http://www.midphase.com/projects/themes/">MidPhase</a>.</p>
				</div>
			</div>
	  </div>
	</footer>
	<?php wp_footer(); ?>
</body>
</html>
