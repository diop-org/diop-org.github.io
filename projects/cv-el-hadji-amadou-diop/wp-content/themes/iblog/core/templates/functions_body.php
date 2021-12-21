<?php

// This file has all the html used in the body area



// Basic Search Form
function pagelines_searchform(){?>	
		
	<form method="get" id="searchform" class="" action="<?php bloginfo('url'); ?>/">
		<fieldset>
			<input type="text" value="<?php _e('Search',TDOMAIN);?>" name="s" class="searchfield" onfocus="if (this.value == '<?php _e('Search',TDOMAIN);?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e('Search',TDOMAIN);?>';}" />

			<input type="image" value="Go" src="<?php echo THEME_IMAGES;?>/search-btn.png" class="submit btn" />
		</fieldset>
	</form>

<?php }

// Page Titles
function pagelines_page_title($searchresults = true){
 	global $bbpress_forum;
	if($bbpress_forum){
		echo '<a href="<?php bb_uri(); ?>">. bb_option("name"); .</a>';
	}elseif(is_page()){
		the_title(); 
	}elseif(is_home() || is_single()){
		
		if(get_option('page_for_posts')){
			echo get_the_title(get_option('page_for_posts'));
		}else{
			e_pagelines("blog_title_text",__('The Latest', TDOMAIN));
		}
	}elseif(is_search() && $showsearch){
		if(is_search()){
			_e('Search Results For:',TDOMAIN);
			echo '<span>"<?php the_search_query(); ?>"</span>';
		}
	}elseif(is_category()){
		single_cat_title('');
	}elseif(is_404()){
		_e('Error 404', TDOMAIN);
 	}elseif(is_archive()){
		_e('Archives', TDOMAIN);
	}
}
 
// Post pagination
function pagelines_pagination(){?>		
	<?php if(function_exists('wp_pagenavi') && VPRO):?> 
		<?php wp_pagenavi(); ?>  
	<?php elseif (show_posts_nav()) : ?>
		<div class="page-nav fix">
			<span class="previous-entries"><?php next_posts_link(__('&laquo; Previous Entries',TDOMAIN)) ?></span>
			<span class="next-entries"><?php previous_posts_link(__('Next Entries &raquo;',TDOMAIN)) ?></span>
		</div><!-- page nav -->
	<?php endif;?>

<?php } 

function pagelines_postnav(){?>
	<div class="post-nav fix"> 
		<span class="previous"><?php previous_post_link('%link') ?></span> 
		<span class="next"><?php next_post_link('%link') ?></span>
	</div>
<?php } 

function pagelines_twitter(){?>

	<?php if(function_exists('twitter_messages') && pagelines('twittername')):?>
	<span class="twitter">
		 "<?php twitter_messages(pagelines('twittername'), 1, false, false, '', false, false, false); ?>" &mdash;&nbsp;<a class="twitteraccount" href="http://www.twitter.com/<?php echo pagelines('twittername');?>"><?php echo pagelines('twittername');?></a>
	</span>
	<?php endif;?>
	
<?php }

function pagelines_nav($name = '', $class = '', $depth = 1, $dropdown = false, $home = true){ ?>	

	<?php if(function_exists('wp_nav_menu') && pagelines('use_wp_nav_menu')):?>
		<?php wp_nav_menu( array( 'slug'=> $name, 'menu_class'  => $class, 'sort_column' => 'menu_order', 'container' => null, 'container_class' => '', 'depth' => $depth ) ); ?>
	<?php else:?>

			<ul class="<?php if($dropdown) echo 'dropdown';?> fix">
			<?php if($home):?><li class="page_item "><a class="home" href="<?php echo get_option('home'); ?>/" title="<?php _e('Home',TDOMAIN);?>"><?php _e('Home',TDOMAIN);?></a></li><?php endif;?>
			<?php 
				$frontpage_id = get_option('page_on_front');
				if($bbpress_forum && pagelinesforum('exclude_pages')){ $forum_exclude = ','.pagelinesforum('exclude_pages');}
				else{ $forum_exclude = '';}
				wp_list_pages('exclude='.$frontpage_id.$forum_exclude.'&depth='.$depth.'&title_li=');?>

			</ul>

	<?php endif;?>

<?php } 


