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
include_once 'includes/dbh.inc.php';
include_once 'header.php';

$nomeS =  mysqli_real_escape_string($conn, $_POST['nomeSensore']);
$idS = mysqli_real_escape_string($conn, $_POST['idSensore']);
echo "$nomeS";
echo "$idS"."sss";
//$sqlCercaSeore = "s";


?>