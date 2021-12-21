<?php
/*
Copyright (c) 2010 MobilizeToday.com, Mobile Web Solutions Inc.

Support: http://www.mobilizetoday.com/wordpress-themes/mobius/

This file is part of the Mobius WordPress Theme.
*/
?>
<?php
	if (isset($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
	
	if ( post_password_required() ) { ?>
		<p class="nocomments">This post is password protected. Enter the password to view comments</p> 
	<?php
		return;
	}
?>

<!-- You can start editing here. -->

<?php if ( have_comments() ) : ?>
	<h1><?php comments_number('No Responses', 'One Response', '% Responses');?> </h1>
	<div class="alignleft"><?php previous_comments_link() ?></div>
	<div class="alignright"><?php next_comments_link() ?></div>
		
	<div class="clear"></div>
	<ol class="commentlist">
	<?php wp_list_comments('callback=mobius_comment'); ?>
	</ol>
	
	<div class="alignleft"><?php previous_comments_link() ?></div>
	<div class="alignright"><?php next_comments_link() ?></div>
		
	<div class="clear"></div>

 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments">Comments are closed</p>

	<?php endif; ?>
<?php endif; ?>


<?php if ( comments_open() ) : ?>

<div id="respond">

<h1><?php comment_form_title( 'Leave a Reply', 'Leave a Reply for %s' ); ?></h1><?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?><p><?php printf('You must be <a href="%s">logged in</a> to post a comment.', 'mobius', wp_login_url( get_permalink() )); ?></p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
<ul>
<?php if ( is_user_logged_in() ) : ?>

<li><?php printf('Logged in as <a href="%1$s">%2$s</a>.', get_option('siteurl') . '/wp-admin/profile.php', $user_identity); ?> <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></li>

<?php else : ?>

<li><label class="caption" for="author">Name</label> <div class="form-row row-first"> <input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1"/></div></li>

<li><label class="caption" for="email">E-mail</label> <div class="form-row"> <input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" /></div></li>

<li><label class="caption" for="url">Website</label> <div class="form-row"><input type="text" name="url" id="url" value="<?php echo  esc_attr($comment_author_url); ?>" size="22" tabindex="3" /></div></li>

<?php endif; ?>

<li><label class="caption">Comment</label> <div class="form-row"><textarea name="comment" id="comment" rows="3" cols="25"></textarea></div></li>

<li><input name="submit" type="submit" id="submit"  class="submit input-submit-fr" tabindex="5" value="Submit Comment" />
<?php comment_id_fields(); ?> 
</li>
</ul>
<div class="clear"></div>
<div><?php do_action('comment_form', $post->ID); ?></div>

</form>

<?php endif; // If registration required and not logged in ?>
</div>

<?php endif; // if you delete this the sky will fall on your head ?>