function pagelines_credit(){?>
	<?php if(pagelines('no_credit') || !VDEV):?>
		<div id="cred" class="pagelines">
			<a class="plimage" target="_blank" href="<?php e_pagelines('partner_link', pagelines('credlink'));?>" title="<?php echo THEMENAME;?> by PageLines">
				<img src="<?php echo THEME_IMAGES.'/pagelines.png';?>" alt="<?php echo THEMENAME;?> by PageLines" />
			</a>
		</div>
	<?php endif;?>
<?php } 

function pagelines_author_info(){?>
	
	<div class="author-info">
		<div class="pic alignleft"><?php echo get_avatar(get_the_author_email(), $size = '80', $default = $urlHome . '/images/default_avatar_author.gif' ); ?></div>
		<div class="post-author">
			<div class="author-descr">
				<small><?php _e('About the author',TDOMAIN);?></small>
				<h3><?php the_author(); ?></h3>
				<p><?php the_author_description(); ?></p>
				<div class="author-details"><a href="<?php the_author_url(); ?>" target="_blank"><?php _e('Visit Authors Website',TDOMAIN);?></a></div>
			</div>
		</div>
		<div class="clear"></div>
	</div>
<?php } 

function pagelines_post_footer(){?>
	<div class="post-footer">

			<div class="left">
				<?php e_pagelines('post_footer_social_text', '');?>	
			</div>
			<div class="right">
				<?php 
					$upermalink = urlencode(get_permalink());
					$utitle = urlencode(get_the_title());
				?>
					<?php if(pagelines('share_facebook')):?>
						<a href="http://www.facebook.com/sharer.php?u=<?php echo get_permalink(); ?>&t=<?php the_title();?>" title="<?php _e('Share on',TDOMAIN);?> Facebook" rel="nofollow" target="_blank"><img src="<?php echo THEME_IMAGES; ?>/icons/ico-facebook.png" alt="Facebook" /></a>
					<?php endif;?> 

					<?php if(pagelines('share_twitter')):?>
						<a href="http://twitter.com/home/?status=<?php the_title();?>%20<?php echo get_permalink(); ?>" title="<?php _e('Share on',TDOMAIN);?> Twitter" rel="nofollow" target="_blank"><img src="<?php echo THEME_IMAGES; ?>/icons/ico-twitter.png" alt="Twitter" /></a>
					<?php endif;?> 

					<?php if(pagelines('share_delicious')):?>
						<a href="http://del.icio.us/post?url=<?php the_permalink() ?>&title=<?php the_title(); ?>" title="<?php _e('Share on',TDOMAIN);?> Delicious" rel="nofollow" target="_blank"><img src="<?php echo THEME_IMAGES; ?>/icons/ico-del.png" alt="Delicious" /></a>
					<?php endif;?>
					<?php if(pagelines('share_mixx')):?>
						<a href="http://www.mixx.com/submit?page_url=<?php the_permalink() ?>" title="<?php _e('Share on',TDOMAIN);?> Mixx" rel="nofollow" target="_blank"><img src="<?php echo THEME_IMAGES; ?>/icons/ico-mixx.png" alt="Mixx" /></a>
					<?php endif;?>
					<?php if(pagelines('share_stumbleupon')):?>
						<a href="http://www.stumbleupon.com/submit?url=<?php the_permalink() ?>&title=<?php the_title(); ?>" title="<?php _e('Share on',TDOMAIN);?> StumbleUpon" rel="nofollow" target="_blank"><img src="<?php echo THEME_IMAGES; ?>/icons/ico-stumble.png" alt="StumbleUpon" /></a>
					<?php endif;?>
					<?php if(pagelines('share_digg')):?>
						<a href="http://digg.com/submit?phase=2&url=<?php the_permalink() ?>&title=<?php the_title(); ?>" title="<?php _e('Share on',TDOMAIN);?> Digg" rel="nofollow" target="_blank"><img src="<?php echo THEME_IMAGES; ?>/icons/ico-digg.png" alt="Digg" /></a>
					<?php endif;?>
			</div>
		<div class="clear"></div>
	</div>
<?php } ?>