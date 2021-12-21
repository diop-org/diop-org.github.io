<?php
// Do not delete these lines
if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) die ('Please do not load this page directly. Thanks!');
if (!empty($post->post_password))
{
	if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password)
	{
?>

<h2><?php _e('Password protected'); ?></h2>
<p class="nocomments"><?php _e('Enter the password to view comments.', 'bluedesign'); ?></p>

<?php return;
	}
}

// You can start editing here.

$oddcomment = 'odd';

?>

<?php if ($comments) : ?>
<h3 id="comments"><?php comments_number(__('No Comments'), __('1 Comment'), __('% Comments'));?></h3>

<?php $num = 1; ?>
<?php foreach ($comments as $comment) : ?>

	
	<div class="comment <?php echo $oddcomment; ?>">
					<span class="comment-<?php comment_ID() ?>"></span>
						<table class="comment_num <?php if ($oddcomment == "odd") echo "even"; else echo "odd"; ?>">
							<tr>
								<td><a href="#comment-<?php comment_ID() ?>" title=""><?php echo "$num"; $num+=1; ?></a></td>
							</tr>
						</table>
					<div class="gravatar">
						<?php if(function_exists("get_avatar")) echo get_avatar( $comment, 48 ); ?>
					</div>
					<div class="fix">
					</div>
					<div class="comment_author">
						<?php comment_author_link() ?>
					</div>
					<div class="comment_data">
						<?php comment_date('l j F Y') ?> <?php echo " - ";?> <?php comment_time() ?>
					</div>
					
					<?php if ($comment->comment_approved == '0') : ?>
					<em><?php _e('Your comment is awaiting moderation.'); ?></em>
					<?php endif; ?>
					
					<?php comment_text() ?>
					<?php edit_comment_link(__('Edit Comment'),'',''); ?>
	</div>

<?php 
	if ('odd' == $oddcomment) $oddcomment = 'even';
	else $oddcomment = 'odd';
?>

<?php 
	
 endforeach; // end for each comment  
 
 else : 
			
			if ('open' == $post->comment_status) :
				//comments are open, but there are no comments
			else :
			// comments are closed
?>
<br>
<div id="comment_closed">
	<?php _e('Sorry, comments are closed for this item.'); ?>
</div>

	<?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>
<br><br>
<span id="respond" style="font-family: Arial;font-size:18px;font-weight:bold;margin-top:10px;"><?php _e('Leave a Reply'); ?></span>

<div id="comment_ins">
<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>
	<?php printf(__('You must be <a href="%s">logged in</a> to post a comment.'), get_option('siteurl')."/wp-login.php?redirect_to=".urlencode(get_permalink()));?>
</p>

<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
<?php if ( $user_ID ) : ?>

<p>
	<?php printf(__('Logged in as %s.'), '<a href="'.get_option('siteurl').'/wp-admin/profile.php">'.$user_identity.'</a>'); ?>
	<a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="<?php _e('Log out of this account') ?>"><?php _e('Log out'); ?> &raquo;</a></p>

<?php else : ?>

<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="32" tabindex="1" />
<label for="author"><?php _e('Name'); ?> <?php if ($req) _e('(required)'); ?></label></p>

<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="32" tabindex="2" />
<label for="email"><?php _e('Mail (will not be published)'); ?> <?php if ($req) _e('(required)'); ?></label></p>

<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="32" tabindex="3" />
<label for="url"><?php _e('Website'); ?></label></p>

<?php endif; ?>

<p><textarea name="comment" id="comment" cols="60" rows="10" tabindex="4"></textarea></p>

<p><input name="submit" type="submit" id="submit" tabindex="5" value="<?php _e('Submit Comment'); ?>" />
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
</p>

<?php do_action('comment_form', $post->ID); ?>

</form>

</div>
<?php endif; // If registration required and not logged in ?>

<?php endif; ?>
