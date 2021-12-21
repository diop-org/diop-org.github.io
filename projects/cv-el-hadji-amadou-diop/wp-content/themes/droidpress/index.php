<?php

 /*
	Index
	
	Creates the default index page.
	
	Copyright (C) 2011 CyberChimps
*/

?>

<?php get_header(); ?>

<div id="content_wrap">

	<div id="content_left">

		<div class="content_padding">
		
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
			<!--Call the Loop-->
			<?php get_template_part( 'content', get_post_format() ); ?>
				
		<?php endwhile; ?>

		<?php get_template_part('pagination', 'index' ); ?>

		<?php else : ?>

			<h2>Not Found</h2>

		<?php endif; ?>
		</div> <!--end content_padding-->
	</div> <!--end content_left-->

	<?php get_sidebar(); ?>
	
</div><!--end content_wrap-->
<div style="clear:both;"></div>

<?php get_footer(); ?>