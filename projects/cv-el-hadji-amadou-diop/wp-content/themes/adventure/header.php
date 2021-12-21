<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php bloginfo('name'); ?><?php wp_title('-'); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_stylesheet_uri(); ?>" />
<!--[if IE 6]><style type="text/css">#bar li{width: 200px;overflow:hidden;}#bar{overflow:hidden;}</style><![endif]-->
<!--[if lte IE 7]><style type="text/css"> #title {margin: 14px 14px 0px 10px;} #slogan {margin: 18px 18px 0px 0px;}</style><![endif]-->
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>
</head>