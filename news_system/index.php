<title>News----By: maaking.com</title>
<?php

//LAST UPDATE
// 27-09-2007


// load the configuration file.
include("config.php");
        //load all news from the database and then OREDER them by newsid
        //you will notice that newlly added news will appeare first.
        //also you can OREDER by (dtime) instaed of (news id)
        $result = mysql_query("SELECT * FROM news ORDER BY newsid DESC",$connect);
        //lets make a loop and get all news from the database
        while($myrow = mysql_fetch_array($result))
             {//begin of loop
               //now print the results:
               echo "<b>Title: ";
               echo $myrow['title'];
               echo "</b><br>On: <i>";
               echo $myrow['dtime'];
               echo "</i><hr align=left width=160>";
               echo $myrow['text1'];
               // Now print the options to (Read,Edit & Delete the news)
               echo "<br><a href=\"read_more.php?newsid=$myrow[newsid]\">Read More...</a>
                || <a href=\"edit_news.php?newsid=$myrow[newsid]\">Edit</a>
                 || <a href=\"delete_news.php?newsid=$myrow[newsid]\">Delete</a><br><hr>";
             }//end of loop
?>
<!-- here you have the right to go Home or Add News. It's HTML not PHP -->
<br><br>
<a href=index.php>Home</a> <a href=add_news.php>Add News</a>

