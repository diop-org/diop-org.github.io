<?php 
$settings = new Wiredrive_Theme_Settings();
$fonts = $settings->getFonts();
$options = $settings->getOptions();
?>
        <div id="footer-wrapper">
            <div id="footer">
	            <div class="footer-content">
					<?php echo $options['footer_code'];?>
	            </div> 
                
                <div class="social-links">
                    <?php if ($options['twitter_link'] != '') { ?>
                        <a class="twitter" href=" <?php echo $options['twitter_link'];?>" target="_blank"><span>Twitter</span></a>
                    <?php } ?>
                    
                    <?php if ($options['facebook_link'] != '') { ?>
                        <a class="facebook" href=" <?php echo $options['facebook_link'];?>" target="_blank"><span>Facebook</span></a>
                    <?php } ?>
                </div>
            </div>                
    	</div>
	
    </div><!-- End of container -->	
	
    
<?php wp_footer();?>
</body>
</html>