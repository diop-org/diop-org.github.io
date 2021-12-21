<p>Get in first on the latest news and updates by subscribing to our weekly newsletter!</p>
<?php if ( $service == 'fb' ) { ?>
<form class="newsletterform wide" action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open( 'http://feedburner.google.com/fb/a/mailverify?uri=<?php echo mframe_option( 'feedburnerid' ); ?>', 'popupwindow', 'scrollbars=yes,width=550,height=520' ); return true">
 <input type="hidden" name="uri" value="<?php echo mframe_option( 'feedburnerid' ); ?>" />
 <input type="hidden" name="loc" value="en_US" />
<?php } else { ?>
<form class="newsletterform ajax wide" action="/">
 <input type="hidden" name="list" value="<?php echo $list; ?>" />
 <input type="hidden" name="action" value="mframe_newsletter" />
 <?php wp_nonce_field( 'newsletter_data', 'security' );
} ?>
 <p><input type="text" name="email" value="" placeholder="<?php _e( 'enter your email', 'mframe' ); ?>" /></p>
 <p><input type="submit" value="&nbsp;" /><span class="note">Your email won't be published.</span></p>
 <ul class="ajaxresponse"></ul>
</form>