<?php
/*
/**
 * The main front page file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query. 
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 */
?>
<?php get_header(); ?>
<!--Start slider wrapper-->
<div class="slider_wrapper">
  <div id="slides">
    <div id="slide-box">
      <div class="slides_container col-full" >
       <!--Start Slide-->
        <div class="slide" >
          <!-- // End $type IF Statement -->
                        <div class="entry">
                        <?php if ( get_option('inkthemes_slideheading1') !='' ) { ?>
                        <h2><?php echo get_option('inkthemes_slideheading1'); ?></h2>
                        <?php } else { ?>
                        <h2>Top Section Heading</h2>
                        <?php } ?>
                        <?php if ( get_option('inkthemes_slidedescription1') !='' ) { ?>
                        <p><?php echo get_option('inkthemes_slidedescription1'); ?></p>
                        <?php } else { ?>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                        <?php } ?>
                        <?php if ( get_option('inkthemes_slidebuttontext1') !='' ) {?>
                        <a class="btn" href="<?php echo get_option('inkthemes_slidelink1'); ?>"><span><?php echo get_option('inkthemes_slidebuttontext1'); ?></span></a>
                        <?php } else { ?>
                        <a class="btn" href="#"><span>Buy Now</span></a>
                         <?php } ?>
                        </div>         
                        <?php if ( get_option('inkthemes_slideimage1') !='' ) { ?>
                        <div class="images"><img title="slideimage1" src="<?php echo get_option('inkthemes_slideimage1'); ?>"  alt="" /></div>
                        <?php } else { ?>
                        <div class="images"><img title="Top Section" src="<?php echo get_template_directory_uri(); ?>/images/iphone-slide.png" alt="" /></div>
                        <?php } ?>
          </div>
        <!--End slide -->
	  </div>
      <!-- /.slides_container -->
    </div>
    <!-- /#slide-box -->
   <div class="clear"></div>
  </div>
