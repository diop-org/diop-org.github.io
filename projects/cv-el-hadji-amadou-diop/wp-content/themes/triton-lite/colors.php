<?php $option =  get_option('trt_options'); ?>
<style type="text/css">
.pattern{background: url(<?php echo get_template_directory_uri(); ?>/images/<?php echo $option['trt_patterns'] ?>.png) repeat;}

/*POSTS Colors*/
#posts, body, .comment-body, #sidebar .widgets ul li a, #respond, .lay1 .post .post_content, .lay1 .page .post_content, .single_page_post .post_wrap .share_this a, .commentlist .comment-meta a, .commentlist .comment-meta a:hover{color:#<?php echo $option['trt_primtxt_color'] ?>;}

</style>