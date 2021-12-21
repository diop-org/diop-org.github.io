<?php get_header(); ?>
<?php
	$post_custom = get_post_custom( $post->ID, 'post_mantle', true );
	$post_mantle = isset($post_custom['post_mantle'][0]) ? $post_custom['post_mantle'][0] : '';
	if( !isset( $post_mantle ) || empty( $post_mantle ) ) {
		$post_mantle = get_option('sc_uni_mantle');
	}
	if( strlen( $post_mantle ) > 130 ) {
		$post_mantle = rtrim(substr( $post_mantle, 0, 130 ) ) . "...";
	}
?>
<?php	if ( !empty( $post_mantle ) ): ?>
<section>
	<div id="mantle-wrap">
		<div class="clear"></div>
		<div id="mantle" class="row">
			<p><?php if( isset( $post_mantle ) ) echo $post_mantle ?></p>
		</div>
	</div>
</section>
<?php endif; ?>
	<section>
		<div class="content-wrap">
			<div class="clear"></div>
			<div id="content" class="row">
				<div class="column grid_8">
					<section>
						<div class="blog">
							<h2><?php single_cat_title(); ?></h2>
							<?php if ( have_posts() ) : ?>
							<?php
								$i = 0;
								function last_post($post = 1, $post_count) {
									if($post >= $post_count) {
										return true;
									}
								}
							?>
							<?php while ( have_posts() ) : the_post(); ?>
							<?php
								$i++;
								$extra_class = '';
							?>
							<?php if(last_post($i, $wp_query->post_count)) { $extra_class = "last"; } ?>
							<article>
								<div <?php post_class($extra_class); ?>>
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
											<div class="author">Posted by <?php the_author(); ?> at <?php the_time('g:i a') ?></div>
											<div class="tags">
												<?php the_tags("<ul>\n<li>", "</li>\n<li>", "</li>\n</ul>"); ?>
												<div class="clear"></div>
											</div>
										</div>
									</div>
									<div class="row body">
										<div class="column grid_8">
											<?php the_content(); ?>
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
											<div class="title"><h3 class="title">Not Found</h3></div>
										</div>
									</div>
									<div class="row body">
										<div class="column grid_8">
											No posts match your criteria. Please try the navigation.
										</div>
									</div>
									<div class="row footer">
										<div class="column grid_8">
										</div>
									</div>
								</div>
							</article>
							<?php endif; ?>
							<div id="paginator" class="row">
								<div class="grid_4 column">
									<?php previous_posts_link(); ?>
								</div>
								<div class="grid_4 column right" style="text-align: right;">
									<?php next_posts_link(); ?>
								</div>
								<div class="clear"></div>
							</div>
						</div>
					</section>
				</div>
				<?php get_sidebar(); ?>
			</div>
		</div>
	</section>
<?php get_footer(); ?>