<?php
/*
@package WordPress
@subpackage Desire
*/
?>
<?php global $options; ?>
<div id="post-<?php the_ID(); ?>" <?php post_class('single'); ?>>
    <?php if(trim(get_the_title()) != ""): ?>
        <h1 class="entry-title"><?php the_title(); ?></h1>
    <?php endif; ?>
    <div class="entry-info">
        <?php desire_posted_on(); ?>
        <?php comments_popup_link(__('Reply','desire'), __('1 comment','desire'), __('% comments','desire'), 'comments-link', __('Comments off','desire')); ?>
        <?php edit_post_link(__('Edit', 'desire'), '', ''); ?>
    </div>
    <div class="entry-content">
        <?php the_content(__('Read more <span class="more-sep">[+]</span>', 'desire')); ?>
        <?php wp_link_pages(array('before' => '<div class="page-link clearfix"><span class="pages-title">'.__('Pages:','desire').'</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>')); ?>
    </div>
    <?php if($options['show_single_utility']): ?>
        <?php desire_theme_utility(); ?>
    <?php endif; ?>
</div>