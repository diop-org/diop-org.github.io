<?php
require_once('../../../../../wp-config.php');

@header('Content-Type: ' . get_option('html_type') . '; charset=' . get_option('blog_charset'));

?>

<style>

body, td, textarea, input, select {
	line-height: 1.4em;
	color: #333;
	font-family: sans-serif;
	font-size: 13px;
}

a:link, a:visited { color: #21759B; text-decoration: none; }
a:hover, a:active { color: #d54e21; }

.max_style_alert { 
    display: block;
    border-width: 1px;
    border-style: solid;
    padding: 1.25em;
    margin: 0;
    -moz-border-radius: 3px;
    -khtml-border-radius: 3px;
    -webkit-border-radius: 3px;
    border-radius: 3px;
    background-color: #FFFFE0;
    border: 1px solid #E6DB55;
    line-height: 1.35em;
}
.max_style_alert h4 { margin: 0 0 5px; padding: 0; }

h1, h2, h3, h4, h5 { 
	font-family: Georgia,"Times New Roman","Bitstream Charter",Times,serif;
	font-weight: normal;
	margin: 0; padding: 0;
}

h2 { font-size: 24px; padding: 10px 0 5px; }
h3 { font-size: 19px; padding: 15px 0 0 }
h4 { font-size: 16px; padding: 15px 0 10px; color: #555; }

</style>
<div style="padding: 10px 30px">
	
	<img src="<?php echo get_template_directory_uri() . '/thumbnail.jpg'; ?>" align="left" alt="Invictus - A Premium Photographer Portfolio Theme by doitmax" width="80" height="80" style="margin: 10px 23px 0 0" />
	
	<h2><?php _e('Theme successfully activated!', MAX_SHORTNAME) ?></h2>
	<p><?php _e('Thank you for purchasing and activating my theme. You are now ready to start working with this theme and setup some general things, upload photos and create an awesome website.', MAX_SHORTNAME) ?></p>
	<h3><?php _e('But stop, wait a second...', MAX_SHORTNAME) ?></h3>
	<p><?php _e('...before you start working, please take some time to follow us on <strong><a href="http://www.facebook.com/pages/doitmax/120695808006003" target="_blank">facebook</a></strong> or <strong><a href="http://twitter.com/#!/doitmax" target="_blank">Twitter</a></strong> to instantly receive notifications about updates, new items on themeforest.net or other important things.', MAX_SHORTNAME) ?></p>	
	<h4><?php _e('Follow doitmax on facebook', MAX_SHORTNAME) ?></h4>
	<div id="fb-root"></div>
	<script>	
	(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) {return;}
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	<div class="fb-like-box" data-href="http://www.facebook.com/pages/doitmax/120695808006003" data-width="594" data-height="215" data-show-faces="true" data-stream="false" data-header="true"></div>
	<br />&nbsp;
	<h4>Follow doitmax on Twitter</h4>
	<p><a href="https://twitter.com/doitmax" class="twitter-follow-button">Follow @doitmax</a></p>
	<script src="//platform.twitter.com/widgets.js" type="text/javascript"></script>	
	<br />
	<div class="max_style_alert"><?php _e('If you need any help creating your website open the help file included in your downloaded ZIP package or check out our <a href="http://support.do-media.de/help/invictus/" target="_blank">online documentation</a>. Also feel free to leave a comment at <a href="http://themeforest.net/item/invictus-a-premium-photographer-portfolio-theme/discussion/180096?ref=doitmax" target="_blank">themeforest.net</a> to get in touch.', MAX_SHORTNAME) ?></div>	
	
	<p style="text-align: right"><a href="#" onClick="window.parent.tb_remove();"><?php _e('Skip those social gimmicks &raquo;', MAX_SHORTNAME) ?></a></p>
	
</div>