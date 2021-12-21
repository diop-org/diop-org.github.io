<?php
/*
Plugin Name: Thank You Counter Button
Plugin URI: http://www.shinephp.com/thank-you-counter-button-wordpress-plugin/
Description: Every time a new visitor clicks the "Thank you" button, one point is added to the total "thanks" counter for this post.
Version: 1.8.2
Author: Vladimir Garagulya
Author URI: http://www.shinephp.com
Text Domain: thankyou
Domain Path: /lang/
*/

/*
Copyright 2009-2011  Vladimir Garagulya  (email: vladimir [at] shinephp.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


if (!function_exists("get_option")) {
  die;  // Silence is golden, direct call is prohibited
}

global $wp_version;

$exit_msg = __('Thank You Counter Button requires WordPress 3.0 or newer.').'<a href="http://codex.wordpress.org/Upgrading_WordPress">'.__('Please update!').'</a>';

if (version_compare($wp_version,"3.0","<")) {
  echo $exit_msg;
	return;
}

// just to have the translation for this string in the .po/.mo files
if (false) {
  __('Every time a new visitor clicks the "Thank you" button, one point is added to the total "thanks" counter for this post.', 'thankyou');
}

require_once('thankyou_lib.php');

load_plugin_textdomain('thankyou','', $thanksPluginDirName.'/lang');


function thanks_options() {

  if (!is_admin()) {
    die('action is forbidden');
  }

  global $thanksCountersTable, $thanksPostReadersTable;

  if (!session_id()) {
    // use @ before operator as it is not so important started session or not.
    // If it could not be started then Statistics tab interface will just work without saved with session filtering or sorting values
    @session_start();
  }

  $thanks_caption = get_option('thanks_caption');
  $thanks_display_page = get_option('thanks_display_page');
  $thanks_display_home = get_option('thanks_display_home');
  $thanks_not_display_for_categories = get_option('thanks_not_display_for_categories');
  $thanks_not_display_for_cat_list = get_option('thanks_not_display_for_cat_list');
  $thanks_position_before = get_option('thanks_position_before');
  $thanks_position_firstpageonly = get_option('thanks_position_firstpageonly');
  $thanks_position_after = get_option('thanks_position_after');
  $thanks_position_lastpageonly = get_option('thanks_position_lastpageonly');
  $thanks_position_shortcode = get_option('thanks_position_shortcode');
  $thanks_position_manual = get_option('thanks_position_manual');
  $thanks_style = get_option('thanks_style');
  $thanks_caption_style = get_option('thanks_caption_style');
  $thanks_caption_color = get_option('thanks_caption_color');
  $thanks_size = get_option('thanks_size');
  $thanks_form = get_option('thanks_form');
  $thanks_color = get_option('thanks_color');
  $thanks_custom = get_option('thanks_custom');
  $thanks_custom_URL = get_option('thanks_custom_url');
  $thanks_custom_glow_URL = get_option('thanks_custom_glow_url');
  $thanks_custom_width = get_option('thanks_custom_width');
  $thanks_custom_height = get_option('thanks_custom_height');
  $thanks_check_ip_address = get_option('thanks_check_ip_address');
  $thanks_time_limit = get_option('thanks_time_limit');
  $thanks_time_limit_seconds = get_option('thanks_time_limit_seconds');
  $thanks_display_settings_shortcuts = get_option('thanks_display_settings_shortcuts');  

  $gotoStatisticsTab = isset($_GET['paged']) && (!isset($_GET['updated']));
  
  if ($thanks_custom) {
      $imageURL = $thanks_custom_URL;
      $buttonSizeClass = 'thanks_custom';
      $buttonColorClass = '';
  } else {
      $imageName = 'thanks_' . $thanks_size . '_' . $thanks_color . (($thanks_form == 'rounded') ? '1' : '') . '.png';
      $imageURL = THANKS_PLUGIN_URL . '/images/' . $imageName;
      $buttonSizeClass = 'thanks_' . $thanks_size;
      $buttonColorClass = 'thanks_' . $thanks_color;
  }
  
?>

    <div class="wrap">
    <div class="icon32" id="icon-options-general"><br/></div>
    <h2><?php _e('Thank You Counter Button Plugin', 'thankyou'); ?></h2>  

    <div id="settings" style="clear:both;">
      <?php require ('thankyou_options.php'); ?>
    </div>

  </div>
<?php

}
// end of thanks_optionPage()


function thanks_statistics() {
 
  if (!is_admin()) {
    die('action is forbidden');
  }

  global $thanksCountersTable, $thanksPostReadersTable, $thanksNotCountablePostTypes;

  if (!session_id()) {
    // use @ before operator as it is not so important started session or not.
    // If it could not be started then Statistics tab interface will just work without saved with session filtering or sorting values
    @session_start();
  }

  $thanks_caption = get_option('thanks_caption');
  $thanks_display_page = get_option('thanks_display_page');
  $thanks_display_home = get_option('thanks_display_home');
  $thanks_not_display_for_categories = get_option('thanks_not_display_for_categories');
  $thanks_not_display_for_cat_list = get_option('thanks_not_display_for_cat_list');
  $thanks_position_before = get_option('thanks_position_before');
  $thanks_position_firstpageonly = get_option('thanks_position_firstpageonly');
  $thanks_position_after = get_option('thanks_position_after');
  $thanks_position_lastpageonly = get_option('thanks_position_lastpageonly');
  $thanks_position_shortcode = get_option('thanks_position_shortcode');
  $thanks_position_manual = get_option('thanks_position_manual');
  $thanks_style = get_option('thanks_style');
  $thanks_caption_style = get_option('thanks_caption_style');
  $thanks_caption_color = get_option('thanks_caption_color');
  $thanks_size = get_option('thanks_size');
  $thanks_form = get_option('thanks_form');
  $thanks_color = get_option('thanks_color');
  $thanks_custom = get_option('thanks_custom');
  $thanks_custom_URL = get_option('thanks_custom_url');
  $thanks_custom_glow_URL = get_option('thanks_custom_glow_url');
  $thanks_custom_width = get_option('thanks_custom_width');
  $thanks_custom_height = get_option('thanks_custom_height');
  $thanks_check_ip_address = get_option('thanks_check_ip_address');
  $thanks_time_limit = get_option('thanks_time_limit');
  $thanks_time_limit_seconds = get_option('thanks_time_limit_seconds');
  $thanks_display_settings_shortcuts = get_option('thanks_display_settings_shortcuts');  

  $gotoStatisticsTab = isset($_GET['paged']) && (!isset($_GET['updated']));
  $buttonSizeClass = 'thanks_'.$thanks_size;
    
?>

    <div class="wrap">
    <div class="icon32" id="icon-options-general"><br/></div>
    <h2><?php _e('Thank You Counter Button Statistics', 'thankyou'); ?></h2>  
      
    <div id="statistics" >
      <?php require ('thankyou_statistics.php'); ?>
    </div>
      
      
  </div>
<?php

}
// end of thanks_statistics()



function thanks_buildButtonCode($thanksCaption = "", $siteGlobal = false) {

  global $post;
  
  // post's thanks button counter to assign it the unique Id
  static $thanksOrderNumber = array();

  if ($siteGlobal) {
    $post_id = 0;
  } else {
    $post_id = $post->ID;
  }
  $thanks_custom = get_option('thanks_custom');
  if ($thanks_custom) {
    $thanks_custom_URL = get_option('thanks_custom_url');
    $thanks_custom_width = get_option('thanks_custom_width');
    $thanks_custom_height = get_option('thanks_custom_height');
    $imageURL = $thanks_custom_URL;
    $buttonSizeClass = 'thanks_custom';
    $buttonColorClass = '';
  } else {
    $thanks_custom_width = '';
    $thanks_custom_height = '';
    $thanks_size = get_option('thanks_size');
    $thanks_form = get_option('thanks_form');
    $thanks_color = get_option('thanks_color');
    $imageName = 'thanks_'.$thanks_size.'_'.$thanks_color.(($thanks_form=='rounded') ? '1':'').'.png';
    $imageURL = THANKS_PLUGIN_URL.'/images/'.$imageName;
    $buttonSizeClass = 'thanks_'.$thanks_size;
    $buttonColorClass = 'thanks_'.$thanks_color;
  }
  $thanks_caption_style = get_option('thanks_caption_style');
  $thanks_caption_color = get_option('thanks_caption_color');
  
	$ipFound = false;
  $checkIP = get_option('thanks_check_ip_address');
  if ($checkIP=='1') {
	  $visitorIP = thanks_getVisitorIP();
	  $ipFound = thanks_checkVisitorIP($post_id, $visitorIP);
	}
  if ($ipFound) {
    $onButtonClick = 'return false;';
    $buttonTitle = __('You left &ldquo;Thanks&rdquo; already for this post', 'thankyou');
  } else {
    $onButtonClick = 'thankYouButtonClick('.$post_id.', \''.thanks_esc_js(__('You left &ldquo;Thanks&rdquo; already for this post', 'thankyou')).'\')';
    $buttonTitle = __('Click to left &ldquo;Thanks&rdquo; for this post', 'thankyou');
  }
  $thanksCaption = getThanksCaption($post_id, $thanksCaption);
  if (!isset($thanksOrderNumber[$post_id]) || !$thanksOrderNumber[$post_id]) {
    $thanksOrderNumber[$post_id] = 0;
  }
  $thanksOrderNumber[$post_id]++;
  $inputButtonHTML = thanks_getButtonInputHTML($onButtonClick, $thanksCaption, $buttonSizeClass, $buttonColorClass,
                                   $imageURL, $thanks_custom_width, $thanks_custom_height, $thanks_caption_style,
                                   $thanks_caption_color, $post_id.'_'.$thanksOrderNumber[$post_id], $buttonTitle);
  $uniqueId = $post_id.'_'.$thanksOrderNumber[$post_id];  
  $button = '<div class="thanks_button_div" 
                  style="'.get_option('thanks_style').'">'.$inputButtonHTML.
               ((is_user_logged_in() && current_user_can('create_users') && (get_option('thanks_display_settings_shortcuts') == '1'))
               		?'<div class="thanks_settings_shortcuts">'.
               			'<a href="'.THANKS_WP_ADMIN_URL.'/options-general.php?page=thankyou.php" title="'.__('Settings','thankyou').'"><img class="thanks_shortcuts" height="8" width="8" alt="thank_you_settings" src="'.THANKS_PLUGIN_URL.'/images/settings.png" /></a>'.
               			'<a href="'.THANKS_WP_ADMIN_URL.'/options-general.php?page=thankyou.php&amp;post_id='.$post_id.'&amp;paged=1#statistics" title="'.esc_attr(sprintf(__('View statistics details for "%s"', 'thankyou'), $post->post_title)).'"><img class="thanks_shortcuts" height="8" width="8" alt="thank_you_settings" src="'.THANKS_PLUGIN_URL.'/images/stats.png" /></a>'.
               			'<a title="'.__('Hide these shortcuts', 'thankyou').'" href="javascript:if(confirm(\''.thanks_esc_js(__('Do you really want to hide these shortcuts?', 'thankyou')).'\')) thankYouButtonRemoveSettingsShortcuts();"><img class="thanks_shortcuts" height="8" width="8" alt="thank_you_settings" src="'.THANKS_PLUGIN_URL.'/images/disable.png" /></a>'.
               			'</div>'
               		:'').
               '<div id="ajax_loader_'.$uniqueId.'" style="display:inline;visibility: hidden;"><img alt="ajax loader" src="'.THANKS_PLUGIN_URL.'/images/ajax-loader.gif" /></div>'.
             '</div>';

  $button = apply_filters('thanks_thankyou_button', $button);
             
  return $button;

}
// end of thanks_buildButtonCode()


function thanks_button_insert($content) {

  global $wpdb, $post, $page, $numpages, $multipage;

  if (strpos($content, '[nothankyou]')!==false) {
    $content = str_replace('[nothankyou]', '', $content);
    return $content;
  }

  if ((get_option('thanks_display_page')==null && is_page()) ||
      (get_option('thanks_display_home')==null && (is_home() || is_category() || is_tag()) )) {
    return $content;
  }

  $thanks_not_display_for_categories = get_option('thanks_not_display_for_categories');
  if ($thanks_not_display_for_categories) {
    $thanks_not_display_for_cat_list = get_option('thanks_not_display_for_cat_list');
    if ($thanks_not_display_for_cat_list) {
      $query = "select term_taxonomy.term_id
                  from $wpdb->term_taxonomy term_taxonomy
                    left join $wpdb->term_relationships term_relationships on (term_relationships.term_taxonomy_id=term_taxonomy.term_taxonomy_id)
                  where term_taxonomy.taxonomy='category' and term_relationships.object_id=$post->ID";
      $categories = $wpdb->get_results($query);
      if ($wpdb->last_error) {
        return $content;
      }
      if (is_array($thanks_not_display_for_cat_list)) {
        foreach ($thanks_not_display_for_cat_list as $categoryToSkip) {
          foreach ($categories as $category) {
            if ($category->term_id==$categoryToSkip) {
              return $content;
            }
          }
        }
      } else {
        foreach ($categories as $category) {
          if ($category==$thanks_not_display_for_cat_list) {
            return $content;
          }
        }
      }
    }
  }

  $thanks_position_before = get_option('thanks_position_before');
  $thanks_position_firstpageonly = get_option('thanks_position_firstpageonly');
  $thanks_position_after = get_option('thanks_position_after');
  $thanks_position_lastpageonly = get_option('thanks_position_lastpageonly');

  if ($thanks_position_before) {
    if (!$multipage || ($page==1) || ($page>1 && !$thanks_position_firstpageonly) || is_home()) {
      $button = thanks_buildButtonCode();
      $content = $button.$content;
    }
  } 
  if ($thanks_position_after) {
    if (!$multipage || ($page==$numpages) || ($page<$numpages && !$thanks_position_lastpageonly) || is_home()) {
      $button = thanks_buildButtonCode();
      $content = $content.$button;
    }
  }
    
  return $content;
}
// end of thanks_button_insert()


// Manual output
function thanks_button($caption = '', $siteGlobal = false) {
  if (get_option('thanks_position_manual')==1) {
    return thanks_buildButtonCode($caption, $siteGlobal);
  } else {
    return '';
  }
}
// end of thanks_button()


// Install plugin
function thanks_install() {
	global $wpdb, $thanksCountersTable, $thanksPostReadersTable;

  $thanks_db_version = get_option('thanks_db_version');
  $query = "SHOW TABLES LIKE '$thanksPostReadersTable'";
  $table = $wpdb->get_var($query);
	if ($table!=$thanksPostReadersTable) {
    $query = "CREATE TABLE `$thanksPostReadersTable` (
                     `id` bigint(20) NOT NULL auto_increment,
                     `post_id` bigint(20) default NULL,
                     `ip_address` char(15) default NULL,
                     `updated` timestamp NOT NULL default CURRENT_TIMESTAMP,
                     PRIMARY KEY  (`id`),
                     KEY `post_id` (`post_id`),
                     KEY `ip_address` (`ip_address`)
                   ) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8";
		$wpdb->query($query);
    if ($wpdb->last_error) {
      thanks_logEvent(THANKS_ERROR." during plugin installation:\n"."Query: $query \n".$wpdb->last_error);
      return false;
    }
	}

  $query = "SHOW TABLES LIKE '$thanksCountersTable'";
  $table = $wpdb->get_var($query);
	if ($table!=$thanksCountersTable) {
    $query = "CREATE TABLE `$thanksCountersTable` (
                      `id` bigint(20) NOT NULL auto_increment,
                      `post_id` bigint(20) NOT NULL,
                      `quant` bigint(20) default NULL,
                      `updated` timestamp NOT NULL default CURRENT_TIMESTAMP,
                      PRIMARY KEY  (`id`),
                      UNIQUE KEY `post_id` (`post_id`)
                    ) ENGINE=MyISAM DEFAULT CHARSET=utf8";
		$wpdb->query($query);
    if ($wpdb->last_error) {
      thanks_logEvent(THANKS_ERROR." during plugin installation:\n"."Query: $query \n".$wpdb->last_error);
      return false;
    }
	} else if ($thanks_db_version=='1.0') {
    $query = "show columns from `$thanksCountersTable`";
    $fields = $wpdb->get_results($query);
    if ($wpdb->last_error) {
      thanks_logEvent(THANKS_ERROR." during plugin installation:\n".$wpdb->last_error);
      return false;
    }    
    $updatedFound = false;
    foreach ($fields as $field) {
      if ($field->Field=='updated') {
        $updatedFound = true;
        break;
      }
    }
    if (!$updatedFound) { // add new field 'updated'
      $query = "alter table `$thanksCountersTable` add column `updated` timestamp DEFAULT CURRENT_TIMESTAMP NOT NULL after `quant`";
      $wpdb->query($query);
      if ($wpdb->last_error) {
        thanks_logEvent(THANKS_ERROR." during plugin installation:\n"."Query: $query \n".$wpdb->last_error);
        return false;
      }
      $query = "update `$thanksCountersTable`
                  set `$thanksCountersTable`.updated = (select MAX(readers.updated)
                                                          from `$thanksPostReadersTable` readers
                                                          where readers.post_id = `$thanksCountersTable`.post_id)";
      $wpdb->query($query);
      if ($wpdb->last_error) {
        thanks_logEvent(THANKS_ERROR." during plugin installation:\n"."Query: $query \n".$wpdb->last_error);
        return false;
      }
    }
    update_option('thanks_db_version', '1.2');
  }
  
	update_option('thanks_db_version', '1.2');
  add_option('thanks_display_page', 1);
  add_option('thanks_display_home', 1);
  add_option('thanks_not_display_for_categories', 0);
  add_option('thanks_not_display_for_cat_list', array());
  $position = get_option('thanks_position');
  if ($position) {
    delete_option('thanks_position');
  }
  $curPos = ($position=='before' || $position=='beforeandafter') ? 1 : 0;
  add_option('thanks_position_before', $curPos);
  $curPos = ($position=='after' || $position=='beforeandafter') ? 1 : 0;
  add_option('thanks_position_after', $curPos);
  add_option('thanks_position_firstpageonly', 1);
  add_option('thanks_position_lastpageonly', 1);
  $curPos = ($position=='shortcode') ? 1 : 0;
  add_option('thanks_position_shortcode', $curPos);
  $curPos = ($position=='manual') ? 1 : 0;
  add_option('thanks_position_manual', $curPos);
  add_option('thanks_style', 'float: left; margin-right: 10px;');
  add_option('thanks_caption_style', 'font-family: Verdana, Arial, Sans-Serif; font-size: 14px; font-weight: normal;');
  add_option('thanks_caption_color', '#ffffff');
  add_option('thanks_size', 'large');
  $thanks_color = get_option('thanks_color');
  if ($thanks_color && strpos($thanks_color, '1')===false) {
    $thanks_form = 'square';
    $thanks_color = str_replace('1','', $thanks_color);
  } else {
    $thanks_form = 'rounded';
    $thanks_color = 'blue';
  }
  update_option('thanks_form', $thanks_form);
  update_option('thanks_color', 'blue');
  add_option('thanks_custom', 0);
  add_option('thanks_custom_url', '');
  add_option('thanks_custom_glow_url', '');
  add_option('thanks_custom_width', 100);
  add_option('thanks_custom_height', 26);
  add_option('thanks_check_ip_address', 1);
  add_option('thanks_time_limit', 1);
  add_option('thanks_time_limit_seconds', 60);
	add_option('thanks_show_last_date', 1);
	add_option('thanks_caption', __('Thank You','thankyou'));
  add_option('thanks_dashboard_rows_number', 5);
  add_option('thanks_dashboard_content', 'latest_thanked');
  add_option('thanks_dashboard_statistics_link_show', 1);
  add_option('thanks_dashboard_author_link_show', 1);
  add_option('thanks_display_settings_shortcuts', 1);
  
}
// end of thanks_install()


function thanks_init() {

global $wpdb, $thanksCountersTable, $thanksPostReadersTable;
$query = "SHOW TABLES LIKE '$thanksPostReadersTable'";
$table1 = $wpdb->get_var($query);
$query = "SHOW TABLES LIKE '$thanksCountersTable'";
$table2 = $wpdb->get_var($query);
if ($table1!=$thanksPostReadersTable || $table2!=$thanksCountersTable) {
    function thanks_warning() {
			echo '
			<div id="thanks-warning" class="updated fade">
          <p><strong>Thank You Counter Button Plugin is not installed properly.</strong><br/>
             Check <a href="'.THANKS_PLUGIN_URL.'/tycb.log">tycb.log</a> file for more details.<br/>
             Deactivate Thank You Counter Button Plugin to hide this message.<br/>
             If you plan to contact the plugin author with your problem, please, use
             <a href="http://www.shinephp.com/thank-you-counter-button">http://shinephp.com/thank-you-counter-button</a> post comments or<br/>
             shinephp.com <a href="http://www.shinephp.com/contact/">contact page</a>.
             Do not forget include the related part of tycb.log file content or the whole file to your message.
          </p>
      </div>';
		}
		add_action('admin_notices', 'thanks_warning');
}

  if(function_exists('register_setting')) {
    register_setting('thankyoubutton-options', 'thanks_caption');
    register_setting('thankyoubutton-options', 'thanks_display_page');
    register_setting('thankyoubutton-options', 'thanks_display_home');
    register_setting('thankyoubutton-options', 'thanks_not_display_for_categories');
    register_setting('thankyoubutton-options', 'thanks_not_display_for_cat_list');    
    register_setting('thankyoubutton-options', 'thanks_position_before');
    register_setting('thankyoubutton-options', 'thanks_position_after');
    register_setting('thankyoubutton-options', 'thanks_position_firstpageonly');
    register_setting('thankyoubutton-options', 'thanks_position_lastpageonly');
    register_setting('thankyoubutton-options', 'thanks_position_shortcode');
    register_setting('thankyoubutton-options', 'thanks_position_manual');
    register_setting('thankyoubutton-options', 'thanks_style');
    register_setting('thankyoubutton-options', 'thanks_caption_style');
    register_setting('thankyoubutton-options', 'thanks_caption_color');
    register_setting('thankyoubutton-options', 'thanks_size');
    register_setting('thankyoubutton-options', 'thanks_form');
    register_setting('thankyoubutton-options', 'thanks_color');
    register_setting('thankyoubutton-options', 'thanks_custom');
    register_setting('thankyoubutton-options', 'thanks_custom_url');
    register_setting('thankyoubutton-options', 'thanks_custom_glow_url');
    register_setting('thankyoubutton-options', 'thanks_custom_width');
    register_setting('thankyoubutton-options', 'thanks_custom_height');
    register_setting('thankyoubutton-options', 'thanks_check_ip_address');
    register_setting('thankyoubutton-options', 'thanks_time_limit');
    register_setting('thankyoubutton-options', 'thanks_time_limit_seconds');
    register_setting('thankyoubutton-options', 'thanks_display_settings_shortcuts');
  }
}
// end of thanks_init()


function thanks_cssAction() {

  if (is_admin() ||
      (get_option('thanks_display_page')==null && is_page()) ||
      (get_option('thanks_display_home') == null && is_home())) {
    return;
  }

  echo '<link rel="stylesheet" href="'.THANKS_PLUGIN_URL.'/css/thankyou.css" type="text/css" media="screen" />'."\n";

}
// end of thanks_cssAction()


function thanks_scriptsAction() {  

  if (is_admin() ||
      (get_option('thanks_display_page')==null && is_page()) ||
      (get_option('thanks_display_home') == null && is_home())) {
    return;
  }

  $thanks_custom = get_option('thanks_custom');
  if ($thanks_custom) {
    $imageURL = get_option('thanks_custom_url');
    $imageGlowURL = get_option('thanks_custom_glow_url');
  } else {
    $thanks_size = get_option('thanks_size');
    $thanks_form = get_option('thanks_form');
    $thanks_color = get_option('thanks_color');
    $imageName = 'thanks_'.$thanks_size.'_'.$thanks_color.(($thanks_form=='rounded') ? '1':'').'.png';
    $imageURL = THANKS_PLUGIN_URL.'/images/'.$imageName;
    $imageGlowName = 'thanks_'.$thanks_size.'_'.$thanks_color.(($thanks_form=='rounded') ? '1':'').'_glow.png';
    $imageGlowURL = THANKS_PLUGIN_URL.'/images/'.$imageGlowName;
  }  
  
  wp_enqueue_script('thanks_script', THANKS_PLUGIN_URL.'/thankyou.js', array('jquery','jquery-form'));
  wp_localize_script('thanks_script', 'ThanksSettings', 
                     array('plugin_url' => THANKS_PLUGIN_URL, 
                     'ajax_nonce' => wp_create_nonce('thanks-button'),
                     'button_image_url' => $imageURL,
                     'button_image_glow_url' => $imageGlowURL ));
  
}
// end of thanks_scriptsAction()


function thanks_plugin_action_links($links, $file) {
    if ($file == plugin_basename(dirname(__FILE__).'/thankyou.php')){
        $settings_link = "<a href='options-general.php?page=thankyou.php'>".__('Settings','thankyou')."</a>";
        array_unshift( $links, $settings_link );
    }
    return $links;
}
// end of thanks_plugin_action_links


function thanks_plugin_row_meta($links, $file) {
  if ($file == plugin_basename(dirname(__FILE__).'/thankyou.php')){
		$links[] = '<a target="_blank" href="http://www.shinephp.com/thank-you-counter-button-wordpress-plugin/2/#changelog">'.__('Changelog', 'thankyou').'</a>';
		$links[] = '<a target="_blank" href="http://www.shinephp.com/thank-you-counter-button-wordpress-plugin/2/#filterhooks">'.__('Additional Documentation', 'thankyou').'</a>';
	}
	return $links;
} // end of thanks_plugin_row_meta


function thanks_menu() {
  
  $base_name = 'thankyou.php';
  if ( function_exists('add_menu_page') ) {        
    $thanks_page = add_options_page('Thank You Counter Button Settings', 'Thanks CB', 'create_users', $base_name, 'thanks_options');    
    add_action( "admin_print_styles-$thanks_page", 'thanks_adminCssAction' );
    add_action( "admin_print_scripts-$thanks_page", 'thanks_settings_scriptsAction' );    
	}
  
  if ( function_exists('add_management_page') ) {
    $thanks_page = add_management_page('Thank You Counter Button Statistics', 'TYCB Statistics', 'create_users', $base_name, 'thanks_statistics');
		add_action( "admin_print_styles-$thanks_page", 'thanks_adminCssAction' );
    add_action( "admin_print_scripts-$thanks_page", 'thanks_settings_scriptsAction' );    
  }
}
// end of thanks_settings_menu()

function thanks_adminCssAction() {

  wp_enqueue_style('thanks_admin_css', THANKS_PLUGIN_URL.'/css/thankyou_admin.css', array(), false, 'screen');
  wp_enqueue_style('thanks_user_css', THANKS_PLUGIN_URL.'/css/thankyou.css', array(), false, 'screen');

}
// end of thanks_adminCssAction()


function thanks_settings_scriptsAction() {
  
  $thanks_custom = get_option('thanks_custom');
  if ($thanks_custom) {
    $imageURL = get_option('thanks_custom_url');
    $imageGlowURL = get_option('thanks_custom_glow_url');
  } else {
    $thanks_size = get_option('thanks_size');
    $thanks_form = get_option('thanks_form');
    $thanks_color = get_option('thanks_color');
    $imageName = 'thanks_'.$thanks_size.'_'.$thanks_color.(($thanks_form=='rounded') ? '1':'').'.png';
    $imageURL = THANKS_PLUGIN_URL.'/images/'.$imageName;
    $imageGlowName = 'thanks_'.$thanks_size.'_'.$thanks_color.(($thanks_form=='rounded') ? '1':'').'_glow.png';
    $imageGlowURL = THANKS_PLUGIN_URL.'/images/'.$imageGlowName;
  }  

  wp_enqueue_script('thanks_script', THANKS_PLUGIN_URL.'/thankyou.js', array('jquery','jquery-form'));
  wp_localize_script('thanks_script', 'ThanksSettings', 
                     array('plugin_url' => THANKS_PLUGIN_URL, 
                     'ajax_nonce' => wp_create_nonce('thanks-button'),
                     'button_image_url' => $imageURL,
                     'button_image_glow_url' => $imageGlowURL ));
  wp_enqueue_script('thanks_js_script1', THANKS_PLUGIN_URL.'/iColorPicker.js', array('jquery','jquery-form','jquery-ui-tabs','jquery-ui-dialog'));
  
}
// end of thanks_settings_scriptsAction()


function thanks_dashboard_scriptsAction() {  

  wp_enqueue_style('thanks_dashboard_css', THANKS_PLUGIN_URL.'/css/thankyou_admin.css', array(), false, 'screen');
  wp_enqueue_script('thanks_js_script2', THANKS_PLUGIN_URL.'/dhtmlgoodies_slider.js');
  wp_localize_script('thanks_js_script2', 'ThanksSettings', array('plugin_url' => THANKS_PLUGIN_URL));
}
// end of thanks_dashboard_scriptsAction()


function thanks_button_shortcode_handler($atts, $content, $code) {
	// $atts    ::= array of attributes
	// $content ::= text within enclosing form of shortcode element
	// $code    ::= the shortcode found, when == callback name
	// examples: [my-shortcode]
	//           [my-shortcode/]
	//           [my-shortcode foo='bar']
	//           [my-shortcode foo='bar'/]
	//           [my-shortcode]content[/my-shortcode]
	//           [my-shortcode foo='bar']content[/my-shortcode]

	// [thankyou]My specific caption[/thankyou]
	// [thanks_total_quant]Custom Text[/thanks_total_quant]

	// VLAD: Later, we can add the groups/categories
	//extract(shortcode_atts(array('group' => $group), $atts));

	if ($content != "") {
		// Recursivity
		$content = do_shortcode($content);
	}
	
	$thanks_rc = '';
	if ($code == "thankyou") {
		$thanks_rc = thanks_buildButtonCode($content);
	}
	else if ($code == "thanks_total_quant") {
	  // total quant of thanks short code processing
		$thanks_rc = $content.thanks_get_Total();
	}
	else {
		$thanks_rc = 'Unknown shortcode: '.$code;
	}

	return $thanks_rc;
}
// end of thanks_button_shortcode_handler()


require_once('thankyou_widgets.php');

// activation action
register_activation_hook(__FILE__, "thanks_install");

add_action('admin_init', 'thanks_init');
add_action('wp_dashboard_setup', 'thanks_dashboard_scriptsAction');

// add a Settings link in the installed plugins page
add_filter('plugin_action_links', 'thanks_plugin_action_links', 10, 2);
add_filter('plugin_row_meta', 'thanks_plugin_row_meta', 10, 2);

add_action('admin_menu', 'thanks_menu');

// tune WP shortcodes api call
add_shortcode('thanks_total_quant', 'thanks_button_shortcode_handler');
if (get_option('thanks_position_shortcode')) {
	add_shortcode('thankyou', 'thanks_button_shortcode_handler');
}

add_action('wp_head', 'thanks_cssAction');
add_action('wp_print_scripts', 'thanks_scriptsAction');
add_filter('the_content', 'thanks_button_insert');


?>