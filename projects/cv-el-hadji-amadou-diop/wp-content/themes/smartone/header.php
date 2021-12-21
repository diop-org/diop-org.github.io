<?php
/**
 * The Header for our theme.
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'smartone' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />


<?php $options = get_option('smartone');
  if ($options['smt_color_scheme'] == "grey" ):
    
echo '<link rel="stylesheet" href="'; echo get_template_directory_uri(); echo '/images/schemes/grey/grey.css" type="text/css" media="screen" />';

elseif ($options['smt_color_scheme'] == "black" ):

echo '<link rel="stylesheet" href="'; echo get_template_directory_uri(); echo '/images/schemes/black/black.css" type="text/css" media="screen" />';

elseif ($options['smt_color_scheme'] == "purple" ):

echo '<link rel="stylesheet" href="'; echo get_template_directory_uri(); echo '/images/schemes/purple/purple.css" type="text/css" media="screen" />';

elseif ($options['smt_color_scheme'] == "orange" ):

echo '<link rel="stylesheet" href="'; echo get_template_directory_uri(); echo '/images/schemes/orange/orange.css" type="text/css" media="screen" />';

elseif ($options['smt_color_scheme'] == "red" ):

echo '<link rel="stylesheet" href="'; echo get_template_directory_uri(); echo '/images/schemes/red/red.css" type="text/css" media="screen" />';

elseif ($options['smt_color_scheme'] == "green" ):

echo '<link rel="stylesheet" href="'; echo get_template_directory_uri(); echo '/images/schemes/green/green.css" type="text/css" media="screen" />';

elseif ($options['smt_color_scheme'] == "blue" ):

echo '<link rel="stylesheet" href="'; echo get_template_directory_uri(); echo '/images/schemes/blue/blue.css" type="text/css" media="screen" />';

elseif ($options['smt_color_scheme'] == "gothic" ):

echo '<link rel="stylesheet" href="'; echo get_template_directory_uri(); echo '/images/schemes/gothic.css" type="text/css" media="screen" />';

else:

endif;

 ?>
 
 
 <?php $options = get_option('smartone');  

 if ($options['smt_content_font'] == "arial") { ?>

  <style type="text/css">body, input, textarea {font-family: Arial, Helvetica Neue, Helvetica, sans-serif;}</style>
  
 <?php } if ($options['smt_content_font'] == "segoe") { ?>

  <style type="text/css">body, input, textarea {font-family: "Segoe UI",Calibri,"Myriad Pro",Myriad,"Trebuchet MS",Helvetica,Arial,sans-serif;}</style>
  
  
   <?php } if ($options['smt_content_font'] == "courier") { ?>

  <style type="text/css">body, input, textarea {font-family: "Courier New", Courier, monospace;}</style>
  
  

 <?php } if ($options['smt_content_font'] == "comic") { ?>

  <style type="text/css">body, input, textarea {font-family: Comic Sans, Comic Sans MS, cursive;}</style>
  
  <?php } ?> 
  

  <?php $options = get_option('smartone'); if ($options['smt_pos_sidebar'] == "left") { ?>

   <style type="text/css"> 
  #content {margin: 0 5px 0 345px;}
  #container {float: right;margin: 0 0 0 -325px;}
  #main {background-position:left top;float: right;}
  #primary, #secondary {float: left;}
  #primary {padding: 30px 20px 10px 0px;}
  .entry-meta {left:auto;right:0px;background-position:10px top; }
  #main {background-image:url('<?php echo get_template_directory_uri(); ?>/images/sidebar-left.png');}   
  }
</style>  

<?php } if ($options['smt_pos_sidebar'] == "disable") { ?>

   <style type="text/css"> 
  #content {margin: 0 5px;}
  #container {float: right;margin: 0;}
  #main {background:none;}
  .entry-meta {
        width:940px;
}
</style>  

<?php } ?>  
  

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script> 

<!--[if IE 6]><script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/ie6.js"></script><![endif]-->
<!--[if IE 6]><link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.ie6.php" type="text/css" media="screen" /><![endif]-->


<?php

	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	wp_head();
?>


 <?php $options = get_option('smartone'); 
 $css_content = $options['smt_css_content']; 
 if ($css_content === false) $css_content = '';
 if (!empty($css_content)) {
 echo '<style type="text/css">'.stripslashes($css_content).'</style>';
 } 
?>    

</head>

<body <?php body_class(); ?>>

<div id="nav-back">
		<div id="access" role="navigation">
			
			<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary', 'link_before' => '<span class="item-left"></span><span class="icon">' , 'link_after' => '</span><span class="item-right"></span>' ) ); ?>
			</div><!-- #access -->
      </div>
      
<div id="wrapper" class="hfeed">

<div id="back-top-left"></div>
<div id="back-top-right"></div>
<div id="back-bottom-left"></div>
<div id="back-bottom-right"></div>
<div id="back-top"></div>
<div id="back-bottom"></div>
<div id="back-left"></div>
<div id="back-right"></div>


	<div id="header">
		<div id="masthead">
			<div id="branding" role="banner"> 
      
				<?php $heading_tag = ( is_home() || is_front_page() ) ? 'h1' : 'div'; ?>
				<<?php echo $heading_tag; ?> id="site-title">
      
					<span>
						<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
					</span>
				</<?php echo $heading_tag; ?>>
        
        <div id="subscribe"><span style="position:relative;top:9px;left:-4px;float:left;font-family:Georgia,Times,Times New Roman,serif;
font-size:17px;
font-style:italic;
font-weight:bold;">Follow Me</span><a href="<?php $options = get_option('smartone');if ($options['smt_rss_feed'] != "" ) { echo $options['smt_rss_feed']; } else { bloginfo( 'rss_url' ); } ?>" title="RSS Feed"><img src="<?php echo get_template_directory_uri(); ?>/images/rss.png" width="36" height="35" alt="RSS Feed" /></a>
        

        <?php $options = get_option('smartone');
if (!empty($options['smt_newsletter'])) { ?><a target="_blank" href="<?php echo stripslashes($options['smt_newsletter']);?>" title="Newsletter" >

<img src="<?php echo get_template_directory_uri(); ?>/images/newsletter.png" width="43" height="35" alt="Newsletter" />
</a><?php } ?>


        <?php $options = get_option('smartone');
if (!empty($options['smt_facebook'])) { ?><a target="_blank" href="http://facebook.com/<?php echo stripslashes($options['smt_facebook']);?>" title="Facebook" >

<img src="<?php echo get_template_directory_uri(); ?>/images/facebook.png" width="35" height="35" alt="Facebook" />
</a><?php } ?>

        <?php $options = get_option('smartone');
if (!empty($options['smt_twitter_id'])) { ?><a target="_blank" href="http://twitter.com/<?php echo stripslashes($options['smt_twitter_id']);?>" title="Twitter" >

<img src="<?php echo get_template_directory_uri(); ?>/images/twitter.png" width="31" height="35" alt="Twitter" />
</a><?php } ?>



        </div>
        
				<div id="site-description"><?php bloginfo( 'description' ); ?></div>

				<?php

					if ( is_singular() &&
							has_post_thumbnail( $post->ID ) &&
							( /* $src, $width, $height */ $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-thumbnail' ) ) &&
							$image[1] >= HEADER_IMAGE_WIDTH ) :

						echo get_the_post_thumbnail( $post->ID, 'post-thumbnail' );
					else : ?>
          <?php if( get_header_image() ) { ?>
						<img src="<?php header_image(); ?>" width="<?php echo HEADER_IMAGE_WIDTH; ?>" height="<?php echo HEADER_IMAGE_HEIGHT; ?>" alt="" />
            <?php } else { ?>
              <hr style="color:#eee;" />
            <?php } ?>
            
					<?php endif; ?>
			</div><!-- #branding -->

	
		</div><!-- #masthead -->
	</div><!-- #header -->

	<div id="main">