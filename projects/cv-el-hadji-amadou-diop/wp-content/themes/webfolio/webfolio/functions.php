<?php
/*******************************
 WIDGETS AREAS
********************************/
 if ( function_exists('register_sidebar') )
    register_sidebar(array(
		'name' => 'sidebar',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));
	
	register_sidebar(array(
		'name' => 'footer',
        'before_widget' => '<div class="footerBox">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));

/*******************************
 MENUS SUPPORT
********************************/
if ( function_exists( 'wp_nav_menu' ) ){
	if (function_exists('add_theme_support')) {
		add_theme_support('nav-menus');
		add_action( 'init', 'register_my_menus' );
		function register_my_menus() {
			register_nav_menus(
				array(
					'main-menu' => __( 'Main Menu' ),
					'footer-links' => __( 'Footer Links' )
				)
			);
		}
	}
}

/* CallBack functions for menus in case of earlier than 3.0 Wordpress version or if no menu is set yet*/

function footerlinks(){ ?>
		<div id="footerMenu">
			<ul>
				<li><a href="#">Home</a></li>
				<?php wp_list_pages('exclude='.get_option('webfolio_exclude_pages').'&title_li=') ?>
			</ul>
		</div>
<?php }

function mainmenu(){ ?>
		<div id="topMenu">
			<ul class="sf-menu">
				<li><a href="<?php bloginfo('url'); ?>/">Home</a></li>
				<?php wp_list_pages('exclude='.get_option('webfolio_exclude_pages').'&title_li=') ?>
				<?php wp_list_categories('exclude='.get_option('webfolio_exclude_categs').'&title_li=');?>
			</ul>
		</div>
<?php }

/*******************************
 THUMBNAIL SUPPORT
********************************/

add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 290, 250, false);

/********************************/

function content($num) {  
		$theContent = get_the_content();  
		$output = preg_replace('/<img[^>]+./','', $theContent);  
		$limit = $num+1;  
		$content = explode(' ', $output, $limit);  
		array_pop($content);  
		$content = implode(" ",$content)."...";  
		echo $content;  
}


function post_is_in_descendant_category( $cats, $_post = null )
{
	foreach ( (array) $cats as $cat ) {
		// get_term_children() accepts integer ID only
		$descendants = get_term_children( (int) $cat, 'category');
		if ( $descendants && in_category( $descendants, $_post ) )
			return true;
	}
	return false;
}

function bm_dont_display_it($content) {
  if (!empty($content)) {
    $content = str_ireplace('<li>' .__( "No categories" ). '</li>', "", $content);
  }
  return $content;
}
add_filter('wp_list_categories','bm_dont_display_it');

/*******************************
 CUSTOM COMMENTS
********************************/

function mytheme_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
  	

     <div id="comment-<?php comment_ID(); ?>">
	  <div class="comment-meta commentmetadata clearfix">
	   <?php echo get_avatar($comment,$size='36',$default='http://www.gravatar.com/avatar/61a58ec1c1fba116f8424035089b7c71?s=32&d=&r=G' ); ?>
	  <span><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?> <br /><?php printf(__('<strong>%s</strong> says:'), get_comment_author_link()) ?><?php edit_comment_link(__('(Edit)'),'  ','') ?>
	  </span>
	  </div>

      <div class="text">
		  <div class="topLeft"></div>
		  <div class="topRight"></div>
		  <div class="bottomLeft"></div>
		  <div class="bottomRight"></div>
		  <div class="bubble"></div>
		  <?php comment_text() ?>
	  </div>
	  
	  <?php if ($comment->comment_approved == '0') : ?>
         <em><?php _e('Your comment is awaiting moderation.') ?></em>
         <br />
      <?php endif; ?>

      <div class="reply">
         <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
      </div>
     </div>
<?php }

/*******************************
 THEME OPTIONS
********************************/

add_action('admin_menu', 'webfolio_theme_page');

