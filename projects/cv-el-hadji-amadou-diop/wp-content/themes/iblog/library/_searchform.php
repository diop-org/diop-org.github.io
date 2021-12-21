<form method="get" class="searchform" action="<?php bloginfo('url'); ?>/">
	<span class="left"></span>
		<input type="text" value="<?php _e('Search', TDOMAIN);?>" name="s" class="s" onfocus="if (this.value == '<?php _e('Search', TDOMAIN);?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e('Search', TDOMAIN);?>';}" />
	<span class="right"></span>
	<input type="submit" class="searchsubmit" value="<?php _e('Go', TDOMAIN);?>" />
</form>
