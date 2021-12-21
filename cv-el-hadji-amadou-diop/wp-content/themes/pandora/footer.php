</div><!-- .always-white -->
	</div><!-- .wrapper .hfeed -->

<div id="footer">
	<div id="footer-cover-center">
		<div id="footer-cover">
		</div>
	</div>
	<div class="endof">
		<?php get_sidebar('footer'); ?>
		<div  class="copyright">
			<?php pandora_my_copyright() ?>
		</div><!-- just a dotted line line -->
	</div>
</div><!-- #footer -->

<?php pandora_always_white_bg_content(); pandora_main_menu_animation(); /*pandora_lightbox_switch_on();*/ ?><!-- slider -->
<?php echo stripslashes(pandora_web_statisctics()) ?>
<?php wp_footer() ?>

</body>
</html>