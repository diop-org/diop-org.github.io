<form name="form1" method="post" action="INSlivre.php">
  <fieldset><legend>LIVRE</legend>
 
  <table width="200" border="1">
    <tr>
      <th scope="col">ISBN</th>
      <th scope="col"><label>
        <input name="is" type="text" id="is">
      </label></th>
    </tr>
    <tr>
      <td>nomLivre</td>
      <td><label>
        <input name="nol" type="text" id="nol">
      </label></td>
    </tr>
    <tr>
      <td>nbpages</td>
      <td><label>
        <input name="nbp" type="text" id="nbp">
      </label></td>
    </tr>
    <tr>
      <td>couleur</td>
      <td><label>
        <input name="col" type="text" id="col">
      </label></td>
    </tr>
    <tr><td>idAuteur</td>
      <td><label for="idc"></label>
        <select name="idA" id="idA">
        <?php
		include("classDatabase.php");
		$db=new DB;
		$lien=$db->connexion();
		$exe=$db->ExecuteSQl("select *from auteur",$lien);
		while($l=$db->FetchLigne($exe))
		{
			echo"<option value=".$l['idauteur'].">".$l['idauteur']."</option>";
		}
		?>
      </select></td>
    </tr>
	
    <tr>
      <td><label>
        <input type="submit" name="Submit" value="Envoyer">
      </label></td>
      <td><label>
        <input name="reset" type="reset" id="reset" value="Annuler">
      </label></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  </fieldset>
 
	  
</form>
