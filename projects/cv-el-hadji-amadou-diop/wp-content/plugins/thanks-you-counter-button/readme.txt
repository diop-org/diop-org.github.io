=== Thank You Counter Button ===
Contributors: shinephp, Whiler
Donate link: http://www.shinephp.com/donate/
Tags: thanks, thank you, like, counter, button, tracker, dashboard, sidebar, widget, shortcode, statistics, hook
Requires at least: 3.0
Tested up to: 3.4
Stable tag: 1.8.2

Adds 'Thank You' button to every post/page, counts and shows a total number of visitors 'thanks' for post/page.

== Description ==

This is the visitor's 'Thank you' or 'I like it' clicks counter button. Every time a new visitor clicks the "Thank you" button, one point is added to the total "thanks" counter for this post which can be seen at the same button.

The plugin stores its counters in two own MySQL tables. Only one "thank" for this IP-address can be permitted. Plugin can skip all further "Thank you" clicks from this IP-address once it is automatically registered. IP-address click limit can be set to a time interval in seconds.

Plugin has Statistics data table which shows posts list with total thanks quant for every post and time of the latest thank. Rows in the table can be filtered by posting month, category, can be sorted by thanks quant or time of latest thank in the descending or ascending order. Selected post can be viewed or edit directly from this table.

Admin dashboard and sidebar widgets with list of latest thanked or the largests thanked posts (between 3 and 15) are available. Total quant of thanks can be shown. Use widgets control panels to change settings according to your preferences.

The set of shortcodes and content filters is available for this plugin. Visit http://www.shinephp.com/thank-you-counter-button-wordpress-plugin/ for more details.


== Installation ==

Installing procedure:

Attention! 
1) Starting from version 1.7 plugin works with WordPress 3.0 and higher only. For older WordPress versions use version 1.6.9. from http://downloads.wordpress.org/plugin/thanks-you-counter-button.1.6.9.zip
2) This plugin will work properly for that WordPress installation only which has "CREATE" permission on its MySQL database. "Create" permission is needed as plugin creates two own DB tables to work with.
1. Deactivate plugin if you have the previous version installed. (It is important requirement for switching to this version from a previous one.)
2. Extract "thanks-you-counter-button.x.x.x.zip" archive content to the "/wp-content/plugins/thanks-you-counter-button" directory.
3. Activate "Thank You Counter Button" plugin via 'Plugins' menu in WordPress admin menu. 
4. Go to the "Settings"-"Thanks CB" menu item and check/change your preferences to customize how this plugin will work for you.

== Screenshots ==
1. screenshot-1.png The example of "Thank You" button in blue color
2. screenshot-2.png The "Thank You" Counter Button Settings Page part 1.

