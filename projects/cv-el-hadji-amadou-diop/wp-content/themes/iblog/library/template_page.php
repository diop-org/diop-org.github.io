<?php if(pagelines('featureboxes', $post->ID) && VPRO) get_template_part('pro/template_fboxes');?>
<!-- Standard Page Code -->
<div id="maincontent">
	<div id="content">

		 <?php get_template_part('library/_posts');?>

	</div> <!-- end content -->
</div>
<?php get_sidebar(); ?>
<!-- End Standard Page -->