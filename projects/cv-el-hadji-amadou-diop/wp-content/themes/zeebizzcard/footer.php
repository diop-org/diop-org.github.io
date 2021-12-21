			<div id="footer">
				<?php 
					$options = get_option('themezee_options');
					if ( isset($options['themeZee_general_footer']) and $options['themeZee_general_footer'] <> "" ) { 
						echo wp_kses_post($options['themeZee_general_footer']); } 
				?>
				<div class="credit_link"><a href="<?php echo THEMEZEE_INFO; ?>"><?php _e('Designed by PAPISMATIQUE', 'themezee_lang'); ?></a></div>
				<div class="clear"></div>
<p>Notre site  est listé dans la catégorie  de l'annuaire <a href="http://www.webrankinfo.com/"><img src="http://www.webrankinfo.com/images/wri/webrankinfo-80-15.png" title="WebRankInfo" width="80" height="15" alt="Actualites du referencement" /></a></p>
<a title="Add URL to Google and Yahoo search" href="http://websitesubmit.hypermart.net"><img src="http://websitesubmit.hypermart.net/b.gif" alt="free search engine website submission top optimization" border=0 height=31 width=88></a>
<p><a title="Annuaire pour le Référencement Google" href="http://annuaire.yagoort.org">Annuaire Webmaster</a></p>
<a href="http://01buzz.fr" title="buzz">buzz</a>

			</div>
		</div>
<?php wp_footer(); ?>
	</div>
	