<?php
if ( mframe_option( 'show-feeds' ) || ( mframe_option( 'show-login' ) && !is_user_logged_in()))
{
	echo '<div class="tools">';
	echo '<ul>';

	if ( mframe_option( 'show-feeds' ))
		echo '<li><a href="#feedsbox">' . __( 'Feeds', 'mframe' ) . '</a></li>';

	if ( mframe_option( 'show-login' ) && !is_user_logged_in())
		echo '<li><a href="#loginbox">' . __( 'Login', 'mframe' ) . '</a></li>';

	echo '</ul>';
	echo '</div>';
} ?>

<?php if ( mframe_option( 'show-feeds' )) { ?>

<div id="feedsbox" style="display: none;">
 <div id="popup-wrapper" class="feeds">
  <h3>Feeds</h3>
  <ul class="feedslist"><?php mframe_display( 'bookmarks' ); ?></ul>
 </div>
</div>

<?php } ?>

<?php if ( mframe_option( 'show-login' ) && !is_user_logged_in()) { ?>

<div id="loginbox" style="display: none;">
 <div id="popup-wrapper">
  <div class="left"><?php mframe_widget( 'login' ); ?></div>
  <div class="right"><?php mframe_widget( 'register' ); ?></div>
 </div>
</div>

<?php } ?>