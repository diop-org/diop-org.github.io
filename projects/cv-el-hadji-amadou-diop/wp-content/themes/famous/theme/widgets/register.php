<?php

if ( !get_option( 'users_can_register' ))
	echo '<p>' . mframe_option( 'widget-register-text-alt' ) . '</p>';

else { ?>

<p><?php mframe_option( 'widget-register-text', 1 ); ?></p>
<form class="registerform ajax wide" method="post" action="<?php echo wp_login_url(); ?>">
 <p><input type="text" name="user_login" value="" placeholder="<?php _e( 'enter your username', 'mframe' ); ?>" /></p>
 <p><input type="text" name="user_email" value="" placeholder="<?php _e( 'enter your email', 'mframe' ); ?>" /></p>
 <p><input type="submit" value="&nbsp;" /><span class="note">With just one click.</span></p>
 <ul class="ajaxresponse"></ul>
 <input type="hidden" name="action" value="register" />
 <?php wp_nonce_field( 'register_data', 'security' ); ?>
</form>

<?php } ?>