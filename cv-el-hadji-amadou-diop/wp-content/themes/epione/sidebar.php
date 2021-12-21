<div id="sidebar">
<?php get_template_part( 'popular' ); ?>
   <div class="widgets"><ul>          
    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar') ) : ?> 
    <?php endif; ?></ul></div>
</div>