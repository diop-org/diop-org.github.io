<?php
/**
 * @package Lazy Sunday
 */
?>

<ul id="sidebar-1" class="sidebar">

<?php if ( !dynamic_sidebar( __( 'Footer Sidebar 1' , 'lazy-sunday' ) ) ) : ?>
	<li id="pages" class="widget">
	<h2 class="widgettitle"><?php _e( 'Pages' , 'lazy-sunday' ) ?></h2>
		<ul>
			<?php wp_list_pages('title_li='); ?>
		</ul>
	</li>
<?php endif; ?>

</ul> 