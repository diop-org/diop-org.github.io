<?php
$texte="Le corbeau et le renard.
Ma�tre Corbeau, sur un arbre perch�,
Tenait en son bec un fromage.
Ma�tre Renard, par l'odeur all�ch�,
Lui tint � peu pr�s ce langage :
\" H� ! bonjour, Monsieur du Corbeau,
Que vous �tes joli ! que vous me semblez beau !
Sans mentir, si votre ramage
Se rapporte � votre plumage,
Vous �tes le ph�nix des h�tes de ces bois. \"
A ces mots le Corbeau ne se sent pas de joie ;
Et pour montrer sa belle voix,
Il ouvre un large bec, laisse tomber sa proie.
Le Renard s'en saisit, et dit : \" Mon bon Monsieur,
Apprenez que tout flatteur Vit aux d�pens de celui qui l'�coute :
Cette le�on vaut bien un fromage, sans doute.
\" Le Corbeau, honteux et confus,
Jura, mais un peu tard, qu'on ne l'y prendrait plus.";
$x=0;
while(substr($texte,$x,1)!=".")
{
$x=$x+1;
}
echo "Le nombre de caract�re du titre est : ".($x+1)."caract�re";
?>