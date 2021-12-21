<?php
if ( mframe_option( 'layout' ) !== 'wide' ) :

echo '<div id="side" class="widgetized">';

if( mframe_option( 'adbox-side-position' ) == 'top' )
	mframe_display( 'ads', 'side' );

if( !dynamic_sidebar( 'sidebar' ) )
{
	mframe_widget( 'posts', array( 'type' => 'comment_count' ));
	
	mframe_widget( 'comments' );
	
	mframe_widget( 'search' );
	
	mframe_widget( 'archives' );
}

if( mframe_option( 'adbox-side-position' ) == 'bottom' )
	mframe_display( 'ads', 'side' );

echo '</div>';

endif;
?>