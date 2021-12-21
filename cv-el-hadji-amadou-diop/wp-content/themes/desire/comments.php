<?php
/*
@package WordPress
@subpackage Desire
*/
?>
<?php global $options; ?>
<?php if (post_password_required()) : ?>
<div id="comments">
    <p class="nopassword"><?php _e('This post is password protected. Enter the password to view any comments.', 'desire'); ?></p>
</div>
<?php
    return;
    endif;
?>
<div id="comments">
<?php if (have_comments()) : ?>
    <h2 id="comments-title">
        <?php if(get_comments_number() > 1) $commentlabel = __('Comments','desire'); else $commentlabel = __('Comment','desire'); ?>
        <?php echo number_format_i18n(get_comments_number()).' '.$commentlabel; ?>
    </h2>
    <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
    <div class="comment-navigation clearfix">
        <span class="nav-previous"><?php previous_comments_link(__('Older Comments','desire')); ?></span>
        <span class="nav-next"><?php next_comments_link(__('Newer Comments','desire')); ?></span>
    </div>
    <?php endif; ?>
    <ul class="commentlist">
        <?php wp_list_comments(array('callback' => 'desire_list_comments')); ?>
    </ul>
<?php elseif (!comments_open() && !is_page() && post_type_supports(get_post_type(), 'comments')): ?>
    <p class="nocomments"><?php _e('Comments are closed.', 'desire'); ?></p>
<?php endif; ?> <!-- If have comments -->
<?php comment_form(); ?>
</div> <!-- #comments -->