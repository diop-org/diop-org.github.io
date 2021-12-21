<?php

	if(is_page_template('page-fullwidth.php') || is_page_template('page-fullhighlight.php') || is_page_template('page-carousel-full')) $full_width_page = true;
	else $full_width_page = false;
	
	if(is_page_template('page-carousel.php') || is_page_template('page-carousel-full.php')) $carousel_page = true;
	else $carousel_page = false;
	
	if(VPRO && (is_page_template('page-feature.php') || is_page_template('page-feature-page.php') || (is_home() && pagelines('featureblog')))) $featureslide_template = true;
	else $featureslide_template = false;
	
	if(VPRO && (is_page_template('page-feature.php') || m_pagelines('featureboxes', $post->ID))) $fboxes_template = true;
	else $fboxes_template = false;

?>

<?php if($featureslide_template) include(PRO . '/template_feature.php'); ?>
<?php if($carousel_page) include(PRO.'/template_carousel.php');?>
<div id="contentcontainer" class="content fix"> 
	<div id="contentborder">

		<?php if(!is_page_template('page-highlight.php') && !is_404()) include(THEME_LIB.'/_sub_head.php');?>
		
		<?php if(is_page_template('page-fullhighlight.php')) include (PRO . '/template_highlight.php'); ?>
		
		<?php if($fboxes_template) include(PRO . '/template_fboxes.php');?>

			<div id="maincontent" <?php if($full_width_page):?>class="fullwidth"<?php endif;?> >
				<?php if(is_page_template('page-highlight.php')):?> 
					<?php include(PRO.'/template_highlight.php');?>
					<?php include(THEME_LIB.'/_sub_head.php');?>
				<?php endif;?>
				
				<?php include (THEME_LIB . '/_posts.php'); ?>
			</div>
		
			<?php if(!$full_width_page) get_sidebar();?>
		
		<?php include (THEME_LIB . '/_contentfooter.php'); ?>
		<div class="clear"></div>
	</div>
</div>