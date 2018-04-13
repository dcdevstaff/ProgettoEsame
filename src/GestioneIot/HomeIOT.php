<?php
//home Iot
include_once '../header.php';
?>
    <section class="cover cover--single" style="margin-top: 50px">
        <div class="cover__filter"></div>
        <div class="cover__caption">
            <div class="cover__caption__copy">
                
                
            </div>
        </div>
    </section>

    <section class="cards clearfix">
        <h1 class="evidenzia">Gestione clienti</h1>


        <!-- CARD ADD CLIENTE -->
        <div class="card">
            <img class="card__image" src="../res/clienti.jpeg">
            <div class="card__copy">
                <button type="button" class="buttonVerd" data-toggle="modal" data-target="#ModalAddC">Aggiungi Cliente</button>
                <p>Crea un account per il Cliente </p>
            </div>
        </div>


        <!-- MODAL ADD ACCOUNT CLIENTE-->
        <section>
            <div class="modal fade" id="ModalAddC" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="intestazione" id="myModalLabel">Aggiungi Cliente</h4>
                            <h5><small><i>I campi contrassegnati con * sono obbligatori</i></small></h5>
                        </div>
                        <div class="modal-body">
                            <form class="signup-form" action="../includes/AccountManagement/signup.inc.php" method="POST">

                                <h3>Nome *</h3><input type="text" name="first"  required>
                                <h3>Cognome *</h3><input type="text" name="last"  required>
                                <h3>e-Mail *</h3><input type="text" name="email"  required>
                                <h3>Password *</h3><input type="password" name="password"  required>
                                <h3>Scadenza *</h3><input type="date" name="scadenza"  required>
                                <h3>Telefono</h3><input type="text" name="telefono" placeholder="">
                                <h3>Azienda</h3><input type="text" name="azienda" placeholder="">
                                <h3>Partita Iva</h3><input type="text" name="p_iva" placeholder="">
                                <h3>Sede</h3><input type="text" name="sede" placeholder="">

                                <button type="submit" name="submit" onclick="mostraAllert()">Registra Cliente</button>
                            </form>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>





        <!-- CARD ADD amministratore -->
        <div class="card">
            <img class="card__image" src="../res/admin.jpeg">
            <div class="card__copy">
                <button type="button" class="buttonVerd" data-toggle="modal" data-target="#ModalAddADMIN">Aggiungi Admin</button>
                <p>Creare un account IoT inc.</p>
            </div>
        </div>
        <!-- MODAL ADD ADMIN-->
        <section>
            <div class="modal fade" id="ModalAddADMIN" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="intestazione" id="myModalLabel">Aggiungi nuovo admin</h4>
    
                        </div>
                        <div class="modal-body">
                            <form class="signup-form" action="../includes/AccountManagement/signupAdmin.inc.php" method="POST">

                                <h3>Nome</h3><input type="text" name="adminName">
                                <h5><sub><small><i>Il suffisso "@iot.it" sarà aggiunto automaticamente</i></small></sub></h5>
                                <br>
                                <h3>Password</h3><input type="text" name="adminPassword">
                                <h3>Conferma Password</h3><input type="text" name="adminPasswordConf">


                                <button type="submit" name="submit" onclick="mostraAllert()">Registra Admin</button>
                            </form>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>


				<!-- CARD Gestione tipi -->
        <div class="card">
            <img class="card__image" src="../res/impostazioni.jpeg" >
            <div class="card__copy">
								<button class="buttonVerd" onclick="window.location.href='tipiSensori.php'">Gestione Tipi Sensori</button>
                <p>Creazione di nuovi tipi sensori</p>
            </div>
				</div>



        <!-- CARD cerca CLIENTE -->
        <div class="card">
            <img class="card__image" src="../res/cerca.jpeg">
            <div class="card__copy">
                <button type="button" class="buttonVerd" data-toggle="modal" data-target="#ModalCercaACC">Cerca Cliente</button>
                <p>Trovare i dati di un singolo user </p>
            </div>
				</div>
				
		
				
    </section>

    <!-- MODAL CERCA CLIENTE-->
    <section>
        <div class="modal fade" id="ModalCercaACC" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="intestazione" id="myModalLabel">Cerca Cliente</h4>
                    </div>
                    <div class="modal-body">
                        <form class="signup-form" action="../includes/ToolManager/searcAccount.inc.php" method="POST">

                            <h3>e-Mail user</h3><input type="text" name="email">
                            
                            <button type="submit" name="submit">Cerca cliente</button>
                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </section>


  
    