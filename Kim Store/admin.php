
<?php
include_once 'connect.php';
if(isset($_POST['ok']))
{
$x=$_POST['login'];
$z=$_POST['passwd'];
$req="select *from client where login='$x' and passwd='$z'";
$exe=mysql_query($req);
$nb=0;
if($nb=mysql_num_rows($exe)>0)
{
$user=mysql_fetch_array($exe);
$no=$client['nomclient'];
$pre=$client['pnomclient'];
$prof=$client['profil'];
session_start();
$_SESSION['nomclient']=$no;
$_SESSION['pnomclient']=$pre;
$_SESSION['profil']=$prof;
if($_SESSION['profil']=="administrateur")
header("location:indexad");
else
header("location:indexx.php");
}
}
?>

