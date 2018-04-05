<?php

/* QUI CI HO LAVORATO*/



	include_once 'header.php';

	

	$cod_cliente=$_GET['cod'];
	$nome=$_GET['nome'];
	$cognome=$_GET['cognome'];
	$azienda=$_GET['azienda'];
	$telefono=$_GET['telefono'];
	$p_iva=$_GET['iva'];
	$sede=$_GET['sede'];
	$email=$_GET['mail'];


	
	
	

?>

    <section class="cover cover--single" style="margin-top: 50px">
        <div class="cover__filter"></div>
        <div class="cover__caption">
            <div class="cover__caption__copy">
                <h1 class="centrto">ANAGRAFICA CLIENTE</h1>
                <h1 class="centrto">
                    <?php echo htmlspecialchars($email); ?>
                </h1>
            </div>
        </div>
    </section>



    <section class="main-container">
        <div class="form-wrapper">
            <form class="signup-form" action="dettCliente.php" method="POST">

                <table class="storage">
                    <tr>
                        <th>
                            <label>Codice Cliente : </label>
                        </th>
                        <th>
                            <?php
                                	echo htmlspecialchars($cod_cliente);
                                ?>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <label>Nome : </label>
                        </th>
                        <th>
                            <?php
                                	echo htmlspecialchars($nome);
                                ?>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <label>Cognome : </label>
                        </th>
                        <th>
                            <?php
                                	echo htmlspecialchars($cognome);
                                ?>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <label>Ragione Sociale : </label>
                        </th>
                        <th>
                            <?php
                                	echo htmlspecialchars($azienda);
                                ?>

                        </th>
                    </tr>
                    <tr>
                        <th>
                            <label>Telefono: </label>
                        </th>
                        <th>
                            <?php
                                	echo htmlspecialchars($telefono);
                                ?>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <label>Partita Iva : </label>
                        </th>
                        <th>
                            <?php
                                	echo htmlspecialchars($p_iva);
                                ?>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <label>Sede : </label>
                        </th>
                        <th>
                            <?php
                                	echo htmlspecialchars($sede);
                                ?>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <label>E-Mail : </label>
                        </th>
                        <th>
                            <?php
                                	echo htmlspecialchars($email);
                                ?>
                        </th>
                    </tr>
                </table>


                <br>
                

                <button type="submit" name="delete" value='<?php echo $cod_cliente; ?>'>Cancella Cliente</button>

                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#ModalModificaCliente">Modifica dati Cliente</button>

                <!----------------- MODAL MODIFICA CLIENTE------------------------>
                <section>
                    <div class="modal fade" id="ModalModificaCliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="evidenzia" id="myModalLabel">Modifica dati cliente</h3>
                                    <h5><small><i>Compilare solo i campi che si desidera aggiornare </i></small></h5>
                                    <br>
                                </div>
                                <div class="modal-body">
                                    <form class="signup-form" action="includes/dettCliente.inc.php" method="POST">

                                        <input type="hidden" name="idCliente" value="<?php echo htmlspecialchars($cod_cliente); ?>">
                                        <h3>Ragione sociale</h3><input type="text" name="newAzienda">
                                        <h3>Telefono</h3><input type="text" name="newTelefono">
                                        <h3>Sede</h3><input type="text" name="newSede">

                                        <button type="submit" name="btnUpdateCliente" value='<?php echo $cod_cliente; ?>'>Aggiorna cliente</button>
                                    </form>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Annulla</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!----------------- fine MODAL MODIFICA CLIENTE------------------------>

                    <button type="submit" name="dectail" value='<?php echo $cod_cliente; ?>'>Gestione Zone e Sensori </button>


            </form>
            <form action="stampaDati.php" method="POST">
                <button type="submit" name="export" value='<?php echo $email;?>'> Esporta dati </button>
            </form>
        </div>
        </section>





        <?php
	include_once 'footer.php';


?>