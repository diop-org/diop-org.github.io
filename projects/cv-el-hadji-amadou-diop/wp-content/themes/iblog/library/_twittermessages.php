<?php if(function_exists('twitter_messages') && pagelines('twittername')):?>

<div class="twitter">
	 "<?php twitter_messages(pagelines('twittername'), 1, false, false, '', false, false, false); ?>" &mdash;&nbsp;<a href="http://www.twitter.com/<?php echo pagelines('twittername');?>"><?php echo pagelines('twittername');?></a>
</div>
<?php endif;?>