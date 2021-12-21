<?php
$themename = 'Showcase';
$shortname = 'sc';

require("functions-admin.php");
require("functions-widgets.php");

/**
 * Helpers
 */
function sc_string_limit_chars($string = '', $char_limit = 0) {
	return substr($string,0,$char_limit);
}
function sc_string_limit_words($string = '', $word_limit = 0) {
  $words = explode(' ', $string, ($word_limit + 1));
  if(count($words) > $word_limit)
  array_pop($words);
  return implode(' ', $words);
}

/**
 * This is for loading IE-only stylesheets
 */
function sc_enqueue_style($handle, $src, $conditions)
{
    global $wp_styles;
    wp_enqueue_style($handle, $src);
    if(isset($conditions)) {
      $wp_styles->add_data($handle, 'conditional', $conditions);
    }
}

if ( ! isset( $content_width ) ) $content_width = 620;

/**
 * Load assets
 */
if ( ! is_admin() ) {
  wp_enqueue_style( 'showcase', get_bloginfo( 'stylesheet_url' ) );
  wp_enqueue_style( 'font-titillium', get_template_directory_uri() . '/fonts/titillium/stylesheet.css' );
  wp_enqueue_style( 'font-leaguegothic', get_template_directory_uri() . '/fonts/leaguegothic/stylesheet.css' );
  sc_enqueue_style( 'ie6', get_template_directory_uri() . '/ie6.css', 'IE 6' );
  sc_enqueue_style( 'ie7', get_template_directory_uri() . '/ie7.css', 'lt IE 8' );
  wp_enqueue_script( 'jquery', get_template_directory_uri() . "/js/jquery-1.4.4.min.js", null, '1.4.4', false );
  wp_enqueue_script( 'md5', get_template_directory_uri() . "/js/md5.js", null, null, false );
  wp_enqueue_script( 'prettyjs', get_template_directory_uri() . "/js/pretty.js", null, null, false );
  wp_enqueue_script( 'jquery.tools', "http://cdn.jquerytools.org/1.2.5/full/jquery.tools.min.js", array('jquery'), null, false );
  wp_enqueue_script( 'showcase_scripts', get_template_directory_uri() . "/js/scripts.js", array('jquery', 'jquery.tools'), null, true );
  if ( $is_IE ) {
   wp_enqueue_script( 'DD_belatedPNG', get_template_directory_uri() . "/js/DD_belatedPNG.js", false, null, false ); 
  }
}
add_theme_support('automatic-feed-links');

if ( !current_theme_supports('post-thumbnails')) {
	add_theme_support( 'post-thumbnails', array( 'project' ) ); // Add it for projects
}

/**
 * Create projects/portfolio
 */

add_action('init', 'sc_register_project');

function sc_register_project() {
	$args = array(
		'label' => __('Projects'),
		'singular_label' => __('Project'),
		'public' => true,
		'show_ui' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'rewrite' => array('slug' => 'project'),
		'supports' => array('title', 'editor', 'thumbnail'),
		'show_in_nav_menus' => true
	);

	register_post_type('project', $args);
}

/**
 * Admin panels, edit projects
 */

add_action('admin_init', 'sc_admin_init');
add_action('save_post', 'sc_save_custom_fields');

function sc_admin_init() {
	add_meta_box('project-info-meta', 'Project Options', 'sc_meta_options', 'project', 'normal', 'high');
	add_meta_box('post-mantle', 'Post Mantle', 'sc_post_mantle', 'post', 'normal', 'high');
}

function sc_meta_options() {
	global $post;
	$custom = get_post_custom($post->ID);
	$project_url = (isset($custom['project_url'][0]) ? $custom['project_url'][0] : '');
	$client_name = (isset($custom['client_name'][0]) ? $custom['client_name'][0] : '');
	$post_mantle = (isset($custom['post_mantle'][0]) ? $custom['post_mantle'][0] : '');
	?>
	<p>
	<label>Client Name:</label><br>
	<input type="text" name="client_name"<?php if(isset($client_name)): echo " value=\"$client_name\""; endif; ?> style="width: 98%"></p>
	<?php /* <p>
	<label>Project URL:</label><br>
	<input type="text" name="project_url"<?php if($project_url): echo " value=\"$project_url\""; endif; ?> style="width: 98%"></p> */?>
	<p>
	<label>Project Mantle:</label><br>
	<textarea id="post-mantle-text" name="post_mantle" onKeyUp="sc_updateMantleLimit()" style="height: 4em; margin: 0px; width: 98%;"><?php if(isset($post_mantle)) { echo $post_mantle; } ?></textarea>
	</p>
	<p>This text appears above the post. Useful for important passages or quotes. (limit <span id="post-mantle-limit">130</span> characters)</p>
	<script>
	function sc_updateMantleLimit() {
		len = document.getElementById('post-mantle-text').value.length;
		remaining = document.getElementById('post-mantle-limit');
		remaining.innerHTML=(130-len);
	}
	sc_updateMantleLimit();
	</script>
	<?php
}

