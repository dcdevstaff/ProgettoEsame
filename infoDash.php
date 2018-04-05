
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
<!-- INTEGRAZIONE BOOTSTRAP FRAMEWORK -->
	<link
	rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
	>

  <link
  rel="stylesheet"
  href="style.css"
  >
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
  <link
  rel="stylesheet" 
  href="stile3.css"
  >

	<link rel="stylesheet" type="text/css"
  href="stylec2.css"
  >

  

	<script
	src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
	integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
	crossorigin="anonymous">
	</script>
  <style>
    body.black {

      background-color: #f2f2f2;

    }
  </style>
  <title>Radar</title>
</head>



<header>
<nav class="navbar navbar-inverse navbar-fixed-top" style= "margin-bottom: 0px">
  <div class="container-fluid">

    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
    	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

		<ul class="nav navbar-nav">

      <li><a href="contact.php"><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span> Contattaci</a></li>

		  <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Info <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="HomeIOT.php">Home IOT (verrà tolto)</a></li>
            <li role="separator" class="divider"></li> 
            <li><a href="HomeCLIENTE.php">Dashboard (verrà tolto)</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="aboutRadar.php">About Radar</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="aboutIOT.php">About IOT</a></li>
          </ul>
      </li>
    </ul>

     	 <?php
if (isset($_SESSION['u_email'])) {
    echo '<form action="includes/logout.inc.php" class="navbar-form navbar-right  method="POST">
							<button type="submit" name="submit">Logout</button>
							</form>';
} else {
    echo '<form class="navbar-form navbar-right" action="includes/login.inc.php" method="POST">
       							<div class="form-group">
          							<input type="text" class="form-control" name="email" placeholder="E-mail">
         							<input type="password" class="form-control" name="password" placeholder="Password" >
        						</div>

       								<button type="submit" name="submit" class="btn btn-default">Login</button>
     						</form>';
}?>


        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


</header>
<body class="black">



	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>


<body>
 


<?php
 // include_once 'header.php';


if(isset($_POST['infoSENS'])){
	
	include_once 'includes/dbh.inc.php';

	$info= $_POST['infoSENS'];

	  $cod = mysqli_real_escape_string($conn,$info);
    $tipo = mysqli_real_escape_string($conn, $_POST['tipo']);
    $nomeS = mysqli_real_escape_string($conn, $_POST['nomeS']);

    $sqlRilevazioni = "SELECT * FROM $tipo WHERE idSensore = '$cod' ORDER BY idRilevazione DESC; ";
    $sqlRilevazioniG = "SELECT * FROM $tipo WHERE idSensore = '$cod' ORDER BY idRilevazione DESC LIMIT 6; ";
    $resultRilevazioni = mysqli_query($conn, $sqlRilevazioni);
    $resultRilevazioniG = mysqli_query($conn, $sqlRilevazioniG);
    $arrRilevazioni = mysqli_fetch_array($resultRilevazioni);
    $arrGrafico=mysqli_fetch_array($resultRilevazioniG);

    $sqlCol="SHOW COLUMNS FROM $tipo ;";
    $nomeCampi= mysqli_query($conn,$sqlCol);
 	  $arrCampi = mysqli_fetch_array($nomeCampi);

    

 	  $sqlinfo="SELECT marca FROM sensori_zona WHERE id_sensori = '$cod';";
    $sInfo= mysqli_query($conn,$sqlinfo);
 	  $sArr=mysqli_fetch_array($sInfo);
}



?>
   <section class="cover cover--single" style="margin-top: 50px">
        <div class="cover__filter"></div>
        <div class="cover__caption">
            <div class="cover__caption__copy">
                <h1 style="margin: auto">Info Sensore ID : <?php echo $info;?> Tipo : <?php echo $tipo; ?> Marca : <?php
                $sArr['marca']; ?></h1>
                <button type="button" class="btn btn-primary btn-lg" style="width: 200px" data-toggle="modal" data-target="#ModalModificaS">Modifica Sensore</button>

            </div>
        </div>
    </section>
       <!-- MODAL AGGIORNA SENSORE-->
       <section>
            <div class="modal fade" id="ModalModificaS" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="intestazione" id="myModalLabel">Modifica Sensore</h4>
                            <h5><sub><small><i>Il suffisso "@iot.it" sarà aggiunto automaticamente</i></small></sub></h5>
    
                        </div>
                        <div class="modal-body">
                            <form class="signup-form" action="modificaSensore.php" method="POST">

                                <h3>Vecchio Nome Sensore</h3><input type="text" name="oldSensorName">
                                <br>
                                <h3>Nome Sensore</h3><input type="text" name="newSensorName">
                                <br>
                                <h3>min Critico</h3><input type="text" name="newMinCrit">
                                <br>
                                <h3>Minimo</h3><input type="text" name="newMin">
                                <br>
                                <h3>max Critico</h3><input type="text" name="newMaxCrit">
                                <br>
                                <h3>Massimo</h3><input type="text" name="newMax">
                                <br>
                                


                                <button type="submit" name="btnModificaSensore">Salva cambiamenti</button>
                            </form>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <br>

     <div class="container">
    <canvas id="myChart"></canvas>
  </div>

  <div>
  <form class="float-wrapper" action="infoDashStorico.php" method="POST">

    <h3 class="intestazione"> Cambia Periodo</h3>

    <h3 style= "float:left"></h3><input type="date"  name="primaData">
    <h3 style= "float:left"></h3><input type="date"  name="ultimaData">
    <input type="hidden" name="cod" value="<?php echo $cod; ?>">
    <input type="hidden" name="tipo" value="<?php echo $tipo; ?>">

  <button type="submit" name="submit">Elabora Grafico</button>
</form>

  </div>
       
   
<?php 


    echo"
        <div class=\"table-wrapper\">
        <h1 class=\"intestazione\"> Sensore: $nomeS </h1>
        <table class=\"table table-bordered\" style=\"width: 400px\">
        <thead>
            <tr>"; 
           
            foreach ($nomeCampi as $arrCampi) {
               echo "<th>".$arrCampi['Field']."</th>";
            }  echo "</tr> </thead> <tbody>";
            //p.o. rilevazione stampa una riga
            foreach ($resultRilevazioni as $arrRilevazioni) {
              echo "<tr>"; 
              $dataRil = $arrRilevazioni[$arrCampi['Field']];
                  foreach ($arrRilevazioni as $dataRil)  {
                    echo "<td>" . $dataRil . "</td>";
                   
                  }
               echo "</tr>";
            }  
            echo "</tbody>";
      

    ?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});
            
      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'DataRil');
        data.addColumn('number', 'ValoreRilevato');
        //foreach (tutteledate as data) {
      
        <?php
            foreach ($resultRilevazioniG as $arrGrafico) {
        ?>
        data.addRows([
              ['<?php echo $arrGrafico['data_rilevamento']; ?>',Number('<?php echo $arrGrafico['valore_rilevato']; ?>')]
        ]);  
        <?php } 
        
        ?>


        //}
        // Set chart options
        var options = {'title':'Rilevazioni sensore',
                       'width':900,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>


<div id="chart_div"></div>
