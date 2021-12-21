<?php
/**
 * The Sidebar containing the primary and secondary widget areas.
 *
 * @package WordPress
 * @subpackage FreeDream 2010
 */
?>

		<div id="primary" class="widget-area" role="complementary">

<nav id="sidebar">		 
            <?php get_search_form(); ?>
            
            <div id="rss-img">
            <a href="<?php bloginfo('rss_url'); ?>" id="zone1" title="Subscribe to our RSS"></a>
            </div>
            <!-- #Twitter !! UNCOMMENT THE LINES BELLOW THIS IF YOU WANT TO PROVIDE YOUR TWITTER LINK 
            <div id="twitter-img">
            <a href="http://www.twitter.com/YOUR_TWITTER_NAME HERE" id="zone2" target="_blank" title="Follow me on Twitter"></a>
            </div> -->
    </nav>         

 <?php /* Widgetized sidebar, if you have the plugin installed.
  * The Sidebar containing the primary and secondary widget areas.
  * @package WordPress
  * @subpackage 2010 FreeDream
  * @since Twenty Ten 1.0
 */
?>
			<ul class="xoxo">

<?php
	/* When we call the dynamic_sidebar() function, it'll spit out
	 * the widgets for that widget area. If it instead returns false,
	 * then the sidebar simply doesn't exist, so we'll hard-code in
	 * some default sidebar stuff just in case.
	 */
	if ( ! dynamic_sidebar( 'primary-widget-area' ) ) : ?>
	
			

			<li id="archives" class="widget-container">
				<h3 class="widget-title"><?php _e( 'Archives', 'freedream2010' ); ?></h3>
				<ul>
					<?php wp_get_archives( 'type=monthly' ); ?>
				</ul>
			</li>

			<li id="meta" class="widget-container">
				<h3 class="widget-title"><?php _e( 'Meta', 'freedream2010' ); ?></h3>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<?php wp_meta(); ?>
				</ul>
			</li>

		<?php endif; // end primary widget area ?>
			</ul>
		</div><!-- #primary .widget-area -->

<?php
	// A second sidebar for widgets, just because.
	if ( is_active_sidebar( 'secondary-widget-area' ) ) : ?>

		<div id="secondary" class="widget-area" role="complementary">
			<ul class="xoxo">
				<?php dynamic_sidebar( 'secondary-widget-area' ); ?>
			</ul>
		</div><!-- #secondary .widget-area -->

<?php endif; ?>
