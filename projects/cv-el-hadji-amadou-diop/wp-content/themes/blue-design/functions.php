<?php

if ( function_exists('register_sidebar') )
    register_sidebars(2, array(
        'before_widget' => '<div class="blocco">',
        'after_widget' => '</div>',
        'before_title' => '<h1>',
        'after_title' => '</h1>',
    ));

$options = get_option('blue_design_options');

$social_network = array("blogger", "delicious", "digg", "facebook", "flickr", "friendfeed", "google", "lastfm", "linkedin", "myspace",
                "picasa", "posterous","reddit", "stumbleupon", "technorati", "tumblr", "twitter", "vimeo", "wordpress", "yahoo", "youtube");

$num_social_network = 21;

if (!is_array($options))
{
    $options['feed'] = (bool)true;
    $options['blogger'] = (bool)false;       $options['blogger_url'] = '';
    $options['delicious'] = (bool)false;     $options['delicious_url'] = '';
    $options['digg'] = (bool)false;          $options['digg_url'] = '';
    $options['facebook'] = (bool)false;      $options['facebook_url'] = '';
    $options['flickr'] = (bool)false;        $options['flickr_url'] = '';
    $options['friendfeed'] = (bool)false;    $options['friendfeed_url'] = '';
    $options['google'] = (bool)false;        $options['google_url'] = '';
    $options['lastfm'] = (bool)false;        $options['lastfm_url'] = '';
    $options['linkedin'] = (bool)false;      $options['linkedin_url'] = '';
    $options['myspace'] = (bool)false;       $options['myspace_url'] = '';
    $options['picasa'] = (bool)false;        $options['picasa_url'] = '';
    $options['posterous'] = (bool)false;     $options['posterous_url'] = '';
    $options['reddit'] = (bool)false;        $options['reddit_url'] = '';
    $options['stumbleupon'] = (bool)false;   $options['stumbleupon_url'] = '';
    $options['technorati'] = (bool)false;    $options['technorati_url'] = '';
    $options['tumblr'] = (bool)false;        $options['tumblr_url'] = '';
    $options['twitter'] = (bool)false;       $options['twitter_url'] = '';
    $options['vimeo'] = (bool)false;         $options['vimeo_url'] = '';
    $options['wordpress'] = (bool)false;     $options['wordpress_url'] = '';
    $options['yahoo'] = (bool)false;         $options['yahoo_url'] = '';
    $options['youtube'] = (bool)false;       $options['youtube_url'] = '';
}

if(isset($_POST['save_options']))
{
    for($i = 0; $i <= $num_social_network-1; $i++)
    {
        $social = $social_network[$i];
        $social_url = $social."_url";
        
        if ($_POST[$social])
        {
    		$options[$social] = (bool)true;
            $options[$social_url] = stripslashes($_POST[$social_url]);
        }
        else
        {
            $options[$social] = (bool)false;
            $options[$social_url] = '';
        }
    }
    
    update_option('blue_design_options', $options);
}


add_action('admin_menu', 'add_theme_option');

function add_theme_option()
{
	add_theme_page(__('Blue Design Theme Options', 'blue design'), __('Blue Design Theme Options', 'blue design'), 'edit_themes', basename(__FILE__), 'display');
}

function display()
{
	global $social_network;
    global $options;
    global $num_social_network;
    global $social_network_url;
    
    ?>

	<form action="#" method="post" enctype="multipart/form-data">
	<div class="wrap">
		<h2><?php _e('Blue Design Theme Options', 'blue design'); ?></h2>
        <br /><br />
        <table class="form-table">
            <tbody>
                <tr valign="top">
                    <th scope="row"><img src="<?php echo bloginfo('template_url').'/images/feed.png'?>" /> </th>
                    <td>
                        <input name="" type="checkbox" value="checkbox" <?php if ($options['feed']) echo "checked='checked'"; ?> />
                        <?php _e('Add <b>feed</b> button.', 'blue design'); ?>
                        <br /><br />
                    </td>
                </tr>
            </tbody>
        </table>
        <br />
        <table class="form-table">
            <tbody>
                <?php
                for($i = 0; $i <= $num_social_network-1; $i++)
                {
                    $social_url = $social_network[$i]."_url";
                    $social = $social_network[$i];
                    
                    if ($i % 3 == 0) echo "<tr valign= \"top\">";
                ?>
                
                    <th scope="row"><img src="<?php echo bloginfo('template_url').'/images/socialnetwork/'.$social.'.png'?>" /> </th>
                    <td>
                        <input name="<?php echo $social; ?>" type="checkbox" value="checkbox" <?php if($options[$social]) echo "checked='checked'"; ?> />
                        <?php _e('Add '); echo "<b>".$social."</b>"; _e(' button.', 'blue design'); ?>
                        <br />
                        <?php echo $social." url:"; ?>
                        <input type="text" name="<?php echo $social_url; ?>" id="<?php echo $social_url; ?>" class="code" size="25" value="<?php echo($options[$social_url]); ?>">
                        <br />
                    </td>
                <?php if ($i % 3 == 2) echo "</tr>"; ?>
                <?php
                }
                ?>
            </tbody>
		</table>

        <br />
		<p class="submit">
			<input class="button-primary" type="submit" name="save_options" value="<?php _e('Save Changes', 'blue design'); ?>" />
		</p>
	</div> <!-- wrap -->
</form>

	<?php
}


function browse()
{
	if (is_single()) :
?>
	<div id="browse">
		<div style="float:left"><?php previous_post_link('&laquo; %link') ?></div>
		<div style="float:right"><?php next_post_link('%link &raquo;') ?></div>
		<div id="fix"></div>
	</div>

<?php else : ?>

	<div id="browse">
			<div class="alignleft"><?php posts_nav_link(' ',' ',__('&laquo; Previous Page')) ?></div>
			<div class="alignright"><?php posts_nav_link(' ',__('Next Page &raquo;'),' ') ?></div>
	</div>

<?php endif;
}

function search_form()
{
	?>
	<form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
		<div>
			<center>
				<input type="text" value="<?php echo wp_specialchars($s, 1); ?>" name="s" id="s" />
				<br><br>
				<input type="submit" id="searchsubmit" value="<?php _e('Search'); ?>" />
			</center>
		</div>
	</form>
	<?php
}

// LOCALIZATION

load_theme_textdomain('bluedesign', get_template_directory() . '/languages');

?>