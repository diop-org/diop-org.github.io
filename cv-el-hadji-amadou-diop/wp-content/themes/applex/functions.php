<?php

if ( function_exists('register_sidebar') )
{
register_sidebar(array('name'=>'Sidebar','before_widget' => '<div class="widgets">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
   ));
}

if ( function_exists( 'add_theme_support' ) )
add_theme_support( 'post-thumbnails'); 

?>
