<?php if(is_search()):?>
	<div class="posts-news">
	<h2 class="pagetitle posts-news-headline"><?php _e('Search Results For:',TDOMAIN);?> <span>"<?php the_search_query(); ?>"</span></h2>
	</div>
<?php endif;?>

 <!-- The Loop -->
<?php if (!is_404() && have_posts()) : while (have_posts()) : the_post(); // Start of the loop ?>

	<div class="postwrap fix">	
		
		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<?php if(is_single()):?>
				<div class="post-nav fix"> <span class="previous"><?php previous_post_link('%link') ?></span> <span class="next"><?php next_post_link('%link') ?></span></div>
			<?php endif;?>
			
			<?php if(!is_page()):?>	
			<div class="copy fix">		
					<?php if(pl_show_thumb($post->ID)): ?>
			            		<div class="thumb left">
									<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php _e('Permanent Link To', TDOMAIN);?> <?php the_title_attribute();?>">
										<?php the_post_thumbnail('thumbnail');?>
									</a>
					            </div>
					<?php elseif (get_post_meta($post->ID, 'thumb', true)): ?>
						<?php $postimageurl = get_post_meta($post->ID, 'thumb', true); ?>
		            	<div class="thumb left">
			              <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php _e('Permanent Link To', TDOMAIN);?> <?php the_title_attribute();?>">
							<img src="<?php echo $postimageurl; ?>" alt="Post Pic" width="200" height="200" />
						</a>
			            </div>
					<?php endif; ?>
					
					<div class="post-header fix <?php if(!pl_show_thumb($post->ID) && !get_post_meta($post->ID, 'thumb', true)) echo 'post-nothumb';?>" style="<?php 
						if(pl_show_thumb($post->ID)){
							$post_header_width = 555 - get_option('thumbnail_size_w');
							echo 'width: '.$post_header_width.'px';
						}?>">
						<div class="post-title-section fix">
							<div class="post-title fix">
								<h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php _e('Permanent Link to',TDOMAIN);?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
								<div class="metabar">
									<em>
									<?php _e('On',TDOMAIN);?> <?php the_time(get_option('date_format')); ?>, 
									<?php _e('in',TDOMAIN);?> <?php the_category(', ') ?>, 
									<?php _e('by',TDOMAIN);?> <?php the_author(); ?>
									<!-- <?php edit_post_link(__('<strong>(Edit Post)</strong>', TDOMAIN), ' ', ' ');?> -->
									</em>
								</div>
							</div>
						</div>
						<!--/post-title -->

						<?php if(pl_show_excerpt($post->ID)):?>
								<div class="post-excerpt">
									<?php the_excerpt(); ?>
								</div>
						<?php endif; ?>
					</div>				
			
			</div>
			<?php endif;?>
			<?php  if(pl_show_content($post->ID)):?>  	
				<div class="copy fix">
					<?php if(pagelines('pagetitles') && is_page()  || is_page_template('page-feature-blog.php')):?>
						<h1 class="pagetitle"><?php the_title(); ?></h1>
					<?php endif;?>
					<div class="textcontent">
						<?php the_content(__('<p>Continue reading &raquo;</p>',TDOMAIN)); ?>
						<div class="clear"></div>	
						<?php wp_link_pages(__('<p><strong>Pages:</strong>', TDOMAIN), '</p>', __('number', TDOMAIN)); ?>
						<?php edit_post_link(__('Edit',TDOMAIN), '<p>', '</p>'); ?>	
						<div class="clear"></div>
					</div>	
					<div class="tags">
					<?php the_tags(__('Tagged with: ', TDOMAIN),' &bull; ','<br />'); ?>&nbsp;
					</div>
				</div>
				<?php if(pagelines('authorinfo') && is_single()):?>
					<?php get_template_part('library/_authorinfo');?>
				<?php endif;?>
								
			<?php endif;?>
					
			<?php if(!is_page()) get_template_part('library/_post_footer');?>
		</div><!--post -->

	</div>
	
	
	<div class="clear"></div>
	
		<?php if(is_single() || is_page()):?>
		
			<?php get_template_part("library/_contentsidebar");?>
			
			<div class="postwrap <?php if(!have_comments() && 'open' != $post->comment_status) echo "nocommentform";?>">	
				<div class="hentry">		
					<div class="copy"> <?php comments_template();?></div>
				</div>
				<br/><br/>
			</div>
			
		<?php endif; endwhile; ?>
	
	<?php get_template_part('library/_pagination');?>

		
	<?php else : ?>
		<div class="postwrap fix">
			<div class="hentry">
			<div class="billboard">
				<?php if(is_404()):?>
					<h2 class="center"><?php _e('Error 404 - Page Not Found',TDOMAIN);?></h2>
				<?php else:?>
					<h2 class="center"><?php _e('Nothing Found',TDOMAIN);?></h2>
				<?php endif;?>
				<p class="center"><?php _e('Sorry, what you are looking for isn\'t here.', TDOMAIN);?></p>
				<div class="center fix"><?php get_template_part ('library/_searchform'); ?></div>
			</div>
			</div>
		</div>
		
<?php endif; // end the loop ?> 

