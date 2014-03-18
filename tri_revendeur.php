<?php 

$server = "mysql51-111.perso";
$username = "cguimet_db";
$password = "m5ouwyaH";
$database = "cguimet_db";

$con = mysql_connect($server, $username, $password) or die ("Could not connect: " . mysql_error());
$sort = $_GET['sort'];

mysql_select_db($database, $con);
	mysql_query("SET NAMES UTF8");
$selectCars = "SELECT * FROM IP_cars, IP_retailer WHERE IP_retailer.latitude != 0 AND IP_cars.retailer = IP_retailer.id_retailer ORDER BY IP_cars.retailer";

$requete = mysql_query($selectCars, $con);

	$voitures = array();
	
	while($row = mysql_fetch_assoc($requete)) {
	$voitures[] = $row;
	
	};
	echo $_GET['jsoncallback'] . '(' . json_encode($voitures) . ');';
	
?>