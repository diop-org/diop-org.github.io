<div id="sidebar">

<?php $td_checksocial = get_option('td_checksocial'); if($td_checksocial): ?>
	<div id="subscribe-bar">
		<div id="social-links">
			<ul id="subscribe">
				<li class="rss"><a href="http://feeds2.feedburner.com/<?php $td_rssfeed = get_option('td_rssfeed'); echo stripslashes($td_rssfeed); ?>">RSS</a></li>
				<li class="emailsubs"><a href="http://feedburner.google.com/fb/a/mailverify?uri=<?php $td_email = get_option('td_email'); echo stripslashes($td_email); ?>&loc=en_US">Email</a></li>
				<li class="facebook"><a href="http://www.facebook.com/<?php $td_facebook = get_option('td_facebook'); echo stripslashes($td_facebook); ?>">Facebook</a></li>
				<li class="twitter"><a href="http://twitter.com/<?php $td_twitter = get_option('td_twitter'); echo stripslashes($td_twitter); ?>">Twitter</a></li>
				<li class="google"><a href="http://fusion.google.com/add?feedurl=http://feeds2.feedburner.com/<?php $td_rssfeed = get_option('td_rssfeed'); echo stripslashes($td_rssfeed); ?>">Google</a></li>
				<li class="delicious"><a href="http://delicious.com/<?php $td_delicious = get_option('td_delicious'); echo stripslashes($td_delicious); ?>">Delicious</a></li>
			</ul>
		</div> <!-- #social-links -->
	</div> <!-- #subscribe-bar -->
<?php endif; ?>

	<?php $td_check125 = get_option('td_check125'); if($td_check125): ?>
		<div id="ads-box">
			<a href="<?php $td_ad1link = get_option('td_ad1link'); echo stripslashes($td_ad1link); ?>" rel="nofollow" target="_blank"><img src="<?php $td_ad1path = get_option('td_ad1path'); echo stripslashes($td_ad1path); ?>" alt="advertisment" width="125" height="125"/></a>
			<a href="<?php $td_ad2link = get_option('td_ad2link'); echo stripslashes($td_ad2link); ?>" rel="nofollow" target="_blank"><img src="<?php $td_ad2path = get_option('td_ad2path'); echo stripslashes($td_ad2path); ?>" alt="advertisment" width="125" height="125"/></a>
			<a href="<?php $td_ad3link = get_option('td_ad3link'); echo stripslashes($td_ad3link); ?>" rel="nofollow" target="_blank"><img src="<?php $td_ad3path = get_option('td_ad3path'); echo stripslashes($td_ad3path); ?>" alt="advertisment" width="125" height="125"/></a>
			<a href="<?php $td_ad4link = get_option('td_ad4link'); echo stripslashes($td_ad4link); ?>" rel="nofollow" target="_blank"><img src="<?php $td_ad4path = get_option('td_ad4path'); echo stripslashes($td_ad4path); ?>" alt="advertisment" width="125" height="125"/></a>
		</div> <!-- #ads-box-->
	<?php endif; ?>

	<div class="sidebar-wrap">
		<?php 	/* Widgetized sidebar, if you have the plugin installed. */
					if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar') ) : ?>
		<?php endif; ?>
	</div> <!-- .sidebar-wrap -->
<div class="clear"></div>
</div> <!-- #sidebar -->
