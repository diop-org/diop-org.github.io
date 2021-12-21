<?php get_header(); ?>
<?php $option =  get_option('trt_options'); ?>

<!--SLIDER-->
<?php if ( is_home() ) { ?>
<div id="slider_wrap">
    <div class="center">
        <div id="slides">
        <?php if( empty($option['trt_slider'])) { ?>
        <?php get_template_part('easyslider');?>
    	<?php }?>
        <?php if($option['trt_slider']== "Easyslider") { ?>
        <?php get_template_part('easyslider');?>
    	<?php }?>
        <?php if($option['trt_slider']== "Disable Slider") { ?>
    	<?php }?>
        
        </div>
    </div>
</div>
    	<?php }?>

<!--CONTENT-->
<div id="content">

<div class="center">
        <?php if( empty($option['trt_lay'])) { ?>
        <?php get_template_part('layout1');?>
    	<?php }?>
        <?php if($option['trt_lay']== "Layout 1") { ?>
        <?php get_template_part('layout1');?>
    	<?php }?> 
</div>
</div>

<?php get_footer(); ?>