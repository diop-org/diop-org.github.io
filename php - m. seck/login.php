<?php
include("connection/connexion.php");
if(isset($_POST)&&!empty($_POST['login'])&&!empty($_POST['pass']))
{
extract($_POST);
$req="select pass from user where login='".$login."'";
$exe=mysql_query($req)or die('Error SQL!<br>'.$req.'<br>'.mysql_error());
$data=mysql_fetch_assoc($exe);
if($data['pass']!=$pass)
{
echo"<p>Mauvais login</p>";
include("index1.html");
exit;
}
else
{
$_SESSION['login']=$login;
include("menu.html");
}}
else
{
echo"Vous avez oublie de remplir un champ";
include("index2.html");
mysql_close();
}
?>
