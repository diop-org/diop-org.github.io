		<div class="clear"></div>
	</div></div></div><!-- end content -->
	
	<div id="subContent">
	
		<ul class="widgets">
		
			<?php if ( function_exists('dynamic_sidebar') ) dynamic_sidebar(1); ?>
			
			<?php if (file_exists(TEMPLATEPATH.'/premium/feed.php') && get_option('show_footer_feeds')=='yes') : ?>
				<li class="widget loading" id="feeds" style="display:none;">
					<h2 class="section"><?php if ($title = get_option('home_feed_title')) echo $title; else _e('What I\'m Saying'); ?></h2>
				</li>				
			<?php endif; ?>
			
			<?php if ($folio = get_option('portfolio_cat_id')) : ?>
			<li class="widget">
			<h2 class="section"><?php _e('My Featured Work', 'minicard'); ?></h2>
			<ul class="folio">
				<?php
				$args=array(
					'posts_per_page' => get_option('portfolio_items'),
					'cat' => $folio
				);
				$my_query = new WP_Query($args);
				$alt = 1;
				if ($my_query->have_posts()) while ($my_query->have_posts()) : $my_query->the_post();
					
					$thumbnail = '';
					$large = '';
					
					$attachments = get_children( array('post_parent' => $my_query->post->ID, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID') );
					
					if (function_exists('the_post_thumbnail')) :
						if ( has_post_thumbnail() ) :
							$thumbnail = current(wp_get_attachment_image_src( get_post_thumbnail_id($my_query->post->ID), 'folio', false));
							$large = current(wp_get_attachment_image_src( get_post_thumbnail_id($my_query->post->ID), 'large', false));
						endif;						
					endif;
					
					if (!$thumbnail || $thumbnail=='Missing Attachment') :
						if ($attachments) :
							$this_attachment = current($attachments);
							$thumbnail = current(wp_get_attachment_image_src($this_attachment->ID, 'folio', false));
							$large = current(wp_get_attachment_image_src($this_attachment->ID, 'large', false));
						endif;
					endif;
					
					if (!$thumbnail || $thumbnail=='Missing Attachment') {
						$thumbnail = get_post_meta($my_query->post->ID, 'thumbnail', true);
						if (!$thumbnail) $thumbnail = get_bloginfo('template_url').get_option('minicard_theme').'/images/portfolio.png';
					}
					if (!$large || $large=='Missing Attachment') {
						$large = '';
					}				
					
					$limit = get_post_meta($post->ID, 'gallery_limit', true);
					
					$alt = $alt*-1;
					?>
					<li <?php if ($alt==1) echo 'class="alt"'; ?>><?php if ($large) : ?><a rel="group-<?php echo $my_query->post->ID; ?>" href="<?php echo $large; ?>" title="<?php echo apply_filters('the_title', $my_query->post->post_title); ?><?php if (sizeof($attachments)>1) : ?> &ndash; 1 of <?php if (!$limit || sizeof($attachments) < $limit) echo sizeof($attachments); else echo $limit; ?><?php endif; ?>" class="group image lightbox"><?php endif; ?><img src="<?php echo $thumbnail; ?>" alt="<?php echo apply_filters('the_title', $my_query->post->post_title); ?>" /><?php if ($large) : ?></a><?php endif; ?><strong><a href="<?php echo minicard_append_url(get_permalink($my_query->post->ID), 'ajax=true'); ?>" title="Read More" class="text-lightbox"><?php echo apply_filters('the_title', $my_query->post->post_title); ?></a></strong><span class="folio_gallery" style="display:none;"><?php
									
						$i = 0;
						if ($attachments) {
							foreach ( $attachments as $id => $attachment ) {
						
								if (($limit>0 && $i>=$limit) || $i==0) {
									$i++;
									continue;
								}
								
								$id = intval($id);
								$_post = & get_post( $id );
							
								if ( ('attachment' != $_post->post_type) || !$url = current(wp_get_attachment_image_src($_post->ID, 'large', false)) ) {} else {
								
									$post_title = esc_attr($_post->post_title);
									echo "<a href='$url' rel='group-".$my_query->post->ID."' class='group image lightbox' title='$post_title";
									if (sizeof($attachments)>1) : 
										echo ' &ndash; '.($i+1).' of ';
										if (!$limit || sizeof($attachments) < $limit) echo sizeof($attachments); else echo $limit; 
									endif;
									echo "'>Screenshot ".($i+1)."</a>";
								
								}
								
								$i++;
							}
						}
					?></span></li>
					<?php
				endwhile;
				?>
			</ul>
			<div class="clear"></div>
			</li>
			<?php endif; ?>
			
			<?php if ( function_exists('dynamic_sidebar') ) dynamic_sidebar(2); ?>
		
		</ul>
		
		<?php if (file_exists(TEMPLATEPATH.'/premium/feed.php') && get_option('show_footer_feeds')=='yes') : ?>
		<script type="text/javascript">
		/* <![CDATA[ */
			jQuery('#feeds').show();
		/* ]]> */
		</script>
		<?php endif; ?>
		
	</div>
		
	<div id="footer"><div class="inner">
		<ul id="footerlinks">
		<li class="right"><a href="http://mikejolley.com" title="<?php _e('MiniCard Theme', 'minicard'); ?>"><img src="<?php echo get_bloginfo('template_url').get_option('minicard_theme'); ?>/images/minicard.png" alt="<?php _e('MiniCard Theme', 'minicard'); ?>" /></a> <a href="http://timvandamme.com/" title="<?php _e('Inspired by Tim Van Damme', 'minicard'); ?>" rel="nofollow"><img src="<?php echo get_bloginfo('template_url').get_option('minicard_theme'); ?>/images/inspired.png" alt="<?php _e('Inspired by Tim Van Damme', 'minicard'); ?>" /></a> <a href="http://wordpress.org" title="<?php _e('Powered by WordPress', 'minicard'); ?>" rel="nofollow"><img src="<?php echo get_bloginfo('template_url').get_option('minicard_theme'); ?>/images/wp.png" alt="<?php _e('WordPress', 'minicard'); ?>" /></a></li>
		<li class="block"><?php echo get_option('copyright_notice'); ?> <a href="http://mikejolley.com"><?php _e('MiniCard theme for WordPress.', 'minicard'); ?></a></li>
		<?php if (get_option('footer_include_ids')) : ?>
			<?php 
				$ids = str_replace(' ', '', get_option('footer_include_ids'));
				wp_list_pages('include='.$ids.'&sort_column=menu_order&title_li=');
			?>
		<?php endif; ?>
		<li class="last"><a href="#wrapper" title="<?php _e('Back To Top of Page', 'minicard'); ?>"><?php _e('Back to Top', 'minicard'); ?></a></li></ul>
	</div></div><!-- end footer -->

</div><!-- end wrapper -->
<?php wp_footer(); ?>
</body>
</html>