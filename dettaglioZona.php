<?php


include_once 'includes/dbh.inc.php';
include_once 'header.php';


if (isset($_SESSION['u_email'])){
	$sess=$_SESSION['u_email'];

	$z= $_POST['nomeZona'];

	$mail= mysqli_real_escape_string($conn, $sess);

	$cod= "SELECT cod_cliente FROM cliente WHERE email = '$mail' ; ";

	$resultCod= mysqli_query($conn,$cod);
	$resultCodArr=mysqli_fetch_array($resultCod);


	$code= mysqli_real_escape_string($conn, $resultCodArr['cod_cliente']);

	$zz= mysqli_real_escape_string($conn, $z);

	$zona= "SELECT * FROM zona_cliente WHERE (zona = '$zz' AND cliente = '$code');";

	$resultZon= mysqli_query($conn,$zona);
	$resultCheckZone=mysqli_num_rows($resultZon);
	$resultZ=mysqli_fetch_array($resultZon);

	    //controllo massimimi minimi con colori
			$x=$resultZ['id_pos'];
			$queryColor="SELECT * FROM sensori_zona WHERE id_pos = '$x' ;";
			$qColor=mysqli_query($conn,$queryColor);
			$arrColor=mysqli_fetch_array($qColor);

	?>

	<section class="cover cover--single" style="margin-top: 50px">
		<div class="cover__filter"></div>
		<div class="cover__caption">
			<div class="cover__caption__copy">
				<h1 style="margin: auto">Dettaglio Zona </h1>
				
		
			</div>
		</div>
	</section>
<br>



	<section class="main-container">

	
		<div class="tabel-wrapper centrato" >

	
                                <?php
																		
                                	$i=0;
                                    foreach($resultZon as $resultZ) {
                                    										$i=1;
																			$sensor=$resultZ['id_pos'];
																			$querySensor="SELECT * FROM sensori_zona WHERE id_pos = '$sensor';";
																			$resultSensor= mysqli_query($conn,$querySensor);
																			$resultS=mysqli_fetch_array($resultSensor);
																			
																		   
        echo "
				<form method=\"POST\" action=\"infoDash.php\">

				<table class=\"table table-bordered\">
					<thead>
								<tr align=\"center\">
								 <th>Nome Sensore</th>
								 <th>Tipo</th>
								 <th>Ultima rilevazione</th>
								<th>Altro</th>
							 </tr>
					</thead>";
				$collocazione=$resultZ['id_pos'];
			 if ($resultS) {
					 foreach ($resultSensor as $resultS) {
						 
						 $id = $resultS['id_sensori'];
						 $collocazione= $resultS['id_pos'];

							 $idS=htmlspecialchars($resultS['id_sensori']);
							 $tip=htmlspecialchars($resultS['tipo']);
							 $nomeS=htmlspecialchars($resultS['nome_sensore']);
							 
							 $queryLastRil = "SELECT * FROM $tip WHERE idSensore = '$id' ORDER BY idRilevazione DESC LIMIT 1;";
							 $resRil = mysqli_query($conn,$queryLastRil);
							 //echo $queryLastRil;
							 $arrRil = mysqli_fetch_array($resRil);
							 $lastRil = $arrRil['valore_rilevato'];
							 $lastRilData = $arrRil['data_rilevamento'];



							 

								echo "
								<tbody id='myTable'>
								<tr>
								<input type=\"hidden\" name=\"name\" value=$id>
								<input type=\"hidden\" name=\"tipo\" value=$tip>
								<input type=\"hidden\" name=\"name\" value=$collocazione>
								<input type=\"hidden\" name=\"nomeS\" value=$nomeS>

								<td name=\"sensName\" align=\"center\">" . $nomeS. "</td>
								<td align=\"center\">" . $tip . "</td>";
								if($lastRil<= $arrColor['min_critico'] ||  $lastRil>= $arrColor['max_critico']){
								 echo "<td align=\"center\" > <font color='red'>" . $lastRil. " del ". $lastRilData . " </font> </td>";
								}elseif($lastRil<= $arrColor['min_accettabile'] ||  $lastRil>= $arrColor['max_accettabile'] ){
									 echo "<td align=\"center\" > <font color='orange'>" . $lastRil. " del ". $lastRilData . "</font></td>";
								}else{
								 echo "<td align=\"center\" > <font color='green'>" . $lastRil. " del ". $lastRilData . "</font></td>";
								}
								

								echo "<td align=\"center\">
									<button
										type=\"submit\"
										class=\"btn btn-default btn-sm\"
										name=\"infoSENS\"
										value=$id>
										<span class=\"glyphicon glyphicon-info-sign\"></span>
									</button>"."   "."
									

								</td>
							 </tr>
							 </tbody>
							 </div>";
					 }
			 }
				$rZona=htmlspecialchars($resultZ['zona']);
			 echo "
			<h3 class=\"intestazione\"> " . $rZona . "</h3>
			<button
			type=\"submit\"
			name=\"infoZONA\"
			value=$collocazione
			>Info Zona
			</button>
			</form>";
	 }
 }
	
		
                                ?>
                 
                

	
</div>
</section>






<!-- MODAL ADD ZONA-->
<section>
<div class="modal fade" id="ModalAddZ" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Aggiungi Zona</h4>
      </div>
      <div class="modal-body">
	  <form class="signup-form" action="includes/addItem.inc.php?id=<?php
		echo $cod;
		?>" method="POST" >

	<h3>Nome zona</h3><input type="text" name="zona" placeholder="add placeolder">
	
	<button type="submit" name="bottZONA" onclick="mostraAllert()">Inserisci</button>
	</form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</section>







<!-- MODAL ADD SENS-->
<section>
<div class="modal fade" id="ModalAddS" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Aggiungi Sensore</h4>
      </div>
      <div class="modal-body">
	  <form class="signup-form" action="includes/addItem.inc.php?id=<?php
		echo $cod;
		?>" method="POST" >

	<h3>Nome Sensore</h3><input type="text" name="name" placeholder="add placeolder">
	<h3>Id Sensore</h3><input type="text" name="id">
	<h3>Tipo</h3><input type="text" name="tipo">
	<h3>Marca</h3><input type="text" name="marca" >
	<h3>Zona</h3><input type="text" name="zona" >
	<h3>Minimo Accettabile</h3><input type="text" name="MinA">
	<h3>Massimo Accettabile</h3><input type="text" name="MaxA">
	<h3>Minimo Critico</h3><input type="text" name="MinC" >
	<h3>Massimo Critico</h3><input type="text" name="MaxC" >
	<?php
	/* Fare controllo dati Di MINIMO E MASSIMO*/
	?>
	<button type="submit" name="bottSENS" onclick="mostraAllert()">Inserisci</button>
	</form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</section>
<?php


?>