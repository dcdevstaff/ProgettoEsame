<?php
	include_once 'header.php';
?>

<div><!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#ModalAddC">
  Aggiungi Cliente
</button>

<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#ModalAddZ">
  Aggiungi Zona
</button>

<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#ModalAddS">
  Aggiungi Sensore
</button>
<!-- Modal -->
</div>


<!-- MODAL ADD ACCOUNT-->
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

	<button type="submit" name="submit" onclick="mostraAllert()">Registra ClienteVECCHIO</button>
	</form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</section>


<!-- MODAL ADD ZONA-->
<section>
<div class="modal fade" id="ModalAddZ" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Aggiungi Cliente</h4>
      </div>
      <div class="modal-body">
	  <form class="signup-form" action="includes/signup.inc.php" method="POST" >

	<h3>Nome zona</h3><input type="text" name="first" placeholder="add placeolder">
	
	<button type="submit" name="bottZONA" onclick="mostraAllert()">Aggiungi Zona</button>
	</form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</section>

<!-- MODAL ADD SENS-->
<section>
<div class="modal fade" id="ModalAddS" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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

	<button type="submit" name="bottSENS" onclick="mostraAllert()">Registra ClienteVECCHIO</button>
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

