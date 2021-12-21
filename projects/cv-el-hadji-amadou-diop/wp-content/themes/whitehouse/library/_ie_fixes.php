<!-- IE -->
<?php if(pagelines('google_ie')):?>
<!--[if lt IE 8]>
	<script src="http://ie7-js.googlecode.com/svn/version/2.0(beta3)/IE8.js" type="text/javascript"></script>
<![endif]-->
<?php endif;?>
<!--[if IE 6]>
	<link rel="stylesheet" href="<?php echo THEME_CSS.'/ie6.css';?>" type="text/css" media="screen" />
	<script  type="text/javascript"  src="<?php echo THEME_JS; ?>/belatedpng.js"></script>
	<script>
	  DD_belatedPNG.fix('.pngbg, .welcometext, .icons a, .containershadow, .fboxdividers, #morefootbg, .plimage, .post-footer .left span, #welcome');
	 </script>	
<![endif]-->