<?php
/**
 * The Footer widget areas.
 *
 * @package WordPress
 */
?>
<!--Start Footer-->
<div class="footer">
  <div class="grid_6 alpha">
    <div class="widget_inner">
      <?php if (is_active_sidebar('first-footer-widget-area')) : ?>
      <?php dynamic_sidebar('first-footer-widget-area'); ?>
      <?php else : ?>
      <h4>Setting Up Footer</h4>
	  <p>Footer is widgetized. Setup the footer drag the required Widgets in Appearance -> Widgets Tab in the First, Second, Third or Fourth Footer Widget Area.</p>
      <?php endif; ?>
    </div>
  </div>
  <div class="grid_6">
    <div class="widget_inner">
      <?php if (is_active_sidebar('second-footer-widget-area')) : ?>
      <?php dynamic_sidebar('second-footer-widget-area'); ?>
      <?php else: ?>
      <h4>Recent From the Blogs</h4>
      <ul>
        <li><a href="#">Building a great Site is simple</a></li>
        <li><a href="#">Site build and is really fast</a></li>
        <li><a href="#">Wordpress got popular all across</a></li>
      </ul>
      <?php endif; ?>
    </div>
  </div>
  <div class="grid_6">
    <div class="widget_inner">
      <?php if (is_active_sidebar('third-footer-widget-area')) : ?>
      <?php dynamic_sidebar('third-footer-widget-area'); ?>
      <?php else: ?>
      <h4><?php _e( 'Recent Comment', 'dzonia' ); ?></h4>
      <ul>
        <li><a href="#"><?php _e( 'Varius dui, quis posuere nibh huj', 'dzonia' ); ?></a></li>
        <li><a href="#"><?php _e( 'Mollisuis. Mauris omma rhoncus', 'dzonia' ); ?> </a></li>
        <li><a href="#"><?php _e( 'Porttitor. http://inkthemes.com', 'dzonia' ); ?></a></li>
      </ul>
      <?php endif; ?>
    </div>
  </div>
  <div class="grid_6 omega">
    <div class="widget_inner">
      <?php if (is_active_sidebar('fourth-footer-widget-area')) : ?>
      <?php dynamic_sidebar('fourth-footer-widget-area'); ?>
      <?php else: ?>
      <h4><?php _e( 'Contact Details', 'dzonia' ); ?></h4>
      <?php _e( 'Address: FM-9, B-Block,  Second', 'dzonia' ); ?><br/>
      <?php _e( 'Complex, Bhopal', 'dzonia' ); ?><br/>
      <?php _e( 'Contact No : +91-9926255956', 'dzonia' ); ?><br/>
      <?php _e( 'Email: admin@inkthemes.com', 'dzonia' ); ?>
      <?php endif; ?>
    </div>
  </div>
</div>
<!--End Footer-->
