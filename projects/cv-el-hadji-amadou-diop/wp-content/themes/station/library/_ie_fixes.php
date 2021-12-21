<!-- IE -->
<?php if(pagelines('google_ie')):?>
<!--[if lt IE 8]>
	<script src="http://ie7-js.googlecode.com/svn/version/2.0(beta3)/IE8.js" type="text/javascript"></script>
<![endif]-->
<?php endif;?>
	<!--[if IE 6]>
		<link rel="stylesheet" href="<?php echo THEME_CSS.'/ie6.css';?>" type="text/css" media="screen" />
	<![endif]-->
	<!--[if IE 6]>
		<script  type="text/javascript"  src="<?php echo CORE_JS; ?>/belatedpng.js"></script>
		<script>
		  DD_belatedPNG.fix('.pngbg, .headline a img,.fboxdividers, #morefootbg, #searchform .submit .fboxtext img, .icons a, .pagelines img, .post-footer .left span, .twitter, .hentry,  #subhead');
		 </script>	
	<![endif]-->	