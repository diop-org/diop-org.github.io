<?php
/*
@package WordPress
@subpackage Desire
*/
?>
<?php global $options, $isMobile; ?>
<?php if ('gallery' == get_post_format()) : ?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if(trim(get_the_title()) != ""): ?>
        <h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf(esc_attr__('Permalink to %s', 'desire'), the_title_attribute('echo=0')); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
    <?php endif; ?>
    <div class="entry-info">
        <?php desire_posted_on(); ?>
        <?php comments_popup_link(__('Reply','desire'), __('1 comment','desire'), __('% comments','desire'), 'comments-link', __('Comments off','desire')); ?>
        <?php edit_post_link(__('Edit', 'desire'), '', ''); ?>
    </div>
    <div class="entry-content">
        <?php if(post_password_required()): ?>
            <?php the_content(); ?>
        <?php else: ?>
        <?php
            $images = get_children(array('post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC', 'numberposts' => 999));
            if($images):
                $total_images = count($images);
                $image = array_shift($images);
                $image_img_tag = wp_get_attachment_image($image->ID, 'thumbnail');
        ?>
            <div class="gallery-thumb">
                <a class="size-thumbnail" href="<?php the_permalink(); ?>"><?php echo $image_img_tag; ?></a>
            </div>
            <p><?php printf(__('This gallery contains <a %1$s>%2$s photos</a>.', 'desire'), 'href="' . get_permalink() . '" title="' . sprintf(esc_attr__('Permalink to %s', 'desire'), the_title_attribute('echo=0')) . '" rel="bookmark"', $total_images); ?></p>
        <?php
            endif;
            the_excerpt();
        endif; ?>
    </div>
</div>
<?php elseif($options['blog_style'] == 'magazine' and !$isMobile): ?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if(trim(get_the_title()) != ""): ?>
        <h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf(esc_attr__('Permalink to %s', 'desire'), the_title_attribute('echo=0')); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
    <?php endif; ?>
    <div class="entry-info">
        <?php desire_posted_on(); ?>
        <?php comments_popup_link(__('Reply','desire'), __('1 comment','desire'), __('% comments','desire'), 'comments-link', __('Comments off','desire')); ?>
        <?php edit_post_link(__('Edit', 'desire'), '', ''); ?>
    </div>
    <?php $featured_img = desire_post_image($post->ID,'','',$post->post_content,'magazine-img'); ?>
    <?php if(trim($featured_img) != ''): ?>
        <div class="entry-mag alignleft">
            <a href="<?php the_permalink(); ?>"><?php echo $featured_img; ?></a>
        </div>
    <?php endif; ?>
    <div class="entry-content">
        <?php the_excerpt(); ?>
    </div>
    <div class="clear"></div>
</div>
<?php elseif('status' == get_post_format()): ?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-info">
        <?php desire_posted_on(); ?>
        <?php comments_popup_link(__('Reply','desire'), __('1 comment','desire'), __('% comments','desire'), 'comments-link', __('Comments off','desire')); ?>
        <?php edit_post_link(__('Edit', 'desire'), '', ''); ?>
    </div>
    <div class="entry-content">
        <?php if($options['show_excerpts']): ?>
            <?php the_excerpt(); ?>
        <?php else: ?>
            <?php the_content(__('Read more <span class="more-sep">[+]</span>', 'desire')); ?>
            <?php wp_link_pages(array('before' => '<div class="page-link clearfix"><span class="pages-title">'.__('Pages:','desire').'</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>')); ?>
        <?php endif; ?>
    </div>
</div>
<?php else: ?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if(trim(get_the_title()) != ""): ?>
        <h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf(esc_attr__('Permalink to %s', 'desire'), the_title_attribute('echo=0')); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
    <?php endif; ?>
    <div class="entry-info">
        <?php desire_posted_on(); ?>
        <?php comments_popup_link(__('Reply','desire'), __('1 comment','desire'), __('% comments','desire'), 'comments-link', __('Comments off','desire')); ?>
        <?php edit_post_link(__('Edit', 'desire'), '', ''); ?>
    </div>
    <?php $featured_img = desire_post_image($post->ID,'','',$post->post_content,'featured-img'); ?>
    <?php if(trim($featured_img) != '' and $options['show_featured']): ?>
        <div class="entry-thumb">
            <a href="<?php the_permalink(); ?>"><?php echo $featured_img; ?></a>
        </div>
    <?php endif; ?>
    <div class="entry-content">
        <?php if($options['show_excerpts']): ?>
            <?php the_excerpt(); ?>
        <?php else: ?>
            <?php the_content(__('Read more <span class="more-sep">[+]</span>', 'desire')); ?>
            <?php wp_link_pages(array('before' => '<div class="page-link clearfix"><span class="pages-title">'.__('Pages:','desire').'</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>')); ?>
        <?php endif; ?>
    </div>
</div>
<?php endif; ?>