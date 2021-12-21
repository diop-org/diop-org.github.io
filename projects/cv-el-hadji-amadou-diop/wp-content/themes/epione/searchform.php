<form method="get" id="searchform" action="<?php echo get_option('home'); ?>/">
<div>
	<input type="text" value="<?php the_search_query(); ?>" name="s" id="search" size="15" /><br />
	
</div>
</form>