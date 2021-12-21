<?php
/*
Copyright (c) 2010 MobilizeToday.com, Mobile Web Solutions Inc.

Support: http://www.mobilizetoday.com/wordpress-themes/mobius/

This file is part of the Mobius WordPress Theme.
*/
?>

				</div>
				<a name="skip-to-nav"></a>

				<div id="mobile-navigation">
				<ul>
					<?php wp_list_pages('title_li='); ?>
				</ul>
				<div class="mobile-search">

					<form action="<?php echo get_option('home');?>/">
						<fieldset>
							<div><input type="submit" value="" class="submit" /> <input type="text" name="s" value="SEARCH" /> </div>
						</fieldset>
					</form>
				</div>
				</div>


			</div>
		</div>

		<div class="sidebar sl">
		
			<?php get_sidebar(); ?>

		</div>
		
		</div>

	</div>
	<div id="footer">
		<strong class="mobile-optimized" title="This page is optimized for mobile phones">Optimized for mobile devices</strong>
		<p>Powered by <a href="http://wordpress.org" title="WordPress.org">WordPress</a></p>
		<p><em>Design &amp; development by</em> <a id="mobilizetoday" href="http://www.mobilizetoday.com">MobilizeToday.com</a></p>
	</div>
<?php wp_footer(); ?>
	<script type="text/javascript">
		var path = "<?php bloginfo('url');?>";
	</script>
</body>
</html>