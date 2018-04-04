<?php
	include_once 'header.php';
?>
	<section class="cover">
		<div class="cover__filter"></div>
		<div class="cover__caption">
			<div class="cover__caption__copy">
			</div>
		</div>
	</section>

<!-- BOOTSTRAP PANEL CSS -->
<body>

<section>
	<article class="panel2">
		<div class="panel__copy">
		<h1 class="evidenzia">DEFAUT HOME</h1>
			<p class="panel__copy__meta"> 2018, DCdev
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et fuga quae aperiam eaque id, illum delectus repudiandae natus minus, ullam! Impedit excepturi quaerat delectus provident consectetur laboriosam deleniti at, temporibus.
			Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et fuga quae aperiam eaque id, illum delectus repudiandae natus minus, ullam! Impedit excepturi quaerat delectus provident consectetur laboriosam deleniti at, temporibus.</p>
		</div>
	</article>
</section>





	<!-- STILE2 CSS -->


		<?php
			//fare il controllo lessicale: analizza la stringa username, se non contiene @iot.service vai a home cliente;
			
			if ( (isset($_SESSION['u_email'])) && (strpos($_SESSION['u_email'], '@iot.it'))  ) {
				//echo "You are Log in GAY!";
				//echo $_SESSION['u_email']; //Stampa info utente
				header("location: HomeIOT.php");
			}
			elseif (isset($_SESSION['u_email'])){
				header("location: HomeCliente.php");
			}
		?>

</div>



<?php
	include_once 'footer.php';
?>

</body>