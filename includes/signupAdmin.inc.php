<?php

if (isset($_POST['submit'])) {
	
	include_once 'dbh.inc.php';

	$adminName = mysqli_real_escape_string($conn, $_POST['adminName']);
	$adminPassword = mysqli_real_escape_string($conn, $_POST['adminPassword']);

	if (empty($adminName) || empty($adminPassword)) {
		header("Location: ../signupAdmin.php?signupAdmin=MancaUnDato");
			exit();
	} 
	else {
		$emailNewAdmin = $adminName."@iot.it";
		//header("Location: ../signupAdmin.php?signupAdmin=CONSOLE_".$emailNewAdmin);

		$sqlNomeAdmOccupatoQuery= "SELECT * FROM admin WHERE admin_email = '$adminName' ;" ;
		$resultQueryAdmin = mysqli_query($conn, $sqlNomeAdmOccupatoQuery);
		$resultQueryAdminCheck  = mysqli_num_rows($resultQueryAdmin);
			if ($resultQueryAdminCheck<0) {
				header("Location: ../signup.php?signup=NomeAdminInUso");
				exit();
			}
			else {
				$hashedAdminPassword = password_hash($adminPassword, PASSWORD_DEFAULT);
				$sqlQuerySalvataggioAccountAdmin = "INSERT INTO admin (admin_email,password) VALUES('$emailNewAdmin','$hashedAdminPassword');";
				mysqli_query($conn,$sqlQuerySalvataggioAccountAdmin);
				header("Location: ../homeIOT.php?signup=success");
				exit();
			}
	} 
}else{
	header("Location: ../signupAdmin.php"); 
	exit();
}
	

?>