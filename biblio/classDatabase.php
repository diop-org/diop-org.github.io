<?php
class DB
{
function connexion()
{
$link=mysql_connect('localhost','root','')or die("Impossible de se connecter");
mysql_select_db("biblio")or die("Probleme de connexion");
return($link);
}
function ExecuteSQL($requete,$link)
{
$result=mysql_query($requete,$link)or die(mysql_error());
return($result);
}
function FetchLigne($result)
{
return mysql_fetch_array($result);
}
function NLignes($result)
{
return mysql_num_rows($result);
}
function LignesAffect($result)
{
return mysql_affected_rows($result);
}
function Fermer()
{
return mysql_close();
}
}
?>
