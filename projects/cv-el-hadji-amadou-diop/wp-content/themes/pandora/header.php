<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes() ?>>
<head profile="http://gmpg.org/xfn/11">
	<title><?php wp_title( '-', true, 'right' ); echo esc_html( get_bloginfo('name') ) ?></title>
	<meta http-equiv="content-type" content="<?php bloginfo('html_type') ?>; charset=<?php bloginfo('charset') ?>" />
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url') ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url') ?>" />
	
<?php echo pandora_my_favicon(); ?>

<?php wp_head() // For plugins ?>
</head>

<body class="<?php pandora_body_class() ?>">

<div class="wrapper">
	<div class="always-white">
		<div id="header">
			<div class="site-title">
				<h1><a href="<?php echo home_url() ?>/" title="<?php echo esc_html( get_bloginfo('name') ) ?>" rel="home">
					<?php echo esc_html( get_bloginfo('name') ) ?>
				</a></h1>
			</div>
			<div id="theme_logo">
				<?php pandora_theme_logo(76) ?>
			</div>
			

		</div><!--  #header -->

	

