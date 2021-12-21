            <div id="right_column">

<?php if ( is_single() ) : ?> 
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(2) ) : ?>     
		

                <div class="heading">
                	<h2><?php _e('Related Posts', 'js-o4w'); ?></h2>
                </div> <!--heading ends-->
				<ul>
						<?php
							$tags = wp_get_post_tags($post->ID);
							if ($tags) {
							  $first_tag = $tags[0]->term_id;
							  $args=array(
								'tag__in' => array($first_tag),
								'post__not_in' => array($post->ID),
								'showposts'=>10,
								'caller_get_posts'=>1
							   );
							  $my_query = new WP_Query($args);
							  if( $my_query->have_posts() ) {
								while ($my_query->have_posts()) : $my_query->the_post(); ?>
									<li>
										<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
											<?php the_title(); ?> <?php comments_number(' ','(1)','(%)'); ?>
										</a> 
									</li>
								  <?php
								endwhile;
							  }
							}
						?>
				</ul>
				<div class="heading">
                	<h2><?php _e('Recent Posts', 'js-o4w'); ?></h2>
                </div> <!--heading ends-->
				<ul><?php
$limit = get_option('posts_per_page');
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
query_posts('showposts=' . $limit=10 . '&paged=' . $paged);
$wp_query->is_archive = true; $wp_query->is_home = false;
?>
<?php while(have_posts()) : the_post(); if(!($first_post == $post->ID)) : ?>
<li><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>&nbsp;<span class="me-count"><?php comments_number('&nbsp;','(1)','(%)'); ?></span></li>
<?php endif; endwhile; ?></ul>
				
			
		
<?php endif; ?>
<?php else : ?> 

<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(1) ) : ?> <!--home sidebar begins-->               
                <div class="heading">
                	<h2><?php _e('Most Popular', 'js-o4w'); ?></h2>
                </div> <!--heading ends-->
				<ul class="most-comments">
					<?php $result = $wpdb->get_results("SELECT comment_count,ID,post_title FROM $wpdb->posts ORDER BY comment_count DESC LIMIT 0 , 10");
					foreach ($result as $post) {
					setup_postdata($post);
					$postid = $post->ID;
					$title = $post->post_title;
					$commentcount = $post->comment_count;
					if ($commentcount != 0) { ?>
						<li>
							<a href="<?php echo get_permalink($postid); ?>" title="<?php echo $title ?>"><?php echo $title ?></a> (<?php echo $commentcount ?>)
						</li>
					<?php } } ?>
				</ul>
                
                <div class="heading">
                	<h2><?php _e('Recent Comments', 'js-o4w'); ?></h2>
                </div> <!--heading ends-->
				<ul>
					<?php
					  global $wpdb;
					  $sql = "SELECT DISTINCT ID, post_title, post_password, comment_ID, comment_post_ID, comment_author, comment_date_gmt, comment_approved, comment_type,comment_author_url, SUBSTRING(comment_content,1,30) AS com_excerpt FROM $wpdb->comments LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID = $wpdb->posts.ID) WHERE comment_approved = '1' AND comment_type = '' AND post_password = '' ORDER BY comment_date_gmt DESC LIMIT 10";
					  $comments = $wpdb->get_results($sql);
					  $output = $pre_HTML;
					  foreach ($comments as $comment) {
						$output .= "\n<li>". "<a href=\"" . get_permalink($comment->ID)."#comment-" . $comment->comment_ID . "\" title=\"on ".$comment->post_title . "\">".strip_tags($comment->comment_author)."</a>" .": " .strip_tags($comment->com_excerpt).'...'."</li>";
					  }
					  $output .= $post_HTML;
					  echo $output;
					?>
				</ul>
				
				
			<?php endif; ?>
			<?php endif; ?>
            </div> <!--right column ends-->