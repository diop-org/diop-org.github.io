<?php
/*
Template Name: Contact Page
*/
?>
<?php get_header(); ?>
<?php
if($_POST[sent]){
	$error = "";
	if(!trim($_POST[your_name])){
		$error .= "<p>Please enter your name</p>";
	}
	if(!filter_var(trim($_POST[your_email]),FILTER_VALIDATE_EMAIL)){
		$error .= "<p>Please enter a valid email address</p>";
	}                        
	if(!trim($_POST[your_message])){
		$error .= "<p>Please enter a message</p>";
	}
	if(!$error){
		$email = wp_mail(get_option("admin_email"),trim($_POST[your_name])." sent you a message from ".get_option("blogname"),stripslashes(trim($_POST[your_message])),"From: ".trim($_POST[your_name])." <".trim($_POST[your_email]).">\r\nReply-To:".trim($_POST[your_email]));
	}
}
?>
	<!--Content-->
    <div id="content">
        
        <!--POSTS-->
        <div id="posts">

          <!--THE POST-->
            <?php if(have_posts()): ?><?php while(have_posts()): ?><?php the_post(); ?>
                <div <?php post_class(); ?> id="post-<?php the_ID(); ?>"> 
                 
                   <div class="post_content">
                    <h2 class="postitle"><a href="<?php the_permalink();?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
 
            <div class="entry-content">
                        <?php if($email){ ?>
                            <p><strong><?php _e('Message succesfully sent. We will reply as soon as we can.', 'scylla'); ?></strong></p>
                        <?php } else { if($error) { ?>
                            <p><strong><?php _e("Your messange hasn't been sent.", "scylla"); ?></strong><p>
                            <?php echo $error; ?>
                        <?php } else { the_content(); } ?>
                            <form action="<?php the_permalink(); ?>" id="contactForm" method="post">
                                <input type="hidden" name="sent" id="sent" value="1" />
                                <div class="contact_wrap">
                                    <p>
                                        <label for="your_name"><?php _e("Name", "scylla"); ?></label>
                                        <input type="text" name="your_name" id="your_name" class="required" value="<?php echo $_POST[your_name];?>" />
                                    </p>
                                    <p>
                                        <label for="your_email"><?php _e("Email", "scylla"); ?></label>
                                        <input type="text" name="your_email" id="your_email" class="required" value="<?php echo $_POST[your_email];?>" />
                                    </p>
                                    <p>
                                        <label for="your_message"><?php _e("Message:", "scylla"); ?></label>
                                        <textarea name="your_message" class="required" id="your_message"><?php echo stripslashes($_POST[your_message]); ?></textarea>
                                    </p>
                                    <p>
                                        <input id="submit_msg" type="submit" name = "send" value = "Send" />
                                    </p>
                                </div>
                            </form>
                            <?php } ?>
                        </div>
                        
                        
                </div> 
                
                    <!--Post Footer-->
                    <div class="edit"><?php edit_post_link(); ?></div>
                    <?php if (get_comments_number()==0) { ?>
                    <?php } else { ?>
                    <div class="post_foot">
                        
                        <div class="block_comm"><?php if (!empty($post->post_password)) { ?>
                    <?php } else { ?><div class="comments"><?php comments_popup_link('0 <span>Comm</span>', '1 <span>Comm</span>', '% <span>Comm</span>', '', __('Off')); ?></div><?php } ?></div>
                   
                   </div>
                   <?php }?>
                   
           		</div>
                <?php endwhile ?>
            <?php endif ?>     
            
        </div>
        
    </div>
    
    <!--Sidebar-->
    <div id="sidebar">
        <div class="widgets"><ul>          
        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar') ) : ?> 
        <?php endif; ?></ul>
        </div>

    </div>
    
<?php get_footer(); ?>