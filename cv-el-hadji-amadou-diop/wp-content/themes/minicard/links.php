<?php
/*
Template Name: Links
*/
?>

<?php get_header(); ?>

<div id="mainContent">

<h1><?php _e('Links:', 'minicard'); ?></h1>

<div class="post">
	<ul>
	<?php wp_list_bookmarks(); ?>
	</ul>
</div>

<div class="clear"></div>

</div>

<?php get_footer(); ?>