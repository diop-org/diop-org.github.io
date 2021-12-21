
<?php
include_once 'connex.php';
if(isset($_POST['ok']))
{
$x=$_POST['login'];
$z=$_POST['motdepasse'];
$req="select *from user where login='$x' and password='$z'";
$exe=mysql_query($req);
$nb=0;
if($nb=mysql_num_rows($exe)>0)
{
$user=mysql_fetch_array($exe);
$no=$user['Nomuser'];
$pre=$user['prenuser'];
$prof=$user['profil'];
session_start();
$_SESSION['Nomuser']=$no;
$_SESSION['prenuser']=$pre;
$_SESSION['profil']=$prof;
if($_SESSION['profil']=="Administrateur")
header("location:administrateur.php");
else
header("location:Utilisateur.php");
}
}
?>

