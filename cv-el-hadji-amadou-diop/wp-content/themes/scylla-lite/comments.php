<?php
 
// Do not delete these lines
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
die ('Please do not load this page directly. Thanks!');
 
if ( post_password_required() ) { ?>
<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.', 'scylla'); ?></p>
<?php
return;
}
?>
 
<!-- You can start editing here. -->
 
<?php if ( have_comments() ) : ?>
<?php if ( ! empty($comments_by_type['comment']) ) : ?>

<h3 id="comments"><?php comments_number(__( 'No Responses', 'scylla'), __('One Response', 'scylla'), __('% Responses', 'scylla'));?> to &#8220;<?php the_title(); ?>&#8221;</h3>
 
 
<ul class="commentlist">	

<?php wp_list_comments('type=comment&callback=scl_comment');?>
</ul>

 <div class="navigation">
<?php paginate_comments_links( array('prev_text' => '&laquo;', 'next_text' => '&raquo;')) ?>
</div>

<?php endif; ?>
<?php if ( ! empty($comments_by_type['pings']) ) : ?>
<h3 id="comments_ping"><?php _e('Trackbacks &amp; Pings', 'scylla'); ?></h3>
 
<ul class="commentlist" id="ping">
<?php wp_list_comments('type=pings&callback=scl_ping'); ?>
</ul>

<div class="navigation">
<?php paginate_comments_links( array('prev_text' => '&laquo;', 'next_text' => '&raquo;')) ?>
</div>

<?php endif; ?>
 



<?php else : // this is displayed if there are no comments so far ?>
 
<?php if ('open' == $post->comment_status) : ?>
<!-- If comments are open, but there are no comments. -->
 
<?php else : // comments are closed ?>
<!-- If comments are closed. -->
<p class="nocomments"><?php _e('Comments are closed.', 'scylla'); ?></p>
 
<?php endif; ?>
<?php endif; ?>
 
<?php comment_form(); ?>