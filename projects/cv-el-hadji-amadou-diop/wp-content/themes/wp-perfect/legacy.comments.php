<?php // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie 
			echo '<p class="nocomments">This post is password protected. Enter the password to view comments.</p>';
			return;
		}
	}
 
if ($comments) :
?>

	<div id="thecomments">
		<ol class="commentlist">
		<?php
				$count=0;
				foreach ($comments as $comment) : 
					if (get_comment_type() == "comment") :
						$count++;
		?>
						<li class="comment<?php echo ($comment->user_id==$post->post_author)? ' bypostauthor':'';?>" id="comment-<?php comment_ID();?>">
							<div id="div-comment-<?php comment_ID() ?>">
								<div class="comment-author vcard">
									<?php if(function_exists("get_avatar")) echo get_avatar($comment, 32);?>
									<cite class="fn"><?php comment_author_link();?></cite> <span class="says">says:</span>
								</div>
								<div class="comment-meta commentmetadata">
									<a href="#comment-<?php comment_ID();?>">
										<?php comment_date();?><?php edit_comment_link("&nbsp;(Edit)");?></a>
								</div>
								<?php comment_text();?>
								<div class="reply"></div>
							</div>
						</li>
		<?php					
					endif;
				endforeach;
		?>
		</ol>
	</div>

	<div id="thetrackbacks">
		<ol class="commentlist">
<?php
		$count=0;
		foreach ($comments as $comment) : 
			if((get_comment_type() == "trackback") || (get_comment_type() == "pingback")) : 
				$count++;
?>
				<li id="comment-<?php comment_ID(); ?>" class="cmt_trackback">
					<?php comment_author_link(); ?><div class="comment-meta"><a href="#comment-<?php comment_ID();?>"><?php comment_date();?><?php edit_comment_link("&nbsp;(Edit)");?></a></div>
					<?php comment_text(); ?>
				</li>
<?php
			endif;
		endforeach;
?>
		</ol>
	</div>

<?php 
else : // this is displayed if there are no comments so far
	if ('open' == $post->comment_status) : 
		else : // comments are closed
	endif; 
endif;


if ('open' == $post-> comment_status) : 
?>
<div id="respond">
		<strong>Leave a Reply</strong>
<?php
		if ( get_option('comment_registration') && !$user_ID ) : 
			echo '<p>You must be <a href="'.get_option('siteurl').'/wp-login.php?redirect_to='.get_permalink().'">logged in</a> to post a comment.</p>';
		else : 
?>
			<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
<?php 
				if ( $user_ID ) :
?>		
					<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Log out &raquo;</a></p> 
<?php 				
				else : 
?>	
					<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
						<label for="author"><small>Name&nbsp;<?php if ($req) echo "(required)"; ?></small></label></p>
					<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
						<label for="email"><small>E-Mail (will not be published <?php if ($req) echo ", required)"; ?></small></label></p>
					<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
						<label for="url"><small>Website (optional)</small></label></p>
<?php 
				endif; 
?>

<p><small><strong>XHTML:</strong> You can use these tags:&nbsp;<code><?php echo allowed_tags(); ?></code></small></p>

				<p><textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea></p>
				<p><input name="submit" type="submit" id="submit" tabindex="5" value="Submit" />
				<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" /></p>
				<?php do_action('comment_form', $post->ID); ?>
			</form>
<?php 
		endif; // If registration required and not logged in 
echo "</div>";
	endif; // if you delete this the sky will fall on your head 
?>