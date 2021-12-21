<?php
/**
 * @package Lazy Sunday
 */
?>

<ul id="sidebar-3" class="sidebar">

<?php if ( !dynamic_sidebar( __( 'Footer Sidebar 3' , 'lazy-sunday' ) ) ) : ?>
	<li id="meta" class="widget">
	 <h2 class="widgettitle"><?php _e( 'Meta' , 'lazy-sunday' ) ?></h2>
	 <ul>
	         <?php wp_register(); ?>
	         <li><?php wp_loginout(); ?></li>
	         <?php wp_meta(); ?>
	 </ul>
	</li>
	<li id="search" class="widget widget_search">
		<?php get_search_form(); ?>
	</li>
<?php endif; ?>

</ul> 