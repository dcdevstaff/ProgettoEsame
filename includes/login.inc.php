<?php 

//  V 3.1 
// CHANGELOG: 
// 1. Anche le password degli amministratori sono criptate/decriptate;
// 2. Un utente può loggarsi solo se il suo abbonamento è valido;
// NEXT: inplementare popup;

session_start();

if (isset($_POST['submit'])) {

	include 'dbh.inc.php';

	$email=mysqli_real_escape_string($conn,$_POST['email']);
	$password = mysqli_real_escape_string($conn,$_POST['password']);
}

if (empty($email) || empty($password)) {
		header("Location: ../index.php?login=empty");
				
} //gestione stringhe
else{
		//Preparazione Query e avvaloramento dei risultati
		$sqlUser= "SELECT * FROM users WHERE user_email='$email';";
		$sqlAdmin= "SELECT * FROM admin WHERE admin_email='$email';";

		$resultUser = mysqli_query($conn,$sqlUser);
		$resultAdmin = mysqli_query($conn,$sqlAdmin);

		$resultCheckUser = mysqli_num_rows($resultUser);
		$resultCheckAdmin = mysqli_num_rows($resultAdmin);

		//ADMIN DATA:
		$arrayDatiAdmin = mysqli_fetch_array($resultAdmin);
		$adminName = $arrayDatiAdmin['admin_email'];
		$adminPassword = $arrayDatiAdmin['password'];
		$hashedPwdCheckAdmin = password_verify($password,$adminPassword);

		//USER DATA:
		$arrayDatiUser = mysqli_fetch_array($resultUser);
		$usernameUser = $arrayDatiUser['user_email'];
		$userPassword = $arrayDatiUser['user_password'];
		$hashedPwdCheckUser = password_verify($password,$userPassword);	 
		$mysqlDate = strtotime($arrayDatiUser['scadenza']);	
		$scadenzaPhp = date("d/m/y", $mysqlDate);
		$today = date("d/m/y");
		//CONTROLLO VALIDITA' ABBONAMENTO
		$check = 0;
		if ($today < $scadenzaPhp){
			$check = 1;
		} else $check = 2;

}

 //---------------GESTIONE ACCESSI_____________________________________
			

		
		// CASO: è un ADMIN
if ($resultCheckAdmin >0) {
		if ($hashedPwdCheckAdmin){
			$_SESSION['u_email'] = $adminName;
			header("Location: ../HomeIOT.php");
		} 
		else
			header("Location: ../index.php?login=passwordAdminSbagliata");
		}
	
	// CASO: è un USER
elseif ($resultCheckUser >0){
		if ($hashedPwdCheckUser && $check==1){
			$_SESSION['u_email'] = $usernameUser;
			header("Location: ../HomeCliente.php");
			} 
		else
			header("Location: ../index.php?login=passwordUserSbagliata".$check);
		}


		//  CASO: NON è UN USER - NON è UN ADMIN
elseif($resultCheckUser<1 && $resultCheckAdmin<1){
			
			header("Location: ../index.php?login=noAdmin_noUser");
			//
} 

else header("Location: ../index.php?login=FineBlocco");

?>