<?php
/**
 * The template for displaying Author Archive pages.
 *
 * @package WordPress
 */ 
?>
<?php get_header(); ?>
<!--Start Contetn wrapper-->
<div class="grid_24 content_wrapper">
     <div class="grid_15 alpha">
          <!--Start side content-->
          <div class="side_content">
               <h2><?php printf( __( 'Author Archives: %s', 'themia' ), "<a class='url fn n' href='" . get_author_posts_url( get_the_author_meta( 'ID' ) ) . "' title='" . esc_attr( get_the_author() ) . "' rel='me'>" . get_the_author() . "</a>" ); ?></h2>
               <?php if ( have_posts() ) : the_post(); ?>
               <?php
		// If a user has filled out their description, show a bio on their entries.
		if ( get_the_author_meta( 'description' ) ) : ?>
               <?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'themia_author_bio_avatar_size', 60 ) ); ?>
               <h2><?php printf( __( 'About %s', 'themia' ), get_the_author() ); ?></h2>
               <?php the_author_meta( 'description' ); ?>
               <?php endif; ?>
               <?php endif; ?>
               <?php
			/* Since we called the_post() above, we need to
			 * rewind the loop back to the beginning that way
			 * we can run the loop properly, in full.
			 */
			rewind_posts();
			/* Run the loop for the author archive page to output the authors posts
			 * If you want to overload this in a child theme then include a file
			 * called loop-author.php and that will be used instead.
			 */
			 get_template_part( 'loop', 'author' ); ?>
            <div class="clear"></div>
      <nav id="nav-single">
          <?php if (  $wp_query->max_num_pages > 1 ) : ?>
          <span class="nav-previous">
       <?php previous_posts_link( 'Newer posts &rarr;'); ?>
        </span> <span class="nav-next">
      <?php next_posts_link('&larr; Older posts'); ?>
        </span> 
          <?php endif; ?>
      </nav>                
          </div>
          <!--End side content-->
     </div>
     <?php get_sidebar(); ?>
</div>
<!--End Content wrapper-->
<div class="clear"></div>
</div>
<?php get_footer(); ?>
