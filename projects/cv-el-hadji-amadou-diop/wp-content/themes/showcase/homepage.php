<?php
/*
Template Name: Homepage
*/

$default_portfolio = get_option('sc_default_portfolio');
$default_portfolio_term = (!empty($default_portfolio) && is_object(get_term($default_portfolio, 'portfolio')) ? get_term($default_portfolio, 'portfolio')->slug : false);
?>

<?php get_header(); ?>

<?php
if ($default_portfolio_term) {
	$query = new WP_query( array( 'portfolio' => $default_portfolio_term, 'posts_per_page' => 5 ) );
} else {
	$query = new WP_Query( array( 'post_type' => 'project', 'post_per_page' => 5));
}
?>
<?php if ( have_posts() ) : ?>
	<section>
		<div id="mantle-wrap">
			<div class="clear"></div>
			<div id="mantle" class="row">
				<div id="mantle-left" class="grid_1 column mantle-arrow">
					<a class="prev browse left">
						<img src="<?php echo get_template_directory_uri(); ?>/images/mantle-left.png" class="png">
					</a>
				</div>
				<div id="mantle-image" class="grid_5 column">
					<div id="computer-wrapper">
						<div id="computer" class="png">
							<?php while ( $query->have_posts() ) : $query->the_post(); ?>
							<div class="one screen">
								<?php the_post_thumbnail(array(350,198)); ?>
							</div>
							<?php endwhile; ?>
							<div class="light png"></div>
						</div>
					</div>
				</div>
				<div id="mantle-text" class="grid_5 column scrollable">
					<div class="items row">
						<?php while ( $query->have_posts() ) : $query->the_post(); ?>
						<div class="grid_5 column panel">
							<h1 class="mantle"><?php echo sc_string_limit_chars( get_the_title(), 18 ); ?></h1>
							<?php the_excerpt(); ?>
							<a href="<?php the_permalink(); ?>" class="view-project"><img src="<?php echo get_template_directory_uri(); ?>/images/btn-view-project.png" class="btn png"></a>
							<div class="clear"></div>
						</div>
						<?php endwhile; ?>
					</div>
				</div>
				<div id="mantle-right" class="grid_1 column mantle-arrow">
					<a class="next browse right">
						<img src="<?php echo get_template_directory_uri(); ?>/images/mantle-right.png" class="png">
					</a>
				</div>
				<div class="clear"></div>
				<ul id="mantle-dots">
				</ul>
			</div>
		</div>
	</section>
	<?php endif; ?>
	<section>
		<div class="content-wrap">
			<div class="clear"></div>
			<div id="content" class="row">
				<?php
				if (!empty($default_portfolio_term)) {
					$query = new WP_Query( array( 'portfolio' => $default_portfolio_term, 'posts_per_page' => 3 ) );
				} else {
				  $query = new WP_Query( array( 'post_type' => 'project', 'posts_per_page' => 3 ) );
				}
				?>
				<?php if ( $query->have_posts() ): ?>
				<div class="column grid_12">
					<div class="right header-right">
						<?php if( $default_portfolio && !empty( $default_portfolio )  ): ?>
						  <?php if(is_string(get_term_link( $default_portfolio_term, 'portfolio' ))): ?>
						  <a href="<?php echo get_term_link( $default_portfolio_term, 'portfolio' ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/btn-view-all.png"></a>
						  <?php endif;?>
						<?php endif; ?>
					</div>
					<h2>Recent Work</h2>
					<div class="row">
						<?php while ( $query->have_posts() ) : $query->the_post(); ?>
						<div class="column grid_4">
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(array(300,168)); ?></a>
						</div>
						<?php endwhile; ?>
					</div>
				</div>
				<?php endif; ?>
				<div class="column grid_8">
          <?php $query = new WP_Query( array( 'post_type' => 'post', 'post_per_page' => 5 ) ); ?>
					<?php if ( $query->have_posts() ) : ?>
					<section>
						<div class="blog">
							<h2>From the Blog</h2>
							<?php while ( $query->have_posts() ) : $query->the_post(); ?>
							<article>
								<div <?php post_class(); ?>>
									<div class="row meta">
										<date datetime="<?php the_time('c'); ?>" title="<?php the_time("F jS, o"); ?>">
											<div class="date column grid_1">
												<div class="inner">
													<div class="m"><?php the_time('M'); ?></div>
													<div class="d"><?php the_time('d'); ?></div>
												</div>
											</div>
										</date>
										<div class="column grid_7">
											<div class="title"><h3 class="title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3></div>
											<div class="author">Posted by <?php the_author(); ?> on <date datetime="<?php the_time('c'); ?>" title="<?php the_time("F jS, o"); ?>"><?php the_time("F jS, o"); ?> at <?php the_time("g:i a"); ?></date></div>
											<div class="tags">
												<?php the_tags("<ul>\n<li>", "</li>\n<li>", "</li>\n</ul>"); ?>
												<div class="clear"></div>
											</div>
										</div>
									</div>
									<div class="row body">
										<div class="column grid_8">
											<?php the_excerpt(); ?>
										</div>
									</div>
									<div class="row footer">
										<div class="column grid_8">
											<?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?> |
											<a href="<?php the_permalink(); ?>">Read more</a>
										</div>
									</div>
								</div>
							</article>
							<?php endwhile; else: ?>
							<article>
								<div class="post last">
									<div class="row meta">
										<div class="column grid_8">
											<div class="title"><h3 class="title">Nothing Here</h3></div>
										</div>
									</div>
									<div class="row body">
										<div class="column grid_8">
											There are no blog posts.
										</div>
									</div>
									<div class="row footer">
										<div class="column grid_8">
										</div>
									</div>
								</div>
							</article>
							<?php endif; ?>
						</div>
					</section>
				</div>
				<?php get_sidebar(); ?>
			</div>
		</div>
	</section>
<?php get_footer(); ?>