Check more screenshots and "Thank You" button in action at [shinephp.com](http://shinephp.com/thank-you-counter-button-wordpress-plugin/)

= Translations =
* Belarusian: [Marcis Gasuns](http://pc.de/)
* Chinese Simple: [Owen](http://mencase.com)
* Dutch: [Rene](http://wpwebshop.com)
* French: [Whiler](http://blogs.wittwer.fr/whiler/)
* German: [tolingo translations](http://www.tolingo.com)
* Hungarian: Nightmare
* Iranian: [Masoud Golchin](http://www.7thline.ir)
* Italian: [Ugo](http://www.myeasywp.com)
* Lithuanian: [Vincent G](http://host1free.com)
* Russian: [ShinePHP](http://shinephp.com)
* Spanish: [Omi](http://equipajedemano.info)
* Turkish: [Sadri Ercan](http://www.faydaliweb.com)

Dear TYCB plugin User,
if you wish to help me with this plugin translation I very appreciate it. Please send your language .po and .mo files to vladimir[at-sign]shinephp.com email. Do not forget include you site link in order I can show it with greetings for the translation help at shinephp.com, TYCB plugin settings page and in this readme.txt file.

= Special Thanks to =
* [Omi](http://equipajedemano.info) for ideas and new versions testing help.
* [Whiler](http://blogs.wittwer.fr/whiler/) for ideas, source code contributions and new versions testing.
* [Simon](http://www.supersite.me/website-building/jquery-free-color-picker/) for the excelent JQuery color picker.
* [Arne](http://www.arnebrachhold.de/projects/wordpress-plugins/google-xml-sitemaps-generator/) for setting page layout idea, html markup examples.
* [DHTMLGoodies](http://www.dhtmlgoodies.com/) for the form input slider code.
* [Eric](http://www.glassybuttons.com/glassy.php) for the cute online button image generator.

== Frequently Asked Questions ==
- Plugin doesn't work. What is wrong? 

  The most probable reason is the MySQL database permissions problem for your WordPress installation. This plugin will work properly for that WordPress installation only which has "CREATE" permission on its MySQL database. "Create" permission is needed as plugin creates two own DB tables to work with.
  From version 1.6.1. plugin writes any database errors into tycb.log file at plugin folder. Look at this file for more information about your problem.

- I updated plugin to the recent version. Why does it shows button or Settings/Statistics pages wrong way.

  Your browser uses old cashed version of CSS files. Please try to reload full page (use F5 or Refresh button).

- Does this plugin work with Wordpress MU or WordPress Multisite?

  Yes, it does. Plugin is tested with WordPress MU 2.9.1 and WordPress Multisite 3.0.1. Thanks to WordPress developers. Separate tables for thanks counters are created for each blog instance where plugin is activated. Every blog has its own plugin settings to manage its presentation and behaviour.

== Changelog ==

= 1.8.2 =
* 22.05.2012
* CSS update for compatibility with WordPress 3.4;
* JavaScript code update: Reset counter bug was fixed. More universal button HTML elements selection is used. Previous one didn't work if buttons numeration was started for some reason not from 1.

= 1.8.1 =
* 07.04.2012
- Lithuanian translation is added, thanks to Vincent G.

= 1.8 =
* 02.03.2012
- CSS classes (thanks_quant_for_post, thanks_total_quant_label, thanks_total_quant_value) were added to sidebar widget. Use it to make your widget more attractive.
- Colon is removed from button caption. So add it manually to the button caption, if you need that.
- ShinePHP.com RSS feed box was removed from the plugin Settings page.
- Sidebar widget data could be filtered by category now. Just select needed category from the dropdown list at the widget configuration form.
- Thanks from custom post types are shown in the widgets now.
- TYCB plugin Settings form is updated (check your settings after version update, just in case they were changed suddenly ;) ).
- TYCB Statistics data tab is moved from Settings page to the separate menu item under Tools menu.
- Button image is changed slightly when you hover mouse on it.

= 1.7.4 =
* 16.01.2011
- Chinese Simple translation is added.

= 1.7.3 =
* 02.01.2011
- Bug is fixed. If button is turned off on the home page [nothankyou] shortcode (if used) was visible in the post excerpt at the home page. Thanks to [Whiler](http://blogs.wittwer.fr/whiler/) for discovering that.

= 1.7.2 =
* 21.11.2010
- Turkish translation is added.

= 1.7.1 =
* 04.10.2010
- Italian translation update.

= 1.7 =
* 19.09.2010
- You can use a single global thanks counter button beyond the posts and pages. Place this PHP code &lt;?  echo thanks_button('Thank You', true); ?&gt; somewhere on your blog page using theme files and you and your visitors will see it.
- Uninstall cleanup feature (uninstall.php) is added: plugin deletes all its options and database tables .
- Usage of deprecated since WordPress 3.0 staff is excluded. Plugin is fully compatible with WordPress 3.0 now.
- shinephp.com news section is added to the plugin Settings page.

= 1.6.9 =
* 30.08.2010
- XSS security hole in Javascript code is fixed. Thanks to [Julio from Boiteaweb.fr](http://boiteaweb.fr) for discovering and pointing me that.

= 1.6.8 =
* 14.08.2010
- Dutch translation is added.
- Iranian translation is added.

= 1.6.7 =
* 22.06.2010
- Hungarian translation is added.

= 1.6.6 =
* 20.03.2010
- Belarusian translation is added.

= 1.6.5 =
* 19.03.2010
- Minor bug is fixed for the TYCB dashboard widget content filter hook "thanks_stat_dashboard_row". Thanks to Whiler who found it. If you don't use that filter hook you can skip this update.

= 1.6.4 =
* 15.03.2010
- Italian translation was added.

= 1.6.3 =
* 13.03.2010
- This is a recommended update. Critical bug was fixed. TYCB widgets code could block blog work as PHP fatal error could occur due to conflict with some other plugin, e.g. wp-cumulus as had been discovered. Thanks to [bgd](http://wordpress.org/support/profile/1516753) for reporting about it.
- Prefix 'thanks' was added to the constants names in the thanks_widgets.php to exclude possible name conflicts also.

= 1.6.2 =
* 12.03.2010
- German translation was added.

= 1.6.1 =
* 30.01.2010
- Fixed error which stopped the whole blog work if MySQL database error with TYCB plugin was encountered. The TYCB plugin doesn't work only in such situation now.
- Your blog tech information and MySQL database errors is written to the tycb.log file in order to help identify the problem if it exists.
- Warning notice at admin page is added in case of MySQL error occurs during TYCB plugin installation.

= 1.6 =
* 20.12.2009
- Thanks data for Pages (which were hidden earlier) are shown at the Statistics and widgets now.
- Pagination is added to the Detailed Statistics screen with IP list for the selected post. You can list and look all IPs from wich thanks were sent to your blog. There is no 35 records limit more.
- Some code optimization is done for the Detailed Statistics page.

= 1.5 =
* 06.12.2009
- New Detailed Statistics screen with IP list for the selected post. Last 35 IP addresses of visitors who clicked button are shown with link to the http:://www.shinephp.com/ip-to-country service page where you can check what country/region/city that IP (or any custom IP) came from.
- Option to show shorcuts links to the right of the "Thank You" buttons for the logged in blog user with administrator rights. Shortcuts links allows to go to the plugin "Setting" page, open detailed statistics page for the current post, hide all shortcuts with one click.
- New content filters for widgets are added:
  'thanks_stat_sidebar_item' filter allows to change content of every row at the sidebar TYCB widget;
  'thanks_stat_sidebar_total_quant' filter allows to change content of total quant counter at the sidebar TYCB widget;
  'thanks_stat_dashboard_row' filter allows to change content of every row at the dashboard TYCB widget;
- Bug fix: Reset post counter for  the selected post links from the Statistics page did not work. It is fixed now.

= 1.4.1 =
* 28.11.2009
- Shortcode [thankyou] functionality is extended. You can include custom button caption to this shortcode optionally, e.g. [thankyou]YourCustomCaptionHere[/thankyou].
- Bug fix: It concerned those only who showed more than one thanks button for post. In that case the only first button from that buttons set was updated without page refresh after visitor's click.

= 1.4 =
* 27.11.2009
- Settings screen update 1: Live preview of the button and its caption style changes at the same Settings tab is realized. Every change if text, CSS styles, button size is immediately displayed in your browser.
- Settings screen update 2: Two checkboxes added for more advanced management of button position for the multi-paged posts. You can now select where to show buttons: before - before 1st page only or before every page, after - after last page only or after every page of the multi-paged post.
- Settings screen update 2: Two new buttons added into the Misc section: "Return to Defaults" - reset all settings to its default values, "Reset Counters" - reset on thanks counters for all post to the 0.
- Statistics tab - Link to reset selected post thanks counter is added. Action is realised with AJAX use. Link to edit selected post is added.
- You can show total quant of thanks now at the admin dashboard and sidebars widgets. Just check the correspondent checkbox in the widget parameters.  
- Shortcode [thanks_total_quant] is added. You can use it in your post to show the total quant of thanks visitor sent to your blog.
- Slider control was added to the admin dashboard TYCB widget in order to help you change rows quant to show.
- Minor fix to show 'Thanks CB' menu in the front-end 'Settings' menu with WordPress Admin Bar plugin, if it is installed and activated on your blog.

= 1.3.01 =
* 18.11.2009
- Testing 'Thank You Counter Button' plugin with Wordpress MU 2.8.5.2 is finished. We are proud to declare that plugin works with WP MU too.
- Button was not displayed on the Home page inside the post's excerpts for the multi-paged posts if button position was set to the 'After' only. This bug is fixed now.
- Due to conflict with some other plugins are installed PHP warning message about problem with PHP session start was shown on the plugin Setting page. That warning (if exists) is hidden now.
- Some typos are corrected in this readme.txt file. Possibly new mistakes were added :), so do not hesitate to correct me, if typos still exist in this text or in the plugin text labels.

= 1.3 =
* 16.11.2009
- Thanks Stat sidebar widget: the latest or the most thanked post titles with total thanks quant on your blog sidebar. Select yourself what to show via widget settings.  Widget has its content filter hook 'thanks_stat_sidebar'.
- Dashboard statistics widget (the latest or the most thanked post titles with total thanks quant): minor CSS fix, link to the Full Statistics page is added, use widget control panel to configer its presentation. Widget has its content filter hook 'thanks_stat_dashboard' now.
- Thank You Counter Button has filter hook 'thanks_thankyou_button' for its button html code now.
- Settings link is added to the TYCB plugin actions list at the Plugins page;
- Button exclusion shortcode [nothankyou] is added. When this shortcode is included to the post text 'Thank You' button is not shown for this post.
- Button position control at the plugin Settings page is changed to the list of checkboxes. So you can use those positions together not on the alternate base only as earlier.

= 1.2.01 =
* 10.11.2009
- bug when thanks send date and time was not updated is fixed;
- minor fixes for the translation files.

= 1.2. =
* 08.11.2009
- plugin menu item under Wordpress 'Settings' menu was renamed to 'Thanks CB' (abbreviation from 'Thank You Counter Button').
- admin dashboard widget to show posts with latest thanks is added.
- If IP-address checking is activated 'Thank You' button has no link for visitors who clicked it for this post already. So there are no more non-necessary requests to server.
- There are two tabs at the plugin page: Setting and Statistics.
  1) Options to not show 'Thank You' button for selected categories is added to the Settings page. Just check the categories in the list for which you don't want to show the 'Thank You' button.
  2) You can select from two options for IP-address checking: limit this IP forever or just on the time period in seconds you input.
  3) You can see how many 'Thanks' you have for every post and when last thanks for which post is left at the Statistics tab of the Settings page.

= 1.1.01 =
* 01.11.2009 French translation for the Settings page was added.

= 1.1 =
* 14.10.2009: 
- Settings page interface updated. Additions: button caption text style field including text color picker, 7 new rounded corner buttons, custom button image URL field. 
- Russian and Spanish translations were added.

= 1.0.02 =
* 09.10.2009 
- Ajax request answer and its processing enhancement. Some hosting providers automatically adds data to every http request answer, e.g. traffic tracking javascript code, etc. In such case part of that additional code was visible on the "Thank You" button just after the "Thanks" quant. Button caption and "thanks" quant is now properly tagged inside <thankyou></thankyou> tags and will be shown properly.

= 1.0.01 =
* 08.10.2009 
- Position shortcode [thankyou] bug fix. I documented [thankyou] shortcode but in the code [thanksyou] string was checked. Now it is fixed. Working shortcode to place "Thank You" button in the post by the 'shortcode' position is [thankyou].

= 1.0 =
* 06.10.2009 
- First stable release

== Additional Documentation ==
Additional documentation such as content filter hook list, available shortcodes description can be found at this link http://www.shinephp.com/thank-you-counter-button-wordpress-plugin/2/#filterhooks


You can find more information about "Thank You Counter Button" plugin at this page
http://www.shinephp.com/thank-you-counter-button-wordpress-plugin/

I am ready to answer on your questions about plugin usage. Use ShinePHP forum at
http://shinephp.com/community/forum/thank-you-counter-button
plugin page comments or site contact form for it please.
