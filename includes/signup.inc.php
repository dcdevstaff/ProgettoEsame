<?php

if (isset($_POST['submit'])){

	include_once 'dbh.inc.php';

	$first = mysqli_real_escape_string($conn, $_POST['first']);
	$last = mysqli_real_escape_string($conn, $_POST['last']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$scadenza= mysqli_real_escape_string($conn,$_POST['scadenza']);
	$telefono = mysqli_real_escape_string($conn,$_POST['telefono']);
	$azienda =  mysqli_real_escape_string($conn,$_POST['azienda']);
	$p_iva =  mysqli_real_escape_string($conn,$_POST['p_iva']);
	$sede =  mysqli_real_escape_string($conn,$_POST['sede']);

	//Error handLers
	//Check for empty fields
	if (empty($first) || empty($last) || empty($email) || empty($password) || empty($scadenza)) {
		header("Location: ../signup.php?signup=empty");
		

	}else {
		
		//Check if input are valid
		if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last) ) {
			header("Location: ../signup.php?signup=invalid");
			
		}else{
			//Check Mail Valid
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				header("Location: ../signup.php?signup=email");
				
			}else{
				$sql=" SELECT *  FROM users WhERE user_email = '$email'  ;";
				$result = mysqli_query($conn,$sql);
				$resultCheck = mysqli_num_rows($result);
				if ($resultCheck>0) {
					header("Location: ../signup.php?signup=usertaken");
					
				}else{
					//Hashing the password
					$hashedPwd = password_hash($password,PASSWORD_DEFAULT);
					//Insert the user into the Databases
					$sql = "INSERT INTO users (user_email,user_password,scadenza) VALUES ('$email','$hashedPwd','$scadenza');";
					$sql2 = "INSERT INTO cliente (nome,cognome,azienda,telefono,p_iva,sede,email) VALUES ('$first','$last','$azienda','$telefono','$p_iva',
					'$sede','$email');";
					mysqli_query($conn,$sql);
					mysqli_query($conn,$sql2);
					echo ("<script LANGUAGE='Javascript'>
					 window.alert('Utente registrato'); 
					 window.location.href='../HomeIOT.php';
					 </script>");
					
				}
			}
		}
	}


}else{
	header("Location: ../signup.php?errore"); 
	
}

?>