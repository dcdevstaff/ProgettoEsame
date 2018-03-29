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
                    <h5><small><i>Che tipo di dato verrà monitorato? E' raccomandato usare nomi quali "velocità","pressione","umidità"...</i></small></h5>
                    <br>
                    <h3>Numero Campi</h3><input type="text" name="nCampi" style="margin-bottom: 0px" required>
                    <h5><small><i>Esempio: Usa 4 campi per registrare Giorno, Mese, Anno, Dato </i></small></h5>
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
        <div class="card">
            <img class="card__image" src="https://source.unsplash.com/category/nature/400x260" alt="Nature">
            <div class="card__copy">
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#ModalSensor">Aggiuni i Campi</button>
                <p>Verranno creati
                    <?php echo $num ?> campi</p>
            </div>
        </div>
        </section>
        <?php
}

?>


            <!-- MODAL ADD TIPO SENSORE -->
            <section>
                <div class="modal fade" id="ModalSensor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Aggiungi Info al Tipo di Sensore</h4>
                            </div>
                            <div class="modal-body">
                                <form class="signup-form" action="includes/tipiSensori.inc.php?tipo=<?php echo $typ ?>&num=<?php echo $num ?>" method="POST">
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
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <?php
	include_once 'footer.php';
?>