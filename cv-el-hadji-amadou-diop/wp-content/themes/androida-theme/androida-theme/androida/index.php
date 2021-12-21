<?php get_header(); ?>

<?php  if
  
($layout = get_option('andro_layout'))
{
include (TEMPLATEPATH . '/layouts/'. $layout .'.php'); 
}
else

include (TEMPLATEPATH . '/layouts/business.php'); 

?>


<?php get_footer(); ?>
