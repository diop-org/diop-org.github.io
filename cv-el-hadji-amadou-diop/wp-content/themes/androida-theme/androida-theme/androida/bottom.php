
   <div class="clear"></div>
 <div id="footop"> </div>

 <div id="footbar">
  

 
 <div class="barone">
				<h2 class="mc">Most Commented</h2>

	           <ul>
  
		 		<?php wp_list_categories('orderby=name&depth=1&show_count=0&title_li='); ?>

         </ul>
	

		
		</div>

 
 <div class="barone">
				<h2 class="rp">Recent Posts</h2>
		<ul>
	
			<?php
$myposts = get_posts('numberposts=10&offset=1');
foreach($myposts as $post) :
?>
<li><a href="<?php the_permalink(); ?>"><?php the_title();
?></a></li>
<?php endforeach; ?>
	
		</ul>
		
		</div>

  		
 
		<div class="bartwo" >

			<h2 class="rc">About us</h2>
		
	
<?php 
	$img = get_option('andro_img'); 
	$about = get_option('andro_about'); 
	?>		
<img src="<?php echo ($img); ?>"  alt="" />	

<p class="text">
<?php echo ($about); ?> 
</p>
		<div class="feed" >

	
<form action="http://www.feedburner.com/fb/a/emailverify" method="post" target="popupwindow" onsubmit="window.open('http://www.feedburner.com/fb/a/emailverifySubmit?feedId=<?php echo get_option('andro_feed'); ?>', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
<input type="text" class="input" value="Sign Up here for email feed..." onfocus="if (this.value == 'Sign Up here for email feed...') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Sign Up here for email feed...';}" name="email"/><input type="hidden" value="http://feeds.feedburner.com/~e?ffid=<?php echo get_option('andro_feed'); ?>" name="url"/>
<input type="submit" class="sbutton" value=""  />

</form>
	
		</div>
		
		</div>
	