<div class="pandora_search">
	<form id="searchform" class="blog-search" method="get" action="<?php echo home_url() ?>">
		<div>
			<input id="s" name="s" type="text" class="text" value="<?php the_search_query() ?>" size="13" tabindex="1" /><br />
			<input type="submit" class="button" value="<?php _e( 'Search', 'pandora' ) ?>" tabindex="2" />
		</div>
	</form>
</div>