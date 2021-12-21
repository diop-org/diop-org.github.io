<div id="comments">
	<h2 class="hide">COMMENTS</h2>
	
<!-- Start CommentsList-->
<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
			?>

			<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
		</div>

			<?php
			return;
		}
	}

	/* This variable is for alternating comment background */
	$oddcomment = 'class="alt" ';
?>

<!-- You can start editing here. -->

	<?php if (have_comments()) : ?>

		<h2 class="sb-comment"><?php comments_number('0', '1', '%' );?> Comments </h2>

			<ol>
		<?php foreach ($comments as $comment) : ?>
			
				<li id="comment-<?php comment_ID() ?>" class="clearfix <?php iz_comment_class() ?>">
				
					<p class="author-grav"><?php iz_gravatar(); ?></p>
				
					<div class="comment-content">
						<div class="comment-info">
							<p class="comment-author"><?php comment_author_link() ?></p>
							<p class="comment-date"><?php comment_date('F jS, Y h:i A') ?></p>
						</div>
						<div class="comment-text">
							<?php comment_text() ?>
						</div>
						
					</div>
					
					<?php if ($comment->comment_approved == '0') : ?><p class="wait">Your comment is awaiting moderation.</p><?php endif; ?>
				</li>

		
				<?php endforeach; ?>
			</ol>
		
	<?php else : ?>
	
		<?php if ('open' == $post->comment_status) : ?>
			<h2 class="sb-comment">No Comments</h2>
			<p class="nocomments">There are no comments posted yet. Be the first one!</p>
		<?php endif; ?>
			
	<?php endif; ?>
	</div>	
		
	<div id="respond">	

	<?php if ('open' == $post->comment_status) : ?>

			<h2 class="sb-comment">Leave a Reply</h2>

			<div class="cancel-comment-reply">
				<p><?php cancel_comment_reply_link(); ?></p>
			</div>

			<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
				<p class="logged-nfo">You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>
			<?php else : ?>

				<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
					
					
				<?php if ( $user_ID ) : ?>

					<p class="logged-nfo">Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>
					
					<ol>

				<?php else : ?>

					<ol>
						<li>
							<label for="author">Name <em>(required)</em></label>
							<input id="author" name="author" type="text" size="40" maxlength="80" value="<?php echo $comment_author ?>"/>
						</li>
						<li>
							<label for="email">Email <em>(required but not published)</em></label>
							<input id="email" name="email" type="text" size="40" maxlength="80"value="<?php echo $comment_author_email ?>" />
						</li>
						<li>
							<label for="url">Website</label>
							<input id="url" name="url" type="text" size="40" maxlength="80"value="<?php echo $comment_author_url ?>" />
						</li>


				<?php endif; ?>

		<!--<p><small><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></small></p>-->

						<li>
							<label for="comments">Comments <em>(required)</em></label>
							<textarea name="comment" id="comment" cols="60" rows="10"></textarea>
						</li>
					</ol>

					<p><input name="submit" type="submit" id="send-comment" class="btn-submit" tabindex="5" value="Leave Comment" />
						<?php comment_id_fields(); ?>
					</p>
					<?php do_action('comment_form', $post->ID); ?>
					
				</form>

			<?php endif; // If registration required and not logged in ?>
		
		<?php else : ?>
		
			<?php if (have_comments()) : ?>
		
				<h3 class="comment-closed">Comments are now closed.</h3>
				
			<?php endif; ?>

		<?php endif; // if you delete this the sky will fall on your head ?>
	
	</div>