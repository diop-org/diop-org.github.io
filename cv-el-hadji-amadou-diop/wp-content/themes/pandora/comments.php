<?php
if ( post_password_required() ){ 
	?><p class="nopassword"><?php _e('This post is password protected. Enter the password to view any comments.', 'pandora') ?></p><?php
}
else{
	paginate_comments_links();

	?><br /><br /><ul class="commentlist">
		<?php wp_list_comments('type=comment&callback=pandora_comment_style'); ?>
	</ul><?php

	paginate_comments_links();
	comment_form();
}
?>



