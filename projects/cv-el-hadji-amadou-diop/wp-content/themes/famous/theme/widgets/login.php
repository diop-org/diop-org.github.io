<?php

if ( is_user_logged_in())
	echo '<p>' . mframe_option( 'widget-login-text-alt' ) . ' <a href="' . wp_logout_url( get_permalink()) . '">' . __( 'Log out?', 'mframe' ) . '</a></p>';

else { ?>

<p><?php mframe_option( 'widget-login-text', 1 ); ?></p>
<form class="loginform wide" method="post" action="<?php echo wp_login_url( get_permalink()); ?>">
 <p><input type="text" name="log" value="" placeholder="<?php _e( 'enter your username', 'mframe' ); ?>" /></p>
 <p><input type="password" name="pwd" value="" placeholder="<?php _e( 'enter your password', 'mframe' ); ?>" /></p>
 <p><input type="submit" value="&nbsp;" /><span class="note"><a target="_blank" href="<?php echo wp_lostpassword_url( get_permalink()); ?>"><?php _e( 'Forgot your password?', 'mframe' ); ?></a></span></p>
</form>

<?php } ?>