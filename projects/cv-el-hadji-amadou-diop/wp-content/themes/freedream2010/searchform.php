            <form method="get" id="searchform" action="<?php home_url(); ?>/">
  				<div>
					<label for="s"><?php esc_attr_e('Search'); ?>:</label><br />
					<input name="s" type="text" class="field" id="s" value="<?php the_search_query(); ?>" size="25" /><br />
					<input type="submit" id="searchsubmit" value="&raquo;" class="button" />
				</div>
			</form>