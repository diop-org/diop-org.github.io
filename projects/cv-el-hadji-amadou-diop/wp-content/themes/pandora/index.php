<?php 
get_header(); 
pandora_slider_header_place(); 
?>
	<?php pandora_display_main_menu(); ?>
	
	<?php pandora_featured_pages(); ?>
	
	<div class="container">
		<div class="content content-mini">
		
		
			<!-- start loop-->
			<?php
			//require navigations
			pandora_index_navigation_links();
			
			$counter = 0;
			//set the user settings
			$max = pandora_my_post_architecture();
			$newest_max = $max[0];
			$normal_max = $max[1] + $max[0];
			$old_max = $max[2] + $max[1] + $max[0];
			$archive_max = $max[3] + $max[2] + $max[1] + $max[0];


			//set get type var page
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1; query_posts("posts_per_page=".$archive_max."&paged=$paged");
			//for page id overflow
			if (pandora_pagenavigation() == 0){
				pandora_oups_anti_url_hack();	
			}
			else {
				pandora_there_is_more_page_link();

				while ( have_posts()) : the_post() ?> <?php 
					if ($counter < $newest_max)
					{
						?><div id="post-<?php the_ID() ?>"  <?php post_class('post-newest-list') ?>>
							<div class="entry-title-container">
								<h2><a href="<?php the_permalink() ?>" title="<?php printf( __('Permalink to %s', 'pandora'), the_title_attribute('echo=0') ) ?>" rel="bookmark"><?php the_title() ?></a></h2>
							</div>
							<div id="entry-comment-container">
										
								<div class="entry-image-container">
									<?php
									if ( has_post_thumbnail() ) 
									{
										?><a href="<?php the_permalink() ?>" title="<?php printf( __('Permalink to %s', 'pandora'), the_title_attribute('echo=0') ) ?>" rel="bookmark"><?php
											echo get_the_post_thumbnail(get_the_ID(), array(150,150) );
										?></a><?php
									} 
									else 
									{
										?><a href="<?php the_permalink() ?>" title="<?php printf( __('Permalink to %s', 'pandora'), the_title_attribute('echo=0') ) ?>" rel="bookmark">
											<img src="<?php echo get_template_directory_uri() ?>/images/thumbnail.jpg" title="<?php the_title() ?> " width="150" height="150">
										</a><?php
									}
									?>
									<div id="entry-date-container">
										<?php the_time('M. d.') ?>
									</div>
									
									<?php comments_popup_link( __( 'Comments (0)', 'pandora' ), __( 'Comments (1)', 'pandora' ), __( 'Comments (%)', 'pandora' ) ) ?>
								</div>	
							</div>
							<div class="entry-author-container">
								<?php the_content( ); ?>	
								<?php wp_link_pages(array('before' => '<p id="post-tags"><strong> '.__("Pages:","pandora").' </strong>', 'after' => '</p>', 'next_or_number' => 'number')); ?>
							</div>
							
							<div style="width:96%;clear:both;margin:auto;" class="pointed-line-top">
							</div>
							
							<div id="entry-content-container">
								<?php printf( __( 'By %s', 'pandora' ), '<a href="' . get_author_posts_url( get_the_author_meta( 'ID' ) ) . '" title="' . sprintf( __( 'View all posts by %s', 'pandora' ), $authordata->display_name ) . '">' . get_the_author() . '</a>' ) ?>
								| <?php printf( __( 'Posted in %s', 'pandora' ), get_the_category_list(', ') ) ?> |
								<?php edit_post_link( __( 'Edit', 'pandora' )) ?>
								<p id="post-tags"><?php the_tags( __( 'Tagged: ', 'pandora' ), ", ", "\n\t\t\t\t\t" )?></p>
							</div>
						</div><?php
						$counter++;
					}
					elseif ($counter < $normal_max)
					{
						?><div id="post-<?php the_ID() ?>" <?php post_class('post-normal-list') ?>>
							<div class="entry-image-container">
								<?php
								if ( has_post_thumbnail() ) 
								{
									?><a href="<?php the_permalink() ?>" title="<?php printf( __('Permalink to %s', 'pandora'), the_title_attribute('echo=0') ) ?>" rel="bookmark"><?php
										echo get_the_post_thumbnail(get_the_ID(), array(64,64) );
									?></a><?php
								} 
								else 
								{
									?><a href="<?php the_permalink() ?>" title="<?php printf( __('Permalink to %s', 'pandora'), the_title_attribute('echo=0') ) ?>" rel="bookmark">
										<img src="<?php echo get_template_directory_uri() ?>/images/thumbnail.jpg" title="<?php the_title() ?> " width="64" height="64">
									</a><?php
								}
								?>
								<div id="entry-date-container">
									<?php the_time('M. d.') ?>
								</div>
							</div>
							<div class="entry-title-container">
								<h2><a href="<?php the_permalink() ?>" title="<?php printf( __('Permalink to %s', 'pandora'), the_title_attribute('echo=0') ) ?>" rel="bookmark"><?php the_title() ?></a></h2>
							</div>
							<div class="entry-author-container">
								<span class="author vcard"><?php printf( __( 'By %s', 'pandora' ), '<a class="url fn n" href="' . get_author_posts_url( get_the_author_meta( 'ID' ) ) . '" title="' . sprintf( __( 'View all posts by %s', 'pandora' ), $authordata->display_name ) . '">' . get_the_author() . '</a>' ) ?></span>
								| <?php printf( __( 'Posted in %s', 'pandora' ), get_the_category_list(', ') ) ?> |
								<?php edit_post_link( __( 'Edit', 'pandora' )) ?><br />
								<?php comments_popup_link( __( 'Comments (0)', 'pandora' ), __( 'Comments (1)', 'pandora' ), __( 'Comments (%)', 'pandora' ) ) ?>
							</div>
							
							<div id="entry-content-container">
								<?php the_content( ); ?>
								<?php wp_link_pages(array('before' => '<p id="post-tags"><strong> '.__("Pages:","pandora").' </strong>', 'after' => '</p>', 'next_or_number' => 'number')); ?>
								<p id="post-tags"><?php the_tags( __( 'Tagged: ', 'pandora' ), ", ", "\n\t\t\t\t\t" )?></p>
							</div>
						</div><?php
						$counter++;
					}
					elseif ($counter < $old_max)
					{
						?><div id="post-<?php the_ID() ?>" <?php post_class('post-gallery-list') ?>>
							<div style="float:left"><?php
							if ( has_post_thumbnail() ) 
							{
								?><a href="<?php the_permalink() ?>" title="<?php printf( __('Permalink to %s', 'pandora'), the_title_attribute('echo=0') ) ?>" rel="bookmark"><?php
									echo get_the_post_thumbnail(get_the_ID(), array(50,50) );
								?></a><?php
							} 
							else 
							{
								?><a href="<?php the_permalink() ?>" title="<?php printf( __('Permalink to %s', 'pandora'), the_title_attribute('echo=0') ) ?>" rel="bookmark">
									<img src="<?php echo get_template_directory_uri() ?>/images/thumbnail.jpg" title="<?php the_title() ?> " width="50" height="50">
								</a><?php
							}
							?>
							</div>
							<div id="title" style="padding:0 10px 0 5px;float:left">
							<a href="<?php the_permalink() ?>" title="<?php printf( __('Permalink to %s', 'pandora'), the_title_attribute('echo=0') ) ?>" rel="bookmark"><?php echo substr(get_the_title(),0,19) ?>...<br /><?php the_time('F jS, Y') ?></a>
							</div>
						</div><?php
						
						$counter++;
					}
					elseif ($counter < $archive_max)
					{
						?><div <?php post_class('post-archive-list') ?>>
							<ul id="post-<?php the_ID() ?>">
								<li>
									<a href="<?php the_permalink() ?>" title="<?php printf( __('Permalink to %s', 'pandora'), the_title_attribute('echo=0') ) ?>" rel="bookmark"><?php the_title() ?></a>
									<p><?php the_time('F jS, Y') ?></p>
								</li>
							</ul>
						</div><?php
							
						$counter++;
					}	
				endwhile; 
				pandora_there_is_more_page_link();
			}
			//reset the position of list
			wp_reset_query();
			 ?>
			<!-- end loop-->
			
			
		</div><!-- #content -->
		<?php get_sidebar('side'); ?>
	</div><!-- #container -->

<?php get_footer(); ?>