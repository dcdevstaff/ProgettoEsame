<?php

include_once '../header.php';
if (isset($_POST['submit'])){

	include_once 'dbh.inc.php';

	$target = mysqli_real_escape_string($conn, $_POST['nomeZona']);

	//Error handLers
	//Check for empty fields
	if (empty($target)) {
		header("Location: ../cercaZona.php?cercaZona=empty");
		exit();

	}
	else {
		//trova la zona per nome
		$sqlZ = "SELECT * FROM `zona_cliente` WHERE zona = '$target';";
		$resultZ = mysqli_query($conn,$sqlZ);

		$identifier = "empty";
		$arrayDatiZ = mysqli_fetch_array($resultZ);
		


		if (isset($_SESSION['u_email'])) {
			
		$identifier =mysqli_real_escape_string($conn, $_SESSION['u_email']);

		$sqlU = "SELECT cod_cliente FROM cliente WHERE email = '$identifier';";
		echo $sqlU;
		$resultU = mysqli_query($conn,$sqlU);
		//echo $resultU;
		//$counterU = mysqli_num_rows($resultU);
		$arrayDatiU = mysqli_fetch_array($resultU);
		//$codCliente = $arrayDatiU['cod_cliente'];
		
?>
		<section class="main-container">
		<div class="form-wrapper">
			<h1 class="evidenzia">Dettagli Cliente</h1>
			<form class="signup-form" >
	
				 <table class="storage">
							<tr>
								<th>
									<label>Zone : </label>
								</th>
							</tr>
							<tr>
								<th>
									<?php
									
										foreach($resultZ as $arrayDatiZ) {
											//$i=1;
											if ($arrayDatiU['cod_cliente'] == $arrayDatiZ['cliente']) {
												echo $arrayDatiZ['zona'].'<br>';
											}
											
												$i++;
											}
	
										}
									?>
								</th>
							</tr>
					</table>
					
	
		
			</form>
		</div>
	</section>
	<?php
			//header("Location: ../cercaZona.php?zoneTrovate=".$counterZ."--account=".$identifier."--UserTovati=".$counterU. "--CodCliente=" .$codCliente);
	//	} else {
			//non ha trovato

			 
		}
	}



?>
