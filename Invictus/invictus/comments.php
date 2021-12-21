<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.  The actual display of comments is
 * handled by a callback to max_comment which is
 * located in the functions.php file.
 *
 * @package WordPress
 * @subpackage Invictus
 * @since Invictus 1.0
 */
?>

			<div id="comments">
<?php if ( post_password_required() ) : ?>
				<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', MAX_SHORTNAME); ?></p>
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
	// You can start editing here -- including this comment!
?>

<?php if ( have_comments() ) : ?>
			<h3 id="comments-title"><?php
			printf( _n( '%1$s Comment. Leave your Comment right now:', '%1$s Comments. Leave your Comment right now:', get_comments_number() ),
			number_format_i18n( get_comments_number() ), '<em>' . get_the_title() . '</em>' );
			?></h3>

<?php if ( get_comment_pages_count() > 1 && get_option_max('page_comments' ) ) : // Are there comments to navigate through? ?>
			<div class="navigation">
				<div class="nav-previous"><?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Older Comments', MAX_SHORTNAME ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments <span class="meta-nav">&rarr;</span>', MAX_SHORTNAME ) ); ?></div>
			</div> <!-- .navigation -->
<?php endif; // check for comment navigation ?>

			<ol class="commentlist">
				<?php
					/* Loop through and list the comments. Tell wp_list_comments()
					 * to use max_comment() to format the comments.
					 * If you want to overload this in a child theme then you can
					 * define max_comment() and that will be used instead.
					 * See max_comment() in doitmax_fw/max_comments.php for more.
					 */
					wp_list_comments( array( 'callback' => 'max_comment' ) );
				?>
			</ol>

<?php if ( get_comment_pages_count() > 1 && get_option_max('page_comments' ) ) : // Are there comments to navigate through? ?>
			<div class="navigation">
				<div class="nav-previous"><?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Older Comments', MAX_SHORTNAME ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments <span class="meta-nav">&rarr;</span>', MAX_SHORTNAME ) ); ?></div>
			</div><!-- .navigation -->
<?php endif; // check for comment navigation ?>

<?php else : // or, if we don't have comments:

	/* If there are no comments and comments are closed,
	 * let's leave a little note, shall we?
	 */
	if ( ! comments_open() ) :
?>
	<p class="nocomments"><?php _e( 'Comments are closed.', MAX_SHORTNAME); ?></p>
<?php endif; // end ! comments_open() ?>

<?php endif; // end have_comments() ?>

<?php comment_form(
		array(
			'title_reply' => __('Leave a Reply', MAX_SHORTNAME),
			'comment_field' => '<p class="comment-form-comment"><label for="comment">' . _x( 'Your Comment:', 'noun', MAX_SHORTNAME ) . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',
			'logged_in_as'=> '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', MAX_SHORTNAME ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
			'comment_notes_before' => '<p class="comment-notes">' . __( 'Your email address will not be published.', MAX_SHORTNAME ) . '</p>',
			'comment_notes_after' => '<p class="form-allowed-tags">' . sprintf( __( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s', MAX_SHORTNAME ), ' <code>' . allowed_tags() . '</code>' ) . '</p>',
			'label_submit' => __( 'Post Comment', MAX_SHORTNAME )
		 ) 
	); ?>

</div><!-- #comments -->
