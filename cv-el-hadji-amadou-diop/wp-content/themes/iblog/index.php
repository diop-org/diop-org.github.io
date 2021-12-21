<?php 
/*
	iBlogPro Copyright (C) 2008-2010 Andrew Powers, PageLines.com (andrew AT pagelines DOT com)

	Licensed under the terms of GPL
*/

global $pagelines;


	get_header(); 
	if(pagelines('featureblog') && VPRO) get_template_part('pro/template_feature');
	get_template_part('library/template_posts');
	get_footer();
	
	
?>