function sc_post_mantle() {
	global $post;
	$custom = get_post_custom($post->ID);
	$post_mantle = (isset($custom['post_mantle'][0]) ? $custom['post_mantle'][0] : '');
	?>
	<textarea id="post-mantle-text" name="post_mantle" onKeyUp="sc_updateMantleLimit()" style="height: 4em; margin: 0px; width: 98%;"><?php if(isset($post_mantle)) { echo $post_mantle; } ?></textarea>
	<p>This text appears above the post. Useful for important passages or quotes. (limit <span id="post-mantle-limit">130</span> characters)</p>
	<script>
	function sc_updateMantleLimit() {
		len = document.getElementById('post-mantle-text').value.length;
		remaining = document.getElementById('post-mantle-limit');
		remaining.innerHTML=(130-len);
	}
	sc_updateMantleLimit();
	</script>
	<?php
}

function sc_save_custom_fields($post_id) {
	global $post;
  if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
      return;
  }
  if ( defined('DOING_AJAX') && DOING_AJAX ) {
    return;
  }
  if ( !current_user_can( 'edit_post', $post_id ) ) {
  		return $post_id;
  }
	if(isset($_POST['client_name'])) {
		update_post_meta($post->ID, 'client_name', $_POST['client_name']);
	}
	if(isset($_POST['project_url'])) {
		update_post_meta($post->ID, 'project_url', $_POST['project_url']);
	}
	if(isset($_POST['post_mantle'])) {
		update_post_meta($post->ID, 'post_mantle', $_POST['post_mantle']);
	}
}

register_taxonomy('portfolio', array('project'), array('hierarchical' => true, 'label' => 'Portfolios', 'singular_label' => 'Portfolio', 'rewrite' => array('slug' => 'portfolio')));

add_action("manage_posts_custom_column",  "sc_project_custom_columns");
add_filter("manage_edit-project_columns", "sc_project_edit_columns");

function sc_project_edit_columns($columns){
	$columns = array(
		"cb" => "<input type=\"checkbox\" />",
		"title" => "Product Title",
		"sc_client_name" => "Client Name",
		"sc_thumbnail" => "Featured Image",
		"sc_portfolios" => "Portfolios",
		"author" => "Author",
	);

	return $columns;
}

function sc_project_custom_columns($column){

	global $post;
	switch ($column){
		case "sc_client_name":
			$custom = get_post_custom($post->ID);
			echo $custom['client_name'][0];
			break;
		case "sc_thumbnail":
			the_post_thumbnail(array(200,200));
			break;
		case "sc_portfolios":
			echo get_the_term_list($post->ID, 'portfolio', '', ', ','');
			break;
	}
}

if ( function_exists( 'register_nav_menu' ) ) {
	register_nav_menu( 'top-menu', 'Top Menu' );
}

