<?php 

/*
	Header
	Authors: Tyler Cunningham, Trent Lapinski
	Creates the theme header. 
	Copyright (C) 2011 CyberChimps
	Version 2.0
*/

/* Call globals. */	

	global $themename, $themeslug, $options;
	
/* End globals. */
	
?>
	<?php synapse_head_tag(); ?>

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?> <!-- wp_enqueue_script( 'comment-reply' );-->
<?php wp_head(); ?> <!-- wp_head();-->
	
</head><!-- closing head tag-->

<!-- Begin @synapse after_head_tag hook content-->
	<?php synapse_after_head_tag(); ?>
<!-- End @synapse after_head_tag hook content-->
	
<!-- Begin @synapse before_header hook  content-->
	<?php synapse_before_header(); ?> 
<!-- End @synapse before_header hook content -->
			
<header>		
	<?php
		foreach(explode(",", $options->get('header_section_order')) as $fn) {
			if(function_exists($fn)) {
				call_user_func_array($fn, array());
			}
		}
	?>
</header>

<!-- Begin @synapse after_header hook -->
	<?php synapse_after_header(); ?> 
<!-- End @synapse after_header hook -->
