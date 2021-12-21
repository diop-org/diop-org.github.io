<?php

// session is here
 session_start();
//--------------

//Note - this is a demo thing.



 // admin user/pass change to fit your need.
$_Username = "admin";
$_Password = "admin";



// If the form was submitted
if ($_POST['Submitted'] == "True") {

    // If the username and password match up, then continue...
    if ($_POST['Username'] == $_Username && $_POST['Password'] == $_Password) {
        // Username and password matched, set them as logged in and set the
        // Username to a session variable.
        $_SESSION['Logged_In'] = "True";
        $_SESSION['Username'] = $_Username;
    }
}

// If they are NOT logged in then show the form to login...
if ($_SESSION['Logged_In'] != "True") {
    echo"<b>Please login:</b> <br>";
    echo "<form method=\"post\" action=\"" . $_SERVER['PHP_SELF'] . "\">
        Username: <input type=\"textbox\" name=\"Username\"><br />
        Password: <input type=\"password\" name=\"Password\"><br />
        <input type=\"hidden\" name=\"Submitted\" value=\"True\">
        <input type=\"Submit\" name=\"Login\">
    </form>";
}
else
{
    echo "You are logged in as: <b>" . $_SESSION['Username'] . "</b>
    <br /><a href=\"" . $_SERVER['PHP_SELF'] . "?mode=logout\">Logout</a>";
    echo "<br><br>";
///////////////////////////////////////////////////////////////////////////////////////
// put your script here

include("config.php");


//////////////load the news
include("config.php");
        //load all news from the database and then OREDER them by newsid
        //you will notice that newlly added news will appeare first.
        //also you can OREDER by (dtime) instaed of (news id)
        $result = mysql_query("SELECT * FROM news ORDER BY newsid DESC",$connect);
        //lets make a loop and get all news from the database
        while($myrow = mysql_fetch_array($result))
             {//begin of loop
               //now print the results:
               $i=$i + 1;
               echo "<b>$i- Title: ";
               echo $myrow['title'];
               echo "</b><br>";

               // Now print the options to (Read,Edit & Delete the news)
               echo "<a href=\"read_more.php?newsid=$myrow[newsid]\">Read More...</a>
                || <a href=\"edit_news.php?newsid=$myrow[newsid]\">Edit</a>
                 || <a href=\"delete_news.php?newsid=$myrow[newsid]\">Delete</a><br><hr>";
             }//end of loop
//end of loading the news
//_______________________________________________________________________//
// add news
  if($submit)
  {//begin of if($submit).
      // Set global variables to easier names
      $title = $_POST['title'];
      $text1 = $_POST['text1'];
      $text2 = $_POST['text2'];

              //check if (title) field is empty then print error message.
              if(!$title){  //this means If the title is really empty.
                     echo "Error: News title is a required field. Please fill it.";
                     exit(); //exit the script and don't do anything else.
              }// end of if

         //run the query which adds the data gathered from the form into the database
         $result = mysql_query("INSERT INTO news (title, dtime, text1, text2)
                       VALUES ('$title',NOW(),'$text1','$text2')",$connect);
          //print success message.
          echo "<b>Thank you! News added Successfully!<br>You'll be redirected to Home Page after (4) Seconds";
          echo "<meta http-equiv=Refresh content=4;url=index.php>";
  }//end of if($submit).


  // If the form has not been submitted, display it!
else
  {//begin of else

      ?>
      <br>
      <h3>::Add News</h3>

      <form method="post" action="<?php echo $PHP_SELF ?>">

      Title: <input name="title" size="40" maxlength="255">
      <br>
      Text1: <textarea name="text1"  rows="7" cols="30"></textarea>
      <br>
      Text2: <textarea name="text2" rows="7" cols="30"></textarea>
      <br>
      <input type="submit" name="submit" value="Add News">
      </form>
      <?
  }//end of else



// end of you script is here
////////////////////////////////////////////////////////////////////////////////////////
}
// If they want to logout then
if ($_GET['mode'] == "logout") {
    // Start the session
    session_start();
    // Put all the session variables into an array
    $_SESSION = array();
    // and finally remove all the session variables
    session_destroy();
    // Redirect to show results..
    echo "<META HTTP-EQUIV=\"refresh\" content=\"1; URL=" . $_SERVER['PHP_SELF'] . "\">";

}

// end auth 02



?>

