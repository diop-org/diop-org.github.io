<?php

// This file has all the html used in PageLines dynamic plugins 

function pagelines_draw_carousel(){?>		
	<div class="prev"></div>
	<div class="next"></div>
	<div class="thecarousel">
		<ul id="mycarousel" class="mycarousel">

			<?php 
			// Pictures in Carousel
			if(m_pagelines('carouselitems', $post->ID)) $carouselitems = m_pagelines('carouselitems', $post->ID);
			else $carouselitems = 30;
	
			if(m_pagelines('carousel_mode', $post->ID) == 'posts'):?>
				<?php $recentposts = get_posts('numberposts='.$carouselitems.'&offset=0');?>
				<?php foreach($recentposts as $key => $rpost):?>
					<?php setup_postdata($rpost);?>

						<li class="list-item fix">
							<a class="carousel_image_link" href="<?php echo get_permalink($rpost->ID); ?>">
							<?php if(has_post_thumbnail()): ?>
		                              <?php the_post_thumbnail(array( 70, 70 ),array( 'class' => 'list_thumb list-thumb' ));?>
							<?php else: ?>
								<img class="list_thumb list-thumb" src="<?php echo CORE_IMAGES;?>/post-blank.jpg" width="70" height="70" class="sidebar_thumb" />
							<?php endif;?> 
								<span class="list-title"><?php echo $rpost->post_title; ?></span>
							</a>

						</li>

				<?php endforeach;?>
			<?php elseif(function_exists('nggDisplayRandomImages')  && m_pagelines('carousel_mode', $post->ID) == 'ngen_gallery'):?>
						<?php 	if(m_pagelines('carousel_ngen_gallery', $post->ID)) $ngen_id = m_pagelines('carousel_ngen_gallery', $post->ID);
								else $ngen_id = 1; 
						?>
						<?php echo do_shortcode('[nggallery id='.$ngen_id.' template=plcarousel]');?>
				
			<?php elseif(function_exists('get_flickrRSS') && m_pagelines('carousel_mode', $post->ID) == 'flickr'):?>
			
				<?php 
					get_flickrRSS(array(
						'num_items' => $carouselitems, 
						'html' => '<li><a href="%flickr_page%" title="%title%"><img src="%image_square%" alt="%title%"/><span class="list-title">%title%</span></a></li>'	
					));
				?>
				
			<?php else:?>
				<?php _e("You have selected the carousel page template but the plugins aren't activated for the selected mode (either NextGen-Gallery or FlickrRSS). Options are set in page options. Default mode is FlickrRSS.", TDOMAIN);?>
		
			<?php endif;?>
		</ul>
	</div>

<?php } 

function pagelines_draw_fboxes(){?>
	<div class="fboxes fix">
			<?php 
			// inserts a clearing element at the end of each line of boxes
			$perline = 3;
			$count = $perline;?>
			
			
			<?php
			global $post; 
			$current_post = $post;

			$boxes = get_posts('offset=0&post_type=boxes');
 
			foreach($boxes as $post) : setup_postdata($post); $custom = get_post_custom($post->ID); ?>
			
					<div class="fbox">
				
						<div class="fboxcopy" style="">	
							<?php if(has_post_thumbnail()):?>
								<div class="fboxgraphic">
									<?php the_post_thumbnail(array(80,80));?>
					            </div>
							<?php endif;?>
							<div class="fboxinfo fix">
								<div class="fboxtitle"><h3><?php the_title(); ?></h3></div>
								<div class="fboxtext"><?php the_content(); ?></div>
							</div>
						</div>
					</div>
					<?php $end = ($count+1) / $perline;  if(is_int($end)):?><div class="clear"></div><?php endif;?>
					<?php $count++;?>
			<?php endforeach;?>
	</div>
	<div class="clear"></div>
	
	
<?php }

function pagelines_draw_slider(){?>
	<div id="feature" class="fix">
		<div id="cycle">

			
				<?php
				global $post; 
				$current_post = $post;

				$myposts = get_posts('offset=0&post_type=feature');
	 
				foreach($myposts as $post) : setup_postdata($post); $custom = get_post_custom($post->ID); ?>
					<div id="<?php echo str_replace(' ', '_', $feature['name']);?>"  class="fcontainer" <?php if(isset($feature['background'])):?>style="background:<?php echo $feature['background'];?>"<?php endif;?>>
							<div class="fcontent">
								<div class="fheading">
									<h2 class="ftitle"><?php the_title(); ?></h2>
								</div>
								<div class="ftext">
									<?php the_content(); ?>
									<?php edit_post_link(__('(Edit Slide)', TDOMAIN), ' ', ' ');?>
									<?php if($feature['link']):?>
										<div class="flink"><a class="featurelink" href="<?php the_permalink();?>"><?php _e('More', TDOMAIN);?></a></div>
									<?php endif;?>
								</div>
							</div>
							<div class="fmedia">
								
								<?php if($custom['postMedia'][0]):?>
									<?php echo $custom['postMedia'][0]; ?>
								<?php else:?>
									<?php the_post_thumbnail(array(FMEDIAWIDTH,600));?>
								<?php endif;?>
							</div>
						<div class="clear"></div>
					</div>
				<?php endforeach; ?>
				
				<?php $post = $current_post;?>
		
		</div>
		<div id="featurenav">
			<?php if(pagelines('timeout') != 0 && pagelines('feature_playpause')):?><span class="playpause pause"><span>&nbsp;</span></span><?php endif;?>
		</div>
		<div class="clear"></div>
	</div>
	<div class="clear"></div>
<?php }

function pagelines_draw_highlight(){?>
	<?php if(get_post_meta($post->ID, 'featuremedia', true)):?><div class="fmedia"><?php echo do_shortcode(get_post_meta($post->ID, 'featuremedia', true));?></div><?php endif;?>
	<div class="fcontent">
		<?php if(get_post_meta($post->ID, 'featuretitle', true)):?><h1><?php echo do_shortcode(get_post_meta($post->ID, 'featuretitle', true));?></h1><?php endif;?>
		<?php if(get_post_meta($post->ID, 'featuretext', true)):?><p><?php echo do_shortcode(get_post_meta($post->ID, 'featuretext', true));?></p><?php endif;?>
		<?php if(!get_post_meta($post->ID, 'featuretitle', true) || !get_post_meta($post->ID, 'featuretext', true)):?>
			<h1>Add text in <a href="<?php echo admin_url()."page.php?action=edit&post=".$post->ID;?>">admin</a></h1><p> using the interface we've provided in the 'add page' section of the admin or simply add a custom fields to this page called "featuretitle" &amp; "featuretext" (with the corresponding content).</p><?php endif;?>
	</div>
<?php } ?>