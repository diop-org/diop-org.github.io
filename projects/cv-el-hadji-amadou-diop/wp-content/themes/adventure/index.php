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

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<div class="content">
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="imagez">
<?php if ( has_post_thumbnail()) : ?><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_post_thumbnail('page-thumbnail'); ?></a><?php endif; ?>
<div class="label"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php if ( get_the_title() ) { the_title();} else { echo '(No Title)';} ?></a></div></div>
<?php the_content('Read the rest of this entry &raquo;'); ?>
<div class="clearz">
<?php wp_link_pages(); ?><div class="tags">
<?php if ( is_home()) : ?>
<?php if ('open' == $post->comment_status) : ?>
<?php comments_popup_link('Leave A Comment', '1 Comment', '% Comments'); ?>,
<?php endif; ?>
<?php endif; ?>
Written on <?php the_time('F jS, Y') ?> <?php if ( is_page()) : ?><?php else : ?>, <?php the_category(', ') ?> <?php the_tags('Tags: ', ', ', '<br />'); ?><?php endif; ?>
</div></div></div></div>
<?php comments_template(); ?>
<?php endwhile; ?>


<?php $max_page = $wp_query->max_num_pages; ?>
<?php if ( $max_page >=  2 ) : ?>
<div class="content" >
<div class="label"><div class="left"><?php next_posts_link('&lt;&lt; Older Entries', 0); ?></div></div>
<div class="label"><div class="right"><?php previous_posts_link('Newer Entries &gt;&gt;', '0') ?></div></div>
</div>
<?php endif; ?>

<?php else : ?>
<div class="content">
<div class="label">Not Found</div>
<p>Sorry, but you are looking for something that isn't here.</p>
<?php get_search_form(); ?>
</div>

<?php endif; ?>

<?php if ( is_active_sidebar('widget') ) : ?>
<div class="widgetbox">
<div class="widget"><?php if ( !dynamic_sidebar('widget1') ) :  endif; ?></div>
<div class="widget"><?php if ( !dynamic_sidebar('widget2') ) :  endif; ?></div>
<div class="widget"><?php if ( !dynamic_sidebar('widget3') ) :  endif; ?></div>
<div class="widget"><?php if ( !dynamic_sidebar('widget4') ) :  endif; ?></div>
</div>
<?php endif; ?>

<div id="notfooter">
<p>
<?php bloginfo('name'); ?> is proudly powered by <a href="http://wordpress.org/">WordPress</a> and the Theme <a href="http://schwarttzy.com/web-design/adventure/">Adventure by Eric Schwarz</a>
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