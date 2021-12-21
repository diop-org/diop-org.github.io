<?php 
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' ); 
set_post_thumbnail_size( 100, 100, true );
add_editor_style('editor-style.css');

define( 'HEADER_TEXTCOLOR', '' );


define( 'NO_HEADER_TEXT', true );
add_custom_image_header( '', 'evolve_admin_header_style' );  
  
function evolve_admin_header_style() {}
  
define( 'HEADER_IMAGE_WIDTH', apply_filters( 'evolve_header_image_width', 990 ) );
define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'evolve_header_image_height', 170 ) );

$evloptions = get_option('evolve');
if ( ($evloptions['evl_layout'] == "2cl" || $evloptions['evl_layout'] == "2cr" ) && $evloptions['evl_width_layout'] == "fixed") { 
if ( ! isset( $content_width ) )
	$content_width = 620;
}
if ( ( ($evloptions['evl_layout'] == "3cl" || $evloptions['evl_layout'] == "3cr" ) && $evloptions['evl_width_layout'] == "fixed") ||
( ($evloptions['evl_layout'] == "3cm" ) && $evloptions['evl_width_layout'] == "fixed")
) {
if ( ! isset( $content_width ) )
	$content_width = 506;
}
if ( $evloptions['evl_width_layout'] == "fixed" && $evloptions['evl_layout'] == "1c" ) {
if ( ! isset( $content_width ) )
	$content_width = 960;
}
if ( $evloptions['evl_width_layout'] == "fluid" ) {
if ( ! isset( $content_width ) )
	$content_width = 700;
}
else {
if ( ! isset( $content_width ) )
	$content_width = 620;
}

	load_theme_textdomain( 'evolve', get_template_directory() . '/languages' );
	$locale = get_locale();
	$locale_file = get_template_directory() . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file ); 
    
    
/**
 * Functions - Evolve gatekeeper
 *
 * This file defines a few constants variables, loads up the core Evolve file, 
 * and finally initialises the main WP Evolve Class.
 *
 * @package EvoLve
 * @subpackage Functions
 */

define( 'WP_Evolve', '0.2.4' ); // Defines current version for WP Evolve
	
	/* Blast you red baron! Initialise WP Evolve */
	require_once( get_template_directory() . '/library/evolve.php' );
	WPevolve::init();



/* evltruncate */

function evltruncate ($str, $length=10, $trailing='..')
{
 $length-=mb_strlen($trailing);
 if (mb_strlen($str)> $length)
	  {
 return mb_substr($str,0,$length).$trailing;
  }
 else
  {
 $res = $str;
  }
 return $res;
} 


/* Get first image */

function evlget_first_image() {
 global $post, $posts;
 $first_img = '';
 $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
 if(isset($matches[1][0])){
 $first_img = $matches [1][0];
 return $first_img;
 }  
}  

 
/* Custom Menu */   
  
add_action( 'after_setup_theme', 'evlregister_my_menu' );

function evlregister_my_menu() {
	register_nav_menu( 'primary-menu', __( 'Primary Menu', 'evolve' ) );
}    



// Tiny URL

function evolve_tinyurl($url) {
    $response = wp_remote_retrieve_body(wp_remote_get('http://tinyurl.com/api-create.php?url='.$url));
    return $response;
}


// Similar Posts 

function evlsimilar_posts() {

$post = '';
$orig_post = $post;
global $post;

$evloptions = get_option('evolve'); if ($evloptions['evl_similar_posts'] == "category") { 
$matchby = get_the_category($post->ID);
$matchin = 'category';
} else {
$matchby = wp_get_post_tags($post->ID);
$matchin = 'tag'; }


if ($matchby) {
	$matchby_ids = array();
	foreach($matchby as $individual_matchby) $matchby_ids[] = $individual_matchby->term_id;

	$args=array(
		$matchin.'__in' => $matchby_ids,
		'post__not_in' => array($post->ID),
		'showposts'=>5, // Number of related posts that will be shown.
		'ignore_sticky_posts'=>1
	);  

	$my_query = new wp_query($args);
	if( $my_query->have_posts() ) {
_e( '<div style="padding:5px;margin-bottom:40px;"><h5 style="font-style:italic;">Similar posts</h5><ul style="margin-bottom:0px;">', 'evolve' );
		while ($my_query->have_posts()) {
			$my_query->the_post();
		?>
			<li style="padding-bottom:5px;">
      
     <a style="font-weight:bold;font-size:15px;" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">
<?php

if ( get_the_title() ){ $title = the_title('', '', false);
echo evltruncate($title, 40, '...'); }else{ echo "Untitled"; }


 ?></a>

  <?php if ( get_the_content() ) { ?> &mdash; <small style="font-style:italic;"><?php $postexcerpt = get_the_content();
$postexcerpt = apply_filters('the_content', $postexcerpt);
$postexcerpt = str_replace(']]>', ']]&gt;', $postexcerpt);
$postexcerpt = strip_tags($postexcerpt);
$postexcerpt = strip_shortcodes($postexcerpt);

echo evltruncate($postexcerpt, 60, '...');
 ?></small> <?php } ?>
      
      </li>
		<?php
		}
		echo '</ul></div>';
	}
}
$post = $orig_post;
wp_reset_query();   

}