</div>
<!--End slider wrapper-->
<div class="clear"></div>
<!--Start Content Wrapper-->
<div class="content_wrapper">
  <!--Start Main Message-->
  <div class="main_message">
    <?php if ( get_option('inkthemes_mainheading') !='' ) {?>
    <h1><?php echo get_option('inkthemes_mainheading'); ?></h1>
    <?php } else { ?>
    <h1>"Johan Otto is a world class company which sells the All New Technology"</h1>
    <?php } ?>
  </div>
  <!--End Main Message-->
  <div class="clear"></div>
  <div class="hr_line"></div>
  <div class="clear"></div>
  <div class="columns">
    <div class="one_fourth">
      <div class="circle">1</div>
      <a href="<?php echo get_option('inkthemes_link1'); ?>">
      <h3>
        <?php if ( get_option('inkthemes_headline1') !='' ) { echo get_option('inkthemes_headline1'); } 
			else { ?>
        Our Products
        <?php }  ?>
      </h3>
      </a>
      <p>
        <?php if ( get_option('inkthemes_feature1') !='' ) {
				echo get_option('inkthemes_feature1');
				} else { ?>
        Record conversations, interviews, speeches, performances, and the sounds of nature with iTalk, one of the most popular digital recording apps ever.
        <?php }?>
      </p>
    </div>
    <div class="one_fourth">
      <div class="circle">2</div>
      <a href="<?php echo get_option('inkthemes_link2'); ?>">
      <h3>
        <?php if ( get_option('inkthemes_headline2') !='' ) { echo get_option('inkthemes_headline2'); }
			else { ?>
        Our Products
        <?php }  ?>
      </h3>
      </a>
      <p>
        <?php if ( get_option('inkthemes_feature2') !='' ) { echo get_option('inkthemes_feature2'); }
			else { ?>
        Information on Emerging Technologies & impact on business & society. Unlike other systems, Ion Torrent's technology promises to improve in step with World.
        <?php } ?>
      </p>
    </div>
    <div class="one_fourth">
      <div class="circle">3</div>
      <a href="<?php echo get_option('inkthemes_link3'); ?>">
      <h3>
        <?php if ( get_option('inkthemes_headline3') !='' ) { echo get_option('inkthemes_headline3'); }
			else { ?>
        Our Clients
        <?php } ?>
      </h3>
      </a>
      <p>
        <?php if ( get_option('inkthemes_feature3') !='' ) { echo get_option('inkthemes_feature3'); }
			else { ?>
        Anonymous Hacks NATO, Hackers Deface Anonymous Site Tablet Sales Show Hope for Microsoft Google Announces AdWords Business Credit Card for Public.
        <?php } ?>
      </p>
    </div>
    <div class="one_fourth last">
      <div class="circle">4</div>
      <a href="<?php echo get_option('inkthemes_link4'); ?>">
      <h3>
        <?php if ( get_option('inkthemes_headline4') !='' ) {  echo get_option('inkthemes_headline4'); }
			else { ?>
        Client Needs
        <?php } ?>
      </h3>
      </a>
      <p>
        <?php if ( get_option('inkthemes_headline4') !='' ) {  echo get_option('inkthemes_feature4'); }
			else { ?>
        Technology Site Planners (TECH SITE) specializes in providing evaluation, design, construction, and post-construction services for mission critical.
        <?php } ?>
      </p>
    </div>
  </div>
  <div class="clear"></div>
  <div class="hr_line"></div>
  <div class="one_fourth screen_shoot">
    <div class="effect"> <a href="<?php echo get_option('inkthemes_link1'); ?>">
      <?php if ( get_option('inkthemes_fimg1') !='' ) {?>
      <img src="<?php echo get_option('inkthemes_fimg1'); ?>" alt="screen shoot" title="Screen Shoot"/>
      <?php } else { ?>
      <img  src="<?php echo get_template_directory_uri(); ?>/images/abc1.png" alt="screen shoot" title="Screen Shoot"/>
      <?php } ?>
      </a> </div>
  </div>
  <div class="one_fourth screen_shoot">
    <div class="effect"> <a href="<?php echo get_option('inkthemes_link2'); ?>">
      <?php if ( get_option('inkthemes_fimg2') !='' ) {?>
      <img src="<?php echo get_option('inkthemes_fimg2'); ?>" alt="screen shoot" title="Screen Shoot"/>
      <?php } else { ?>
      <img  src="<?php echo get_template_directory_uri(); ?>/images/abc2.png" alt="screen shoot" title="Screen Shoot"/>
      <?php } ?>
      </a> </div>
  </div>
  <div class="one_fourth screen_shoot">
    <div class="effect"> <a href="<?php echo get_option('inkthemes_link3'); ?>">
      <?php if ( get_option('inkthemes_fimg3') !='' ) {?>
      <img src="<?php echo get_option('inkthemes_fimg3'); ?>" alt="screen shoot" title="Screen Shoot"/>
      <?php } else { ?>
      <img src="<?php echo get_template_directory_uri(); ?>/images/abc3.png" alt="screen shoot" title="Screen Shoot"/>
      <?php } ?>
      </a> </div>
  </div>
  <div class="one_fourth screen_shoot last">
    <div class="effect"> <a href="<?php echo get_option('inkthemes_link4'); ?>">
      <?php if ( get_option('inkthemes_fimg4') !='' ) {?>
      <img src="<?php echo get_option('inkthemes_fimg4'); ?>" alt="screen shoot" title="Screen Shoot"/>
      <?php } else { ?>
      <img  src="<?php echo get_template_directory_uri(); ?>/images/abc4.png" alt="screen shoot" title="Screen Shoot"/>
      <?php } ?>
      </a> </div>
  </div>
  <div class="clear"></div>
  <div class="info_bar">
    <h5>
      <?php if ( get_option('inkthemes_tagline') !='' ) {  echo get_option('inkthemes_tagline'); }
			else { ?>
      We have got a special deal for you. Check it out !!!
      <?php } ?>
    </h5>
    <div class="gold_btn"><a class="btn" href="<?php echo get_option('inkthemes_taglinebuttonlink'); ?>">
      <?php if ( get_option('inkthemes_taglinebuttontext') !='' ) {  echo get_option('inkthemes_taglinebuttontext'); }
			else { ?>
      Click Here
      <?php } ?>
      </a></div>
    <div class="clear"></div>
  </div>
  <div class="clear"></div>
</div>
<div class="hr_big"></div>
<!--End Content Wrapper-->
</div>
<div class="clear"></div>
<!--End Main_wrapper-->
<?php get_footer(); ?>
