<?php

function checkauthority(){
	if (!current_user_can('edit_themes'))
	wp_die('Sorry, but you don&#8217;t have the administrative privileges needed to do this.');
}
function show_posts_nav() {
	global $wp_query;
	return ($wp_query->max_num_pages > 1);
}

/**
 * Identifies which version of the PageLines core to support
 * @since 4.0.0
 */
function pagelines_core_support($coreversion){
	
	if(defined('CORESUPPORT')){
		
		$coresupport = CORESUPPORT; 
		
		if($coresupport >= $coreversion) return true;
		else return false;
	}
	
}

/**
 * Pulls a global identifier from a bbPress forum installation
 * @since 3.x.x
 */
function pagelines_bbpress_forum(){
	global $bbpress_forum;
	if($bbpress_forum ){
		return true;
	} else return false;
}


/**
 * Displays query information in footer (For testing - NOT FOR PRODUCTION)
 * @since 4.0.0
 */
function show_query_analysis(){
	if (current_user_can('administrator')){
	    global $wpdb;
	    echo "<pre>";
	    print_r($wpdb->queries);
	    echo "</pre>";
	}
}


// This function returns whether or not to show a feature on a given WP page.  Based on option set in admin (comma seperated)
	function showfeature($pageids = null, $currentpage = 0, $draft = null){
	
		if(!$draft){
			if(isset($pageids) && !empty($pageids)){
				$page_array = explode(',', $pageids);
				foreach($page_array as $showonpage){
					if($showonpage == $currentpage) return true;
				}
			}else{
				return true;
			}
		}else{
			return false;
		}
	
	
	}
	
	function pl_show_thumb($post = null){
			// 'blog' => 	'Only on blog pages and search',
			// 		'single'=>	'Only on single post pages',
			// 		'all' => 	'All blog/post pages',
			// 		'hide' => 	'Don\'t show',
		
		 if( function_exists('the_post_thumbnail') && has_post_thumbnail($post)){
			
			// show on single post pages only
			if(is_single() && pagelines('pl_postthumbs') == "single") return true;
			
			// show only on posts and search pages
			if((is_home() || is_search()) && pagelines('pl_postthumbs') == "blog") return true;
			
			// show on all posts pages
			if(pagelines('pl_postthumbs') == "all" || !pagelines('pl_postthumbs')) return true;
			
			if(pagelines('pl_postthumbs') == "hide") return false;
			
			// old method
			if(is_single() && pagelines('excerptshidesingle')) return false;
			
			else return false;
		} else return false;
	}
	
	function pl_show_excerpt($post = null){
		// 'blog' => 	'Only on blog pages and search',
		// 		'single'=>	'Only on single post pages',
		// 		'all' => 	'All blog/post pages',
		// 		'hide' => 	'Don\'t show',
		
			if(!VPRO) return false;
			
			// show on single post pages only
			if(is_single() && pagelines('pl_postexcerpts') == "single") return true;
			
			// show only on posts and search pages
			if((is_home() || is_category() || is_archive()) && pagelines('pl_postexcerpts') == "blog") return true;
			
			// show on all posts pages
			if(pagelines('pl_postexcerpts') == "all" || is_search()) return true;
			
			if(pagelines('pl_postexcerpts') == "hide") return false;
			
			if(!pagelines('pl_postexcerpts')) return true;
			// old methods
				if(!pagelines('pl_postexcerpts') && is_single() && pagelines('excerptshidesingle')) return false;
				if(!pagelines('pl_postexcerpts') && pagelines('excerptshide')) return false;
			
			else return false;
	}
	
	function pl_show_content($post = null){
			
			// show on single post pages only
			if(is_page() || is_single()) return true;
			
			if(is_home() && !VPRO) return true;
			
			if(is_search() || is_category()) return false;
			
			// show on all posts pages
			if(!pagelines('pl_postcontent') || (pagelines('pl_postcontent') == "all" && !is_search())) return true;
			
			
			else return false;

	}
?>