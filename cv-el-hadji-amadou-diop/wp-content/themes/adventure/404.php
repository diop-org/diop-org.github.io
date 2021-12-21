<?php get_header(); ?>
<body <?php body_class(); ?> >
<div id="center">

<?php if ( get_header_image() == '') : ?><?php else : ?>
<div class="wpheader"><a href="<?php echo home_url(); ?>/"><img class="left title" title="<?php bloginfo('name'); ?>" src="<?php header_image(); ?>" alt="<?php bloginfo('description');?>" /></a></div>
<?php endif; ?>

<?php if (is_active_sidebar('sidebar') ) : ?>
<div class="sidebar"><?php if ( !dynamic_sidebar('sidebar') ) : endif; ?></div>
<?php else : get_sidebar(); ?>
<?php endif; ?>
    
<div class="content">
<div class="label"><a href="#" title="Error 404 - Not Found">Error 404 - Not Found</a></div>
<p>Sorry, but you are looking for something that isn&#8217;t here.</p>
<p>The 404 or Not Found error message is a HTTP standard response code indicating that the client  was able to communicate with the server, but the server could not find what was requested. 404 errors should not be confused with "server  not found" or similar errors, in which a connection to the destination server could not be made at all. A 404 error indicates that the requested resource may be available again in the future.</p>
<p>Try searching for what you where looking for using the search box below.</p>
<?php get_search_form(); ?>
</div>  

<div id="notfooter">
<p>
<?php bloginfo('name'); ?> is proudly powered by <a href="http://wordpress.org/">WordPress</a> and the Theme <a href="http://schwarttzy.com/web-design/backpacking-wordpress-theme-1-0">Adventure by Eric Schwarz</a>
<br /><a href="<?php bloginfo('rss2_url'); ?>">Entries (RSS)</a> and <a href="<?php bloginfo('comments_rss2_url'); ?>">Comments (RSS)</a>.
<!-- <?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> seconds. -->
<!-- Theme design by Eric Schwarz - http://schwarttzy.com/?page_id=225 -->
</p>
</div>

</div>

<div id="endspacer">
</div>
    
<div id="bar">
<?php 
$options = adventure_get_theme_options();
if ( $options['active'] == 'active' ) {	
if ( has_nav_menu( 'bar' ) ) :  wp_nav_menu( array( 'theme_location' => 'bar', 'depth' => 2 ) ); else : ?>
<ul><?php wp_list_pages('title_li=&depth=2'); ?></ul>
<?php endif; } else {
if ( has_nav_menu( 'bar' ) ) :  wp_nav_menu( array( 'theme_location' => 'bar', 'depth' => 1 ) ); else : ?>
<ul><?php wp_list_pages('title_li=&depth=1'); ?></ul>
<?php endif; }?>
<div id="title"><a href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a></div>
<div id="slogan"><h2><?php bloginfo('description');?></h2></div>  
</div>

<?php wp_footer(); ?>
</body>
</html>