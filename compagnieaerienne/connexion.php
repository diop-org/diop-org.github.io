<?php
class DB
{
public function connexion()
    {
$link=mysql_connect('localhost','root','');
$req=mysql_select_db('compagnieaerienne');
return $link;
}
public function executeSQL($req,$link)
 { 
$res= mysql_query($req,$link) or die(mysql_error());
return $res;
}
public function Nlignes($res)
  {
    return mysql_fetch_array($res);
}
 public function  Nlignes1($res)
    {
      return mysql_fetch_row($res);
    }
}

?>
