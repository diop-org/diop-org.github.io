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
						<div class="page">
							<h2><?php the_title(); ?></h2>
							<?php while ( have_posts() ) : the_post(); ?>
							<article>
								<div class="post">
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
								<?php comments_template( '', true ); ?>
							</article>
							<?php endwhile; else: ?>
							<article>
								<div class="post last">
									<div class="row meta">
										<div class="column grid_8">
											<div class="title"><h3 class="title">Not Found</div>
										</div>
									</div>
									<div class="row body">
										<div class="column grid_8">
											No page matches that criteria. Please try the navigation.
										</div>
									</div>
									<div class="row footer">
										<div class="column grid_8">
											<?php comments_popup_link('No Comments &raquo;', '1 Comment &raquo;', '% Comments &raquo;'); ?> |
											<a href="#">Read more</a>
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