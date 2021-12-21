<form method="get" class="searchform" action="<?php bloginfo('url'); ?>/">
	<div><label class="hidden" for="sf"><?php _e('Search:', 'minicard'); ?></label><input type="text" value="<?php the_search_query(); ?>" name="s" id="sf" class="text" /><input type="submit" class="submit" value="<?php _e('Search', 'minicard'); ?>" /></div>
</form>
