<?php
function pandora_comment_style($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
		<div id="comment-<?php comment_ID(); ?>">
			<div class="comment-author vcard">
				<div class="comment_avatar">
					<?php echo get_avatar($comment,$size='64',$default='<path_to_url>' ); ?>
				</div>
				<div class="comment-meta">
					<?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
					<br />
					<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s', 'pandora'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)', 'pandora'),'  ','') ?>
					- <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
				</div>
			</div>
			<?php if ($comment->comment_approved == '0') : ?>
				<em><?php _e('Your comment is awaiting moderation.','pandora') ?></em>
				<br />
			<?php endif; ?>
			<div class="comment-text">
				<?php comment_text() ?> 
			</div>
		</div><?php 
}
?>