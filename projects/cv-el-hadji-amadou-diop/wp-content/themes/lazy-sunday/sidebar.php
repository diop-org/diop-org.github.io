<?php
/**
 * @package Lazy Sunday
 */
?>

<ul id="sidebar" class="sidebar">

<?php if ( !dynamic_sidebar( __( 'Footer Sidebar' , 'lazy-sunday' ) ) ) : ?>
	<li id="pages" class="widget">
	<h2 class="widgettitle"><?php _e( 'Pages' , 'lazy-sunday' ) ?></h2>
		<ul>
			<?php wp_list_pages('title_li='); ?>
		</ul>
	</li>
	<li id="archives" class="widget">
	<h2 class="widgettitle"><?php _e( 'Archives' , 'lazy-sunday' ) ?></h2>
		<ul>
			<?php wp_get_archives( 'type=monthly' ); ?>
		</ul>
	</li>
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