<?php
$texte="Le corbeau et le renard.
Ma�tre Corbeau, sur un arbre perch�,
Tenait en son bec un fromage.
Ma�tre Renard, par l'odeur all�ch�,
Lui tint � peu pr�s ce langage :";
echo "Nombre de caract�re : ".strlen($texte)."<br/>";
echo "Nombre de mot : ".str_word_count($texte)."<br/>";
$x=0;
while($x<strlen($texte))
{
echo "\\".substr($texte,$x,10)."<br/>";
$x=$x+10;
}
?>