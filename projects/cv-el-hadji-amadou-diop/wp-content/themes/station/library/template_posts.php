<?php

global $pagelines_ID;

	if(is_page_template('page-fullwidth.php') || is_page_template('page-fullhighlight.php') || is_page_template('page-carousel-full.php')) $full_width_page = true;
	else $full_width_page = false;
	
	if(is_page_template('page-carousel.php') || is_page_template('page-carousel-full.php')) $carousel_page = true;
	else $carousel_page = false;
	
	if(VPRO && (is_page_template('page-feature.php') || is_page_template('page-feature-page.php') || (is_home() && pagelines('featureblog')))) $featureslide_template = true;
	else $featureslide_template = false;
	
	if(VPRO && (is_page_template('page-feature.php') || m_pagelines('featureboxes', $pagelines_ID))) $fboxes_template = true;
	else $fboxes_template = false;

?>

<?php if($featureslide_template) get_template_part('pro/template_feature'); ?>
<?php if($carousel_page) get_template_part('pro/template_carousel');?>

<?php if(!is_404()) get_template_part('library/_subhead');?>

<?php if(is_page_template('page-fullhighlight.php') || is_page_template('page-highlight.php') ) get_template_part ( 'pro/template_highlight'); ?>

<div id="contentcontainer" class="content fix"> 
	<div id="contentborder">

		
		<?php if($fboxes_template) get_template_part('pro/template_fboxes');?>

		<?php if(!is_page_template('page-feature.php')):?>
			<div id="maincontent" <?php if($full_width_page):?>class="fullwidth"<?php endif;?> >
			
				<?php get_template_part ('library/_posts'); ?>
			</div>
		
			<?php if(!$full_width_page) get_sidebar();?>
			<?php get_template_part ('library/_contentfooter'); ?>
		<?php endif;?>
	
		<div class="clear"></div>
	</div>
</div>