if ( ! function_exists( 'sc_comment' ) ) {
	function sc_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		switch ( $comment->comment_type ) :
			case '' :
		?>
		<li <?php comment_class('row'); ?> id="li-comment-<?php comment_ID(); ?>">
			<article>
				<div id="comment-<?php comment_ID(); ?>" class="comment grid_8 row">
					<div class="grid_1 column picture">
						<?php echo get_avatar( $comment, 60 ); ?>
					</div>
					<div class="grid_7 column content">
						<header>
							<div class="header">
								<h3><?php printf( __( '%s', 'showcase' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?> |</h3>
								<div class="meta">
									<date datetime="<?php comment_time('c'); ?>">
										<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><?php printf( __( '%1$s at %2$s', 'showcase' ), get_comment_date(),  get_comment_time() ); ?></a>
									</date>
									<?php edit_comment_link( __( '(Edit)', 'showcase' ), ' ' ); ?>
								</div>
								<?php if ( $comment->comment_approved == '0' ) : ?>
									<div><em><?php _e( 'Your comment is awaiting moderation.', 'showcase' ); ?></em></div>
								<?php endif; ?>
							</div>
						</header>
						<div class="body">
							<?php comment_text(); ?>
						</div>
						<footer>
							<div class="right"><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ; ?></div>
						</footer>
					</div>
					<div class="clear"></div>
				</div>
			</article>

		<?php
				break;
			case 'pingback'  :
			case 'trackback' :
		?>
		<li class="pingback">
			<p><?php _e( 'Pingback:', 'showcase' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __('(Edit)', 'showcase'), ' ' ); ?></p>
		<?php
				break;
		endswitch;
	}
}

function sc_send_contact_form($to, $subject) {
	foreach($_POST as $key => $value) {
		$$key = $value;
	};

	// Validate inputs
	$invalid = array();
	// Name empty?
	if(!isset($sc_contact_name) || empty($sc_contact_name)) {
		$invalid[] = 'name';
	}
	// Email is formatted correctly?
	if(!isset($sc_contact_email) || !preg_match("/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/", $sc_contact_email)) {
		$invalid[] = 'email';
	}
	// Message empty?
	if( !isset($sc_contact_message) || empty($sc_contact_message)) {
		$invalid[] = 'message';
	}

	if(count($invalid) > 0) {
		// Is not valid
		return $invalid;
	} else {
		// Is valid
		$headers = "From: " . $sc_contact_name . " <" . $sc_contact_email . ">";
		$message = $sc_contact_message . "\n\r" . "Website: " . (isset($sc_contact_url) ? $sc_contact_url : '');
		if(mail($to, $subject, $message, $headers)) {
			return false;
		} else {
			die("Mailer failed!");
		}
	}
}

function sc_return_contact_form($invalid = array(), $error_message = null, $content = null) {
	if(!isset($invalid)) {
		$invalid = array();
	}
	$valid = array();
	foreach($invalid as $key => $value) {
		$valid[$value] = 'invalid';
	}
	if($_POST) {
		foreach($_POST as $key => $value) {
			$$key = $value;
		}
	}
	$action = get_permalink();
	$submit = get_template_directory_uri() . '/images/btn-send.png';

	$output = '';
	if(isset($content) && !empty($content)) {
		$output .= "<p>$content</p>";
	}
	if(isset($error_message) && !empty($error_message)) {
		$output .= "<p class=\"error-message\">$error_message</p>";
	}
	if(!isset($valid['name'])) {
		$valid['name'] = '';
	}
	if(!isset($valid['email'])) {
		$valid['email'] = '';
	}
	if(!isset($valid['name'])) {
		$valid['name'] = '';
	}
	if(!isset($valid['message'])) {
		$valid['message'] = '';
	}
	if(!isset($sc_contact_name)) {
		$sc_contact_name = '';
	}
	if(!isset($sc_contact_email)) {
		$sc_contact_email = '';
	}
	if(!isset($sc_contact_url)) {
		$sc_contact_url = '';
	}
	if(!isset($sc_contact_message)) {
		$sc_contact_message = '';
	}
	$output .= <<<EOT
		<form action="$action" method="post" id="contact-form" class="row">
			<div class="grid_3 column">
				<label class="grid_3 {$valid['name']}">Name</label>
				<input name="sc_contact_name" type="text" value="{$sc_contact_name}" class="text grid_3 {$valid['name']}">
				<label class="grid_3 {$valid['email']}">Email</label>
				<input name="sc_contact_email" type="text" value="{$sc_contact_email}" class="text grid_3 {$valid['email']}">
				<label class="grid_3">Website</label>
				<input name="sc_contact_url" type="text" value="{$sc_contact_url}" class="text grid_3">
			</div>
			<div class="grid_5 column">
				<label class="grid_5 {$valid['message']}">Message</label>
				<textarea name="sc_contact_message" class="grid_5 {$valid['message']}">{$sc_contact_message}</textarea>
			</div>
			<div class="grid_8 column">
				<input type="image" src="$submit" name="sc_contact_send" value="Send">
			</div>
		</form>
EOT;

	return $output;
}


function sc_contact_form($atts, $content = null) {
		if(get_option('sc_contact_email')) {
			$to_default = get_option('sc_contact_email');
		} else {
			$to_default = get_option('admin_email');
		}
	extract(shortcode_atts(array(
		'to' => $to_default,
		'subject' => 'Message from ' . get_bloginfo('name') . ' contact form',
		'sent_message' => 'Your message has been sent.',
		'error_message' => 'Oops! Looks like you filled out a field incorrectly.'
	), $atts));
	$to = "{$to}";
	$subject = "{$subject}";
	if(!isset($_POST['sc_contact_send'])) {
		return sc_return_contact_form(null, null, $content);
	} else {
		$invalid = sc_send_contact_form($to, $subject);
		if($invalid) {
			return sc_return_contact_form($invalid, "{$error_message}");
		} else {
			return "{$sent_message}";
		}
	}
};
add_shortcode('contact form', 'sc_contact_form');