<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
	<?php
		return;
	}
?>

<!-- You can start editing here. -->

<?php if ( have_comments() ) : ?>
	<h3 id="comments"><?php comments_number('No Responses', 'One Response', '% Responses' );?> to &#8220;<?php the_title(); ?>&#8221;</h3>

	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>

	<div class="commentlist">
	<?php wp_list_comments( array( 'callback' => 'diabolique_comment' ) ); ?>

	</div><!-- commentlist-->

	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>
 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments">   </p>

	<?php endif; ?>
<?php endif; ?>





<?php if ( comments_open() ) : ?>

<?php global $user_email,$post_id,$aria_req; $defaults_comment_settings = array( 'fields' => apply_filters( 'comment_form_default_fields', array(

	'respond-info-begin' => '<div class="respond-comment-set-wrap">' . '<div class="respond-info-wrap">' . '<div id="fields">',
	'author' => '<p class="comment-form-author">' .
				'<input id="author" name="author" type="text" value="' .
				esc_attr( $commenter['comment_author'] ) . '" size="22" tabindex="1"' . $aria_req . ' />' .
				'<small for="author">' . __( ' Name' ) . '</small> ' .
				( $req ? '<small class="required">*</small>' : '' ) . 
				'</p>',
	'email'  => '<p class="comment-form-email">' .
				'<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="22" tabindex="2"' . $aria_req . ' />' .
				'<small for="email">' . __( ' E-Mail Address' ) . '</small> ' .
				( $req ? '<small class="required">*</small>' : '' ) .
				'</p>',
	'url'	=> '<p class="comment-form-url">' .
				'<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="22" tabindex="3" />' .
				'<small for="url">' . __( ' Website/Blog URL' ) . '</small>' .
				'</p>',
	'respond-info-end' => '</div><!-- .respond-info --></div><!-- .respond-info-wrap -->' ) ),

	'comment_field' => '<div class="respond-comment">' .
				'<div class="comment-form-comment">' .
				'<textarea id="comment" name="comment" cols="65" rows="10" tabindex="4" aria-required="true"></textarea>' .
				'</div><!-- #form-section-comment .form-section -->' .
				'</div><!-- .respond-comment -->' . '</div><!-- .respond-comment-set-wrap -->' . '<div class="clearfix"></div>',
	'must_log_in' => '<div class="must-log-in">' .  sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</div>',
	'logged_in_as' => '<div class="respond-avatar">' . '<div class="respond-avatar-img">' . get_avatar($user_email, '80') . '</div>' . '</div><!-- .respond-avatar -->' . '<div class="respond-comment-set-wrap">' . 
				'<div class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%s">%s</a>. <a href="%s" title="Log out of this account">Log out</a></div>' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ),
	'comment_notes_before' => '',
	'comment_notes_after' => '',
	'title_reply' => __( 'Leave a Reply' ),
	'title_reply_to' => __( 'Leave a Reply to %s' ),
	'cancel_reply_link' => __( 'Cancel reply' ),
	'label_submit' => __( 'Submit comment' ),
);
comment_form($defaults_comment_settings); ?>


<?php endif; // if you delete this the sky will fall on your head ?>
