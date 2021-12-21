<?php
/*
Template Name: Sitemap
*/
?>

<?php
/**
 * The template for displaying the Sitemap page.
 *
 * @package WordPress
 * @subpackage FreeDream 2010
 */
  get_header(); ?>

		
			<div id="content" role="main">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<h1 class="page-title"><?php _e( 'Sitemap', 'freedream2010' ); ?>:  <?php bloginfo('name'); ?> </h1>

						<h3><?php _e( 'Blog Archives', 'freedream2010' ); ?> :</h3>
						<ul>
							<?php $archive_query = new WP_Query('showposts=1000');
								while ($archive_query->have_posts()) : $archive_query->the_post(); ?>
							<li><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link til <?php the_title(); ?>" rel="nofollow"><?php the_title(); ?></a> <strong><?php comments_number('0', '1', '%'); ?></strong></li>
							<?php endwhile; ?>
						</ul>
						<h3><?php esc_attr_e( 'Archives' ); ?> :</h3>
						<ul>
							<?php wp_get_archives('type=monthly'); ?>
						</ul>
						<h3><?php esc_attr_e( 'Category' ); ?> :</h3>
						<ul>
							<?php wp_list_categories('title_li=0'); ?>
						</ul>

                                                <h3><?php esc_attr_e( 'Pages' ); ?> :</h3>
						<ul>
							<?php wp_list_pages('title_li='); ?>
						</ul>

						<h3><?php esc_attr_e( 'Content' ); ?> RSS Feeds:</h3>
						<ul>
							<li><a href="<?php bloginfo('rdf_url'); ?>" alt="RDF/RSS 1.0 feed" rel="nofollow"><acronym title="Resource Description Framework">RDF</acronym>/<acronym title="Really Simple Syndication">RSS</acronym> 1.0 feed</a></li>
							<li><a href="<?php bloginfo('rss_url'); ?>" alt="RSS 0.92 feed" rel="nofollow"><acronym title="Really Simple Syndication">RSS</acronym> 0.92 feed</a></li>
							<li><a href="<?php bloginfo('rss2_url'); ?>" alt="RSS 2.0 feed" rel="nofollow"><acronym title="Really Simple Syndication">RSS</acronym> 2.0 feed</a></li>
							<li><a href="<?php bloginfo('atom_url'); ?>" alt="Atom feed" rel="nofollow">Atom feed</a></li>
						</ul>

<?php endwhile; endif; ?>
			



			</div><!-- #content -->
		

<?php get_sidebar(); ?>
<?php get_footer(); ?>