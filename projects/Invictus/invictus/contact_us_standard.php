<?php
/**
 * Template Name: Contact Template Left Sidebar
 * The Contact Template file
 *
 * @package WordPress
 * @subpackage Invictus
 * @since Invictus 1.0
 */
wp_reset_query();

wp_enqueue_script('validation');

get_header(); 

	if(isset($_POST['button_contact_submit'])){
		
		// store some values
		$email = $_POST['contact_email'];
		$to = get_option_max('contact_email');
		$message  = stripslashes($_POST['contact_message']);
		$content_type="text/plain"; 
		
		// Clean the from data
        $from_array = preg_split("/[\r\n]+/is",trim($_POST['contact_name']),-1,PREG_SPLIT_NO_EMPTY); 
        $from = $from_array[0];				
		
		// smtp secure settings
		@ini_set("SMTP", $to);
		@ini_set("smtp_port", 25);
		@ini_set('sendmail_from', $email);
		
		// build the message	
		$msg  = "{$from} ({$email}) has sent you a contact request.\r\n";
		$msg .= "-----------------------------------------------------\r\n\r\n";
		$msg .= "{$message}\r\n";		
		
		// build the subject
		$subject = "[Contact Request] From ".$_POST['contact_name'];

		// build the headers
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: ' . $content_type . '; charset=UTF-8' . " \r\n";
		$headers .= 'From: ' . $_POST['contact_name'] . " <".$_POST['contact_email'].">\r\n";
		$headers .= 'X-Mailer: PHP/' . phpversion();
		$headers .= 'Reply-To: '.$email."\r\n";
		
		if(wp_mail(get_option_max('contact_email'), $subject, $msg, $headers)){
			$resultOk = "<div class=\"alert\"><p class=\"success\"><strong>". __( "Your message has been sent</strong>. Thank you for your request!","invictus" )."</p></div>";
		}else{
			$resultError = "<div class=\"alert\"><p class=\"error\">". __( "Message delivery failed! Please try again.","invictus") ."</p></div>";
		}		
		
	}	

?>
<div id="single-page" class="clearfix left-sidebar">

		<div id="primary">
			
			<header <?php post_class('entry-header'); ?> id="post-<?php the_ID(); ?>" >
			
				<h1 class="page-title"><?php the_title() ?></h1>
				
				<?php 
				// check if there is a excerpt
				if( max_get_the_excerpt() ){ 
				?>
				<h2 class="page-description"><?php max_get_the_excerpt(true) ?></h2>
				<?php } ?>
								
			</header>

			<div id="content" role="main" class="clearfix">		
				
				<?php the_content() ?>

				<div class="clearfix">
				
					<?php 
					// Display Infotext if enabled
					if( get_option_max('contact_show_text') == "true" ) { 
					?>
					<div class="contact-col">
						<h3>Contact Info</h3>
						<p><?php echo stripslashes( get_option_max('contact_info') ) ?></p>
					</div>
					<?php } ?>  
					                  
					<?php 
						// Display Company Infos if enabled
						if( get_option_max('contact_show_info') == "true" ) { 
					?>				
					<div class="contact-col">
						<h3><?php stripslashes( get_option_max('contact_info_header',true) )?></h3>
						<ul>
							<?php if ( get_option_max('contact_adress_1') != "" ) echo '<li>'. get_option_max('contact_adress_1') . '</li>' ?>
							<?php if ( get_option_max('contact_adress_2') != "" ) echo '<li>'. get_option_max('contact_adress_2') . '</li>' ?>
							<?php if ( get_option_max('contact_phone') != "" ) echo '<li>'. __('Phone','invictus') . ': '. get_option_max('contact_phone') . '</li>' ?>
							<?php if ( get_option_max('contact_fax') != "" ) echo '<li>'. __('Fax','invictus') . ': '. get_option_max('contact_fax') . '</li>' ?>
							<?php if ( get_option_max('contact_info_email') != "" ) echo '<li>'. __('eMail','invictus') . ': <a href="mailto:' . get_option_max('contact_info_email') . '">'. get_option_max('contact_info_email') . '</a></li>' ?>
						</ul>
					</div>	
					<?php } ?>
					
					<div class="contact-col contact-col-last">
					<?php if(!isset($resultOk)){ ?>
						<?php 
							if(isset($resultError)){
								echo($resultError);
							}
						?>				
							<form id="contactForm" action="<?php $_SERVER['PHP_SELF']?>" method="post">
								<ul>
									<li>
										<label><?php _e( "Your Name","invictus") ?>: <span class="required">*</span></label>
										<input name="contact_name" type="text" class="required requiredField" />
									</li>
									<li>
										<label><?php _e( "Your eMail","invictus") ?>: <span class="required">*</span></label>
										<input name="contact_email" type="text" class="required requiredField email" />
									</li>
									<li>
										<label><?php _e( "Your Message","invictus") ?>: <span class="required">*</span></label>
										<textarea name="contact_message" cols="50" rows="5" class="required requiredField "></textarea>
									</li>
									<li><button type="submit" name="button_contact_submit"><?php _e( "Send Message","invictus") ?></button></li>
								</ul>	
								<p><small><em>(*) <?php _e( "Required Fields","invictus") ?></em></small></p>
							</form>
					<?php } ?>
					<?php 
						if(isset($resultOk)){
							echo($resultOk);
						}
					?>				
					</div>
				</div>
				
			</div><!-- #content -->
		</div><!-- #primary -->
		
		<div id="sidebar">
			 <?php	/* Widgetised Area */	if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('sidebar-contact') ) ?>
		</div>		
		
</div>
<?php get_footer(); ?>