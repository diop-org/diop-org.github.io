<?php 
$sc_jdt = get_option('seedprod_comingsoon_options'); 
global $seedprod_comingsoon;
?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title><?php
  	bloginfo( 'name' );
  	$site_description = get_bloginfo( 'description', 'display' );
  	if ( $site_description  )
  		echo " | $site_description";
  	?></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php if(substr($sc_jdt['comingsoon_body_font'], 0, 1) != '_'): ?>
  <link href='http://fonts.googleapis.com/css?family=<?php echo $sc_jdt['comingsoon_body_font'] ?>&v1' rel='stylesheet' type='text/css'>
  <?php endif;?>
  <?php if(substr($sc_jdt['comingsoon_headline_font'], 0, 1) != '_'): ?>
  <link href='http://fonts.googleapis.com/css?family=<?php echo $sc_jdt['comingsoon_headline_font'] ?>&v1' rel='stylesheet' type='text/css'>
  <?php endif;?>
  <?php  do_action( 'sc_head'); ?>

  <link rel="stylesheet" href="<?php echo plugins_url('template/style.css',dirname(__FILE__)); ?>">
  <style type="text/css">
    body{
        background: <?php echo $sc_jdt['comingsoon_custom_bg_color'];?> url('<?php echo (empty($sc_jdt['comingsoon_custom_bg_image']) ? plugins_url('template/images/bg.png',dirname(__FILE__)) : $sc_jdt['comingsoon_custom_bg_image']); ?>') repeat;
        <?php if(!empty($sc_jdt['comingsoon_background_strech'])):?>
          background-repeat: no-repeat;
          background-attachment: fixed;
          background-position: top center;
          -webkit-background-size: cover;
          -moz-background-size: cover;
          -o-background-size: cover;
          background-size: cover;
        <?php endif;?>
    }
    <?php if(!empty($sc_jdt['comingsoon_body_font'])):?>
    #coming-soon-container{
        font-family:<?php echo $seedprod_comingsoon->font_families($sc_jdt['comingsoon_body_font']); ?>;
    }
    <?php endif;?>
    <?php if(!empty($sc_jdt['comingsoon_headline_font'])):?>
    #teaser-headline{
        font-family:<?php echo $seedprod_comingsoon->font_families($sc_jdt['comingsoon_headline_font']); ?>;
    }
    <?php endif;?>

    <?php if($sc_jdt['comingsoon_font_color'] == 'white'):?>
    #coming-soon-container, #coming-soon-footer{
        color:#fff;
        text-shadow: #333 1px 1px 0px;
    }
    <?php elseif($sc_jdt['comingsoon_font_color'] == 'gray'):?>
    #coming-soon-container, #coming-soon-footer{
        color:#666;
        text-shadow: #fff 1px 1px 0px;
    }
    <?php elseif($sc_jdt['comingsoon_font_color'] == 'black'):?>
    #coming-soon-container, #coming-soon-footer{
        color:#000;
        text-shadow: #fff 1px 1px 0px;
    }
    <?php endif;?>
    <?php echo $sc_jdt['comingsoon_custom_css'];?>
  </style>
</head>

