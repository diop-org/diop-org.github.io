<?php
/**
 * The Footer widget areas.
 *
 * @package WordPress
* @subpackage webmagazine 1.0
*/
?>

<?php
/* The footer widget area is triggered if any of the areas
* have widgets. So let's check that first.
*
* If none of the sidebars have widgets, then let's bail early.
*/
if (   ! is_active_sidebar( 'first-footer-widget-area'  )
&& ! is_active_sidebar( 'second-footer-widget-area' )
&& ! is_active_sidebar( 'third-footer-widget-area'  )
&& ! is_active_sidebar( 'fourth-footer-widget-area' ))
return;
// If we get this far, we have widgets. Let do this.
?>

<div id="footer-widget-area" role="complementary">
<?php if ( is_active_sidebar( 'first-footer-widget-area' ) ) : ?>
<ul class="xoxo">
<?php dynamic_sidebar( 'first-footer-widget-area' ); ?>
</ul>					
</div><!-- #first .widget-area -->
<?php endif; ?>

<?php if ( is_active_sidebar( 'second-footer-widget-area' ) ) : ?>
<div class="catlistyle cat-area">
<div class="footercatlistwrap">
<div class="footercatlist">
<div class="footercatlistpad">
<ul class="xoxo">
<?php dynamic_sidebar( 'second-footer-widget-area' ); ?>
</ul>
</div></div></div>
<?php endif; ?>

<?php if ( is_active_sidebar( 'third-footer-widget-area' ) ) : ?>


<div class="footercatlistwrap">
<div class="footercatlist">
<div class="footercatlistpad">
<ul class="xoxo">
<?php dynamic_sidebar( 'third-footer-widget-area' ); ?>
</ul>
</div></div></div>
<?php endif; ?>

<?php if ( is_active_sidebar( 'fourth-footer-widget-area' ) ) : ?>

<div class="footercatlistwrap">
<div class="footercatlist">
<div class="footercatlistpad">
<ul class="xoxo">
<?php dynamic_sidebar( 'fourth-footer-widget-area' ); ?>
</ul>
</div></div></div></div>
<?php endif; ?>
</div>