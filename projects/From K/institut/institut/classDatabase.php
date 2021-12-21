
<?php

class DB
{
public function connexion()
	
{
	
$link=mysql_connect('localhost','root','');
	
mysql_select_db('institut');
	
return $link;
	
}
	
public function executeSQL($req,$link)
{

$res=mysql_query($req,$link);
return $res;

	}

public function Nlignes($res)
{

return mysql_fetch_array($res);
	
}

}
?>

