<?php
$pt=150;
$pa=50;
$nb=10;
$paht=$pa*$nb;
$ptht=$pt*$nb;
echo "le prix hors taxe pour les armoires est de ".$paht."<br>";
if($paht>$ptht)
{
echo "le prix hors taxe des armoires est plus eleve,il s'eleve a".$paht."et celui des table a ".$ptht;
}
else
{
echo "le prix hors taxe des tables est plus eleve ,il s'eleve a ".$ptht." et celui des armoires a ".$paht;
}
?>