<body id="coming-soon-page">

  <div id="coming-soon-container">
    <div id="coming-soon-main" role="main">
        <div id="coming-soon">
            <?php if(!empty($sc_jdt['comingsoon_image'])): ?>
            <img id="teaser-image" src="<?php echo $sc_jdt['comingsoon_image'] ?>" alt="Teaser"/>
            <?php endif; ?>
            <h1 id="teaser-headline"><?php echo $sc_jdt['comingsoon_headline'] ?></h1>
            <p id="teaser-description"><?php echo $sc_jdt['comingsoon_description'] ?></p>
            <?php if(!empty($sc_jdt['comingsoon_customhtml'])): ?>
            <div id="coming-soon-custom-html">
                <?php echo $sc_jdt['comingsoon_customhtml'] ?>
            </div>
            <?php endif; ?>
            <?php if($sc_jdt['comingsoon_mailinglist'] == 'feedburner' && !empty($sc_jdt['comingsoon_feedburner_address'])): ?>
            	<form action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=<?php echo $sc_jdt['comingsoon_feedburner_address']; ?>', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
                    <input type="hidden" value="<?php echo $sc_jdt['comingsoon_feedburner_address']; ?>" name="uri"/>
                    <input type="hidden" name="loc" value="en_US"/>
                    <input id="notify-email" type="text" name="email" placeholder="<?php _e('Enter Your Email', 'ultimate-coming-soon-page') ?>"/>
                    <button id="notify-btn" type="submit"><?php _e('Notify Me!', 'ultimate-coming-soon-page') ?></button>
    			</form>
            <?php elseif($sc_jdt['comingsoon_mailinglist'] != 'feedburner' && !empty($sc_jdt['comingsoon_mailinglist'])): ?>
                <form id="notify">  
                    <input id="notify-url" name="notify-url" type="hidden" value="<?php echo admin_url() ?>admin-ajax.php" />
                    <?php wp_nonce_field('seedprod_comingsoon_callback','noitfy-nonce'); ?>
                    <fieldset>
                    <input id="notify-email" name="notify-email" type="text" placeholder="<?php _e('Enter Your Email', 'ultimate-coming-soon-page') ?>" />
                    <button id="notify-btn" type="submit"><?php _e('Notify Me!', 'ultimate-coming-soon-page') ?></button>
                    <img id="ajax-indicator" src="<?php echo plugins_url('template/images/ajax-loader.gif',dirname(__FILE__)); ?>">
                    </fieldset>
                </form>
            <?php endif; ?>

            <div id="notify-incentive">
                <div id="notify-incentive-text">
                    <?php echo $sc_jdt['comingsoon_incentive_text'] ?>
                </div>
                <div id="notify-incentive-link">
                    <a href="<?php echo $sc_jdt['comingsoon_incentive_link'] ?>"><?php echo $sc_jdt['comingsoon_incentive_link'] ?></a>
                </div>
            </div>
        </div>
    </div> <!--! end of #main -->
  </div> <!--! end of #container -->
  <div id="coming-soon-footer">
  <?php if($sc_jdt['comingsoon_footer_credit']){ 
    if(!empty($sc_jdt['comingsoon_affiliate_id']) && is_numeric($sc_jdt['comingsoon_affiliate_id'])){
      $powered_by_url = "https://www.e-junkie.com/ecom/gb.php?cl=187765&c=ib&aff=".$sc_jdt['comingsoon_affiliate_id'];
    }else{
      $powered_by_url = "http://www.seedprod.com/";
    }
  ?>
  <a href="<?php echo $powered_by_url; ?>" target="_blank">
  <img id="credit" src="<?php echo plugins_url('ultimate-coming-soon-page',dirname('.'))."/framework/seedprod-footer-logo-{$sc_jdt['comingsoon_font_color']}.png" ?>" alt="Powered by SeedProd" /></a>
  <?php } ?>
  </div>
  <?php //@wp_footer(); ?>
  <script src="<?php echo includes_url(); ?>js/jquery/jquery.js"></script>
  <script src="<?php echo plugins_url('template/script.js',dirname(__FILE__)); ?>"></script>
  <!--[if lt IE 7 ]>
      <script src="<?php echo plugins_url('template/dd_belatedpng.js',dirname(__FILE__)); ?>"></script>
      <script>DD_belatedPNG.fix('img, .png_bg');</script>
  <![endif]-->
  <!--[if lt IE 9]>
  <script>
  jQuery(document).ready(function($){
    <?php
    if(!empty($sc_jdt['comingsoon_background_strech'])):
    ?>
    $.supersized({
      slides:[ {image : '<?php echo $sc_jdt['comingsoon_custom_bg_image']; ?>'} ]
    });
    <?php
    endif;
    ?>
  });
    $('input').placeholder();
  </script>
  <![endif]-->
</body>
</html>

<?php exit(); ?>
