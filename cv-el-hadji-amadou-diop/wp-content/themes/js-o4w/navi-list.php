				<?php if (is_home() ) : ?>
				<li class="home active"><a href="#"><?php _e('Home', 'js-o4w'); ?></a></li>
				<?php else : ?>
				<li class="home"><a href="<?php echo get_settings('home') ?>"><?php _e('Home', 'js-o4w'); ?></a></li>
				<?php endif; ?>
				<?php wp_list_pages('sort_column=post_title&title_li=&depth=1&')?>