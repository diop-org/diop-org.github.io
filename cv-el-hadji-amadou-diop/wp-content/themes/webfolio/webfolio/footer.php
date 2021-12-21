</div>
	<!-- end content -->
</div>
<!-- end wrapper -->
<!-- begin footer -->
<div id="footer">
		<div id="innerFooter">
		<?php 
		/* Widgetized sidebar */
		if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer') ) : ?>					
		<?php endif; ?>
		<?php if(get_option('webfolio_social_widget') == "yes") {?>
				<div class="footerBox"><h2>Social Networking</h2>
					<ul id="social">
						<?php if(get_option('webfolio_twitter_link')<>""){?>
							<li class="twitter"><strong>Twitter</strong><br /><a href="<?php echo get_option('webfolio_twitter_link');?>"><?php echo get_option('webfolio_twitter_link');?></a></li>
						<?php }?>
						<?php if(get_option('webfolio_facebook_link')<>""){?>
						<li class="facebook"><strong>Facebook</strong><br /><a href="<?php echo get_option('webfolio_facebook_link');?>"><?php echo get_option('webfolio_facebook_link');?></a></li>
						<?php }?>
						<?php if(get_option('webfolio_flickr_link')<>""){?>
						<li class="flickr"><strong>Flickr</strong><br /><a href="<?php echo get_option('webfolio_flickr_link');?>"><?php echo get_option('webfolio_flickr_link');?></a></li>
						<?php }?>
						<?php if(get_option('webfolio_linkedin_link')<>""){?>
						<li class="linkedin"><strong>Linkedin</strong><br /><a href="<?php echo get_option('webfolio_linkedin_link');?>"><?php echo get_option('webfolio_linkedin_link');?></a></li>
						<?php }?>
					</ul>
				
				</div>
			<?php }?>
			<div id="copy">&copy; 2009 Webfolio. All Right Reserved.</div>
			<?php if ( function_exists( 'wp_nav_menu' ) ){
				wp_nav_menu( array( 'theme_location' => 'footer-links', 'container_id' => 'footerMenu', 'fallback_cb'=>'footerlinks') );
				}else{
					footerlinks();
				}?>
			<div id="site5bottom"><a href="http://www.site5.com/p/php-hosting/">PHP Web Hosting</a></div>
		</div>
		
</div>
<!-- end footer -->
<?php if (get_option('webfolio_analytics') <> "") { 
		echo stripslashes(stripslashes(get_option('webfolio_analytics'))); 
	} ?>
<?php wp_footer(); ?>
</body>
</html>
