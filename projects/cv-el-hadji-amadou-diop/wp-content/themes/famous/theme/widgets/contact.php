<p><?php mframe_option( 'contact-form-text', 1 ); ?></p>
<form class="contactform ajax wide" action="/">
 <p><input type="text" name="name" value="" placeholder="<?php _e( 'enter your name', 'mframe' ); ?>" /></p>
 <p><input type="text" name="email" value="" placeholder="<?php _e( 'enter your email', 'mframe' ); ?>" /></p>
 <p><input type="text" name="subject" value="" placeholder="<?php _e( 'enter your subject', 'mframe' ); ?>" /></p>
 <p><textarea name="message" placeholder="<?php _e( 'enter your message', 'mframe' ); ?>"></textarea></p>
 <p><input type="submit" value="&nbsp;" /><span class="note">We respect your privacy.</span></p>
 <ul class="ajaxresponse"></ul>
 <input type="hidden" name="action" value="mframe_contact" />
 <?php wp_nonce_field( 'contact_data', 'security' ); ?>
</form>