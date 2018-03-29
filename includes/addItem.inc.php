<?php


/* SISTEMARE: 
1. dopo aver aggiunto un sensore o una zona il browser deve tornare ad una versione aggiornata di dettCliente.php
*/


include_once 'dbh.inc.php';
$cod_cliente=$_GET['id'];


if (isset($_POST['bottZONA'])) {
	
	$zona = mysqli_real_escape_string($conn, $_POST['zona']);
	
	$code = mysqli_real_escape_string($conn,$cod_cliente);

	$sql = " INSERT INTO zona_cliente( cliente, zona) VALUES ('$code','$zona');";

	$result = mysqli_query($conn,$sql);
	
		//deve tornare ai dettagli cliente aggiornati! (JQ)
		echo ("<script LANGUAGE='Javascript'>
					 window.alert('Zona aggiunta con successo'); 
					 window.location.href='../HomeIOT.php';
			 </script>");
					
	
	

}elseif (isset($_POST['bottSENS'])) {
	$nomeSens = mysqli_real_escape_string($conn, $_POST['name']);
	$idSens = mysqli_real_escape_string($conn, $_POST['id']);
	$minC=mysqli_real_escape_string($conn, $_POST['MinC']);
	$maxC=mysqli_real_escape_string($conn, $_POST['MaxC']);
	$minA=mysqli_real_escape_string($conn, $_POST['MinA']);
	$maxA=mysqli_real_escape_string($conn, $_POST['MaxA']);
	$tipoSens = mysqli_real_escape_string($conn, $_POST['tipo']);
	$marcaSens = mysqli_real_escape_string($conn, $_POST['marca']);
	$zonaSens = mysqli_real_escape_string($conn, $_POST['zona']);
	$code = mysqli_real_escape_string($conn,$cod_cliente);

	//controllo coerenza min-max
	if ($maxC >= $maxA && $maxA > $minA && $minA >= $minC) {

		$sqlPos = " SELECT id_pos FROM zona_cliente WHERE (cliente = '$code' AND zona='$zonaSens');";

		$resultPos = mysqli_query($conn,$sqlPos);
		$resP= mysqli_fetch_array($resultPos);
		$pos= $resP['id_pos'];
		$sqlSensor = " INSERT INTO sensori_zona (id_sensori, nome_sensore, min_critico, max_critico, min_accettabile, max_accettabile, marca, tipo, id_pos) VALUES ('$idSens','$nomeSens','$minC','$maxC','$minA','$maxA','$marcaSens','$tipoSens','$pos');";
	
		$resultSensor = mysqli_query($conn,$sqlSensor);
	
	
		echo ("<script LANGUAGE='Javascript'>
		window.alert('Sensore aggiunto con successo'); 
		window.location.href='../HomeIOT.php';
		</script>");
	}else {
		echo ("<script LANGUAGE='Javascript'>
		window.alert('Parametri valore incoerenti, riprovare'); 
		window.location.href='../HomeIOT.php';
		</script>");
	}

}

?>