<?php
require_once( dirname(__FILE__) . '../../../../wp-config.php');
require_once( dirname(__FILE__) . '/functions.php');
header("Content-type: text/css");
global $options;
foreach ($options as $value) { if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); } } ?>

/* --------------[ User-Defined Adjustments from Stylesheet #2 ]-------------- */

@import 'style-2.css';


/* --------------[ User-Defined Adjustments ]-------------- */

/*---------------[Header Picture ]--------------------------*/

<?php if ( $breathe_head_pic_option == 'Custom' && $breathe_head_pic_url ) { ?>
#header {
	background:  url(<?php echo $breathe_head_pic_url; ?>) left 45px no-repeat;
}
<?php } ?>

/*--------------[ Header Color ]---------------------------*/
#top h1 {
	font-size: <?php echo $breathe_blog_title_size; ?>;
	font-family: <?php echo $breathe_blog_title_font_family; ?>;
        
}

#top h1 a {
	color: <?php echo $breathe_blog_title_color; ?>;
}


#top h1 span.black {
	color:<?php echo $breathe_tag_title_color; ?>;
	font-size: <?php echo $breathe_tag_title_size; ?>;
	font-family: <?php echo $breathe_tag_title_font_family; ?>;
}


/*--------------[ Advertising ]---------------------------*/
<?php if ( $breathe_ads_top == 'yes' && $breathe_ads_code_top) { ?>
.bottom-ads{
	background:  url(<?php echo $breathe_ads_code_top; ?>) no-repeat;
}
<?php } ?>


<?php if ( $breathe_ads_bottom == 'yes' && $breathe_ads_code_bottom ) { ?>
.bottom-ads{
	background:  url(<?php echo $breathe_ads_code_bottom; ?>) no-repeat;
}
<?php } ?>
