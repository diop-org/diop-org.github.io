<?php 
$settings = new Wiredrive_Theme_Settings();
$fonts = $settings->getFonts();
$options = $settings->getOptions();
$menuPosition = $options['menu_position'];
?>

<?php if($menuPosition == 'left') : ?>
<div id="sidebar">    
    <ul class="nav">
    <?php if (!dynamic_sidebar()) : ?>
        
        <?php wp_list_pages("title_li=&depth=0"); ?>
        
    <?php endif; ?>
    </ul>
</div>
<?php endif; ?>