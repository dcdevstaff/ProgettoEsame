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
                <h1 class="centrto">DETTAGLIO CLIENTE</h1>
                <h1 class="centrto"><?php echo $email?></h1>
			</div>
		</div>
	</section>



<section class="main-container">
	<div class="form-wrapper">
		<form class="signup-form" action="dettCliente.php" method="POST" >

			 <table class="storage">
                        <tr>
                            <th>
                                <label>Codice Cliente : </label>
                            </th>
                            <th>
                            	<?php
                                	echo $cod_cliente;
                                ?>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <label>Nome : </label>
                            </th>
                            <th>
                            	<?php
                                	echo $nome;
                                ?>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <label>Cognome : </label>
                            </th>
                            <th>
                            	<?php
                                	echo $cognome;
                                ?>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <label>Azienda : </label>
                            </th>
                            <th>
                            	<?php
                                	echo $azienda;
                                ?>

                            </th>
                        </tr>
                        <tr>
                            <th>
                                <label>Telefono: </label>
                            </th>
                            <th>
                            	<?php
                                	echo $telefono;
                                ?>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <label>Partita Iva : </label>
                            </th>
                            <th>
                            	<?php
                                	echo $p_iva;
                                ?>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <label>Sede : </label>
                            </th>
                            <th>
                            	<?php
                                	echo $sede;
                                ?>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <label>E-Mail : </label>
                            </th>
                            <th>
                            	<?php
                                	echo $email;
                                ?>
                            </th>
                        </tr>
                </table>


                <br>
             

                <button type="submit" name="delete" value='<?php echo $cod_cliente; ?>'>Cancella Cliente</button>
                

                <button type="submit" name="modify" value='<?php echo $cod_cliente; ?>'>Modifica Cliente</button>
                
         
                <button type="submit" name="dectail" value='<?php echo $cod_cliente; ?>'>Dettagli Zone e Sensori </button>

               
		</form>

                
	</div>
</section>





<?php
	include_once 'footer.php';


?>


