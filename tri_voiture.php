<?php 
header("Access-Control-Allow-Origin: *");     
$server = "mysql51-111.perso";
$username = "cguimet_db";
$password = "m5ouwyaH";
$database = "cguimet_db";

$con = mysql_connect($server, $username, $password) or die ("Could not connect: " . mysql_error());

mysql_select_db($database, $con);
	mysql_query("SET NAMES UTF8");
	$sort = $_GET['sort'];

	
	if($sort == "modele") {
		$selectCars = "SELECT * FROM IP_cars, IP_retailer WHERE IP_retailer.latitude != 0 AND IP_cars.retailer = IP_retailer.id_retailer ORDER BY modele";
	} 

	if($sort == "categorie") {
		$selectCars = "SELECT * FROM IP_cars, IP_retailer WHERE IP_retailer.latitude != 0 AND IP_cars.retailer = IP_retailer.id_retailer ORDER BY categorie";
	} 

	if($sort == "retailer") {
		$selectCars = "SELECT * FROM IP_cars, IP_retailer WHERE IP_retailer.latitude != 0 AND IP_cars.retailer = IP_retailer.id_retailer ORDER BY retailer";
	} 	
	
	if($sort == "annee") {
		$selectCars = "SELECT * FROM IP_cars, IP_retailer WHERE IP_retailer.latitude != 0 AND IP_cars.retailer = IP_retailer.id_retailer ORDER BY annee";
	} 
	
$requete = mysql_query($selectCars, $con);

	$voitures = array();
	
	while($row = mysql_fetch_assoc($requete)) {
	$voitures[] = $row;
	
	};
	echo $_GET['jsoncallback'] . '(' . json_encode($voitures) . ');';
	
?>