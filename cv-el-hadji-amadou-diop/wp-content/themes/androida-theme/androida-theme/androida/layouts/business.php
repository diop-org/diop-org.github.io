<script type="text/javascript">

featuredcontentglider.init({
	gliderid: "glidercontent",
	contentclass: "glidecontent",
	togglerid: "togglebox",
	remotecontent: "", 
	selected: 0,
	persiststate: true,
	speed: 500,
	direction: "leftright", 
	autorotate: true, 
	autorotateconfig: [10000, 1] //if auto rotate enabled, set [milliseconds_btw_rotations, cycles_before_stopping]
})


</script>

<div id="glidercontent" class="glidecontentwrapper">
<div id="togglebox" class="glidecontenttoggler"> 
<a href="#" class="prev"></a> 
<a href="#" class="next"></a>
</div>
<?php 
	$glidecat = get_option('andro_gldcat'); 
	$my_query = new WP_Query('category_name= '. $glidecat .'&showposts= 3');
while ($my_query->have_posts()) : $my_query->the_post();$do_not_duplicate = $post->ID;
?>
<div class="glidecontent">
<div class="glidim">
<?php $gallery = get_post_meta($post->ID, 'gallery', $single = true); ?>
<img src="<?php bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php echo $gallery; ?>&amp;h=300&amp;w=350&amp;zc=1" alt=""/> </a>
</div>
<h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
<?php if(function_exists('the_content_limit')) { ?>
<?php the_content_limit(750);  ?>
<?php } else { ?>
<p> Activate the limitpost plugin to see the post contents ! </p>
<?php } ?> 
</div>
<?php endwhile; ?>
</div>
<div class="glidebot"></div>
<div class="clear"></div>
<div id="miniblock">
<div class="minipost">
<?php 
	$minicat1 = get_option('andro_mini_category1'); 
	$my_query = new WP_Query('category_name= '. $minicat1 .'&showposts=1');
while ($my_query->have_posts()) : $my_query->the_post();$do_not_duplicate = $post->ID;
?>
<div class="hentry">
<h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
<?php $gallery = get_post_meta($post->ID, 'gallery', $single = true); ?>
<img src="<?php bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php echo $gallery; ?>&amp;h=120&amp;w=295&amp;zc=1" alt=""/> </a>
<?php if(function_exists('the_content_limit')) { ?>
<?php the_content_limit(600);  ?>
<?php } else { ?>
<p> Activate the limitpost plugin to see the post contents ! </p>
<?php } ?> 
</div>
<div class="postmore"> <a href="<?php the_permalink() ?>">Read More</a></div>
<?php endwhile; ?>
</div>
<div class="minipost">
<?php 
	$minicat2 = get_option('andro_mini_category2'); 
	$my_query = new WP_Query('category_name= '. $minicat2 .'&showposts=1');
while ($my_query->have_posts()) : $my_query->the_post();$do_not_duplicate = $post->ID;
?>
<div class="hentry">
<h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
<?php $gallery = get_post_meta($post->ID, 'gallery', $single = true); ?>
<img src="<?php bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php echo $gallery; ?>&amp;h=120&amp;w=295&amp;zc=1" alt=""/> </a>
<?php if(function_exists('the_content_limit')) { ?>
<?php the_content_limit(600);  ?>
<?php } else { ?>
<p> Activate the limitpost plugin to see the post contents ! </p>
<?php } ?> 
</div>
<div class="postmore"> <a href="<?php the_permalink() ?>">Read More</a></div>
<?php endwhile; ?>
</div>
<div class="minipost">
<?php 
	$minicat3 = get_option('andro_mini_category3'); 
	$my_query = new WP_Query('category_name= '. $minicat3 .'&showposts=1');
while ($my_query->have_posts()) : $my_query->the_post();$do_not_duplicate = $post->ID;
?>
<div class="hentry">
<h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
<?php $gallery = get_post_meta($post->ID, 'gallery', $single = true); ?>
<img src="<?php bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php echo $gallery; ?>&amp;h=120&amp;w=295&amp;zc=1" alt=""/> </a>
<?php if(function_exists('the_content_limit')) { ?>
<?php the_content_limit(600);  ?>
<?php } else { ?>
<p> Activate the limitpost plugin to see the post contents ! </p>
<?php } ?> 
</div>
<div class="postmore"> <a href="<?php the_permalink() ?>">Read More</a></div>
<?php endwhile; ?>
</div>
</div>