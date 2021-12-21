<!-- IE -->
<?php if(pagelines('google_ie')):?>
<!--[if lt IE 8]>
	<script src="http://ie7-js.googlecode.com/svn/version/2.0(beta3)/IE8.js" type="text/javascript"></script>
<![endif]-->
<?php endif;?>

<!--[if IE 6]>
	<script src="<?php echo CORE_JS;?>/belatedpng.js"></script>
	<script>
	  DD_belatedPNG.fix('.pngbg, a.home, #nav,.searchform .left, .searchform .right, .searchform .s, .fcol_pad img, .fbox img, #respond h3, #cred.pagelines a, .post .date, .headerimage, #sidebar div ul li a');
	 </script>	
	<style>
		#header #blogtitle .sheen {display: none;height: 1px;}
		#featurenav a span.nav_thumb span.nav_overlay {background: transparent;display:none}
		 #nav ul li {background: transparent}
		.fbox {overflow:hidden}
	</style>
<![endif]-->