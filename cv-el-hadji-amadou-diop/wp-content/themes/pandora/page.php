<?php get_header(); ?>

	<?php pandora_display_main_menu(); ?>
	
	<?php pandora_featured_pages(); ?>
	
	<div class="container">
		<div class="content content-mini">

			<?php the_post() ?>

			<div id="post-<?php the_ID() ?>" <?php post_class('post-normal-list') ?>>
				<h2 class="page-title"><?php the_title() ?></h2>
				<div id="entry-content-container">
					<?php edit_post_link( __( 'Edit', 'pandora' ), '<span class="edit-link">', '</span>' ) ?>
					<?php the_content() ?>
					
					<?php //display parent and child pages
					$parent = get_the_title($post->post_parent);
					$children = wp_list_pages('title_li=&child_of='.$post->ID.'&echo=0'); 
					if ($post->post_parent || $children){ 
						?><div style="width:96%;clear:both;margin:auto;" class="pointed-line-bottom"></div>
							<ul class="subpage-list page-list-onpage"><?php
								$exist_child = true;
								$current_is_parent = true;
								$current_page = "<li class=\"page_item\"><p>".get_the_title()."</p>";
								$parentli_after = "</li>";
								if ($post->post_parent ) { ?>
									<li class="page_item"><a href="<?php echo get_permalink($post->post_parent) ?>"><?php echo $parent;?></a><?php				
									$current_is_parent = false;
								} 
								if ($current_is_parent == true){
									echo $current_page;
									$current_page = "";
								}
								else{
									$current_page .= "<ul>";
									$parentli_after .= "</ul>";
								}
								if ($children) {
									echo "<ul>";
										echo $current_page;
										echo $children;
									$exist_child = false;
								}
								if ($exist_child == true){
									echo "<ul>";
										echo $current_page;
								}
								echo "</ul>";
								echo $parentli_after;
							?></ul>
						<div style="width:96%;clear:both;margin:auto;" class="pointed-line-top"></div><?php
					} // end page list ----------------------- ?>
					<?php wp_link_pages(array('before' => '<p id="post-tags"><strong> '.__("Pages:","pandora").' </strong>', 'after' => '</p>', 'next_or_number' => 'number')); ?>
					<?php comments_template() ?>
				</div>
			</div><!-- .post -->
		</div><!-- #content -->
		<?php get_sidebar('side'); ?>
	</div><!-- #container -->

<?php get_footer() ?>