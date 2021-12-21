<?php
	
	if ( post_password_required() ) { ?>
		<div class="content" ><p class="nocomments">This post is password protected. Enter the password to view comments.</p></div>
	<?php
		return;
	}
?>
<?php if ( comments_open() ) : ?>
<div class="content" >				
		<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
			<p>You must be <a href="<?php echo wp_login_url( get_permalink() ); ?>">logged in</a> to post a comment.</p>
		<?php else : ?>
			
		<?php comment_form(); ?>
        
		<?php endif; // If registration required and not logged in ?>
</div>
<?php endif; ?>

<?php if ( have_comments() ) : ?>
<div class="content" >
	<div class="label">COMMENTS</div>
		<ol id="comments" class="comment">
			<?php wp_list_comments('callback=adventure_print_comment'); ?>
		</ol>
		<div class="navigation">
			<div class="alignleft"><?php previous_comments_link() ?></div>
			<div class="alignright"><?php next_comments_link() ?></div>
		</div>
</div>
<?php else : ?>
<?php if ( !comments_open() && !is_page() ) : ?>
<div class="content" ><p>Comments are closed.</p></div>
<?php endif; ?>
<?php endif; ?>

 <!-- if ('open' == $post->comment_status) : -->