<?php
include_once 'includes/dbh.inc.php';
if (isset($_POST['submit'])){

$cliente= $_POST['submit'];

$mail=mysqli_escape_string($conn,$cliente);
$query="SELECT cod_cliente FROM cliente WHERE email = '$mail';";
$resMail= mysqli_query($conn,$query);

$queryJoin="SELECT zona_cliente.zona,sensori_zona.nome_sensore,sensori_zona.marca,sensori_zona.tipo FROM zona_cliente INNER JOIN sensori_zona ON zona_cliente.id_pos = sensori_zona.id_pos WHERE zona_cliente.cliente = '$resMail'; ";
$stampa = mysqli_query($conn,$queryJoin);
$arrStampa= mysqli_fetch_array($stampa);

// nome del file in cui inserire i testi
$file = "dati_trasmessi.txt";
// apre il file in modalità "append", se non esiste lo crea
$fp = fopen($file, "a");

// inserisce i valori ricevuti 
foreach ($stampa as $arrStampa) {
	fputs($fp,"Zona : ". htmlspecialchars($arrStampa['zona']) . " Nome Sensore : " . htmlspecialchars($arrStampa['nome_sensore']). " Marca : ".htmlspecialchars($arrStampa['marca']). " Tipo : ".
		htmlspecialchars($arrStampa['tipo'])."\r\n");
//
}

// chiude il file
fclose($fp);




}
?>