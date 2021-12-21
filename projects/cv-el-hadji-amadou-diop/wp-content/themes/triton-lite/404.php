<?php get_header(); ?>

<!--SLIDER-->
<?php if ( is_home() ) { ?>
<div id="slider_wrap">
    <div class="center">
    <div id="slides"><?php get_template_part('easyslider'); ?></div>
    </div>
</div>
    	<?php }?>

<!--CONTENT-->
<div id="content">

<div class="center">
    <div id="content_wrap" class="error_page">
            <!--404 Error-->
            <div class="fourofour"><label><a>404</a></label></div>
            <div class="post">
            <h2><?php _e('Page Not Found', 'triton'); ?></h2>
            <div class="error_msg">
            <p><label><?php _e('Server cannot find the file you requested. File has either been moved or deleted, or you entered the wrong URL or document name. Look at the URL. If a word looks misspelled, then correct it and try it again. If that doesnt work You can try our search option to find what you are looking for.', 'triton'); ?></label></p>
            <?php get_search_form(); ?>
            </div>
        </div>     
                
            </div> 
</div>
</div>

<?php get_footer(); ?>