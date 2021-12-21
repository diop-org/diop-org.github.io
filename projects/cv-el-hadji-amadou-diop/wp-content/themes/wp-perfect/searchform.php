<div id="search">
<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
	<?php if(is_search()){ ?>
		<input type="text" value="<?php the_search_query(); ?>" name="s" id="s" />
	<?php } else { ?>
		<input type="text" value="Enter your Search Term here" onfocus="if (this.value == 'Enter your Search Term here') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Enter your Search Term here';}" name="s" id="s" />
	<?php } ?>
	<input type="submit" value="Search" id="searchsubmit"/>
</form>
</div>