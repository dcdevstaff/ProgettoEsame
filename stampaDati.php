<?php
include_once 'includes/dbh.inc.php';
if (isset($_POST['export'])){

$cliente= $_POST['export'];

$mail=mysqli_real_escape_string($conn,$cliente);
$query="SELECT cod_cliente FROM cliente WHERE email = '$mail';";
$resMail= mysqli_query($conn,$query);
$arrResult = mysqli_fetch_array($resMail);
$mailResult = mysqli_real_escape_string($conn, $arrResult['cod_cliente']);

$queryJoin="SELECT zona_cliente.zona,sensori_zona.nome_sensore,sensori_zona.marca,sensori_zona.tipo FROM zona_cliente INNER JOIN sensori_zona ON zona_cliente.id_pos = sensori_zona.id_pos WHERE zona_cliente.cliente = '$mailResult'; ";
$stampa = mysqli_query($conn,$queryJoin);
$arrStampa= mysqli_fetch_array($stampa);


// nome del file in cui inserire i testi
$file = "esporta.txt";
// apre il file in modalità "append", se non esiste lo crea
$fp = fopen($file, 'a');

// inserisce i valori ricevuti 
foreach ($stampa as $arrStampa) {
	fputs($fp,"Zona : ". htmlspecialchars($arrStampa['zona']) . " Nome Sensore : " . htmlspecialchars($arrStampa['nome_sensore']). " Marca : ".htmlspecialchars($arrStampa['marca']). " Tipo : ".
		htmlspecialchars($arrStampa['tipo'])."\r\n");
//
}

// chiude il file
fclose($fp);
?>
	<script LANGUAGE='JavaScript'>
    		window.alert('File Creato nella Directory del progetto !');
    		window.location.href='index.php';
    </script>")
		


<?php
}
?>