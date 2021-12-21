<?php
/*
Template Name: Gallery Page
*/
?>
<?php get_header(); ?>
<div class="content page">
  <div class="content-info">
    <?php if (function_exists('inkthemes_breadcrumbs')) inkthemes_breadcrumbs(); ?>
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <h2>
      <?php the_title(); ?>
    </h2>
    <div class="dotted_line"></div>
    <?php endwhile;?>
  </div>
</div>
<div class="content page">
  <ul class="thumbnail">
    <?php
if (  $wp_query->have_posts()) : while (have_posts()) : the_post(); 
	  the_content();
	   $attachment_args = array(
		 'post_type' => 'attachment',
		 'numberposts' => -1, 
		 'post_status' => null,
		 'post_parent' =>$post->ID,
		 'orderby' => 'menu_order ID'
	);
	$attachments = get_posts($attachment_args);
	if ($attachments) {
	  foreach($attachments as $gallery_image )                                                                 
	  {
		$attachment_img =  wp_get_attachment_url( $gallery_image->ID);
		echo '<li><a alt="'.$gallery_image->post_title.'" href="'.$attachment_img.'" class="zoombox zgallery1">';
		echo  '<img src="'.$attachment_img.'" width="266" height="158" alt=""/>';
		echo '</a></li>';
	  }
	}
?>
    <?php endwhile; endif; ?>
  </ul>
  <div class='wp-pagenavi'> <span class='current'></span><a href='#' class='page larger'></a><a href='#' class='page larger'></a><a href='#' class='page larger'></a><a href='#' class='page larger'></a><a href='#' class='page larger'></a><a href="#" class="nextpostslink"></a> </div>
</div>
<!--End Content-->
<div class="clear"></div>
<div class="hr_big"></div>
<!--End Content Wrapper-->
</div>
<div class="clear"></div>
<!--End Main_wrapper-->
<?php get_footer(); ?>