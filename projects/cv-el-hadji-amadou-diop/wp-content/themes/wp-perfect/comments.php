<?php
// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) {
		echo '<p class="nocomments">This post is password protected. Enter the password to view comments.</p>';
		return;
	}

	if ( have_comments() ) :
?>



	<div id="thecomments">
	<p class="comments"><?php echo count($comments_by_type['comment']);?> Comments</p>
		<ol class="commentlist">
		<?php wp_list_comments('type=comment&avatar_size=48'); ?>
		</ol>
		<?php	
			if (get_option('page_comments')) {
				$comment_pages = paginate_comments_links('echo=0');
				if($comment_pages){
				 echo '<div class="commentnavi"><span class="commentpages">'.$comment_pages.'</span></div>';
				}
			}
		?>
	</div>

	<div id="thetrackbacks">
<p class="trackbacks"><?php echo count($comments_by_type['pings']);?> Trackbacks</p>
		<ol class="commentlist">
			<?php
				wp_list_comments('type=pings&page=1&per_page=9999&callback=comment_list_pings');
				//wp_list_comments('type=pings&per_page=9999');
			?>
		</ol>
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