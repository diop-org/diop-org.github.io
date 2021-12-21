<!-- Start Sidebar -->

			<div id="sidebar">
				<div id="social_network">
                        <?php
                            global $social_network;
                            global $num_social_network;
                            global $options;
                            
                            if($options['feed'])
                            {
                                ?>
                               <a href="<?php echo bloginfo('rss2_url'); ?>" title="<?php _e('Syndicate this site using RSS'); ?>" class="feed">
                                    <img src="<?php echo bloginfo('template_url'); ?>/images/feed.png" title="feed" />
                               </a>
                                <?php
                            }
                            
                            for($i = 0; $i <= $num_social_network-1; $i++)
                            {
                                if($options[$social_network[$i]])
                                {
                                    $url = $social_network[$i]."_url";
                                    ?>
                                    <a href="<?php echo $options[$url]; ?>">
                                        <img src="<?php echo bloginfo('template_url'); ?>/images/socialnetwork/<?php echo $social_network[$i]; ?>.png" title="<?php echo $social_network[$i] ?>" />
                                    </a>
                                    <?php
                                }
                            }
                        ?>
				</div>
				<div id="left_sidebar">
					<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(1) ) : else : ?>
					<ul>
					<li class="blocco">
						<h1><?php _e('Recent Posts'); ?></h1>
							<ul>
							<?php get_archives('postbypost', 10); ?>
							</ul>
					</li>
					<li class="blocco">
						<h1><?php _e('Calendar'); ?></h1>
						<ul>
							<li><?php get_calendar(); ?></li>
						</ul>
					</li>
					<li class="blocco">
						<h1><?php _e('Archive'); ?></h1>
						<ul>
							<?php 
								wp_get_archives('type=monthly&show_post_count=1');
							?>
						</ul>
					</li>
					<li class="blocco">
						<h1><?php _e('Tag Cloud'); ?></h1>
						<ul>
							<li><?php if (function_exists("wp_tag_cloud")) wp_tag_cloud('smallest=7&largest=18&number=40&format=flat'); ?></li>
						</ul>
					</li>
					</ul>
					<?php endif; ?>
				</div>
				<div id="right_sidebar">
					<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(2) ) : else : ?>
					<ul>
					<li class="blocco">
						<h1><?php _e('Search'); ?></h1>
						<?php if (function_exists('search_form')) search_form(); ?>
					</li>
					<li class="blocco">
						<h1><?php _e('Category'); ?></h1>
						<ul>
							<?php 
								wp_list_cats('sort_column=name&show_count=1');
							?>
						</ul>
					</li>
					</ul>
					<?php endif; ?>
				</div>
			</div>




<!-- End Sidebar -->