</div><!--general ends-->

<div class="clear"></div>

<div id="xfoot">


<div id="higher-foot">


<div id="calendar">
<?php get_calendar(); ?>
</div><!--calendar ends-->



<div id="meta">
<h2>Meta</h2>

<ul>
<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<li><a href="http://validator.w3.org/check/referer" rel="nofollow" title="This page validates as XHTML 1.0 Transitional">Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a></li>
					<li><a href="http://gmpg.org/xfn/" rel="nofollow"><abbr title="XHTML Friends Network">XFN</abbr></a></li>
					<li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></li>
</ul>
 </div> <!--meta ends-->



<div id="blogroll">
<?php wp_list_bookmarks('before=<div class="links"><li>&after=</li></div>'); ?>
</div>


<div id="recent">
<h2>Recent posts</h2>
<ul><?php wp_get_archives('type=postbypost&limit=15&format=html'); ?></ul>
</div>

</div><!--higher-foots ends-->

<div class="clear"></div>



<div id="footer">
<img src="<?php bloginfo('template_url'); ?>/img/line.png" alt="bottom line image separator s3" width="900" height="1" /><br /><br />
&copy; <?php echo date("Y"); ?> <?php bloginfo('name'); ?> | Powered by WordPress &amp; <a href="http://www.diaboliquedesign.com" target="_blank">Diabolique Design</a>
</div><!--footer ends-->


</div><!--xfoot ends-->
</div><!--container ends-->
</div><!--main ends-->

<?php wp_footer(); ?>
</body>
</html>