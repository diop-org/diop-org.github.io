<?php
function pandora_pagenavigation(){
	$counter = 0;
	while ( have_posts()) : the_post() ?><?php
		$counter++;
	endwhile;
	return $counter;
}

function pandora_there_is_more_page_link(){
	?><div id="nav-above" class="navigation">
		<div class="nav-previous"><?php next_posts_link(__( '<span class="meta-nav">&laquo;</span> Older posts', 'pandora' )) ?></div>
		<div class="nav-next"><?php previous_posts_link(__( 'Newer posts <span class="meta-nav">&raquo;</span>', 'pandora' )) ?></div>
	</div><?php
}
?>