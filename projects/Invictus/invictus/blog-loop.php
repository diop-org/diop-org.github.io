<?php
/**
 * The loop that displays blog posts.
 *
 * @package WordPress
 * @subpackage Invictus
 * @since Invictus 1.0
 */

global $paged, $more, $page_tpl;

$isPost = true;
$more = 0;
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

if (have_posts()) : while (have_posts()) : the_post();

//Get the post meta informations and store them in an array
$post_meta = max_get_cutom_meta_array($post->ID);

?>

				<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
					
					<div class="rel">
					
						<div class="date-badge"><?php echo get_the_date("d") ?><span><?php echo get_the_date("M") ?></span></div>
						
						<h2 class="entry-title"><a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><?php the_title() ?></a></h2>
						
						<?php 
						if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) { 
						
							// Get the thumbnail
							$imgID = get_post_thumbnail_id();  
							$imgUrl = max_get_image_path($post->ID, 'full');
	
							// get image width and height depending on blog template
							if($page_tpl == "template-blog.php" || is_category() || is_archive() || is_search() ) {
								$img_w = MAX_CONTENT_WIDTH;
							}						
							if($page_tpl == "template-blog-fullsize.php") {
								$img_w = 923;						
							}
	
							// Check if images should be cropped
							$timb_height ='';
							$timb_img_height = '';
						
							if(get_option_max( 'image_blog_original_ratio' ) != 'true' ) {
								$timb_height = '&amp;h=220';
								$timb_img_height = 'height="220"';
							}
							
						?>
						
						<div class="entry-image">
							<a href="<?php the_permalink() ?>" title="<?php the_title() ?>">
								<img src="<?php echo get_template_directory_uri(); ?>/timthumb.php?src=<?php  echo $imgUrl; ?>&amp;<?php echo $timb_height ?>&amp;w=<?php echo $img_w ?>&amp;a=<?php echo $post_meta[MAX_SHORTNAME.'_photo_cropping_direction_value']; ?>&amp;q=100" <?php echo $timb_img_height ?> width="<?php echo $img_w ?>" class="fade-image<?php if( get_option_max('image_show_fade') != "true") { echo(" no-hover"); } ?>" alt="<?php the_title() ?>" title="<?php the_title() ?>" />
							</a>				
						</div>
					
					</div>
						
					<?php } ?>
	
					<div class="clearfix">
					
						<div class="clearfix entry-meta entry-meta-head">
							<ul>
								<?php
								
									// get entry categories
									$post_categories = wp_get_post_categories( $post->ID );
									$cat_list = array();
									foreach ( $post_categories as $c ) {
										$cat = get_category( $c );
										$cat_list[] .= '<a href="'. get_category_link( $c ) .'">'. $cat->name .'</a>';
									}						
											
									$cat_list = implode(', ', $cat_list);						
																						
									printf( __( '<li>By <span>%1$s</span>&nbsp;/</li> ', MAX_SHORTNAME), get_the_author() );
									printf( __( '<li><span>%1$s</span>&nbsp;/</li>', MAX_SHORTNAME), get_the_date() );
									printf( __( '<li>In <span>%1$s</span>&nbsp;/</li>', MAX_SHORTNAME), substr($cat_list, 0, -2) );
									echo '<li class="cnt-comment"><a href="#comments-holder"><span class="icon"></span>';
									comments_number( 'No Comments', '1 Comment', '% Comments' );
									echo '</a></li>';					
								?>
							</ul>
						</div><!-- .entry-meta -->

						<div class="entry-content">						
						<?php 
						// check if blog should be shown full 									
						if( get_option_max('general_show_fullblog') == 'true'){
							the_content('<p class="read-more">' . __( 'Continue Reading...', 'invictus' ) . '</p>',FALSE,'');
						}else{
							the_excerpt();
						}						
						?>
						</div><!-- .entry-content -->	
											
					</div>
				
					<footer>
						<?php 
						// check if blog should be shown full 
						if( get_option_max('general_show_fullblog') != 'true'){						
						?>					
						<p class="read-more"><a href="<?php the_permalink() ?>" title="<?php echo __( 'Continue Reading...', 'invictus' ) ?>"><?php echo __( 'Continue Reading...', 'invictus' ) ?></a></p>							
						<?php } ?>
					</footer><!-- .entry-meta -->
					
				</article><!-- #post-<?php the_ID(); ?> -->
				
				<?php echo do_shortcode('[hr]') ?>


<?php endwhile; ?>
<?php else : ?>
<h2>No Entries Found</h2>
<?php endif; ?>						

<?php /* Display navigation to next/previous pages when applicable */ ?>
	<?php if (function_exists("max_pagination")) {
		max_pagination();
	} ?>
