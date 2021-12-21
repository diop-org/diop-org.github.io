   <ul><?php
   $query = get_comments( 'type=comment&status=approve&number=' . $count );
   foreach( $query as $comm ) : ?>

    <li>
	 <?php echo get_avatar( $comm, mframe_option( 'thumb-small-w' ), '', $comm->comment_author ); ?>

     <div class="title"><a href="<?php echo get_permalink($comm->comment_post_ID); ?>#comment-<?php echo($comm->comment_ID); ?>" title="<?php echo($comm->comment_author); ?> on <?php echo get_the_title($comm->comment_post_ID); ?>"><?php comment_excerpt($comm->comment_ID); ?></a></div>
     <span class="date"><?php echo human_time_diff(get_comment_date('U', $comm->comment_ID), current_time('timestamp')) . ' ago'; ?></span>
     <span class="author">By <?php echo ($comm->comment_author); ?></span>
    </li><?php endforeach; ?>
   </ul>