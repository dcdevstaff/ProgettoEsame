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
																		

                                    foreach($resultZon as $resultZ) {

																			$sensor=$resultZ['id_pos'];
																			$querySensor="SELECT * FROM sensori_zona WHERE id_pos = '$sensor';";
																			$resultSensor= mysqli_query($conn,$querySensor);
																			$resultS=mysqli_fetch_array($resultSensor);
																			
																			
																				echo "<table class=\"table table-bordered\">
																			
   	 																			<thead>
      																			<tr>
																							<th>Serial Number</th>
																							<th>Tipo</th>
																							<th>Nome</th>
     																				 </tr>
																				</thead>";
																				
                                       
																				if($resultS)
                                        foreach($resultSensor as $resultS) {
																					echo "<tbody>
																					<tr>
																						<td>".$resultS['id_sensori']."</td>
																						<td>".$resultS['tipo']."</td>
																						<td>".$resultS['nome_sensore']."</td>
																						
																					</tr>
																					</tbody>";	
																					
                                        }echo "<h3 class=\"intestazione\">".$resultZ['zona']."<h3>";

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
}

?>