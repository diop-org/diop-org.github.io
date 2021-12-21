<!--Start Footer bg-->
<div class="footer_bg">
    <!--Start Container-->
    <div class="container_24">
        <!--Start Footer wrapper-->
        <div class="grid_24 footer_wrapper">  
            <?php
            /* A sidebar in the footer? Yep. You can can customize
             * your footer with four columns of widgets.
             */
            get_sidebar('footer');
            ?>
        </div>
        <!--End Footer wrapper-->
        <div class="clear"></div>
    </div>
    <!--End Container-->
    <div class="footer_line">
        <div class="container_24">
            <div class="grid_24">
				<span class="blog-desc">				
				<?php echo get_bloginfo ( 'title' );   ?>
				-
				<?php echo get_bloginfo ( 'description' ); ?>
				</span>
                <div class="copyright">
					<a href="<?php echo esc_url( __( 'http://www.inkthemes.com/', 'themia' ) ); ?>"><?php _e( 'Themia Designed &amp; Coded by InkThemes.com', 'themia' ); ?></a>
                </div>

            </div>
        </div>

    </div>
</div>
<!--End Footer bg-->
<?php wp_footer(); ?>
</body></html>