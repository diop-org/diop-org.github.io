<?php
/**
 * @package Lazy Sunday
 */

// Do not delete these lines

	if ( post_password_required() ) { ?>
		<p class="nocomments"><?php _e( 'This post is password protected. Enter the password to view comments.' , 'lazy-sunday' ) ?></p>
	<?php
		return;
	}
?>

<!-- You can start editing here. -->
<?php if ( have_comments() ) : ?>
	<h3 id="comments" class="page_title">
		<?php comments_number( __( 'No Responses' , 'lazy-sunday' ) , __( 'One Response' , 'lazy-sunday' ) , '% ' . __( 'Responses' , 'lazy-sunday' ) );?> <?php _e( 'to' , 'lazy-sunday' ) ?> &#8220;<?php the_title(); ?>&#8221;
	</h3>

	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>

	<ol class="commentlist">
		<?php wp_list_comments(); ?>
	</ol>

	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>
 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments"><?php _e( 'Comments are closed.' , 'lazy-sunday' ) ?></p>

	<?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>
	
	<?php comment_form(); ?>

<?php endif; // if you delete this the sky will fall on your head ?>
