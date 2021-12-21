<?php
/*
@package WordPress
@subpackage Desire
*/
?>
<?php global $options; ?>
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
        <?php the_excerpt(); ?>
    </div>
</div>