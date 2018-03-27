<?php
include_once 'header.php'
 ?>

<div class="panel panel-default">
  			<div class="panel-heading">
    			<h3 class="panel-title">Aggiungi Amministratore</h3>
  			</div><br>

  			<div>
    			<form class="signup-form" action="includes/signupAdmin.inc.php" method="POST" >

					<h3>Nome</h3><input type="text" name="adminName">
					<h5><sub><small><i>Il suffisso "@iot.it" sarà aggiunto automaticamente</i></small></sub></h5>
					<br>
					<h3>Password</h3><input type="text" name="adminPassword">
					
		
					<button type="submit" name="submit" onclick="mostraAllert()">Registra Admin</button>
				</form>
  			</div>

		</div>

 <?php
	include_once 'footer.php';
?>