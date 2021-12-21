<?php
//this is the admin user interface
function pandora_admin_credits_form(){
	$admin = wp_get_current_user();
	$welcome = __('Welocme ', '') . $admin->display_name . ',';
	?><div class="wrap-es">
		<h3><?php _e('Credits and Help', 'pandora') ?></h3>
		<h4><?php echo $welcome ?></h4>
		<p>
			<?php _e('This is the Options page of the Pandora theme. You can change many things here.', 'pandora') ?>
			<br><?php _e('This theme uses the Coin Slider plugin and the Pandora Drop-Down Nav Menu (pandora/applications folder).', 'pandora') ?>
			<br><?php _e('There is an available readme.txt in pandora folder.', 'pandora') ?>
		</p>
		<h4><?php _e('Authors:', 'pandora') ?></h4>
		<p>
			<?php _e('Created by David Belicza', 'pandora') ?><br>
			<?php _e('Tested by:', 'pandora') ?><br>
			- nofearinc<br>
			- garinungkadol<br>
			- saymar90<br>
			- SeizedPropaganda<br>
			- emiluzelac<br>
			- nik<br>
		</p>
		<h4><?php _e('Contact:', 'pandora') ?></h4>
		<p>
			<?php _e('If you have any question about Pandora theme, visit the offical site of Pandora: <a href="http://www.belicza.com/wordpress\" target="_blank">belicza.com/wordpress</a>.', 'pandora') ?>
			<?php _e('If you have non-public question about Pandora theme, please write me to info@belicza.com or 87.bdavid@gmail.com.', 'pandora') ?>
		</p>
		<p>
			<?php _e('Offical download link for current version: <a href="http://wordpress.org/extend/themes/pandora" target="_blank">wordpress.org/extend/themes/pandora</a>', 'pandora') ?>
			<br><?php _e('All versions:  <a href="http://themes.svn.wordpress.org/pandora/" target="_blank">themes.svn.wordpress.org/pandora/</a>', 'pandora') ?>
			<br><?php _e('First realized version: 1.0.6.', 'pandora') ?>
		</p>
		<p>
			<?php _e('This theme is created by belicza.com for WordPress on GPL licence in 2011.', 'pandora') ?>
		</p>
	</div>
	<?php
}
pandora_admin_credits_form();
?>