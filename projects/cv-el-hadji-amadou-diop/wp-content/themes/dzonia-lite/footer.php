</div>
<!--End Container-->
<!--Start Footer Wrapper-->
<div class="footer_wrapper">
  <div class="footer_line"></div>
  <!--Start Container-->
  <div class="container_24">
    <div class="grid_24">
      <?php
	/* A sidebar in the footer? Yep. You can can customize
	 * your footer with four columns of widgets.
	 */
	get_sidebar( 'footer' );
?>
    </div>
    <div class="clear"></div>
  </div>
  <!--End Container-->
  <div class="footer_glow"></div>
  <!--Start Footer bottom-->
  <div class="footer_bottom">
    <!--Start Container-->
    <div class="container_24">
      <div class="grid_24">
        <!--Start footer bottom inner-->
        <div class="footer_bottom_inner">
            <span class="footer_desc"><?php echo get_bloginfo ( 'description' ); ?></span>
          <ul class="social_logos">
            <?php if ( inkthemes_get_option('inkthemes_linked') !='' ) {  ?>
            <li class="linkedin"><a href="<?php echo inkthemes_get_option('inkthemes_linked'); ?>"><span></span></a></li>
            <?php }  else {}  ?>
            <?php if ( inkthemes_get_option('inkthemes_flickr') !='' ) {  ?>
            <li class="flickr"><a href="<?php echo inkthemes_get_option('inkthemes_flickr'); ?>"><span></span></a></li>
            <?php }  else {}  ?>
            <?php if ( inkthemes_get_option('inkthemes_facebook') !='' ) {  ?>
            <li class="facebook"><a href="<?php echo inkthemes_get_option('inkthemes_facebook'); ?>"><span></span></a></li>
            <?php }  else {}  ?>
            <?php if ( inkthemes_get_option('inkthemes_digg') !='' ) {  ?>
            <li class="digg"><a href="<?php echo inkthemes_get_option('inkthemes_digg'); ?>"><span></span></a></li>
            <?php }  else {}  ?>
            <?php if ( inkthemes_get_option('inkthemes_youtube') !='' ) {  ?>
            <li class="youtube"><a href="<?php echo inkthemes_get_option('inkthemes_youtube'); ?>"><span></span></a></li>
            <?php }  else {}  ?>
            <?php if ( inkthemes_get_option('inkthemes_twitter') !='' ) {  ?>
            <li class="twitter"><a href="<?php echo inkthemes_get_option('inkthemes_twitter'); ?>"><span></span></a></li>
            <?php }  else {}  ?>
            <?php if ( inkthemes_get_option('inkthemes_stumble') !='' ) {  ?>
            <li class="stumble"><a href="<?php echo inkthemes_get_option('inkthemes_stumble'); ?>"><span></span></a></li>
            <?php }  else {}  ?>
            <?php if ( inkthemes_get_option('inkthemes_skype') !='' ) {  ?>
            <li class="skype"><a href="<?php echo inkthemes_get_option('inkthemes_skype'); ?>"><span></span></a></li>
            <?php }  else {}  ?>
          </ul>
          <span class="copyright"><a href="http://www.inkthemes.com"><?php _e( 'Dzonia - Wordpress Theme by InkThemes.com', 'dzonia' ); ?></a></span>
             </div>
        <!--End Footer bottom inner-->
      </div>
    </div>
    <!--End Container-->
  </div>
  <!--End Footer bottom-->
</div>
<!--End Footer Wrapper-->
</div>
<!--End body wrapper-->
<div class="bottom_cornor"></div>
</div>
<?php wp_footer(); ?>
</body></html>