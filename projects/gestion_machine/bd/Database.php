<?php
class Database
{
	public function connexion(){
		$link=mysql_connect('localhost','root','')or die("impossible de se connecter");
		mysql_select_db('gestion_machine')or die("impossible de selectionner la base");
		return $link;
	}
	public function ExecuteSQL($requeteSQL,$link){
		$result=mysql_query($requeteSQL,$link)or die(mysql_error());
		return $result;
	}
	public function Fetchligne($result){
		return mysql_fetch_array($result);
	}
	public function Fermerconnexion(){
		//mysql_close()or die("impossible de fermer la base");
	}
	public function Nligne($result){
		return mysql_num_rows($result);
	}
	public function nbLignesAffectes($result){
		return mysql_affected_rows($result);
	}
}
?>