<div id="slider" class="wrap">
 <div class="head"></div>
 <div class="body"><?php

if( mframe_option( 'slider-type-flash' ))
{
	?>

  <script type="text/javascript">
	var flashvars = {};
	flashvars.cssSource = "<?php echo get_template_directory_uri() . '/css/flash.css'; ?>";
	flashvars.xmlSource = encodeURIComponent("<?php echo get_template_directory_uri() . '/megaframe/xml/flash.php' . mframe_preview(); ?>");

	var params = {};
	params.play = "true";
	params.menu = "false";
	params.scale = "showall";
	params.wmode = "transparent";
	params.allowfullscreen = "true";
	params.allowscriptaccess = "always";
	params.allownetworking = "all";

	swfobject.embedSWF("<?php echo get_template_directory_uri(); ?>/images/flash.swf", "piecemaker", "939", "385", "10", null, flashvars, params, null);
  </script>

  <div class="slides">
   <div id="piecemaker">
    <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" /></a></p>
   </div>
  </div><?php

}
else
{
	?>

  <script language="javascript" type="text/javascript">
	jQuery(document).ready(function()
	{
		jQuery('.slides').cycle({
			fx		: '<?php mframe_option( 'slider-animation', 1 ); ?>',
			speed	: <?php echo mframe_option( 'slider-speed' ) * 1000; ?>,
			timeout	: <?php echo mframe_option( 'slider-timeout' ) * 1000; ?>,
			next	: '.next',
			prev	: '.prev',
			pager	: '.controls',
			pause	: <?php mframe_option( 'slider-hover-pause', 1 ); ?>,
			randomizeEffects: false
		});
	});
  </script>

  <a href="#" class="prev"></a><a href="#" class="next"></a>
  <div class="slides"><?php
  if ( mframe_option( 'slider-auto-pull' ))
  {
  	$query = new WP_Query( mframe_display( 'slider', 'auto' ));
 	while ( $query->have_posts()) : $query->the_post();

		if ( get_post_meta( get_the_id(), 'video_embed', true ))
			echo '<iframe width="' . mframe_option( 'thumb-large-w' ) . '" height="' . mframe_option( 'thumb-large-h' ) . '" src="http://www.youtube.com/embed/' . get_post_meta( get_the_id(), 'video_embed', true ) . '?rel=0" frameborder="0" allowfullscreen></iframe>';
		else
			mframe_display( 'thumb', array( 'size' => 'large', 'nothumb' => 'large', 'tip' => false ));

  	endwhile; wp_reset_postdata();
  }
  else mframe_display( 'slider', 'custom-jquery' ); ?>
  </div>
  <div class="controls"></div><?php

}
?>

 </div>
 <div class="foot"></div>
</div>