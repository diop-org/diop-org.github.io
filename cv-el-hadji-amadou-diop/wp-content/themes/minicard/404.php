<?php @header("HTTP/1.1 404 Not found", TRUE, 404); ?>
<?php get_header(); ?>

<div id="mainContent">
	
	<h1><?php _e("Sorry, Nothing was Found", 'minicard'); ?></h1>
	
	<p><?php _e("I'm sorry to report that no article was found under that address. The page or post may have been moved.", 'minicard'); ?></p>

</div>

<?php get_footer(); ?>