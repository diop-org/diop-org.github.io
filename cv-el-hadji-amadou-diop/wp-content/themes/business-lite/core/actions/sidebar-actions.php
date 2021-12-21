<?php
/**
* Sidebar actions used by Business lite
*
* Author: Tyler Cunningham
* Copyright: © 2012
* {@link http://cyberchimps.com/ CyberChimps LLC}
*
* Released under the terms of the GNU General Public License.
* You should have received a copy of the GNU General Public License,
* along with this software. In the main directory, see: /licensing/
* If not, see: {@link http://www.gnu.org/licenses/}.
*
* @package Business lite
* @since 3.0
*/

/**
* business sidebar actions
*/
add_action( 'business_sidebar_init', 'business_sidebar_init_content' );
add_action( 'business_before_content_sidebar', 'business_before_content_sidebar_markup' );
add_action( 'business_after_content_sidebar', 'business_after_content_sidebar_markup' );


/**
* Set sidebar and grid variables.
*
* @since 3.0
*/
function business_sidebar_init_content() {

	global $options, $themeslug, $post, $sidebar, $content_grid;
	
	if (is_single()) {
	$sidebar = $options->get($themeslug.'_single_sidebar');
	}
	elseif (is_archive()) {
	$sidebar = $options->get($themeslug.'_archive_sidebar');
	}
	elseif (is_404()) {
	$sidebar = $options->get($themeslug.'_404_sidebar');
	}
	elseif (is_search()) {
	$sidebar = $options->get($themeslug.'_search_sidebar');
	}
	elseif (is_page()) {
	$sidebar = get_post_meta($post->ID, 'page_sidebar' , true);
	}
	else {
	$sidebar = $options->get($themeslug.'_blog_sidebar');
	}
	
	if ($sidebar == 'two-right' OR $sidebar == 'right-left' OR $sidebar == "2" OR $sidebar == "3") {
		$content_grid = 'six columns';
	}
	elseif ($sidebar == 'none' OR $sidebar == "4") {
		$content_grid = 'twelve columns';
	}
	else {
		$content_grid = 'eight columns';
	}
}

/**
* Before entry sidebar
*
* @since 3.0
*/
function business_before_content_sidebar_markup() { 
	global $options, $themeslug, $post, $sidebar; // call globals ?>
				
	<?php if ($sidebar == 'right-left' OR $sidebar == "2"): ?>
	<div id="sidebar-left" class="three columns">
		<?php get_sidebar('left'); ?>
	</div>
	<?php endif; ?>
	
	<?php if ($sidebar == 'left' OR $sidebar == "1"): ?>
	<div id="sidebar_left" class="four columns">
		<?php get_sidebar(); ?>
	</div>
	<?php endif;
}

/**
* After entry sidebar
*
* @since 3.0
*/
function business_after_content_sidebar_markup() {
	global $options, $themeslug, $post, $sidebar; // call globals ?>
	
	<?php if ($sidebar == 'right' OR $sidebar == '0' OR $sidebar == '' ): ?>
	<div id="sidebar" class="four columns">
		<?php get_sidebar(); ?>
	</div>
	<?php endif;?>
	
	<?php if ($sidebar == 'two-right' OR  $sidebar == '3' ): ?>
	<div id="sidebar-left" class="three columns">
		<?php get_sidebar('left'); ?>
	</div>
	<?php endif;?> 
	
	<?php if ($sidebar == 'two-right' OR $sidebar == 'right-left' OR $sidebar == '2' OR $sidebar == '3'): ?>
	<div id="sidebar-right" class="three columns">
		<?php get_sidebar('right'); ?>
	</div>
	<?php endif;?> <?php 
}

/**
* End
*/

?>