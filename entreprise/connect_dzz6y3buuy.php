
<?php
$server="127.0.0.1";
$user="root";
$pwd="";
$base="entreprisekim";
mysql_connect($server,$user,$pwd);
mysql_select_db($base);
?>




<?php
echo "<mm:dwdrfml documentRoot=\"" . __FILE__ .	"\" >\n\n";
$included_files = get_included_files();
foreach ($included_files as $filename) {
	echo "<mm:IncludeFile path=\"$filename\" />\n\n";
}
echo "</mm:dwdrfml>\n\n";

?>