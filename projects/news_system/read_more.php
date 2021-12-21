<title>News Details...</title>
<?php

//LAST UPDATE
// 27-09-2007

include("config.php");

        $newsid = $_GET['newsid'];
        
        $result = mysql_query("SELECT * FROM news WHERE newsid='$newsid' ",$connect);
        while($myrow = mysql_fetch_assoc($result))
             {
                     echo "<b>";
                     echo $myrow['title'];
                     echo "</b><br>On: <i>";
                     echo $myrow['dtime'];
                     echo "</i><hr>";
                     echo $myrow['text1'];
                     echo " ";
                     echo $myrow['text2'];
                     echo "<br><br><a href=\"javascript:self.history.back();\"><-- Go Back</a>";
             }
?>
