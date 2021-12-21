<?php if(!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) : ?>  	
	<?php die('You can not access this page directly!'); ?>  
<?php endif; ?>

<?php if( post_password_required() ) : ?>  	
	<?php _e('This post is password protected. Enter the password to view comments.', 'minicard'); return; ?>  
<?php endif; ?>

<div id="comments">

<h2><?php comments_number(__('No Comments','minicard'), __('1 Comment','minicard'), __('% Comments','minicard') );?> <small><?php post_comments_feed_link( ); ?></small></h2>

<?php if ( have_comments() ) : ?>
	
  	<ol id="comment-list" class="commentlist">
    	<?php wp_list_comments( array('callback' => 'themeslice_comments' ) ); ?>
	</ol>
	<div class="comment-paging">
		<?php paginate_comments_links(); ?> 
	</div>
	
<?php else : ?>

	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->
	<?php else : // comments are closed ?>
		<p><?php _e('Sorry, the comment form is closed at this time.', 'minicard'); ?></p>
	<?php endif; ?>

<?php endif; ?>

<?php if ('open' == $post->comment_status) : ?>

	<h3 id="respond"><?php _e('Add a Comment', 'minicard'); ?></h3>
	<?php if(get_option('comment_registration') && !$user_ID) : ?>
		<p><?php _e('You must be', 'minicard'); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>"><?php _e('logged in', 'minicard'); ?></a> <?php _e('to post a comment.', 'minicard'); ?></p>
	<?php else : ?>
		
		<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
			<div class="cancel-comment-reply">
				<p><small><?php cancel_comment_reply_link(); ?></small></p>
			</div>
			<?php if($user_ID) : ?>
				<p><?php _e('Logged in as', 'minicard'); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url( get_permalink() ); ?>" title="<?php _e('Log out of this account', 'minicard'); ?>"><?php _e('Log out &raquo;', 'minicard'); ?></a></p>
			<?php else : ?>
				<p><input type="text" name="author" id="author" class="text" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
				<label for="author"><?php _e('Name', 'minicard'); ?> <?php if($req) echo "(required)"; ?></label></p>
				<p><input type="text" name="email" id="email" class="text" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
				<label for="email"><?php _e('Email Address', 'minicard'); ?> <?php if($req) echo "(required)"; ?></label></p>
				<p><input type="text" name="url" id="url" class="text" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
				<label for="url"><?php _e('Website', 'minicard'); ?></label></p>
			<?php endif; ?>
			<p><textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea></p>
			<p><input name="submit" type="submit" id="submit" class="submit" tabindex="5" value="<?php _e('Submit Comment', 'minicard'); ?>" /></p>
			<div><input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
			<?php comment_id_fields(); ?>
			<?php do_action('comment_form', $post->ID); ?></div>
		</form>
		
	<?php endif; ?>

<?php else : ?>
	<p><?php _e('The comments are closed.', 'minicard'); ?></p>
<?php endif; ?>

</div>