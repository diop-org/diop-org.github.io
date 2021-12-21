<?php
/**
 * @package Lazy Sunday
 */
?>

<ul id="sidebar-2" class="sidebar">

<?php if ( !dynamic_sidebar( __( 'Footer Sidebar 2' , 'lazy-sunday' ) ) ) : ?>
	<li id="archives" class="widget">
	<h2 class="widgettitle"><?php _e( 'Archives' , 'lazy-sunday' ) ?></h2>
		<ul>
			<?php wp_get_archives( 'type=monthly' ); ?>
		</ul>
	</li>

<?php endif; ?>

</ul> 