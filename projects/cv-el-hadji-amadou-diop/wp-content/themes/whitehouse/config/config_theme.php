<?php

// IF PRO VERSION
	if(file_exists(TEMPLATEPATH.'/pro/init_pro.php')){
		// Theme
		define('VPRO',true);
		define('THEMENAME','WhiteHousePro');
		define('THEMENAMESHORT','WhiteHousePro');
		
	}else{ 
		define('THEMENAME','WhiteHouse');
		define('THEMENAMESHORT','WhiteHouse');
		define('PROVERSION','WhiteHousePro');
		define('PROVERSIONDEMO','http://www.pagelines.com/demos/whitehousepro');
		define('PROVERSIONOVERVIEW','http://www.pagelines.com/themes/whitehousepro');
		define('PROBUY', 'http://www.pagelines.com/launchpad/signup.php?price_group=103&product_id=10&hide_paysys=paypal_r');
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