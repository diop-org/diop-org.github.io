<?php 
require( dirname( __FILE__ ) . '../../../../wp-config.php' );
$action = mysql_real_escape_string($_POST['action']); 
$social_icon_array_order = $_POST['recordsArray'];

if ($action == "updateRecordsListings")
{
	$social_icon_array_order = serialize($social_icon_array_order);
	update_option('social_icon_array_order', $social_icon_array_order);
	echo "<div id='acurax_notice' align='center' style='width: 420px; font-family: arial; font-weight: normal; font-size: 22px;'>";
	echo "Social Media Icon's Order Saved";
	echo "</div><br>";
}

?>