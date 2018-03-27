<?php
include_once 'header.php';
?>
	<section class="cover cover--single" style="margin-top: 50px">
		<div class="cover__filter"></div>
		<div class="cover__caption">
			<div class="cover__caption__copy">
				<h1 class="centrto">PANNELLO DI CONTROLLO IOT </h1>
			</div>
		</div>
	</section>

	<section class="cards clearfix">
				<h1 class="evidenzia">Gestione clienti</h1>








	<!-- CARD ADD CLIENTE -->
		<div class="card">
			<img class="card__image"src="https://source.unsplash.com/category/nature/400x260" alt="Nature">
			<div class="card__copy">
				<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#ModalAddC">Aggiungi Cliente</button>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis sequi incidunt optio, asperiores dolorum ratione excepturi. </p>
			</div>
		</div>


	<!-- MODAL ADD ACCOUNT CLIENTE-->
<section>
<div class="modal fade" id="ModalAddC" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Aggiungi Cliente</h4>
      </div>
      <div class="modal-body">
	  <form class="signup-form" action="includes/signup.inc.php" method="POST" >

	<h3>Nome</h3><input type="text" name="first" placeholder="add placeolder">
	<h3>Cognome</h3><input type="text" name="last">
	<h3>e-Mail</h3><input type="text" name="email">
	<h3>Password</h3><input type="password" name="password" >
	<h3>Scadenza</h3><input type="date" name="scadenza" >
	<h3>Telefono</h3><input type="text" name="telefono" >
	<h3>Azienda</h3><input type="text" name="azienda" >
	<h3>Partita Iva</h3><input type="text" name="p_iva">
	<h3>Sede</h3><input type="text" name="sede">

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
			<img class="card__image"src="https://source.unsplash.com/category/food/400x260" alt="Nature">
			<div class="card__copy">
				<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#ModalAddADMIN">Aggiungi Admin</button>
				<p>Permette di creare un account per personale IoT inc.</p>
			</div>
		</div>
			<!-- MODAL ADD ADMIN-->
	<section>
<div class="modal fade" id="ModalAddADMIN" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Cerca Cliente</h4>
      </div>
      <div class="modal-body">
	  <form class="signup-form" action="includes/signupAdmin.inc.php" method="POST" >

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







	<!-- CARD cerca CLIENTE -->
		<div class="card">
			<img class="card__image"src="https://source.unsplash.com/category/people/400x260" alt="Nature">
			<div class="card__copy">
				<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#ModalCercaACC">Cerca Cliente</button>
				<p>Permette di trovare i dati di un singolo user in base alla sua email </p>
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
				<h4 class="modal-title" id="myModalLabel">Cerca Cliente</h4>
      </div>
      <div class="modal-body">
	  <form class="signup-form" action="includes/searcAccount.inc.php" method="POST" >

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
