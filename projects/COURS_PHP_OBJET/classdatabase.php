<?php
class DB
{
	function connexion()
	{
		$link=mysql_connect('127.0.0.1','root','') or die ("Impossible de se connecter");
		mysql_select_db("aero") or die ("Base inexistante");
		return($link);
	}
	function ExecuteSQL($requete,$link)
	{
		$result=mysql_query($requete,$link) or die (mysql_error());
		return($result);
	}
	function FetchLigne($result)
	{
		return mysql_fetch_array($result);
	}
	function NLigne($result)
	{
		return mysql_num_rows($result);
	}
	function LigneAffect($result)
	{
		return mysql_affected_rows($result);
	}
	
}
?>
	