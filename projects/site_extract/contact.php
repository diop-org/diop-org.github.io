    <?php
/* Set e-mail recipient */
$myemail  = "xxxxxx@gmail.com";

/* Check all form inputs using check_input function */
$yourname = check_input($_POST['name']);
$email    = check_input($_POST['email']);
$telephone  = check_input($_POST['telephone']);
$messaage  = check_input($_POST["message"]);


/* If e-mail is not valid show error message */
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
{
    show_error("E-mail address not valid");
}

/* Let's prepare the message for the e-mail */
$subject ="Comment received from website";
$content = "Hello!

The contact form from the website has been submitted by:

Name: $yourname
E-mail: $email
Telephone: $telephone
Message:$message

";

/* Send the message using mail() function */
mail($myemail, $subject, $content);

/* Redirect visitor to the thank you page */
header('Location: thanks.html');
exit();

/* Functions we used */
function check_input($data, $problem='')
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    if ($problem && strlen($data) == 0)
    {
        show_error($problem);
    }
    return $data;
}

function show_error($myError)
{
?>
    <html>
    <body>

    <b>Please correct the following error:</b><br />
    <?php echo $myError; ?>

    </body>
    </html>
<?php
exit();
}
?>