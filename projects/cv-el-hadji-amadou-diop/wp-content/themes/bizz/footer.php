<?php
/**
 * @package WordPress
 * @subpackage bizz Theme
 */
$options = get_option( 'bizz_theme_settings' );
?>
<div class="clear"></div>

</div>
<!-- END wrap --> 

<div id="footer" class="clearfix">

	<div id="footer-widget-wrap" class="clearfix">

        <div id="footer-left">
        <?php dynamic_sidebar('footer-left'); ?>
        </div>
        
        <div id="footer-middle">
         <?php dynamic_sidebar('footer-middle'); ?>
        </div>
        
        <div id="footer-right">
         <?php dynamic_sidebar('footer-right'); ?>
        </div>
    
    </div>
    
    <div class="clear"></div>

    <div id="footer-bottom" class="clearfix">
    
        <div id="copyright">
            &copy; <?php echo date('Y'); ?>  <?php bloginfo( 'name' ) ?> // <a href="http://www.wpexplorer.com/bizz-wordpress-theme.html" title="Bizz WordPress Theme">Bizz Theme</a>
        </div>
        
        <div id="back-to-top">
            <a href="#toplink"><?php _e('Top', 'bizz'); ?> &uarr;</a>
        </div>
    
    </div>

</div>

<!-- WP Footer -->
<?php wp_footer(); ?>
</body>
</html>