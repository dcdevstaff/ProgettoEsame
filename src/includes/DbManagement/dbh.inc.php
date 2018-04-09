<?php
// nome del file da cui prelevare i testi
error_reporting(0);

	$file = '../includes/DbManagement/datiSql.txt';
	if(!$fp = fopen($file, 'r')){
		$file= '../DbManagement/datiSql.txt';
	}


	$fp = fopen($file, 'r');
	$riga = [];
	$i=0;
	while(!feof($fp)){
		$riga[$i]=fgets($fp);
		$i++;

	}

$dbServerName = substr($riga[0],0,-2);
$dbUserName =  substr($riga[1],0,-2);
$dbPassword =  substr($riga[2],0,-2);
$dbName =  $riga[3];


$conn = mysqli_connect($dbServerName,$dbUserName,$dbPassword,$dbName);

?>