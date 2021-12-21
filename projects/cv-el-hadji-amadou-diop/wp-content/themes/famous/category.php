<?php get_header(); ?>

<div id="header" class="wrap">
 <h1><?php _e( 'Blog', 'mframe' ); ?> // <?php _e( 'Categories', 'mframe' ); ?> // <span><?php single_cat_title(); ?></span></h1>
</div>

<div id="content" class="wrap">
 <div id="main">
  <?php
	$desc = category_description();
	if ( !empty( $desc )) echo '<div class="desc">' . $desc . '</div>';
	get_template_part( 'loop' );
	?>
 </div>
 <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>