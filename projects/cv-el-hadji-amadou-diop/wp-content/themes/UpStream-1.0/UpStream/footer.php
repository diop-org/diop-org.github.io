<?php global $theme; ?>
    
<?php if($theme->display('footer_widgets')) { ?>
    <div id="footer-widgets" class="clearfix">
        <?php
        /**
        * Footer  Widget Areas. Manage the widgets from: wp-admin -> Appearance -> Widgets 
        */
        ?>
        <div class="footer-widget-box">
            <?php
                if(!dynamic_sidebar('footer_1')) {
                    $theme->hook('footer_1');
                }
            ?>
        </div>
        
        <div class="footer-widget-box">
            <?php
                if(!dynamic_sidebar('footer_2')) {
                    $theme->hook('footer_2');
                }
            ?>
        </div>
        
        <div class="footer-widget-box footer-widget-box-last">
            <?php
                if(!dynamic_sidebar('footer_3')) {
                    $theme->hook('footer_3');
                }
            ?>
        </div>
        
    </div>
<?php  } ?>

    <div id="footer">
    
        <div id="copyrights">
            <?php
                if($theme->display('footer_custom_text')) {
                    $theme->option('footer_custom_text');
                } else { 
                    ?> &copy; <?php echo date('Y'); ?>  <a href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a><?php
                }
            ?> 
        </div>
        
        <?php /* 
            All links in the footer should remain intact. 
            These links are all family friendly and will not hurt your site in any way. 
            Warning! Your site may stop working if these links are edited or deleted 
            
            You can buy this theme without footer links online at http://newwpthemes.com/buy/?theme=upstream
        */ ?>
        
        <div id="credits">Powered by <a href="http://wordpress.org/"><strong>WordPress</strong></a> | Designed by: <a href="http://projectserverhosting.com/enterprise-project-management/">Enterprise Project management</a> | Thanks to <a href="http://businessemailhosting.com/">Email Hosting</a>, <a href="http://virtualdesktoponline.com/cloud-desktop/">Cloud Desktop</a> and <a href="http://mssharepointhosting.com/hosted-sharepoint/">Hosted SharePoint</a></div><!-- #credits -->
        
    </div><!-- #footer -->

    </div>
    
</div><!-- #container -->

<?php wp_footer(); ?>
<?php $theme->hook('html_after'); ?>
</body>
</html>