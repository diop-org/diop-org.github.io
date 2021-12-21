<?php
/**
 * Template Name: Contact Us Template
 */
?>
<?php
$nameError='';
$emailError='';
$commentError='';
if(isset($_POST['submitted'])) {
	if(trim($_POST['contactName']) === '') {
		$nameError = 'Please enter your name.';
		$hasError = true;
	} else {
		$name = trim($_POST['contactName']);
	}
	if(trim($_POST['email']) === '')  {
		$emailError = 'Please enter your email address.';
		$hasError = true;
	} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
		$emailError = 'You entered an invalid email address.';
		$hasError = true;
	} else {
		$email = trim($_POST['email']);
	}
	if(trim($_POST['comments']) === '') {
		$commentError = 'Please enter a message.';
		$hasError = true;
	} else {
		if(function_exists('stripslashes')) {
			$comments = stripslashes(trim($_POST['comments']));
		} else {
			$comments = trim($_POST['comments']);
		}
	}
	if(!isset($hasError)) {
		$emailTo = get_option('tz_email');
		if (!isset($emailTo) || ($emailTo == '') ){
			$emailTo = get_option('admin_email');
		}
		$subject = '[PHP Snippets] From '.$name;
		$body = "Name: $name \n\nEmail: $email \n\nComments: $comments";
		$headers = 'From: '.$name.' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;
		mail($emailTo, $subject, $body, $headers);
		$emailSent = true;
	}
} ?>
<?php get_header(); ?>
<div class="grid_16 alpha">
  <div class="content">
    <div class="content-info">
      <?php if (function_exists('inkthemes_breadcrumbs')) inkthemes_breadcrumbs(); ?>
      <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
      <h2>
        <?php the_title(); ?>
      </h2>
      <div class="dotted_line"></div>
      <?php endwhile;?>
    </div>
    <div class="contact">
      <!--Start Contact Form-->
      <div class="contact-form">
        <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
        <?php if(isset($emailSent) && $emailSent == true) { ?>
        <div class="thanks">
          <p>Thanks, your email was sent successfully.</p>
        </div>
        <?php } else { ?>
        <?php if(isset($hasError) || isset($captchaError)) { ?>
        <p class="error">Sorry, an error occured.
        <p>
          <?php } ?>
        <form action="<?php the_permalink(); ?>" class="contactForm" method="post">
          <label for="contactName">Your Name: *</label>
          <br/>
          <input type="text" name="contactName" id="contactName" value="<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>" class="required requiredField" />
          <br/>
          <?php if($nameError != '') { ?>
          <span class="error"> <?php echo $nameError;?> </span>
          <?php } ?>
          <label for="email">Your Email: *</label>
          <br/>
          <input type="text" name="email" id="email" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>" class="required requiredField email" />
          <br/>
          <?php if($emailError != '') { ?>
          <span class="error"> <?php echo $emailError;?> </span>
          <?php } ?>
          <label for="commentsText">Your Message: *</label>
          <br/>
          <textarea name="comments" id="commentsText" rows="20" cols="30" class="required requiredField"><?php if(isset($_POST['comments'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['comments']); } else { echo $_POST['comments']; } } ?>
</textarea>
          <br/>
          <?php if($commentError != '') { ?>
          <span class="error"> <?php echo $commentError;?> </span>
          <?php } ?>
          <input class="send" type="submit" value="Send Email">
          </input>
          <input type="hidden" name="submitted" id="submitted" value="true" />
        </form>
        <?php } ?>
        <!-- End the Loop. -->
      </div>
      <!--End Contact Form-->
    </div>
    <?php the_content(); ?>
    <?php endwhile;?>
    <!--End Post-->
    <div class="clear"></div>
    <!--End Content Wrapper-->
  </div>
</div>
<!--Start Sidebar-->
<?php get_sidebar(); ?>
<!--End Sidebar-->
<div class="clear"></div>
<div class="hr_big"></div>
<!--End Content Wrapper-->
</div>
<div class="clear"></div>
<!--End Main_wrapper-->
<?php get_footer(); ?>