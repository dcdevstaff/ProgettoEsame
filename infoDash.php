<?php
  include_once 'header.php';


if(isset($_POST['infoSENS'])){
	
	include_once 'includes/dbh.inc.php';

	
	//$sess=$_SESSION['u_email'];
	$info= $_POST['infoSENS'];

	$cod = mysqli_real_escape_string($conn,$info);
    $tipo = mysqli_real_escape_string($conn, $_POST['tipo']);
    $nomeS = mysqli_real_escape_string($conn, $_POST['nomeS']);

    $sqlRilevazioni = "SELECT * FROM $tipo WHERE idSensore = '$cod' ORDER BY idRilevazione DESC; ";
    $resultRilevazioni = mysqli_query($conn, $sqlRilevazioni);
    $arrRilevazioni = mysqli_fetch_array($resultRilevazioni);

    $sqlCol="SHOW COLUMNS FROM $tipo ;";
    $nomeCampi= mysqli_query($conn,$sqlCol);
 	$arrCampi = mysqli_fetch_array($nomeCampi);

 	$sqlinfo="SELECT marca FROM sensori_zona WHERE id_sensori = '$cod';";
 	$sInfo= mysqli_query($conn,$sqlinfo);
 	$sArr=mysqli_fetch_array($sInfo);
}



 ?>



   <section class="cover cover--single" style="margin-top: 50px">
        <div class="cover__filter"></div>
        <div class="cover__caption">
            <div class="cover__caption__copy">
                <h1 style="margin: auto">Info Sensore ID : <?php echo $info." Tipo : ".$tipo." Marca : ".$sArr['marca']; ?></h1>
            </div>
        </div>
    </section>
    <br>





    <?php
 echo "
        <h1>GRAFICO </h1>
        <img src=\"res/gaf.png\">
    ";





    echo"
        <div class=\"table-wrapper\">
        <h1 class=\"intestazione\"> Sensore: $nomeS </h1>
        <table class=\"table table-bordered\" style=\"width: 400px\">
        <thead>
            <tr>";
            foreach ($nomeCampi as $arrCampi) {
             	echo "<th>".$arrCampi['Field']."</th>";
                foreach ($resultRilevazioni as $arrRilevazioni) {
           			
           			$dataRil = $arrRilevazioni[$arrCampi['Field']];
         
            		echo "
            		<tbody>
                	<tr>
                    	<td> $dataRil </td>
                    
                	</tr>
            		</tbody>
           			
            		";
        		}
               
            }
               echo "
            </tr>
        </thead>
        </table>
    ";
        



    ?>