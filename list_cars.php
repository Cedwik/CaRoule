<?php 

$server = "mysql51-111.perso";
$username = "cguimet_db";
$password = "m5ouwyaH";
$database = "cguimet_db";

$con = mysql_connect($server, $username, $password) or die ("Could not connect: " . mysql_error());

mysql_select_db($database, $con);
	mysql_query("SET NAMES UTF8");
$selectCars = "SELECT * FROM IP_cars, IP_retailer WHERE IP_retailer.latitude != 0 AND IP_cars.retailer = IP_retailer.id_retailer";


$requete = mysql_query($selectCars, $con);

	$markers = array();
	
	while($row = mysql_fetch_assoc($requete)) {
	$markers[] = $row;
	
	};
	echo $_GET['jsoncallback'] . '(' . json_encode($markers) . ');';
	
?>