<?php
/**
 * @package WordPress
 * @subpackage bizz Theme
 */
?>
<?php get_header(' '); ?>

		<?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		query_posts($query_string .'&posts_per_page=10&paged=' . $paged);
		if (have_posts()) : ?>
        
        	 <div id="page-heading">
				<h1 id="archive-title">Search Results For: <?php the_search_query(); ?></h1>
            </div>
			<!-- END page-heading -->
            
			<div id="post" class="post clearfix">

				<?php get_template_part( 'loop' , 'entry') ?>
        
        		<?php if (function_exists("pagination")) { pagination($additional_loop->max_num_pages); } ?>
        
			</div>
			<!-- END post  -->
        
		<?php else : ?>
        
			<div id="page-heading">
            <h1 id="archive-title">Search Results For "<?php the_search_query(); ?>"</h1>
        	</div>
            <!-- END page-heading -->
            
            <div id="post" class="post clearfix">
            <?php _e('No results found for that query.', 'bizz'); ?>
			</div>
			<!-- END post  -->
            
        <?php endif; ?>

<?php get_sidebar(' '); ?>		  
<?php get_footer(' '); ?>