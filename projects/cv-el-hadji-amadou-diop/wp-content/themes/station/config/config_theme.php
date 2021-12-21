<?php

// IF PRO VERSION
	if(file_exists(TEMPLATEPATH.'/pro/init_pro.php')){
		// Theme
		define('VPRO',true);
		define('THEMENAME','StationPro');
		define('THEMENAMESHORT','StationPro');
		
	}else{ 
		define('THEMENAME','Station');
		define('THEMENAMESHORT','Station');
		define('PROVERSION','Station');
		define('PROVERSIONDEMO','http://www.pagelines.com/demos/stationpro');
		define('PROVERSIONOVERVIEW','http://www.pagelines.com/themes/stationpro');
		define('PROBUY', 'http://www.pagelines.com/launchpad/signup.php?price_group=105&product_id=21&hide_paysys=paypal_r');
		define('VPRO',false);
	}

// IF DEVELOPER VERSION
	if(file_exists(TEMPLATEPATH.'/dev/init_dev.php'))
		define('VDEV',true);
	else define('VDEV',false);
	
// MEDIA DIMENSIONS
	define('FMEDIAWIDTH','610px');
	define('FMEDIAHEIGHT','340px');
	define('HMEDIAWIDTH','520px');
	
	define('THUMBWIDTH','200px');

	define('FBOXMEDIAWIDTH','265px');
	define('SIDEBARMEDIAWIDTH','275px');
	define('ENTRYMEDIAWIDTH','600px');

?>