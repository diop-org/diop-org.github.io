<?php
extract($_POST);
$z= implode(',' ,$option);
echo"Votre Matricule est: " .$matr ."<br>";
echo"Votre Nom est: " .$nom ."<br>";
echo"Votre Prénom est: " .$pnom ."<br>";
echo"Votre Sexe est: " .$sex ."<br>";
echo"Votre Pays est: " .$pays ."<br>";
echo"Votre Ville est: " .$ville ."<br>";
echo"Votre Service est: " .$serv ."<br>";
echo"Votre Loisirs est: " .$z ."<br>";
echo"Votre Commentaire est: " .$com ."<br>";
?> 