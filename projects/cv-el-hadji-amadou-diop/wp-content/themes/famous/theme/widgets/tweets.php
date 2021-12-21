<?php if( !defined( 'twitter-' . $user )) : ?>

   <script type="text/javascript">

	jQuery(document).ready(function($)
	{
		$(".twitter-<?php echo $user; ?>").tweet({
			username: "<?php echo $user; ?>",
			count: <?php echo $count; ?>,
			loading_text: ' ',
			join_text: "auto",
			auto_join_text_default: "we said,",
			auto_join_text_ed: "",
			auto_join_text_ing: "",
			auto_join_text_reply: "",
			auto_join_text_url: ""
		});
	})

   </script><?php define('twitter-' . $user, 1); endif; ?>

   <div class="js_disabled">
    <p>Javascript needs to be installed to view the twitterfeed. <a href="http://www.java.com/en/download/manual.jsp">Get Javacript</a></p>
   </div>
   <div class="js_enabled">
    <div class="tweet twitter-<?php echo $user; ?>"></div>
   </div>