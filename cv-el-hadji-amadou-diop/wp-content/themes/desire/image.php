<?php
/*
@package WordPress
@subpackage Desire
*/
?>
<?php global $options; ?>
<?php get_header(); ?>
<?php if($options['sidebar_layout'] == 'one-left-sidebar' and !$isMobile): ?>
    <?php get_sidebar(); ?>
<?php endif; ?>
<div id="container">
    <?php if($options['show_breadcrumbs']): ?>
        <?php desire_breadcrumbs(); ?>
    <?php endif; ?>
    <?php if( have_posts()) : ?>
        <?php while(have_posts()) : the_post(); ?>
            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>> <!-- Start of post -->
                <?php if(trim(get_the_title()) != ""): ?>
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                <?php endif; ?>
                <div class="entry-info">
                    <?php desire_posted_on(); ?>
                    <?php comments_popup_link(__('Reply','desire'), __('1 comment','desire'), __('% comments','desire'), 'comments-link', __('Comments off','desire')); ?>
                    <?php edit_post_link(__('Edit', 'desire'), '', ''); ?>
                </div>
                <div class="entry-content">
                    <div class="entry-attachment">
                        <?php
                            $attachments = array_values(get_children(array(
                                'post_parent' => $post->post_parent,
                                'post_status' => 'inherit',
                                'post_type' => 'attachment',
                                'post_mime_type' => 'image',
                                'order' => 'ASC',
                                'orderby' => 'menu_order ID'
                            )));
                            foreach ($attachments as $k => $attachment) {
                                if ($attachment->ID == $post->ID)
                                    break;
                            }
                            $k++;
                            if (count($attachments) > 1) {
                                if (isset($attachments[$k]))
                                    $next_attachment_url = get_attachment_link($attachments[$k]->ID);
                                else
                                    $next_attachment_url = get_attachment_link($attachments[0]->ID);
                            } else {
                                $next_attachment_url = wp_get_attachment_url();
                            }
                        ?>
                        <a href="<?php echo esc_url( $next_attachment_url ); ?>" title="<?php the_title_attribute(); ?>" rel="attachment">
                            <?php
                                $attachment_size = apply_filters('desire_attachment_size', 848);
                                echo wp_get_attachment_image($post->ID, array($attachment_size, 1024)); // filterable image width with 1024px limit for image height.
                            ?>
                        </a>
                        <?php if ( ! empty( $post->post_excerpt ) ) : ?>
                        <div class="entry-caption">
                            <?php the_excerpt(); ?>
                        </div>
                        <?php endif; ?>
                    </div>
                    <?php the_content(__('Read more <span class="more-sep">[+]</span>', 'desire')); ?>
                    <?php wp_link_pages(array('before' => '<div class="page-link clearfix"><span class="pages-title">'.__('Pages:','desire').'</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>')); ?>
                </div>
            </div> <!-- End of post -->
            <div class="post-navigation clearfix">
                <span class="nav-previous"><?php previous_image_link( false, __( '&laquo; Previous','desire') ); ?></span>
                <span class="nav-next"><?php next_image_link( false, __( 'Next &raquo;','desire') ); ?></span>
            </div>
            <?php comments_template( '', true ); ?>
        <?php endwhile; ?>
    <?php else: ?>
        <div id="post-0" <?php post_class(); ?>>
            <h1 class="entry-title"><?php _e('No entries found','desire'); ?></h1>
            <div class="entry-content">
                <p><?php _e('Looks like there are no articles related to your search. Try searching again !','desire'); ?></p>
                <p><?php get_search_form(); ?></p>
            </div>
        </div>
    <?php endif; ?>
</div>
<?php if($options['sidebar_layout'] == 'one-right-sidebar' and !$isMobile): ?>
    <?php get_sidebar(); ?>
<?php endif; ?>
<?php get_footer(); ?>