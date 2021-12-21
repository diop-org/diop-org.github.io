<?php get_header(); ?>
<?php
	$post_custom = get_post_custom($post->ID, 'post_mantle', true);
	if(isset($post_custom['post_mantle'][0])){
		$post_mantle = $post_custom['post_mantle'][0];
	}
	if(empty($post_mantle)) {
		$post_mantle = get_option('sc_uni_mantle');
	}
	if(empty($post_mantle)) {
    $post_mantle = get_bloginfo('description');
	}
	if (!empty($post_mantle)) {
		if(strlen($post_mantle) > 130) {
			$post_mantle = rtrim(substr($post_mantle, 0, 130)) . "...";
		}
?>
				<section>
					<div id="mantle-wrap">
						<div class="clear"></div>
						<div id="mantle" class="row">
							<p><?php echo $post_mantle ?></p>
						</div>
					</div>
				</section>
<?php
	}
?>
	<section>
		<div class="content-wrap">
			<div class="clear"></div>
			<div id="content" class="row">
				<div class="column grid_8">
					<?php if ( have_posts() ) : ?>
					<section>
						<div class="blog">
							<h2>From the Blog</h2>
							<?php while ( have_posts() ) : the_post(); ?>
							<article>
								<div class="post">
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
											<div class="title"><h3 class="title"><?php the_title(); ?></h3></div>
											<div class="author">Posted by <?php the_author(); ?> on <?php the_time("F jS, o"); ?> at <?php the_time("g:i a"); ?></div>
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
										</div>
									</div>
								</div>
								<?php wp_link_pages( ); ?>
								<?php comments_template( '', true ); ?>
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
											The post you're looking for does not exist. Try the navigation.
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