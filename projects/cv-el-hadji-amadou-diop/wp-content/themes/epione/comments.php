<?php
 
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
<?php if ( ! empty($comments_by_type['comment']) ) : ?>

<h3 id="comments"><?php comments_number('No Responses', '<a>One</a> Response', '<a>%</a> Responses' );?> to &#8220;<?php the_title(); ?>&#8221;</h3>
 
<div class="navigation">
<div class="alignleft"><?php previous_comments_link() ?></div>
<div class="alignright"><?php next_comments_link() ?></div>
</div>
 
<ul class="commentlist">	

<?php wp_list_comments('type=comment&callback=ep_comment');?>
</ul>
 
<?php endif; ?>
<?php if ( ! empty($comments_by_type['pings']) ) : ?>
<h3 id="comments_ping">Trackbacks &amp; Pings</h3>
 
<ul class="commentlist" id="ping">
<?php wp_list_comments('type=pings&callback=ep_ping'); ?>
</ul>
<?php endif; ?>
 
<div class="navigation">
<div class="alignleft"><?php previous_comments_link() ?></div>
<div class="alignright"><?php next_comments_link() ?></div>
</div>


<?php else : // this is displayed if there are no comments so far ?>
 
<?php if ('open' == $post->comment_status) : ?>
<!-- If comments are open, but there are no comments. -->
 
<?php else : // comments are closed ?>
<!-- If comments are closed. -->
<p class="nocomments">Comments are closed.</p>
 
<?php endif; ?>
<?php endif; ?>
 
<?php comment_form(); ?>