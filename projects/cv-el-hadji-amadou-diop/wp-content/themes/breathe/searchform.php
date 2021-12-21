<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
<input type="text" value="<?php the_search_query(); ?>" name="s" id="s" />
<input class="submit" type="image" src="<?php bloginfo('stylesheet_directory'); ?>/images/search.gif" value="submit" />

</form>
