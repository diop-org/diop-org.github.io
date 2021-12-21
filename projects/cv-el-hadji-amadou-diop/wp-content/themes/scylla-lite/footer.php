<?php $option =  get_option('scl_options'); ?>
</div>
<!--FOOTER-->
<div style="clear:both;"></div>
<div id="footer">
    <div class="wrapper">
    	<div class="foot">
            <div class="copyright">
            <?php echo $option['scl_foot']; ?><?php _e('Theme by', 'scylla');?> <a class="towfiq" target="_blank" href="http://www.towfiqi.com/">Towfiq I.</a>
            </div>
            <div id="footmenu">
            <?php wp_nav_menu( array( 'container_class' => 'menu-footer', 'theme_location' => 'footer_menu', 'depth' => 0, 'fallback_cb' =>false) ); ?>
            </div>
        </div>
    </div>
</div>

</div>
<?php wp_footer(); ?>
</body>

</html>
