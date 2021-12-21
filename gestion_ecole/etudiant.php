<form name="form1" method="post" action="Inetudiant.php"><fieldset><legend>Etudiant</legend>
    <table width="303" border="1">
      <tr>
        <td>matricule</td><label>
          <input type="hidden" name="matricule">
        </label>
      </tr>
      <tr>
        <td>civilite</td>
		<td><select name="civilite">
<option>Mr </option>
<option>Mme </option>
<option>Mlle </option>
</select>
        
      </tr>
      <tr>
        <td>nom</td>
        <td><label>
          <input type="text" name="nom" id="nom">
        </label></td>
      </tr>
      <tr>
        <td>prenom</td>
        <td><label>
          <input type="text" name="prenom" id="prenom">
        </label></td>
      </tr>
      <tr>
        <td>adresse</td>
        <td><label>
          <input type="text" name="adr"id="adr">
        </label></td>
      </tr>
      <tr>
        <td>telephone</td>
        <td><label>
          <input type="text" name="telephone" id="telephone">
        </label></td>
      </tr>
      <tr>
        <td>email</td>
        <td><label>
          <input type="text" name="email" id="email">
        </label></td>
      </tr>
      <tr>
        <td>idclasse</td>
        <td>
		 <?php
include("connexion.php");
$req="select * from classe";
$exe=mysql_query($req);
echo " <select name=\"dep\">";
while($l=mysql_fetch_array($exe))
{
echo "<option value=".$l['idclasse'].">".$l['nom_classe']."</option>";
}
echo "</select>";
?>
		</td>
      </tr>
      <tr>
        <td>
		<label>
          <input type="submit" name="Submit" value="Envoyer">
        </label></td>
        <td><label>
          <input type="reset" name="Submit2" value="Annuler">
        </label></td>
      </tr>
    </table>
    <p>&nbsp;</p>
</fieldset>  
  <p>&nbsp;</p>
</form>

