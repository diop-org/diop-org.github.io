	
	<div class="clear"></div>
	<?php if(is_active_sidebar('sidebar-footer-left') or is_active_sidebar('sidebar-footer-center') or is_active_sidebar('sidebar-footer-right')) : ?>
		<div class="bottombar">
			<ul id="bottombar_left">
				<?php dynamic_sidebar('sidebar-footer-left'); ?>
			</ul>
			<ul id="bottombar_right">
				<?php dynamic_sidebar('sidebar-footer-right'); ?>
			</ul>
			<ul id="bottombar_center">
				<?php dynamic_sidebar('sidebar-footer-center'); ?>
			</ul>
			<div class="clear"></div>
		</div>
		<?php endif; ?>
		
	<div id="footer">
		<div id="foot">
			<?php 
				$options = get_option('themezee_options');
				if ( isset($options['themeZee_general_footer']) and $options['themeZee_general_footer'] <> "" ) { 
					echo $options['themeZee_general_footer']; } 
			?>
			<div class="credit_link">Theme by <a href="<?php echo THEMEZEE_INFO; ?>">ThemeZee.com</a></div>
			<div class="clear"></div>
		</div>
	</div>
</div>
	<?php wp_footer(); ?>
</body>
</html>