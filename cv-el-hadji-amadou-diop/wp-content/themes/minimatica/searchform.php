<?php
/**
 * Search Form
 *
 * @package WordPress
 * @subpackage Minimatica
 * @since Minimatica 1.0
 */
 ?>
 
<div id="search" class="only-search with-image">
	<form method="get" id="searchform" action="<?php echo home_url(); ?>">
		<input type="text" class="field" name="s" id="s"  placeholder="<?php _e( 'Search', 'duster' ) ?>" />
		<input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php _e( 'Search', 'duster' ); ?>" />
	</form><!-- #searchform -->
</div><!-- #search -->