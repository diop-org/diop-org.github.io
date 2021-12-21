<?php
if ( is_front_page())
{
	if ( mframe_option( 'front-on' ))
		get_template_part( 'template', 'home' );
	else
		get_template_part( 'index' );
}
else
	get_template_part( 'index' );
?>