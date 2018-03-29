<?php


include_once 'dbh.inc.php';
$tipo=mysqli_real_escape_string($conn,$_GET['tipo']);
$n=$_GET['num'];



if (isset($_POST['submit'])) {

for( $i=1;$i<=$n;$i++){
	$campo[$i]=mysqli_real_escape_string($conn,$_POST['campo'.$i]);
}

$createSql="CREATE TABLE IF NOT EXISTS $tipo(idSensore VARCHAR(255));";
$result = mysqli_query($conn, $createSql);

$sqlAddTipo="INSERT INTO TipiSensori (tipologia) VALUES ('$tipo'); ";
$resultTipo= mysqli_query($conn, $sqlAddTipo);
if($result){

	for( $i=1;$i<=$n;$i++){
	
		$resultCol="ALTER TABLE $tipo ADD $campo[$i] VARCHAR(200);";
		$res=mysqli_query($conn,$resultCol);
	}

	echo ("<script LANGUAGE='JavaScript'>
    		window.alert('CREATO !');
    		window.location.href='../tipiSensori.php';
    		</script>");
}else{
	echo ("<script LANGUAGE='JavaScript'>
    		window.alert('NON CREATO ERRORE !');
    		window.location.href='../tipiSensori.php';
    		</script>");
}



}

?>