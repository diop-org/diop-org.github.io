<?php
function pandora_theme_logo($x){	
	$logo_url = pandora_my_little_logo();
?>
	<a href="<?php echo home_url() ?>/" title="<?php echo esc_html( get_bloginfo('name')) ?>" rel="home">
		<img src="<?php echo $logo_url ?>" height="<?php echo $x ?>" width="100%">
	</a>
<?php
}
?>