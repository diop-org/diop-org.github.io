<?php

// IF PRO VERSION
	if(file_exists(TEMPLATEPATH.'/pro/init_pro.php')){
		// Theme
		define('VPRO',true);
		define('THEMENAME','iBlogPro');
		define('THEMENAMESHORT','iBlogPro');
		
	}else{ 
		define('THEMENAME','iBlog');
		define('THEMENAMESHORT','iBlog');
		define('PROVERSION','iBlogPro');		
		define('PROBUY','http://www.pagelines.com/launchpad/signup.php?price_group=101&product_id=8&hide_paysys=paypal_r');
		define('PROVERSIONDEMO','http://www.pagelines.com/demos/iblogpro');
		define('PROVERSIONOVERVIEW','http://www.pagelines.com/themes/iblogpro');
		define('VPRO',false);
	}

// IF DEVELOPER VERSION
	if(file_exists(TEMPLATEPATH.'/dev/init_dev.php'))
		define('VDEV',true);
	else define('VDEV',false);
	
// MEDIA DIMENSIONS
	define('FMEDIAWIDTH','460px');
	define('FMEDIAHEIGHT','350px');
	define('HMEDIAWIDTH','540px');

	define('FBOXMEDIAWIDTH','265px');
	define('SIDEBARMEDIAWIDTH','275px');
	define('ENTRYMEDIAWIDTH','600px');

?>