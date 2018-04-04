<?php


include_once 'includes/dbh.inc.php';
include_once 'header.php';

?>


    <section class="cover cover--single" style="margin-top: 50px">
        <div class="cover__filter"></div>
        <div class="cover__caption">
            <div class="cover__caption__copy">
                <h1 class="centrto">PANNELLO DI CONTROLLO IOT - Tipi Sensori </h1>
            </div>
        </div>
    </section>

    <section>
        <h1 class="evidenzia">Crea nuovo tipo sensore</h1>

    </section>

    <?php
if (!isset($_POST['submitSens'])){
?>

        <div>
            <!-- Button trigger modal -->
            <div class="form-wrapper">
                <form class="signup-form" action="tipiSensori.php" method="POST">
                    <h2 class="intestazione centrato">1- Crea la struttura del sensore</h2><br>
                    <h3>Nome Tipo</h3><input type="text" name="typeT" style="margin-bottom: 0px" required>
                    <h5><small><i>Che tipo di dato verrà monitorato? E' raccomandato usare nomi quali "velocita","pressiona","umidita"...</i></small></h5>
                    <h5><small><i>N.B. non utilizzare caratteri accentati nel nome. Utilizzare 'velocita' al posto di 'velocità'.</i></small></h5>
                    <br>
                    <h3>Numero Campi</h3><input type="text" name="nCampi" style="margin-bottom: 0px" required>
                    <h5><small><i>Utilizza questo campo per eventuali messaggi di malfunzionamento e/o errore o info aggiuntive. </i></small></h5>
                    <br>

                    <button type="submit" name="submitSens">Avanti</button>
                </form>
            </div>
        </div>
        </section>
        <?php 
}else{
	$typ=$_POST['typeT'];
	$num=$_POST['nCampi'];
    ?>
        <div class="form-wrapper">
            <form class="signup-form" action="includes/tipiSensori.inc.php?tipo=<?php echo $typ ?>&num=<?php echo $num ?>" method="POST">
                <h2 class="intestazione centrato">2- Definisci struttura dati</h2><br>
                <h5><small><i>Utilizza questo campo per eventuali messaggi di malfunzionamento e/o errore...</i></small></h5>
                <h5><small><i>Usa nomi quali 'stato' o 'cdice errore'.</i></small></h5><br>
                <?php 
	  	            for( $i=1;$i<=$num;$i++){
		        ?>
                <h3>Campo
                    <?php echo $i ?>
                </h3><input type="text" name=<?php echo 'campo'.$i ?> placeholder="Inserisci nome campo" required>
                <?php 
	                                    }
	  	                            ?>

                <button type="submit" name="submit">Aggiungi i seguenti campi</button>
            </form>
        </div>

        <?php
}

?>

            <?php
	include_once 'footer.php';
?>