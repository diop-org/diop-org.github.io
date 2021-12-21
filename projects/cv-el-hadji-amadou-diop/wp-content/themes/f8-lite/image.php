<?php get_header(); ?>

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="navigation">
			<div class="nav-image-right"><?php previous_image_link( false, 'Previous' ); ?></div>
<div class="nav-image-up"><a href="<?php echo get_permalink($post->post_parent); ?>" rev="attachment">Gallery</a></div>
			<div class="nav-image-left"><?php next_image_link( false, 'Next' ); ?></div>
		</div>
<?php $attachment_link = get_the_attachment_link($post->ID, true, array(950, 800)); // This also populates the iconsize for the next line ?>

<?php $_post = &get_post($post->ID); $classname = ($_post->iconsize[0] <= 128 ? 'small' : '') . 'attachment'; // This lets us style narrow icons specially ?>

		<div class="post" id="post-<?php the_ID(); ?>">

			<p class="<?php echo $classname; ?>"><?php echo $attachment_link; ?><br /></p>

			<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>

			<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
<div class="clear"></div>
			<p class="postmetadata alt quiet">
					<small>
						Posted on <?php the_time('l, F jS, Y') ?> at <?php the_time() ?>
						and is filed under <?php the_taxonomies(); ?>.
						Subscribe to comments via <?php post_comments_feed_link('RSS 2.0'); ?>.

						<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Both Comments and Pings are open ?>
							You can <a href="#respond">leave a response</a>, or <a href="<?php trackback_url(); ?>" rel="trackback">trackback</a> from your own site.

						<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Only Pings are Open ?>
							Comments are currently closed, but you can <a href="<?php trackback_url(); ?> " rel="trackback">trackback</a> from your own site.

						<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Comments are open, Pings are not ?>
							Post a comment. Pinging is currently not allowed.

						<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Neither Comments, nor Pings are open ?>
							Both comments and pings are currently closed.

						<?php } edit_post_link('Edit this entry.','',''); ?>

					</small>
				</p>
		</div>

	<?php comments_template(); ?>

	<?php endwhile; else: ?>

		<p>Sorry, nothing came through.</p>

<?php endif; ?>
<?php get_template_part( 'bottom' ); ?>
<?php get_footer(); ?>