<?php
/*
@package WordPress
@subpackage Desire
*/
?>
<?php global $options, $isMobile; ?>
    <div id="footer">
        <?php if(!is_404() and !$isMobile): ?>
            <?php get_sidebar('footer'); ?>
        <?php endif; ?>
        <div id="footer-credits">
            <table class="tablayout">
                <tr>
                    <td class="tdleft" style="width:30%;"><?php echo desire_social_links(); ?></td>
                    <td class="tdright" style="width:70%;"><p><?php _e('Copyright','desire'); ?> &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p></td>
                </tr>
            </table>
        </div>
    </div>
</div> <!-- end of wrapper -->
<?php wp_footer(); ?>
</body>