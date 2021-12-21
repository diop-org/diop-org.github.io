<div id="sidebar">



<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('sidebar')) : ?>


<div class="sidebar-box"><h3>Menu</h3>
<div class="menu">
<ul>
<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>
</ul>
</div><!--menu ends-->
</div><!--sidebar-box ends-->


<?php endif; ?>



</div><!--sidebar ends-->