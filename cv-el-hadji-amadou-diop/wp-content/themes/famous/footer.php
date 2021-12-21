<div id="footer">
 <div class="wrap">
  <div class="block widgetized"><?php
		if ( !dynamic_sidebar( 'footer1' ))
		{
			mframe_widget( 'contact' );
		}
		?></div>
  <div class="block widgetized"><?php
		if ( !dynamic_sidebar( 'footer2' ))
		{
			mframe_widget( 'posts', array( 'type' => 'date', 'count' => 6 ));
		}
		?></div>
  <div class="block widgetized last"><?php
		if ( !dynamic_sidebar( 'footer3' ))
		{
			mframe_widget( 'login' ); mframe_widget( 'search' );
		}
		?>

   <div class="widget one">
    <h3><?php _e( 'Copyright', 'mframe' ); ?></h3>
    <p><?php echo sprintf( 'This site uses valid XHTML 1.0 Strict and CSS. All content Copyright &copy; %s <a href="%s" title="%s">%s</a>. All Rights Reserved.', date( 'Y' ), home_url(), get_bloginfo( 'description' ), get_bloginfo( 'name' )); ?></p>
   </div>
   <a class="logo" href="http://www.megathemes.com/" title="Mega Themes">Mega Themes</a>
  </div>
 </div>
</div>

<?php wp_footer(); ?>

</body>
</html>