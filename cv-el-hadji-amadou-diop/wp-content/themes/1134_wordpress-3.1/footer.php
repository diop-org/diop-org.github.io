        		<div class="cleared"></div>
        </div>
    </div>
    <div class="art-footer">
        <div class="art-footer-body">
        <?php get_sidebar('footer'); ?>
            <div class="art-footer-center">
                <div class="art-footer-wrapper">
                    <div class="art-footer-text">
                        <?php  echo do_shortcode(theme_get_option('theme_footer_content')); ?>
                        <div class="cleared"></div>
                        <p class="art-page-footer">Powered by <a href="http://wordpress.org/" target="_blank">WordPress</a> and <a href="http://www.artisteer.com/?p=wordpress_themes" target="_blank">WordPress Theme</a> created with Artisteer.</p>
                    </div>
                </div>
            </div>
            <div class="cleared"></div>
        </div>
    </div>
    <div class="cleared"></div>
</div>
    <div id="wp-footer">
	        <?php wp_footer(); ?>
	        <!-- <?php printf(__('%d queries. %s seconds.', THEME_NS), get_num_queries(), timer_stop(0, 3)); ?> -->
    </div>
</body>
</html>

