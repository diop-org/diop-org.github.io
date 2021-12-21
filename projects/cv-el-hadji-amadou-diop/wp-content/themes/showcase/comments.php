<section>
	<div id="comments">

		<?php
		/**
		 * The template for displaying Comments.
		 *
		 * The area of the page that contains both current comments
		 * and the comment form.  The actual display of comments is
		 * handled by a callback to showcase_comment which is
		 * located in the functions.php file.
		 *
		 * @package WordPress
		 * @subpackage showcase
		 * @since Showcase 1.0
		 */
		?>

		<?php if ( post_password_required() ) : ?>
						<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'showcase' ); ?></p>
					</div><!-- #comments -->
		<?php
				/* Stop the rest of comments.php from being processed,
				 * but don't kill the script entirely -- we still have
				 * to fully load the template.
				 */
				return;
			endif;
		?>
		<?php

		get_currentuserinfo();
		global $current_user;
		$comment_form_fields = array(
			'before_user' => '<div class="grid_3 column">',
			'author' => '<label class="grid_3">Name</label><input name="author" type="text" id="author" class="text grid_3">',
			'email' => '<label class="grid_3">Email</label><input name="email" type="text" id="email" class="text grid_3">',
			'url' => '<label class="grid_3">Website</label><input name="url" type="text" id="url" class="text grid_3">',
			'after_user' => '</div>'
		);

		$comment_form_args = array(
			'id_form' =>'comment-form',
			'id_submit' => 'submit-comment',
			'label_submit' => '',
			'logged_in_as' => '<div class="grid_3 column"><label class="grid_3">Logged in as ' . @$current_user->display_name . '</label>' . get_avatar( @$current_user->ID, 166 ) . '</div>',
			'comment_notes_before' => '',
			'comment_notes_after' => '<div class="clear"></div><a class="column" id="btn-preview" href="javascript:;"><img src="' . get_template_directory_uri() . '/images/btn-preview.png"></a>',
			'comment_field' => '<div class="grid_5 column"><label class="grid_5">Comment</label><textarea id="comment" name="comment" class="grid_5"></textarea></div>',
			'fields' => apply_filters( 'comment_form_default_fields', $comment_form_fields )
		);

		?>
		<?php if ( comments_open() ): ?>
		<?php comment_form($comment_form_args); ?>
			<?php if ( is_user_logged_in() ): ?>
			<script>
			jQuery(document).ready(function() {
				$('#btn-preview').bind('click',function() {
					$name = '<?php echo $current_user->display_name; ?>';
					$url = '<?php echo $current_user->user_url ?>';
					$comment = $('#comment').val().replace(/\n/g,'<br />');
					$date = new Date().toDateString();
					if($comment) {
						$('#li-comment-preview').show();
						if($url) {
							$('#preview-author').html('<a href="' + $url + '">' + $name + '</a> |');
						} else {
							$('#preview-author').html('' + $name + ' |');
						}
						$('#preview-date').html('' + $date + '');
						$('#preview-body').html('<p>' + $comment + '</p>');
				        $('#preview-avatar').html("<?php echo get_avatar($current_user->ID, 60 ); ?>");
					}
				});
			});
			</script>
			<?php else: ?>
			<script>
			jQuery(document).ready(function() {
				$('#btn-preview').bind('click',function() {
					$name = $('#author').val();
					$name = $name;
					$email = $('#email').val();
					$url = $('#url').val();
					$comment = $('#comment').val().replace(/\n/g,'<br />');
					$date = new Date().toDateString();
					if($name && $email && $comment && /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/.test($email)) {
						$('#li-comment-preview').show();
						if($url && /^http\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,4}(\/\S*)?$/.test($url)) {
							$('#preview-author').html('<a href="' + $url + '">' + $name + '</a> |');
						} else {
							$('#preview-author').html('' + $name + '');
						}
						$('#preview-date').html('' + $date + '');
						$('#preview-body').html('<p>' + $comment + '</p>');
				        var md5Email = MD5($('#email').val());
				        $('#preview-avatar').html('<img src="http://www.gravatar.com/avatar.php?gravatar_id=' + md5Email + '&size=60&rating=G" alt="' + $('#name').val() + '" />');
					}
				});
			});
			</script>
			<?php endif; ?>
		<?php endif; ?>
		<div class="row">
	  <?php if ( have_comments() ) : ?>
	    <div class="column grid_8">
				<h3 id="comments-title"><?php
				printf( _n( 'One Response to %2$s', '%1$s Responses to %2$s', get_comments_number(), 'showcase' ),
				number_format_i18n( get_comments_number() ), get_the_title() );
				?></h3>
		<?php endif;
		  // This first LI is supposed to be empty. It's for the preview.
		?>
			<ol id="comment-list" class="column">
				<li id="li-comment-preview">
					<article>
						<div id="comment-preview" class="comment grid_8 row">
							<div id="preview-avatar" class="grid_1 column">
								&nbsp;
							</div>
							<div class="grid_7 column">
								<header>
									<div class="header">
										<h3 id="preview-author"> |</h3>
										<div class="meta">
											<date id="preview-date" datetime="">
											</date>
										</div>
									</div>
								</header>
								<div id="preview-body" class="body">
								</div>
							</div>
							<div class="clear"></div>
						</div>
					</article>
				</li>
		<?php if ( have_comments() ) : ?>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
					<div class="navigation">
						<div class="nav-previous"><?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Older Comments', 'showcase' ) ); ?></div>
						<div class="nav-next"><?php next_comments_link( __( 'Newer Comments <span class="meta-nav">&rarr;</span>', 'showcase' ) ); ?></div>
					</div> <!-- .navigation -->
		<?php endif; // check for comment navigation ?>
										<?php
							/* Loop through and list the comments. Tell wp_list_comments()
							 * to use sc_comment() to format the comments.
							 * If you want to overload this in a child theme then you can
							 * define showcase_comment() and that will be used instead.
							 * See showcase_comment() in showcase/functions.php for more.
							 */
							wp_list_comments( array( 'callback' => 'sc_comment' ) );
						?>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
					<div class="navigation">
						<div class="nav-previous"><?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Older Comments', 'showcase' ) ); ?></div>
						<div class="nav-next"><?php next_comments_link( __( 'Newer Comments <span class="meta-nav">&rarr;</span>', 'showcase' ) ); ?></div>
					</div><!-- .navigation -->
		<?php endif; // check for comment navigation ?>
      </ol>
      </div>
      </div>
		<?php else : // or, if we don't have comments:?>
      </ol>
      </div>
    <?php
			/* If there are no comments and comments are closed,
			 * let's leave a little note, shall we?
			 */
			if ( ! comments_open() ) :
		?>
		<?php endif; // end ! comments_open() ?>
		<?php endif; // end have_comments() ?>
	</div><!-- #comments -->
</section>