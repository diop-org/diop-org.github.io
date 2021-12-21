<?php
$texte="Le corbeau et le renard.
Maître Corbeau, sur un arbre perché,
Tenait en son bec un fromage.
Maître Renard, par l'odeur alléché,
Lui tint à peu près ce langage :
\" Hé ! bonjour, Monsieur du Corbeau,
Que vous êtes joli ! que vous me semblez beau !
Sans mentir, si votre ramage
Se rapporte à votre plumage,
Vous êtes le phénix des hôtes de ces bois. \"
A ces mots le Corbeau ne se sent pas de joie ;
Et pour montrer sa belle voix,
Il ouvre un large bec, laisse tomber sa proie.
Le Renard s'en saisit, et dit : \" Mon bon Monsieur,
Apprenez que tout flatteur Vit aux dépens de celui qui l'écoute :
Cette leçon vaut bien un fromage, sans doute.
\" Le Corbeau, honteux et confus,
Jura, mais un peu tard, qu'on ne l'y prendrait plus.";
$x=0;
while(substr($texte,$x,1)!=".")
{
$x=$x+1;
}
echo "Le nombre de caractère du titre est : ".($x+1)."caractère";
?>