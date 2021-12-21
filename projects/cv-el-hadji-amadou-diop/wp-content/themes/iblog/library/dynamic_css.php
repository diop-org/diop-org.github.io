<?php


// ================================
// = Hook Up Dynamic Stylesheets =
// ================================
add_action('wp_print_styles', 'dynamic_css');

function dynamic_css() {

	global $pagelines_ID;
	if(VPRO){
		if ( file_exists( PAGELINES_PRO . '/css/pro.css') ) {
		    wp_register_style('pro', PRO_CSS . '/pro.css');
		    wp_enqueue_style( 'pro');
		}
		
		if ( file_exists( PAGELINES_PRO . '/css/color_black.css') && pagelines('colorscheme', $pagelines_ID) == 'black' ) {
			wp_register_style('scheme-black', PRO_CSS . '/color_black.css');
		    wp_enqueue_style( 'scheme-black');
		}
		
		if ( file_exists( PAGELINES_PRO . '/css/color_blue.css') && pagelines('colorscheme', $pagelines_ID) == 'blue' ) {
			wp_register_style('scheme-blue', PRO_CSS . '/color_blue.css');
		    wp_enqueue_style( 'scheme-blue');
		}
	}
	
	if ( file_exists( TEMPLATEPATH . '/css/sidebar_icons.css') && pagelines('sideicons') ) {
	    wp_register_style('sidebar_icons', THEME_CSS . '/sidebar_icons.css');
	    wp_enqueue_style( 'sidebar_icons');
	}
} 
?>
<style type="text/css">

<?php if(pagelines('body_background')):?>
	body{
		background:<?php echo pagelines('body_background');?>;
	}
	#blogtitle .sheen {display:none;}
<?php endif;?>

<?php if(pagelines('primary_header_font')):?>
	h1, h2, #feature .fheading{ font-family: <?php echo pagelines('primary_header_font');?>;}
<?php endif;?>

<?php if(pagelines('secondary_header_font')):?>
	h3, h4, h5 { font-family: <?php echo pagelines('secondary_header_font');?>;}
<?php endif;?>

<?php if(pagelines('entry_image_style')):?>
 	.hentry img{ <?php echo pagelines('entry_image_style');?>;}
<?php endif;?>


<?php if (pagelines('headercolor')):?>
	h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a{color: <?php echo pagelines('headercolor'); ?>;}
<?php endif;?>

<?php if (pagelines('linkcolor')):?>
	a, #blogtitle a:hover, .postdata a:hover,h2.posttitle a:hover, .tags a:hover, .commentlist cite, .commentlist cite a, #morefoot a:hover, #sidebar ul li ul li a, #wp-calendar caption, #subnav .current_page_item a, #subnav .current_page_ancestor a, #subnav li a:hover{color:<?php echo pagelines('linkcolor'); ?>;}
<?php endif;?>

<?php if (pagelines('linkcolor_hover')):?>
	a:hover, .commentlist cite a:hover, #sidebar ul li ul li a:hover,  #subnav .current_page_item a:hover, #subnav .current_page_ancestor a:hover{color:<?php echo pagelines('linkcolor_hover'); ?>;}
<?php endif;?>

	
<?php if (pagelines('metacolor')):?>
	.post-title .metabar em{background:<?php echo pagelines('metacolor');?>;}
<?php endif;?>
<?php if (pagelines('metacolortext')):?>
	.post-title .metabar em{color:<?php echo pagelines('metacolortext');?>;}
<?php endif;?>
<?php if (pagelines('metacolorlink')):?>
	.post-title .metabar em a{color:<?php echo pagelines('metacolorlink');?>;}
<?php endif;?>

<?php if(pagelines('hidesearch')):?>
	#nav ul.main_nav{width: 850px;}
<?php endif;?>

<?php if (pagelines('customcss')):?>
	<?php echo pagelines('customcss');?>
<?php endif;?>

</style>