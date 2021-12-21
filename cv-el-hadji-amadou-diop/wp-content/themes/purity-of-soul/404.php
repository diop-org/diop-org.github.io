<?php get_header() ?>

	<div id="main-content">
		<div id="post-0" class="content-box post error404 not-found">
			<h3 class="entry-title">Error 404 - Page Not Found</h3>
			<div class="entry-content">
				<p>Apologies, but we were unable to find what you were looking for.</p>
				<p>This has most likely accours by one of the following reason :</p>
				<ul>
					<li>An idiot has passed you the wrong link</li>
					<li>Maybe an other site has linked in our site to a page that not exist</li>
					<li>Maybe one of our idiots has deleted the page you are looking for</li>
					<li>Maybe you missed type the address of the page your looking for, but i'am sure you wouldn't want to admit that</li>
				</ul>
				<p>So to fix that, You can search again by using <a href="#searchform-404">this form</a>...</p>
				<form id="searchform-404" class="blog-search clearfix" method="get" action="<?php bloginfo('home') ?>">
					<p><input id="s-404" name="s" class="text" type="text" value="<?php the_search_query() ?>" size="40" /><input class="submit" type="submit" value="Search" /></p>
				</form>
			</div>

		</div>
	</div>

<?php get_sidebar() ?>
		
<?php get_footer() ?>

