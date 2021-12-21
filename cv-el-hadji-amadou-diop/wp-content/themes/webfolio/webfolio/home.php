<?php get_header(); ?>

<!-- begin slider -->
	<!-- begin slider -->
			<div id="slider" >
					<div class="stepcarousel">
						<div class="belt">
						<?php
						$slider_query = new WP_Query($query_string.'&posts_per_page=-1');
						if ($slider_query -> have_posts()) : while ($slider_query -> have_posts()) : $slider_query -> the_post(); 
						$featured = get_post_meta($post->ID, 'featured', $single = true);
						$featured_image = get_post_meta($post->ID, 'featured_image', $single = true);
						if($featured =='1'){?>
							<!-- slider item -->
							<div class="panel">
							<div class="image"><a href="<?php the_permalink(); ?>"><img src="<?php echo $featured_image ?>" border="0" alt="<?php the_title(); ?>" /></a></div>
								<div class="right">
									<div class="text">
										<div class="featured"><img src="<?php bloginfo('template_url'); ?>/images/ico_star.png" alt="Featured" /> FEATURED PROJECT</div>
										<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
										<?php the_excerpt(); ?>
									</div>
								</div>
							</div>
							<?php } ?>
					<?php endwhile; ?>
					<?php endif; ?>
						</div>
					</div>
			</div>
			<!-- end slider -->
	<!-- begin home boxes -->
	<?php $box1=get_post(get_option('webfolio_home_box1'));
		      $box2=get_post(get_option('webfolio_home_box2'));
			  $box3=get_post(get_option('webfolio_home_box3')); 
			  if(get_option('webfolio_home_box1')!= null && get_option('webfolio_home_box2')!= null && get_option('webfolio_home_box3')!= null){?>
	<div id="homeBoxes" class="clearfix">
		<div class="homeBox">
			<h2><?php echo $box1->post_title?></h2>
			<?php echo apply_filters('the_content', $box1->post_content);?>
			<a href="<?php echo get_option('webfolio_home_box1_link')?>" class="more-link">read more</a>
		</div>
		<div class="homeBox">
			<h2><?php echo $box2->post_title?></h2>
			<?php echo apply_filters('the_content', $box2->post_content);?>
			<a href="<?php echo get_option('webfolio_home_box2_link')?>" class="more-link">read more</a>
		</div>
		<div class="homeBox last">
			<h2><?php echo $box3->post_title?></h2>
			<?php echo apply_filters('the_content', $box3->post_content);?>
			<a href="<?php echo get_option('webfolio_home_box3_link')?>" class="more-link">read more</a>
		</div>
	</div>
	<?php }?>
	<!-- end home boxes -->


<!-- slider setup -->
<script type="text/javascript">
			stepcarousel.setup({
				galleryid: 'slider', //id of carousel DIV
				beltclass: 'belt', //class of inner "belt" DIV containing all the panel DIVs
				panelclass: 'panel', //class of panel DIVs each holding content
				autostep: {enable:true, moveby:1, pause:5000},
				panelbehavior: {speed:500, wraparound:false, persist:true},
				defaultbuttons: {enable: true, moveby: 1, leftnav: ['<?php bloginfo('template_directory'); ?>/images/but_prev.png', 653, 300], rightnav: ['<?php bloginfo('template_directory'); ?>/images/but_next.png', -170, 300]},
				statusvars: ['statusA', 'statusB', 'statusC'], //register 3 variables that contain current panel (start), current panel (last), and total panels
				contenttype: ['inline'] //content setting ['inline'] or ['external', 'path_to_external_file']
			})
			
			</script>

<?php get_footer(); ?>