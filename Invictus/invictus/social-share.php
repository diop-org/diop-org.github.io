<?php
		/*-----------------------------------------------------------------------------------*/
		/*  Social Sharing
		/*-----------------------------------------------------------------------------------*/		
		// Check if social sharing is activated and get the needed Scripts
		
		if( get_option_max("post_social") == 'true' && ( 	
				get_option_max( "post_social_facebook" ) == 'true' || 
				get_option_max( "post_social_twitter" ) == 'true' || 
				get_option_max( "post_social_google" ) == 'true' 
			) 
		){			
		?>
		<div class="clearfix entry-share">
			
			<div class="share-text">
				<?php get_option_max( "post_social_text", true ) ?>
			</div>
			
			<?php if( get_option_max( "post_social_facebook" ) == 'true' ) { // Check if facebook like should be shown ?>			
			<!-- Facebook like -->
			<div id="fb-root"></div>
			<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) {return;}
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/<?php get_option_max('post_social_language', true) ?>/all.js#xfbml=1";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
			</script>		
			<div class="share-button share-facebook">
				<fb:like href="<?php echo get_permalink() ?>" send="false" layout="button_count" show_faces="false" font="tahoma"></fb:like>
			</div>
			<?php } ?>
			
			<?php if( get_option_max( "post_social_twitter" ) == 'true' ) { // check if twitter should be shown ?>
			<!-- Twitter -->	
			<div class="share-button share-twitter">
				<script src="http://platform.twitter.com/widgets.js" type="text/javascript"></script>
				<a href="http://twitter.com/share?url=<?php echo get_permalink() ?>&amp;text=<?php echo get_the_title() ?> | <?php bloginfo( 'name' ); ?>" class="twitter-share-button" data-lang="en" data-url="<?php echo get_permalink() ?>">Tweet</a>
			</div>
			<?php } ?>			
		
			<?php if( get_option_max( "post_social_google" ) == 'true' ) { // check if google+ should be shown ?>
			<!-- Google+ -->
			<div class="share-button share-google-plus">
				<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script> 
				<g:plusone size="medium" href="<?php echo get_permalink() ?>"></g:plusone> 
			</div>
			<?php } ?>			
			
		</div>	
<?php } ?>