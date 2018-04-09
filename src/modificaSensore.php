<section class="cover cover--singleUser" style="margin-top: 50px">
        <div class="cover__filter"></div>
        <div class="cover__caption">
            <div class="cover__caption__copy">
                <button type="button" class="btn btn-primary btn-lg" style="width: 200px" data-toggle="modal" data-target="#ModalCercaZ">Cerca Zona</button>
                <button type="button" class="btn btn-primary btn-lg" style="width: 200px" data-toggle="modal" data-target="#ModalCercaS">Cerca Sensore</button>

            </div>
        </div>
</section>

<?php


if (isset($_POST['btnModificaSensore'])) {
    include_once 'includes/dbh.inc.php';
include_once 'header.php';
    

        $oldSname = mysqli_real_escape_string($conn, $_POST['oldSensorName']);
        $newName = mysqli_real_escape_string($conn, $_POST['newSensorName']);
        $newMinCritico = mysqli_real_escape_string($conn, $_POST['newMinCrit']);
        $newMin = mysqli_real_escape_string($conn, $_POST['newMin']);
        $newMaxCritico = mysqli_real_escape_string($conn, $_POST['newMaxCrit']);
        $newMax = mysqli_real_escape_string($conn, $_POST['newMax']);

        $sqlModificaSeore = "UPDATE sensori_zona SET 
            nome_sensore = '$newName', 
            min_critico = '$newMinCritico', 
            min_accettabile = '$newMin',
            max_accettabile ='$newMax', 
            max_critico = '$newMaxCritico' 
            WHERE nome_sensore = '$oldSname';";

        $resModificaSensore = mysqli_query($conn, $sqlModificaSeore);

        if ($resModificaSensore){
            ?>
            <script LANGUAGE='Javascript'>
			window.alert('Sensore modificato'); 
			window.location.href='HomeCLIENTE.php';
			</script>
        <?php
        }else {
        ?>
        <script LANGUAGE='Javascript'>
			window.alert('Errore, riprovare'); 
		</script>
        <?php
        }

     //ednd mod all 
    
    

    //echo ("$idS"."---"."$newName"."---"."$newMinCritico"."---"."$newMin"."---"."$newMax"."---"."$newMaxCritico");
  



}//end class

?>