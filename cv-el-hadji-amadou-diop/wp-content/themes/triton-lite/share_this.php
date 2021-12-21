<div class="share_this">
           
            <div class="social_buttons">
                <div class="lgn_fb">
                <a href="http://facebook.com/share.php?u=<?php the_permalink() ?>&amp;amp;t=<?php echo urlencode(the_title('','', false)) ?>" title="Share <?php _e('this post on Facebook', 'triton');?>">facebook</a>
                </div>
                <div class="lgn_twt">
                <a href="http://twitter.com/home?status=Reading: <?php the_title(); ?> <?php the_permalink();?>" title="Tweet <?php _e('this post', 'triton'); ?>">Twitter</a>
                </div>
                <div class="lgn_del">
				<a title="<?php _e('Submit to', 'triton'); ?> Delicious" href="http://del.icio.us/post?url=<?php the_permalink() ?>&title=<?php echo urlencode(the_title('','', false)) ?>">del.icio.us</a>
                </div>
                <div class="lgn_digg">
                <a href="http://digg.com/submit?phase=2&amp;amp;url=<?php the_permalink() ?>&amp;amp;title=<?php echo urlencode(the_title('','', false)) ?>" title="Digg <?php _e('this post', 'triton'); ?>">digg</a>
                </div>
                <div class="lgn_stmbl">
                <a title="Stumble <?php _e('This', 'triton'); ?>" href="http://www.stumbleupon.com/submit?url=<?php the_permalink(); ?>&title=<?php echo urlencode(the_title('','', false)) ?>">stumbleupon</a>
                </div>
            </div>
            
</div>