<?php
if(isset($_POST['ok']))
$nom=$_FILES['file']['name'];
$nomt=$_FILES['file']['tmp_name'];
if(!move_uploaded_file($nomt,'image/'.$nom))
echo "successs";		
?>