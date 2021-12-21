<?php


	register_sidebar(array(
	'name'=>'main_sidebar',
	'description' => __('The main sidebar for the theme.', TDOMAIN), 
	    'before_widget' => '<div id="%1$s" class="%2$s widget"><div class="winner">',
	    'after_widget' => '&nbsp;</div></div>',
	    'before_title' => '<h3 class="wtitle">',
	    'after_title' => '&nbsp;</h3>'
	));



if(VPRO == 1) { include(PRO.'/sidebars_pro.php'); }

?>