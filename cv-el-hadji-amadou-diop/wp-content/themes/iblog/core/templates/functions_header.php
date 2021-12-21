<?php

// This file has all the html used in the site header

add_action('init', 'do_global_javascript');
function do_global_javascript(){
	wp_enqueue_script("jquery"); 
	if ( is_single() ) wp_enqueue_script( 'comment-reply' ); // This makes the comment box appear where the ‘reply to this comment’ link is  
}

// Title and External Script Integration
add_action('wp_head', 'do_pagelines_title');
function do_pagelines_title(){?>		
	<?php if( pagelines_bbpress_forum() ):?>
		<title><?php bb_title() ?></title>
	<?php else:?>
		<title><?php if(is_front_page()) { echo SITENAME; } else { wp_title(''); } ?></title>
	<?php endif;?>
<?php }

// Meta Images e.g. Favicon, Apple Images
add_action('wp_head', 'do_pagelines_meta');
function do_pagelines_meta(){?>
	<?php if(pagelines('favicon')):?><link rel="shortcut icon" href="<?php echo pagelines('favicon');?>" type="image/x-icon" /><?php endif;?>
	<?php if(pagelines('touchicon')):?><link rel="apple-touch-icon" href="<?php echo pagelines('touchicon');?>" /><?php endif;?>

	<?php if( pagelines_bbpress_forum() ): // Load bbPress headers ?>
		<?php bb_feed_head(); ?>
		<?php bb_head(); ?>
		<link rel="stylesheet" href="<?php bb_stylesheet_uri(); ?>" type="text/css" />
	<?php endif;?>
	
	<meta name="generator" content="WordPress <?php bloginfo('version'); // For stats in WordPress ?>" /> 
	
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="all" />
	<?php if(VPRO):?><link rel="stylesheet" href="<?php echo PRO_CSS.'/pro.css';?>" type="text/css" media="screen" /><?php endif; ?>
	<?php get_template_part ('library/_dcss'); ?>	
<?php }

add_action('pagelines_code_after_head', 'pagelines_headerscripts');
function pagelines_headerscripts(){
	e_pagelines('headerscripts');
}	

add_action('pagelines_code_before_html', 'pagelines_postheaderscripts');
function pagelines_postheaderscripts(){
	e_pagelines('asynch_analytics'); 
}
	
// Fix IE issues to the extent possible...
function pagelines_fix_ie($imagestofix = ''){?>
	<?php if(pagelines('google_ie')):?>
	<!--[if lt IE 8]>
		<script src="http://ie7-js.googlecode.com/svn/version/2.0(beta3)/IE8.js" type="text/javascript"></script>
	<![endif]-->
	<?php endif;?>

	<!--[if IE 6]>
		<link rel="stylesheet" href="<?php echo THEME_CSS.'/ie6.css';?>" type="text/css" media="screen" />
		<script  type="text/javascript"  src="<?php echo CORE_JS; ?>/belatedpng.js"></script>
		<script>
		  DD_belatedPNG.fix('<?php echo $imagestofix;?>');
		 </script>
	<![endif]-->
<?php } 

?>