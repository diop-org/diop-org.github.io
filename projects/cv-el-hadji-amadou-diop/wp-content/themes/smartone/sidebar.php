<?php
/**
 * The Sidebar containing the primary and secondary widget areas.
 *
 * @package WordPress
 */
?>

		<div id="primary" class="widget-area" role="complementary">
			<ul class="xoxo">

<?php
	/* When we call the dynamic_sidebar() function, it'll spit out
	 * the widgets for that widget area. If it instead returns false,
	 * then the sidebar simply doesn't exist, so we'll hard-code in
	 * some default sidebar stuff just in case.
	 */
	if ( ! dynamic_sidebar( 'primary-widget-area' ) ) : ?>
	
			<li id="search" class="widget-container widget_search">
				<?php get_search_form(); ?>
			</li>
      
      
           <!--BEGIN #widget-posts-->            
           <li id="posts" class="widget-container">
           <h3 class="widget-title"><?php _e( 'Recent posts', 'smartone' ); ?></h3>
				<ul>
<?php $myposts = get_posts('numberposts=5'); // number of posts
foreach($myposts as $post) :?>
<li><a title="<?php the_title();?>" href="<?php the_permalink(); ?>"><?php the_title();?></a></li>
<?php endforeach; ?>
				</ul>
        </li>
                <!--END #widget-posts-->
                
                
            <!--BEGIN #widget-categories-->
            <li id="categories" class="widget-container">
				<h3 class="widget-title"><?php _e( 'Categories', 'smartone' ); ?></h3>
				<ul>
					<?php wp_list_categories( 'title_li=' ); ?>
				</ul>
        </li>
 
                        <!--END #widget-categories-->
                        
                        
                         <!--BEGIN #widget-calendar-->
        <li id="calendar" class="widget-container">
        <h3 class="widget-title"><?php _e( 'Calendar', 'smartone' ); ?></h3>
               
               <?php get_calendar(); ?>
               
               </li>
               
               <!--END #widget-calendar-->

			<li id="archives" class="widget-container">
				<h3 class="widget-title"><?php _e( 'Archives', 'smartone' ); ?></h3>
				<ul>
					<?php wp_get_archives( 'type=monthly' ); ?>
				</ul>
			</li>

			<li id="meta" class="widget-container">
				<h3 class="widget-title"><?php _e( 'Meta', 'smartone' ); ?></h3>
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
