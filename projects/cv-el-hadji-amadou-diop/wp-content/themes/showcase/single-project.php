<?php get_header(); ?>
<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>
	<?php
		$post_custom = get_post_custom($post->ID, 'post_mantle', true);
		if(isset($post_custom['post_mantle'][0])){
			$post_mantle = $post_custom['post_mantle'][0];
		}
		if(isset($post_custom['client_name'][0])){
			$client_name = $post_custom['client_name'][0];
		}
		if(isset($post_custom['project_url'][0])){
			$project_url = $post_custom['project_url'][0];
		}
		if(empty($post_mantle)) {
			$post_mantle = get_option('sc_uni_mantle');
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
				<p><?php echo $post_mantle; ?></p>
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
					<section>
						<div class="blog">
							<h2 class="header"><?php the_title(); ?></h2>
							<?php the_post_thumbnail(array(620,620)); ?>
							<?php if(isset($client_name)): ?>
							<h3 class="client-name"><?php echo $client_name; ?></h3>
							<?php endif; ?>
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
							</article>
							<?php endwhile; endif; ?>
						</div>
					</section>
				</div>
				<?php get_sidebar(); ?>
			</div>
		</div>
	</section>
<?php get_footer(); ?>