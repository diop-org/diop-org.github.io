<?php
// ================================
// = Hook Up Dynamic Stylesheets =
// ================================
add_action('wp_print_styles', 'dynamic_css');

function dynamic_css() {
	global $post;
	if(VPRO){
		if ( file_exists( PAGELINES_PRO . '/css/pro.css') ) {
		    wp_register_style('pro', PRO_CSS . '/pro.css');
		    wp_enqueue_style( 'pro');
		}
		
		if ( file_exists( PAGELINES_PRO . '/css/thecolors.css') ) {
			wp_register_style('thecolors', PRO_CSS . '/thecolors.css');
		    wp_enqueue_style('thecolors');
		}
		
	}
	

} 
?>
<style type="text/css">

<?php if (pagelines('linkcolor')):?>
		#contentcontainer .post-excerpt a, #contentcontainer .post-content a, #contentcontainer .hentry a, #contentcontainer .author-info a,#contentcontainer .tags a, #commentform a, #contentcontainer #sidebar a {color:<?php echo pagelines('linkcolor'); ?>;}
<?php endif;?>

<?php if(VPRO):?>
	<?php if(pagelines('hidesearch')):?>
		 	#nav ul{ width: auto;}
	<?php endif;?>
	
	<?php if(pagelines('header_height')):?>
		 	#header{ height: <?php echo pagelines('header_height');?>px;}
	<?php endif;?>
	
	<?php if (pagelines('headercolor')):?>
		h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a{color: <?php echo pagelines('headercolor'); ?>;}
	<?php endif;?>

	<?php if (pagelines('backgroundcolor')):?>
		body {background:<?php echo pagelines('backgroundcolor');?>;}
		
	<?php endif;?>

	
	<?php if (pagelines('metacolor')):?>
		#contentcontainer .metabar em {background:<?php echo pagelines('metacolor');?>;}
	<?php endif;?>
	<?php if (pagelines('metacolortext')):?>
		#contentcontainer .metabar em {color:<?php echo pagelines('metacolortext');?>; text-shadow:none;}
	<?php endif;?>
	<?php if (pagelines('metacolorlink')):?>
		#contentcontainer .metabar em a{color:<?php echo pagelines('metacolorlink');?>; text-shadow:none;}
	<?php endif;?>
	
	<?php if (pagelines('customcss')):?>
		<?php echo pagelines('customcss');?>
	<?php endif;?>
<?php endif;?>
</style>