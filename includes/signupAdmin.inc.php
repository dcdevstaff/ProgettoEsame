<?php

if (isset($_POST['submit'])) {
	
	include_once 'dbh.inc.php';

	$adminName = mysqli_real_escape_string($conn, $_POST['adminName']);
	$adminPassword = mysqli_real_escape_string($conn, $_POST['adminPassword']);
	$admPassConf = mysqli_real_escape_string($conn, $_POST['adminPasswordConf']);

	if (empty($adminName) || empty($adminPassword) || empty($admPassConf)) {
		header("Location: ../signupAdmin.php?signupAdmin=MancaUnDato");
			
	} 
	else {
		if($adminPassword == $admPassConf){
			$emailNewAdmin = $adminName."@iot.it";

		$sqlNomeAdmOccupatoQuery= "SELECT * FROM admin WHERE admin_email = '$adminName' ;" ;
		$resultQueryAdmin = mysqli_query($conn, $sqlNomeAdmOccupatoQuery);
		$resultQueryAdminCheck  = mysqli_num_rows($resultQueryAdmin);
			if ($resultQueryAdminCheck<0) {
				header("Location: ../signup.php?signup=NomeAdminInUso");
				
			}
			else {
				$hashedAdminPassword = password_hash($adminPassword, PASSWORD_DEFAULT);
				$sqlQuerySalvataggioAccountAdmin = "INSERT INTO admin (admin_email,password) VALUES('$emailNewAdmin','$hashedAdminPassword');";
				mysqli_query($conn,$sqlQuerySalvataggioAccountAdmin);
				header("Location: ../homeIOT.php?signup=success");
				
			}
		} else{ echo ("<script LANGUAGE='JavaScript'>
			window.alert('Le password non corrspondono !');
			window.location.href='../HomeIOT.php';
			</script>");
		}
		
	} 
}else{
	//NON ESISTE PIU, CORREGGERE LINK!!!
<<<<<<< HEAD
	header("Location: ../signupAdmin.php"); 
	
=======
	header("Location: ../HomeIOT.php"); 
	exit();
>>>>>>> 90a38c09ded8de710fc243012ab26be4bee19187
}
	

?>