function webfolio_theme_page ()
{
	if ( count($_POST) > 0 && isset($_POST['webfolio_settings']) )
	{
		$options = array ( 'style','logo_img', 'logo_alt', 'cufon', 'contact_email', 'social_widget', 'twitter_link', 'facebook_link','flickr_link','linkedin_link', 'home_box1', 'home_box1_link', 'home_box2','home_box2_link', 'home_box3', 'home_box3_link','exclude_pages', 'exclude_categs', 'portfolio_id', 'analytics');
		
		foreach ( $options as $opt )
		{
			delete_option ( 'webfolio_'.$opt, $_POST[$opt] );
			add_option ( 'webfolio_'.$opt, $_POST[$opt] );	
		}			
	}
	add_theme_page(__('Webfolio Theme Options'), __('Webfolio Options'), 'edit_themes', basename(__FILE__), 'webfolio_settings');	
}
function webfolio_settings ()
{?>
<div class="wrap">
	<h2>Webfolio Options Panel</h2>
	
<form method="post" action="">
<fieldset style="border:1px solid #ddd; padding-bottom:20px; margin-top:20px;">
	<legend style="margin-left:5px; padding:0 5px;color:#2481C6; text-transform:uppercase;"><strong>General Settings</strong></legend>
	<table class="form-table">
		<!-- General settings -->
		<tr valign="top">
			<th scope="row"><label for="style">Theme Color Scheme</label></th>
			<td>
				<select name="style" id="style">					
					<option value="green.css" <?php if(get_option('webfolio_style') == 'green.css'){?>selected="selected"<?php }?>>green.css</option>
					<option value="blue.css" <?php if(get_option('webfolio_style') == 'blue.css'){?>selected="selected"<?php }?>>blue.css</option>
					<option value="orange.css" <?php if(get_option('webfolio_style') == 'orange.css'){?>selected="selected"<?php }?>>orange.css</option>
				</select> 
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><label for="logo_img">Change logo (full path to image)</label></th>
			<td>
				<input name="logo_img" type="text" id="logo_img" value="<?php echo get_option('webfolio_logo_img'); ?>" class="regular-text" /><br />
				<em>current logo:</em> <br /> <img src="<?php echo get_option('webfolio_logo_img'); ?>" alt="<?php bloginfo('name'); ?>" />
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><label for="logo_alt">Logo ALT Text</label></th>
			<td>
				<input name="logo_alt" type="text" id="logo_alt" value="<?php echo get_option('webfolio_logo_alt'); ?>" class="regular-text" />
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><label for="cufon">Cufon Font Replacement for H1, H2 and site tagline</label></th>
			<td>
				<select name="cufon" id="cufon">
					<option value="yes" <?php if(get_option('webfolio_cufon') == 'yes'){?>selected="selected"<?php }?>>Yes</option>
					<option value="no" <?php if(get_option('webfolio_cufon') == 'no'){?>selected="selected"<?php }?>>No</option>
				</select> <br />
				<em>Current font used with Cufon is "Fertigo Pro". If you select "No" for Cufon the font used will be Arial.</em>
			</td>
		</tr>
		
		<tr valign="top">
			<th scope="row"><label for="portfolio_id">Portfolio Category</label></th>
			<td>
				<?php wp_dropdown_categories("hide_empty=0&name=portfolio_id&show_option_none=".__('- Select -')."&selected=" .get_option('webfolio_portfolio_id')); ?>
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><label for="contact_email">Email Address for Contact Form</label></th>
			<td>
				<input name="contact_email" type="text" id="contact_email" value="<?php echo get_option('webfolio_contact_email'); ?>" class="regular-text" />
			</td>
		</tr>
</table>
</fieldset>
<fieldset style="border:1px solid #ddd; padding-bottom:20px; margin-top:20px;">
	<legend style="margin-left:5px; padding:0 5px;color:#2481C6; text-transform:uppercase;"><strong>Top Navigation</strong></legend>
	<table class="form-table">	
		<!-- Top Navigation -->
		<tr>
			<th colspan="2"><strong>Top Navigation Settings</strong></th>
		</tr>
		<tr valign="top">
			<th scope="row"><label for="exclude_pages">Exclude Pages IDs from Top &amp; Footer Menu</label><br /><em>*comma separated</em></th>
			<td>
				<input name="exclude_pages" type="text" id="exclude_pages" value="<?php echo get_option('webfolio_exclude_pages'); ?>" class="regular-text" />
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><label for="exclude_categs">Exclude Categories IDs from Top Menu</label><br /><em>*comma separated</em></th>
			<td>
				<input name="exclude_categs" type="text" id="exclude_categs" value="<?php echo get_option('webfolio_exclude_categs'); ?>" class="regular-text" />
			</td>
		</tr>
</table>
</fieldset>
<fieldset style="border:1px solid #ddd; padding-bottom:20px; margin-top:20px;">
	<legend style="margin-left:5px; padding:0 5px;color:#2481C6; text-transform:uppercase;"><strong>Homepage Settings</strong></legend>
	<table class="form-table">
		<!-- Homepage Boxes 1 -->
		<tr>
			<th colspan="2"><strong>Homepage Boxes </strong></th>
		</tr>
		<tr>
			<th colspan="2"> They should be ALL selected ! Other way the row wont appear at all.</th>
		</tr>
		<tr valign="top">
			<th scope="row"><label for="home_box1">Home Box1</label></th>
			<td>
				<?php wp_dropdown_pages("name=home_box1&show_option_none=".__('- Select -')."&selected=" .get_option('webfolio_home_box1')); ?>
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><label for="home_box1_link">Home Box1 "read more" link</label></th>
			<td>
				<input name="home_box1_link" type="text" id="home_box1_link" value="<?php echo get_option('webfolio_home_box1_link'); ?>" class="regular-text" />
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><label for="home_box2">Homepage Box2</label></th>
			<td>
				<?php wp_dropdown_pages("name=home_box2&show_option_none=".__('- Select -')."&selected=" .get_option('webfolio_home_box2')); ?>
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><label for="home_box2_link">Home Box2 "read more" link</label></th>
			<td>
				<input name="home_box2_link" type="text" id="home_box2_link" value="<?php echo get_option('webfolio_home_box2_link'); ?>" class="regular-text" />
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><label for="home_box3">Home Box3</label></th>
			<td>
				<?php wp_dropdown_pages("name=home_box3&show_option_none=".__('- Select -')."&selected=" .get_option('webfolio_home_box3')); ?>
			</td>
		</tr>	
		<tr valign="top">
			<th scope="row"><label for="home_box3_link">Home Box3 "read more" link</label></th>
			<td>
				<input name="home_box3_link" type="text" id="home_box3_link" value="<?php echo get_option('webfolio_home_box3_link'); ?>" class="regular-text" />
			</td>
		</tr>
</table>
</fieldset>
<fieldset style="border:1px solid #ddd; padding-bottom:20px; margin-top:20px;">
	<legend style="margin-left:5px; padding:0 5px;color:#2481C6; text-transform:uppercase;"><strong>Footer Settings</strong></legend>
	<table class="form-table">
		<tr>
			<th colspan="2"><strong>Social Networking</strong></th>
		</tr>
		<tr>
			<th><label for="social_widget">Social Networking Widget Enable</label></th>
			<td>
				<select name="social_widget" id="social_widget">
					<option value="yes" <?php if(get_option('webfolio_social_widget') == 'yes'){?>selected="selected"<?php }?>>Yes</option>
					<option value="no" <?php if(get_option('webfolio_social_widget') == 'no'){?>selected="selected"<?php }?>>No</option>
				</select> 
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><label for="twitter_link">Twitter link</label></th>
			<td>
				<input name="twitter_link" type="text" id="twitter_link" value="<?php echo get_option('webfolio_twitter_link'); ?>" class="regular-text" />
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><label for="facebook_link">Facebook link</label></th>
			<td>
				<input name="facebook_link" type="text" id="facebook_link" value="<?php echo get_option('webfolio_facebook_link'); ?>" class="regular-text" />
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><label for="flickr_link">Flickr link</label></th>
			<td>
				<input name="flickr_link" type="text" id="flickr_link" value="<?php echo get_option('webfolio_flickr_link'); ?>" class="regular-text" />
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><label for="linkedin_link">LinkedIn link</label></th>
			<td>
				<input name="linkedin_link" type="text" id="linkedin_link" value="<?php echo get_option('webfolio_linkedin_link'); ?>" class="regular-text" />
			</td>
		</tr>
		<!-- Google Analytics -->
		<tr>
			<th colspan="2"><strong>SEO</strong></th>
		</tr>
		<tr>
			<th><label for="ads">Google Analytics code:</label></th>
			<td>
				<textarea name="analytics" id="analytics" rows="7" cols="70" style="font-size:11px;"><?php echo stripslashes(get_option('webfolio_analytics')); ?></textarea>
			</td>
		</tr>
		
	</table>
</fieldset>
	<p class="submit">
		<input type="submit" name="Submit" class="button-primary" value="Save Changes" />
		<input type="hidden" name="webfolio_settings" value="save" style="display:none;" />
	</p>
</form>
</div>
<?php }

function get_first_image() {
global $post, $posts;
$first_img = '';
ob_start();
ob_end_clean();
$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
$first_img = $matches [1] [0];
if(empty($first_img)){ //Defines a default image
$first_img = "/images/default.jpg";
}
return $first_img;
} 
/*******************************
  CONTACT FORM 
********************************/

 function hexstr($hexstr) {
  $hexstr = str_replace(' ', '', $hexstr);
  $hexstr = str_replace('\x', '', $hexstr);
  $retstr = pack('H*', $hexstr);
  return $retstr;
}

function strhex($string) {
  $hexstr = unpack('H*', $string);
  return array_shift($hexstr);
}
?>