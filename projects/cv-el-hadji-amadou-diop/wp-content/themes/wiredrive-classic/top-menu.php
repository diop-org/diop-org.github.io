<?php 
$settings = new Wiredrive_Theme_Settings();
$options = $settings->getOptions();

$current_slug = $post->post_name;
$post_data = get_post($post->post_parent);
$parent_slug = $post_data->post_name;
$grandparent_data = get_post($post_data->post_parent);
$grandparent_ID = $grandparent_data->ID;
$grandparent_slug = $grandparent_data->post_name;

$menuPosition = $options['menu_position'];
?>

<?php if($menuPosition == 'top') : ?>
    
    <?php if (has_nav_menu('top_menu')) : ?>
        
        <?php  wp_nav_menu(array('depth'            => '0',
                                'theme_location'    => 'top_menu',
                                'container_class'   => 'top menu drop-down',
                                'menu'              => 'main menu'
                                )); ?>

    <?php else : ?>
        <div class="top menu drop-down">
            <ul class="menu">
                <?php wp_list_pages('title_li=&sort_order=DESC&depth=0'); ?>
            </ul>
        </div>
        
    <?php endif; ?>                            
<?php endif; ?>

<?php if (is_single()) : ?>

    <div class="title">               
        <h2><?php wp_title('',true,'') ?></h2>
    </div>                
                    
<?php elseif ( $current_slug == $parent_slug && !is_front_page() ) : ?>
    
    <div class="title">               
        <h2><?php wp_title('',true,'') ?></h2>
    </div>
    
<?php elseif ( !is_front_page() && wdc_has_children() ) : ?>
    <div class="title">
        <h2><?php wp_title('',true,'') ?></h2>

        <ul class="sub-nav nav">
            <?php wp_list_pages('title_li=&child_of='.$post->ID.'&depth=1'); ?>
        </ul>
    </div>
    
<?php elseif ( $grandparent_slug == $current_slug ) : ?>

    <div class="title">
        <h2><?php echo get_the_title($post->ID) ?></h2>
    </div>

<?php elseif ( wdc_is_child() ) : ?>
    <div class="title">
        <h2><?php echo get_the_title($post->post_parent) ?></h2>
    
        <ul class="sub-nav nav">
            <?php wp_list_pages('title_li=&child_of='.$post->post_parent.'&depth=1'); ?>
        </ul>
    </div>
<?php else : ?>
    <ul class="sub-nav nav">
        <?php wp_list_pages('title_li=&child_of='.$post->post_parent.'&depth=1'); ?>
    </ul>
<?php endif; ?>

