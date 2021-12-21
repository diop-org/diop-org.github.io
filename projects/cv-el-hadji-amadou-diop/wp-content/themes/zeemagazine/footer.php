	<div class="clear"></div>
		
	<div id="footer">

		<?php if(is_active_sidebar('sidebar-footer')) : ?>
		<div id="bottombar">
			<ul>
				<?php dynamic_sidebar('sidebar-footer'); ?>
			</ul>
			<div class="clear"></div>
		</div>
		<?php endif; ?>

		<div id="foot">
			<div id="foot_left">
				<?php 
					$options = get_option('themezee_options');
					if ( isset($options['themeZee_general_footer']) and $options['themeZee_general_footer'] <> "" ) { 
						echo $options['themeZee_general_footer']; } 
				?>
			</div>
			<div id="foot_right">
				<div class="credit_link">Theme by <a href="<?php echo THEMEZEE_INFO; ?>">ThemeZee</a></div>
			</div>
			<div class="clear"></div>
		</div>
		

	</div>
</div>
	
<?php wp_footer(); ?>

</body>
</html>