function evlfooter_hooks() { ?>


<script type="text/javascript" charset="utf-8">
var $jx = jQuery.noConflict();
  $jx("div.post").mouseover(function() {
    $jx(this).find("span.edit-post").css('visibility', 'visible');
  }).mouseout(function(){
    $jx(this).find("span.edit-post").css('visibility', 'hidden');
  });
  
    $jx("div.type-page").mouseover(function() {
    $jx(this).find("span.edit-page").css('visibility', 'visible');
  }).mouseout(function(){
    $jx(this).find("span.edit-page").css('visibility', 'hidden');
  });
  
      $jx("div.type-attachment").mouseover(function() {
    $jx(this).find("span.edit-post").css('visibility', 'visible');
  }).mouseout(function(){
    $jx(this).find("span.edit-post").css('visibility', 'hidden');
  });
  
  $jx("li.comment").mouseover(function() {
    $jx(this).find("span.edit-comment").css('visibility', 'visible');
  }).mouseout(function(){
    $jx(this).find("span.edit-comment").css('visibility', 'hidden');
  });
</script> 

<script type="text/javascript" charset="utf-8">
var $j = jQuery.noConflict();
  $j(document).ready(function(){  
    $j('.tipsytext').tipsy({gravity:'n',fade:true,offset:0,opacity:1});
   });
   </script> 

<?php $evloptions = get_option('evolve');  

if ($evloptions['evl_header_slider'] !== "disable" || $evloptions['evl_header_slider'] !== "") {


  if ($evloptions['evl_header_slider'] == "normal" || $evloptions['evl_header_slider'] == "") { ?>

<script type="text/javascript" charset="utf-8">
var $s = jQuery.noConflict();
	jQuery(function($s){
		$s('#slide_holder').loopedSlider({
			autoStart: 7000,
			restart: 15000,
			slidespeed: 1200,
			containerClick: false
		});
	});
</script>

<?php } if ($evloptions['evl_header_slider'] == "slow") { ?>

<script type="text/javascript" charset="utf-8">
var $s = jQuery.noConflict();
	jQuery(function($s){
		$s('#slide_holder').loopedSlider({
			autoStart: 10000,
			restart: 15000,
			slidespeed: 1200,
			containerClick: false
		});
	});
</script>

<?php } if ($evloptions['evl_header_slider'] == "fast") { ?>

<script type="text/javascript" charset="utf-8">
var $s = jQuery.noConflict();
jQuery(function($s){
		$s('#slide_holder').loopedSlider({
			autoStart: 3500,
			restart: 15000,
			slidespeed: 1200,
			containerClick: false
		});
	});
</script>

<?php } } ?>  
	
<?php echo evolve_copy(); }


/* Redirect after activation */

if ( is_admin() && isset($_GET['activated'] ) && $pagenow ==	"themes.php" )
	wp_redirect( 'themes.php?page=theme_options' );
  
  
  
  
if ($evloptions['evl_custom_background'] == "1") { 
add_custom_background();
}  

function evolve_filter_wp_title( $title ) {
    
    global $page, $paged;
    
    // Get the Site Name
    $site_name = get_bloginfo( 'name' );
    // Prepend name
    $filtered_title = $site_name . $title;
    // Get the Site Description
        $site_description = get_bloginfo( 'description' );
    // If site front page, append description
    if ( $site_description && ( is_home() || is_front_page() ) ) {
        // Append Site Description to title
        $filtered_title .= ' - ' .$site_description;
        
    }
    if ( $paged >= 2 || $page >= 2 ) {
        $filtered_title .= ' - ' . sprintf( __( 'Page %s', 'pure-line' ), max( $paged, $page ) );
        }
    // Return the modified title
    return $filtered_title;
}
// Hook into 'wp_title'
add_filter( 'wp_title', 'evolve_filter_wp_title' );


function evolve_enqueue_comment_reply() {
        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) { 
                wp_enqueue_script( 'comment-reply' ); 
        }
    }
    add_action( 'wp_enqueue_scripts', 'evolve_enqueue_comment_reply' );


 // Share This Buttons

function evolve_sharethis() { ?>
    <div class="share-this">
          <strong><?php _e( 'SHARE THIS', 'evolve' ); ?></strong>
          <a rel="nofollow" target="_blank" class="share-twitter" href="http://twitter.com/intent/tweet?status=<?php the_title(); ?>+&raquo;+<?php echo evolve_tinyurl(get_permalink()); ?>">Twitter</a>
          <a rel="nofollow" target="_blank" class="share-facebook" href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>&amp;t=<?php the_title(); ?>">Facebook</a>
          <a rel="nofollow" target="_blank" class="share-delicious" href="http://del.icio.us/post?url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>">Delicious</a>
          <a rel="nofollow" target="_blank" class="share-stumble" href="http://www.stumbleupon.com/submit?url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>">StumbleUpon</a>
          <a rel="nofollow" target="_blank" class="share-email" href="http://www.addtoany.com/email?linkurl=<?php the_permalink(); ?>&linkname=<?php the_title(); ?>"><?php _e( 'E-mail', 'evolve' ); ?></a>
          <a rel="nofollow" class="tipsytext" style="position:relative;top:3px;left:8px;" title="<?php _e( 'More options', 'evolve' ); ?>" target="_blank" href="http://www.addtoany.com/share_save#url=<?php the_permalink(); ?>&linkname=<?php the_title(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/library/media/images/share-more.png" /></a>
          </div>
<?php } ?>