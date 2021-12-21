<h3 id="comments-title"><?php printf( _n( 'One Response to %2$s', '%1$s Responses to %2$s', get_comments_number(), 'nwc' ), number_format_i18n( get_comments_number() ), '<em>' . get_the_title() . '</em>' ); ?></h3>

<div id="comments">
<?php if ( post_password_required() ) : ?>

<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'nwc' ); ?></p>

</div>

<?php
return;
endif;
?>

<?php if ( have_comments() ) : ?>

<ol class="commentlist">
<?php wp_list_comments('type=all&callback=nwc_comment'); ?>
</ol>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>

<div class="navigation">
<?php previous_comments_link( __('Older Comments', 'nwc' ) ); ?> <?php next_comments_link( __('Newer Comments', 'nwc' ) ); ?>
</div>

<?php endif;  ?>

<?php else : if ( ! comments_open() ) : ?>

<?php endif; ?>

<?php endif; ?>

<?php comment_form(array(
'comment_notes_before' =>__( '<p class="comment-notes">Required fields are marked <span class="required">*</span></p>', 'nwc'),
'label_submit' => __( 'Submit Comment', 'nwc' ) ,
'comment_field'  => '<p class="comment-form-comment"><label for="comment">' . __( 'Comment', 'nwc' ) . '</label></p>',
'comment_notes_after'  => '<p><textarea id="comment" name="comment" rows="8" cols="45"></textarea></p>
<p class="form-allowed-tags">' . sprintf( __( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s', 'nwc' ) , ' <code>' . allowed_tags() . '</code>') . '</p>',
'id_form' => 'commentform',
'id_submit' => 'submit',
'title_reply' => __( 'Leave a Reply', 'nwc' ) ,
'title_reply_to' => __( 'Leave a Reply to %s', 'nwc'  ),
'cancel_reply_link' => __( 'Cancel reply', 'nwc'  ),
'logged_in_as' =>   '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'nwc' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>'  ,
)
);
?>






</div>
