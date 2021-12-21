<div id="sidebar" class="column grid_4">
	<aside>
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar') ) : ?>
		<section>
			<div>

				<h2>This Sidebar is Widgetized</h2>
				<article>
					<p>Add some widgets to get started</p>
				</article>
                                
			</div>
		</section>
	<?php endif; ?>	
	</aside>
</div>