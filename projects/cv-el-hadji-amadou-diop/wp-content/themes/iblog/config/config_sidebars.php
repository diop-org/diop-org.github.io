<?php


	register_sidebar(array(
	'name'=>'main_sidebar',
	'description' => __('An option for the main sidebar. Graphical style: solid white/grey widgets with rounded corners.', TDOMAIN), 
	    'before_widget' => '<div id="%1$s" class="%2$s widget"><div class="winner">',
	    'after_widget' => '&nbsp;</div></div>',
	    'before_title' => '<h3 class="wtitle">',
	    'after_title' => '&nbsp;</h3>'
	));



if(VPRO) { get_template_part('pro/sidebars_pro'); }


// Register Menu Positions

add_action( 'init', 'pagelines_register_menus' );
function pagelines_register_menus(){
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', TDOMAIN ),
		'footer_nav' => __( 'Footer Navigation', TDOMAIN ),
		'footer_social' => __( 'Footer Social Links', TDOMAIN ),
	) );
}

?>