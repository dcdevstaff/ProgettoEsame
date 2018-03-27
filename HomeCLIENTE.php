<?php
	include_once 'header.php';
?>

	<section class="cover cover--single" style="margin-top: 50px">
		<div class="cover__filter"></div>
		<div class="cover__caption">
			<div class="cover__caption__copy">
        <h1 style="margin: auto">R.A.D.A.R. DASHBOARD </h1>
        <button type="button" class="btn btn-primary btn-lg" style= "width: 200px" data-toggle="modal" data-target="#ModalCercaZ">Cerca Zona</button>
			</div>
		</div>
	</section>
<br>

<!--MODAL CERCA ZONA -->
<section>
<div class="modal fade" id="ModalCercaZ" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Cerca Zona</h4>
      </div>
      <div class="modal-body">
	  <form class="signup-form" action="dettaglioZona.php" method="POST" > <!--cambiato-->

		<h3>Nome zona: </h3><input type="text" name="nomeZona">

	<button type="submit" name="submit">Cerca</button>
	</form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</section>



	 <section>
	<div  id="wrapper" class="tabel-wrapper">
  <!-- Default panel contents -->
  <div class="evidenzia"><a href="dettaglioZona.php"> Nome Zona</div>

  <!-- Table -->
  	<table class="table">
  <thead>
    <tr>
      <th>TIPO</th>
      <th>Ultima Rilevazione</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>1</td>
      <td>Marco</td>
      <td>ok</td>
    </tr>
    <tr>
      <td>2</td>
      <td>Paolo</td>
      <td>ok</td>
	</tr>
    <tr>
      <td>3</td>
      <td>Sandro</td>
      <td>ok</td>
    </tr>
  </tbody>
</table><br><br>
</div>
</section>