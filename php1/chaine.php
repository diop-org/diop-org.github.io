<?php
$texte="Le corbeau et le renard.
Maître Corbeau, sur un arbre perché,
Tenait en son bec un fromage.
Maître Renard, par l'odeur alléché,
Lui tint à peu près ce langage :";
echo "Nombre de caractère : ".strlen($texte)."<br/>";
echo "Nombre de mot : ".str_word_count($texte)."<br/>";
$x=0;
while($x<strlen($texte))
{
echo "\\".substr($texte,$x,10)."<br/>";
$x=$x+10;
}
?>